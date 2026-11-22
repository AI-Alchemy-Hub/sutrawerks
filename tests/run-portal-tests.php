<?php
/**
 * ============================================================================
 * SUTRAWERKS — PORTAL UNIT & INTEGRATION TEST SUITE (v1.0.0)
 * ============================================================================
 *
 * @package     SutraWerks
 * @author      Satya Prakash Nigam
 * @copyright   Copyright (c) 2026 SutraWerks. All Rights Reserved.
 * @license     All Rights Reserved
 * @version     1.0.0
 *
 * @file        tests/run-portal-tests.php
 * @description Zero-dependency CLI unit and integration test suite verifying:
 *              1. Strict type declarations & security header inclusion
 *              2. Page-specific CSS/JS asset existence & non-zero size
 *              3. .htaccess clean-URL routing parity for all public routes
 *              4. Canonical URL & JSON-LD structured data presence
 *              5. Core config helper functions ($escape, $url, $asset)
 *
 * @usage       php tests/run-portal-tests.php
 * ============================================================================
 */

declare(strict_types=1);

if (PHP_SAPI !== 'cli') {
    http_response_code(403);
    exit('CLI execution only.');
}

$rootDir = dirname(__DIR__);

$publicPages = [
    'index.php'        => '',
    'industry-5-0.php' => 'industry-5-0',
    'agentic-ai.php'   => 'agentic-ai',
    'zero-trust.php'   => 'zero-trust',
    'platforms.php'    => 'platforms',
    'consulting.php'   => 'consulting',
    'case-studies.php' => 'case-studies',
    'insights.php'     => 'insights',
    'about.php'        => 'about',
    'privacy.php'      => 'privacy',
    'terms.php'        => 'terms',
    'contact.php'      => 'contact',
];

$errorPages = [
    '403.php',
    '404.php',
    '500.php',
];

$passed = 0;
$failed = 0;

function assertTrue(bool $condition, string $label, string $detail = ''): void
{
    global $passed, $failed;
    if ($condition) {
        $passed++;
        echo "[PASS] {$label}\n";
    } else {
        $failed++;
        $suffix = $detail !== '' ? " -> {$detail}" : '';
        echo "[FAIL] {$label}{$suffix}\n";
    }
}

echo "====================================================================\n";
echo " SUTRAWERKS v1.0.0 — PORTAL UNIT & INTEGRATION TEST SUITE\n";
echo "====================================================================\n\n";

/* ----------------------------------------------------------------------------
 * TEST SUITE 1: CORE CONFIGURATION & HELPER FUNCTIONS
 * ---------------------------------------------------------------------------- */
echo "--- [Suite 1] Core Configuration & Helper Contracts ---\n";

$configFile = $rootDir . '/includes/config.php';
assertTrue(is_file($configFile), 'includes/config.php exists');

if (is_file($configFile)) {
    require_once $configFile;

    assertTrue(isset($escape) && is_callable($escape), '$escape helper is callable');
    assertTrue(isset($url) && is_callable($url), '$url helper is callable');
    assertTrue(isset($asset) && is_callable($asset), '$asset helper is callable');

    if (isset($escape) && is_callable($escape)) {
        $xssInput  = '<script>alert("xss")</script>';
        $escaped   = $escape($xssInput);
        assertTrue(
            strpos($escaped, '<script>') === false && strpos($escaped, '&lt;script&gt;') !== false,
            '$escape neutralizes HTML/script injection'
        );
    }

    if (isset($asset) && is_callable($asset)) {
        $cssPath = $asset('css/main.css');
        assertTrue(
            strpos($cssPath, 'assets/css/main.css') !== false,
            '$asset resolves relative asset paths cleanly',
            "Resolved: {$cssPath}"
        );
    }
}

/* ----------------------------------------------------------------------------
 * TEST SUITE 2: PUBLIC PAGE SECURITY, METADATA & MODULAR ASSETS
 * ---------------------------------------------------------------------------- */
echo "\n--- [Suite 2] Public Pages Security, SEO & Asset Integrity ---\n";

