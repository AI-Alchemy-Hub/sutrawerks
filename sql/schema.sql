-- ============================================================================
-- SUTRAWERKS — MYSQL 8.0 / MARIADB SCHEMA & LEAST-PRIVILEGE ROLES
-- ============================================================================

CREATE DATABASE IF NOT EXISTS `sutrawerks_db`
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;

USE `sutrawerks_db`;

-- ----------------------------------------------------------------------------
-- 1. TABLE: contact_inquiries (B2B Consulting & Product Engagement Submissions)
-- ----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `contact_inquiries` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `reference_code` VARCHAR(24) NOT NULL,
  `full_name` VARCHAR(150) NOT NULL,
  `work_email` VARCHAR(180) NOT NULL,
  `organization` VARCHAR(180) NOT NULL,
  `region` VARCHAR(80) NOT NULL DEFAULT 'Global',
  `engagement_track` VARCHAR(100) NOT NULL,
  `project_brief` TEXT NOT NULL,
  `nda_requested` TINYINT(1) NOT NULL DEFAULT 0,
  `status` ENUM('new', 'reviewed', 'scheduled', 'archived') NOT NULL DEFAULT 'new',
  `client_ip_hash` CHAR(64) DEFAULT NULL,
  `user_agent` VARCHAR(255) DEFAULT NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uk_reference_code` (`reference_code`),
  KEY `idx_status_created` (`status`, `created_at`),
  KEY `idx_engagement_track` (`engagement_track`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------------------------------------------------------
-- 2. LEAST-PRIVILEGE DATABASE USERS (LOCALHOST & 127.0.0.1)
-- ----------------------------------------------------------------------------
CREATE USER IF NOT EXISTS 'sw_select'@'localhost' IDENTIFIED BY 'SwSel_9kM4vR7xP2qL8nZ3wT6y';
CREATE USER IF NOT EXISTS 'sw_insert'@'localhost' IDENTIFIED BY 'SwIns_4hB8nD2mK9vF5jX7cR3p';
CREATE USER IF NOT EXISTS 'sw_update'@'localhost' IDENTIFIED BY 'SwUpd_6tG3wQ9zM2xL8vN4bK7s';
CREATE USER IF NOT EXISTS 'sw_delete'@'localhost' IDENTIFIED BY 'SwDel_2pY8cF5mR9vT4nX6hW3q';

CREATE USER IF NOT EXISTS 'sw_select'@'127.0.0.1' IDENTIFIED BY 'SwSel_9kM4vR7xP2qL8nZ3wT6y';
CREATE USER IF NOT EXISTS 'sw_insert'@'127.0.0.1' IDENTIFIED BY 'SwIns_4hB8nD2mK9vF5jX7cR3p';
CREATE USER IF NOT EXISTS 'sw_update'@'127.0.0.1' IDENTIFIED BY 'SwUpd_6tG3wQ9zM2xL8vN4bK7s';
CREATE USER IF NOT EXISTS 'sw_delete'@'127.0.0.1' IDENTIFIED BY 'SwDel_2pY8cF5mR9vT4nX6hW3q';

GRANT SELECT ON `sutrawerks_db`.* TO 'sw_select'@'localhost', 'sw_select'@'127.0.0.1';
GRANT INSERT ON `sutrawerks_db`.* TO 'sw_insert'@'localhost', 'sw_insert'@'127.0.0.1';
GRANT SELECT, UPDATE ON `sutrawerks_db`.* TO 'sw_update'@'localhost', 'sw_update'@'127.0.0.1';
GRANT SELECT, DELETE ON `sutrawerks_db`.* TO 'sw_delete'@'localhost', 'sw_delete'@'127.0.0.1';

FLUSH PRIVILEGES;

