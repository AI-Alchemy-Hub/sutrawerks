# SutraWerks — Sovereign Enterprise Engineering & Platform Showcase

> **"Clean, Green, Lean, Secure and Ethical Engineering"**

[![PHP Version](https://img.shields.io/badge/PHP-8.3%2B-blue.svg)](https://php.net)
[![Bootstrap](https://img.shields.io/badge/Bootstrap-5.3.3-purple.svg)](https://getbootstrap.com)
[![Architecture](https://img.shields.io/badge/Architecture-Sovereign%20%2F%20Edge--Ready-success.svg)](https://sutrawerks.com)
[![Compliance](https://img.shields.io/badge/Compliance-GDPR%20%2F%20DPDP%202023-orange.svg)](https://sutrawerks.com)

---

## Overview

**SutraWerks** (`sutrawerks.com`) is a high-performance, enterprise-grade B2B showcase and technical advisory portal headquartered in Bengaluru, India. Designed from first principles with **mechanical sympathy**, **zero hyperscaler lock-in**, and **strict data sovereignty**, the platform highlights air-gapped industrial digital twins, high-throughput financial gateways, sovereign AI architectures, and senior executive consulting mandates.

The portal is built on a DRY, component-based **PHP 8.3+ and Bootstrap 5.3.3** architecture featuring independent page-specific stylesheets (`/assets/css/`) and interactive scripts (`/assets/js/`) to ensure high-contrast readability, UI stability, and zero external tracking overhead.

---

## Core Engineering Principles

* **Mechanical Sympathy:** Software engineered to respect CPU cache lines, memory boundaries, and radical energy economy.
* **Zero-Cloud & Sovereign Infrastructure:** Local-first infrastructure avoiding third-party commercial cloud bloat, telemetry pixels, and paid SaaS dependencies.
* **Rigorous Regulatory Compliance:** Full alignment with the European Union General Data Protection Regulation (GDPR), EU Cyber Resilience Act (CRA), NIS2, and the India Digital Personal Data Protection (DPDP) Act 2023.
* **DRY & Modular Architecture:** Centralized routing via `.htaccess`, strict type declarations (`declare(strict_types=1);`), and hardened HTTP Content Security Policy (CSP v1.1.0).

---

## Technology Stack

* **Server Runtime:** PHP 8.3+ with strict type safety (`declare(strict_types=1);`) and OPcache optimization.
* **Database Layer:** MariaDB / MySQL transactional ledgers via PDO (`db/dbconfig.php` & `includes/db.php`).
* **Dependency Management:** Composer (`composer.json` / `composer.lock`) for deterministic `PHPMailer` installation.
* **Frontend Framework:** Bootstrap 5.3.3, Plus Jakarta Sans & Inter typography, Bootstrap Icons 1.11.3, and AOS 2.3.4.
* **Containerization & Automation:** Production `Dockerfile` (PHP 8.3 + Apache) and `Makefile` task runner.

---

## Directory Structure

```text
/sutrawerks
├── .env.example              # Environment variable template (DB & SMTP)
├── .gitignore                # Excludes .env, /vendor/, logs, and local notes
├── .htaccess                 # Centralized clean URL routing & access rules
├── composer.json             # PHP dependency manifest (PHPMailer)
├── composer.lock             # Deterministic dependency lockfile
├── Dockerfile                # Production PHP 8.3 Apache container blueprint
├── LICENSE                   # Proprietary copyright and usage terms
├── Makefile                  # Build, test, and deployment automation
├── index.php                 # Sovereign Agentic AI & Enterprise Gateway
├── industry-5-0.php          # RAMI 4.0 & Edge IoT Telemetry Showcase
├── agentic-ai.php            # Deterministic Multi-Agent DAG Architecture
├── zero-trust.php            # mTLS Workload Attestation & CRA Compliance
├── platforms.php             # E2E Platform Engineering & Rust Runtimes
├── consulting.php            # Fractional CTO Advisory & Strategic Mandates
├── case-studies.php          # Verified Reference Deployments & Metrics
├── insights.php              # Technical Monographs & Architecture Essays
├── about.php                 # Principal Leadership Profile & Career Timeline
├── privacy.php               # GDPR & India DPDP Act 2023 Governance
├── terms.php                 # Terms of Service & Legal Jurisdiction
├── contact.php               # Secure Enterprise Onboarding Gateway
├── 403.php / 404.php / 500.php # Custom HTTP Error Handlers
├── assets/
│   ├── css/                  # Page-specific high-contrast stylesheets
│   └── js/                   # Interactive client-side controllers
├── db/
│   └── dbconfig.php          # Environment-driven PDO database configuration
├── includes/
│   ├── config.php            # Centralized application routing & helpers
│   ├── db.php                # Database connection singleton & query helpers
│   ├── footer.php            # Shared enterprise footer
│   ├── header.php            # Shared HTML head, meta, & CDN assets
│   ├── mailer.php            # PHPMailer SMTP dispatch wrapper
│   ├── security-headers.php  # Hardened HTTP & CSP v1.1.0 security headers
│   └── topnav.php            # Shared responsive navigation bar
├── sql/
│   └── schema.sql            # MariaDB / MySQL relational schema
└── tests/
    ├── check-db-connection.php # Database connectivity verification script
    └── run-portal-tests.php    # Automated E2E portal & header test suite

```

---

## Local & Production Setup

### 1. Requirements

* PHP 8.3+ with `pdo_mysql`, `mysqli`, `mbstring`, and `openssl` extensions enabled.
* Apache 2.4+ with `mod_rewrite` and `mod_headers` enabled (`AllowOverride All`).
* MariaDB 10.6+ or MySQL 8.0+.
* Composer and Git.

### 2. Installation

Clone the repository into your web server root (e.g., `/var/www/html/sutrawerks` or `C:/xampp/htdocs/sutrawerks`):

```bash
git clone [https://github.com/AI-Alchemy-Hub/sutrawerks.git](https://github.com/AI-Alchemy-Hub/sutrawerks.git)
cd sutrawerks
composer install --no-dev --optimize-autoloader

```

### 3. Environment & Database Configuration

Copy `.env.example` to `.env` and populate your MariaDB and SMTP credentials:

```bash
cp .env.example .env

```

Import the database schema:

```bash
mysql -u root -p < sql/schema.sql

```

### 4. Verification

Run the automated CLI verification suites:

```bash
php tests/check-db-connection.php
php tests/run-portal-tests.php

```

---

## Author & Leadership

* **Principal Architect:** Satya Prakash Nigam (S.P. Nigam)
* **Role:** Independent Enterprise Solution Architect, Principal Industry 5.0 & Edge AI Consultant
* **Platforms:** AI Alchemy Hub (`aialchemyhub.in`) & SutraWerks (`sutrawerks.com`)
* **Headquarters:** Bengaluru, Karnataka, India

---

## License & Copyright

Copyright (c) 2026 SutraWerks. All Rights Reserved.

*Strictly proprietary. See `LICENSE` for full terms. Unauthorized commercial redistribution, copying, or code extraction without explicit written authorization from the author is prohibited.*

---