foreach ($publicPages as $file => $slug) {
    $fullPath = $rootDir . '/' . $file;
    assertTrue(is_file($fullPath), "{$file} exists on disk");

    if (!is_file($fullPath)) {
        continue;
    }

    $source = (string) file_get_contents($fullPath);

    assertTrue(
        strpos($source, 'declare(strict_types=1);') !== false,
        "{$file}: enforces declare(strict_types=1)"
    );

    assertTrue(
        strpos($source, "includes/security-headers.php") !== false,
        "{$file}: loads shared security headers"
    );

    assertTrue(
        strpos($source, 'rel="canonical"') !== false,
        "{$file}: renders canonical link tag"
    );

    assertTrue(
        strpos($source, 'application/ld+json') !== false,
        "{$file}: embeds JSON-LD structured data"
    );

    // Check declared $pageCss and $pageJs files on disk
    if (preg_match('/\$pageCss\s*=\s*\$asset\(\s*[\'"]([^\'"]+)[\'"]\s*\)/', $source, $mCss)) {
        $cssDiskPath = $rootDir . '/assets/' . ltrim($mCss[1], '/');
        assertTrue(
            is_file($cssDiskPath) && filesize($cssDiskPath) > 0,
            "{$file}: dedicated CSS exists (assets/{$mCss[1]})",
            "Missing or empty: {$cssDiskPath}"
        );
    }

    if (preg_match('/\$pageJs\s*=\s*\$asset\(\s*[\'"]([^\'"]+)[\'"]\s*\)/', $source, $mJs)) {
        $jsDiskPath = $rootDir . '/assets/' . ltrim($mJs[1], '/');
        assertTrue(
            is_file($jsDiskPath) && filesize($jsDiskPath) > 0,
            "{$file}: dedicated JS exists (assets/{$mJs[1]})",
            "Missing or empty: {$jsDiskPath}"
        );
    }
}

/* ----------------------------------------------------------------------------
 * TEST SUITE 3: ERROR HANDLER PAGES (403, 404, 500)
 * ---------------------------------------------------------------------------- */
echo "\n--- [Suite 3] HTTP Error Handler Verification ---\n";

foreach ($errorPages as $errFile) {
    $errPath = $rootDir . '/' . $errFile;
    assertTrue(is_file($errPath), "{$errFile} exists on disk");
    if (is_file($errPath)) {
        $errSource = (string) file_get_contents($errPath);
        assertTrue(
            strpos($errSource, 'declare(strict_types=1);') !== false,
            "{$errFile}: enforces declare(strict_types=1)"
        );
    }
}

/* ----------------------------------------------------------------------------
 * TEST SUITE 4: .HTACCESS CLEAN-URL ROUTING PARITY
 * ---------------------------------------------------------------------------- */
echo "\n--- [Suite 4] .htaccess Clean-URL Routing Parity ---\n";

$htaccessPath = $rootDir . '/.htaccess';
assertTrue(is_file($htaccessPath), '.htaccess routing table exists');

if (is_file($htaccessPath)) {
    $htaccess = (string) file_get_contents($htaccessPath);
    assertTrue(
        strpos($htaccess, 'RewriteEngine On') !== false,
        '.htaccess enables RewriteEngine'
    );

    foreach ($publicPages as $file => $slug) {
        if ($slug === '') {
            continue;
        }
        $pattern = '/RewriteRule\s+\^' . preg_quote($slug, '/') . '\/\?\$\s+' . preg_quote($file, '/') . '/i';
        assertTrue(
            preg_match($pattern, $htaccess) === 1,
            ".htaccess maps /{$slug} -> {$file}"
        );
    }
}

/* ----------------------------------------------------------------------------
 * SUMMARY REPORT
 * ---------------------------------------------------------------------------- */
echo "\n====================================================================\n";
echo " SUMMARY: {$passed} PASSED | {$failed} FAILED\n";
echo "====================================================================\n";

exit($failed > 0 ? 1 : 0);