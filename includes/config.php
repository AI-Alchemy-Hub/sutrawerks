<?php
/**
 * ============================================================================
 * FILE: config.php
 * LOCATION: ./includes/config.php
 * ============================================================================
 * 
 * PURPOSE
 * ----------------------------------------------------------------------------
 * Centralized Application Path Configuration and URL/Security Helper Closures.
 * Automatically adapts between XAMPP subdirectories and production root domains.
 * ============================================================================
 */

declare(strict_types=1);

/* APPLICATION BASE PATH DETECTION */
$document_root = realpath($_SERVER['DOCUMENT_ROOT'] ?? '');
$project_root  = realpath(__DIR__ . '/..');
$app_base_path = '';

if ($document_root !== false && $project_root !== false) {
    $root_prefix  = rtrim(str_replace('\\', '/', $document_root), '/');
    $project_path = str_replace('\\', '/', $project_root);

    if (strcasecmp($project_path, $root_prefix) === 0) {
        $app_base_path = '';
    } elseif (stripos($project_path, $root_prefix . '/') === 0) {
        $app_base_path = rtrim(substr($project_path, strlen($root_prefix)), '/');
    }
}

/* URL & ESCAPING HELPERS */
$base_url       = $app_base_path;
$asset_base_url = $base_url . '/assets';

$url = static fn(string $path): string =>
    $base_url . '/' . ltrim($path, '/');

$asset = static fn(string $path): string =>
    $asset_base_url . '/' . ltrim($path, '/');

$escape = static fn(string $value): string =>
    htmlspecialchars($value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
	
	