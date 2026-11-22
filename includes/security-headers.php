<?php
/**
 * ============================================================================
 * SUTRAWERKS — SHARED SECURITY & CHARACTER ENCODING BOOTSTRAP
 * ============================================================================
 *
 * @package     SutraWerks
 * @author      Satya Prakash Nigam
 * @copyright   Copyright (c) 2026 SutraWerks. All Rights Reserved.
 * @license     All Rights Reserved
 * @version     1.1.0
 *
 * @file        includes/security-headers.php
 * @description Shared UTF-8 configuration, HTTP security headers, hardened
 *              Content Security Policy (supporting WebSockets, SSE streams,
 *              Three.js, WebAssembly, and UI CDNs) and PHP session settings.
 *
 * @last-updated November 2026
 * ============================================================================
 */

declare(strict_types=1);

/* ========== UTF-8 / CHARACTER ENCODING ========== */

ini_set('default_charset', 'UTF-8');

/* ========== APPLICATION SECURITY SETTINGS ========== */

ini_set('expose_php', '0');

/* ========== PHP SESSION HARDENING ========== */
/* Configure securely without starting a session. */

if (session_status() === PHP_SESSION_NONE) {
    ini_set('session.use_strict_mode', '1');
    ini_set('session.use_only_cookies', '1');
    ini_set('session.cookie_httponly', '1');
    ini_set('session.cookie_samesite', 'Lax');

    $isHttps = isset($_SERVER['HTTPS'])
        && $_SERVER['HTTPS'] !== ''
        && strtolower((string) $_SERVER['HTTPS']) !== 'off';

    ini_set('session.cookie_secure', $isHttps ? '1' : '0');
}

/* ========== HTTP SECURITY HEADERS ========== */

if (!headers_sent()) {
    header('Content-Type: text/html; charset=UTF-8');
    header('X-Content-Type-Options: nosniff');
    header('X-Frame-Options: SAMEORIGIN');
    header('Referrer-Policy: strict-origin-when-cross-origin');
    header('Permissions-Policy: camera=(), microphone=(), geolocation=()');

    /* ========== CONTENT SECURITY POLICY (FUTURE-PROOFED) ========== */

    $csp = [
        "default-src 'self'",
        "base-uri 'self'",
        "form-action 'self'",
        "frame-ancestors 'self'",
        "object-src 'none'",

        /* Images and visual assets (including Picsum & Data/Blob URIs) */
        "img-src 'self' data: blob: https://flagcdn.com https://picsum.photos https://*.picsum.photos",

        /* Fonts: Google Fonts, Bootstrap Icons, FontAwesome */
        "font-src 'self' data: https://fonts.gstatic.com https://fonts.googleapis.com https://cdnjs.cloudflare.com https://cdn.jsdelivr.net",

        /* Stylesheets: Bootstrap, Google Fonts, MathJax/KaTeX, Animation libraries */
        "style-src 'self' 'unsafe-inline' https://fonts.googleapis.com https://cdn.jsdelivr.net https://cdnjs.cloudflare.com",

        /* Scripts: Bootstrap, Chart.js, Three.js, MathJax, AOS, plus WASM support for browser AI runtimes */
        "script-src 'self' 'unsafe-inline' 'unsafe-eval' 'wasm-unsafe-eval' https://cdn.jsdelivr.net https://cdnjs.cloudflare.com https://unpkg.com",

        /* Connections: CDNs, REST APIs, and crucial WebSocket (wss:) / SSE streaming for Agentic AI & Digital Twins */
        "connect-src 'self' ws: wss: https://cdn.jsdelivr.net https://cdnjs.cloudflare.com https://unpkg.com",

        /* Media and web workers for simulation rendering and async processing */
        "media-src 'self' data: blob:",
        "worker-src 'self' blob:",

        /* Browser manifest resources */
        "manifest-src 'self'"
    ];

    header('Content-Security-Policy: ' . implode('; ', $csp));
}