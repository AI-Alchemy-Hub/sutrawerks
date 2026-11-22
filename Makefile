# ============================================================================
# SUTRAWERKS — ENTERPRISE PORTAL MAKEFILE
# ============================================================================
# @package     SutraWerks
# @author      Satya Prakash Nigam
# @copyright   Copyright (c) 2026 SutraWerks. All Rights Reserved.
# @version     1.0.0
# @description Developer automation targets for linting, testing, and hygiene.
# ============================================================================

PHP ?= php
ROOT_DIR := $(shell pwd)

.PHONY: help lint test check clean

help:
	@echo "============================================================================"
	@echo " SUTRAWERKS v1.0.0 — PORTAL AUTOMATION TARGETS"
	@echo "============================================================================"
	@echo "  make lint    - Run PHP syntax linter across all portal files"
	@echo "  make test    - Execute environment and connectivity test suites"
	@echo "  make check   - Run both linter and test suites sequentially"
	@echo "  make clean   - Remove temporary editor backups and cache files"
	@echo "============================================================================"

lint:
	@echo "[LINT] Checking PHP syntax across portal files..."
	@find . -name "*.php" -not -path "./vendor/*" -exec $(PHP) -l {} \;

test:
	@echo "[TEST] Executing database and portal test suites..."
	@if [ -f "tests/check-db-connection.php" ]; then \
		$(PHP) tests/check-db-connection.php; \
	fi
	@if [ -f "tests/run-portal-tests.php" ]; then \
		$(PHP) tests/run-portal-tests.php; \
	fi

check: lint test
	@echo "[SUCCESS] All SutraWerks validation checks passed successfully."

clean:
	@echo "[CLEAN] Removing temporary editor backup files..."
	@find . -name "*~" -delete
	@find . -name "*.tmp" -delete
	@echo "[CLEAN] Workspace cleanup complete."