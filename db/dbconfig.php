<?php
/**
 * ============================================================================
 * FILE: dbconfig.php
 * LOCATION: ./db/dbconfig.php
 * ============================================================================
 *
 * PURPOSE
 * ----------------------------------------------------------------------------
 * Centralized Role-Based Database Connection Manager for SutraWerks.
 *
 * RESPONSIBILITIES
 * ----------------------------------------------------------------------------
 * - Load database and application credentials from project root .env file
 *   (with seamless fallback to system/Docker environment variables).
 * - Provide least-privilege PDO connections (Select, Insert, Update, Delete).
 * - Enforce Singleton pattern and Lazy Loading.
 * - Enforce Native Prepared Statements and utf8mb4 encoding.
 *
 * PHP VERSION TARGET: 8.3+
 *
 * COPYRIGHT
 * ----------------------------------------------------------------------------
 * (c) 2026 Satya Prakash Nigam / SutraWerks. All rights reserved.
 * ============================================================================
 */

declare(strict_types=1);

/* ============================================================================
   DIRECT ACCESS PROTECTION
   ============================================================================ */

if (
    PHP_SAPI !== 'cli'
    && basename($_SERVER['SCRIPT_NAME'] ?? '') === 'dbconfig.php'
) {
    http_response_code(403);
    exit('Access denied.');
}

/* ============================================================================
   DATABASE CONNECTION MANAGER
   ============================================================================ */

final class DatabaseConnect
{
    private static ?DatabaseConnect $instance = null;

    /** @var array<string, string> */
    private array $env = [];

    /** @var array<string, ?PDO> */
    private array $handles = [
        'select' => null,
        'insert' => null,
        'update' => null,
        'delete' => null,
    ];

    /**
     * PRIVATE CONSTRUCTOR
     *
     * Loads configuration from .env if present, then merges runtime
     * environment variables (supporting Docker/Coolify deployments).
     */
    private function __construct()
    {
        $envPath = dirname(__DIR__) . '/.env';

        if (is_file($envPath) && is_readable($envPath)) {
            $lines = file(
                $envPath,
                FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES
            );

            if ($lines !== false) {
                foreach ($lines as $line) {
                    $line = trim($line);

                    if ($line === '' || str_starts_with($line, '#') || !str_contains($line, '=')) {
                        continue;
                    }

                    [$key, $value] = explode('=', $line, 2);
                    $key   = trim($key);
                    $value = trim($value, " \t\n\r\0\x0B\"'");

                    if ($key !== '') {
                        $this->env[$key] = $value;
                    }
                }
            }
        }

        /* Mandatory configuration keys (checked in .env or runtime $_ENV/getenv) */
        $required = [
            'DB_HOST',
            'DB_NAME',
            'DB_SELECT_USER',
            'DB_SELECT_PASS',
            'DB_INSERT_USER',
            'DB_INSERT_PASS',
            'DB_UPDATE_USER',
            'DB_UPDATE_PASS',
            'DB_DELETE_USER',
            'DB_DELETE_PASS',
        ];

        foreach ($required as $key) {
            if (!array_key_exists($key, $this->env)) {
                $runtimeVal = $_ENV[$key] ?? getenv($key);
                if (is_string($runtimeVal) && $runtimeVal !== '') {
                    $this->env[$key] = $runtimeVal;
                }
            }

            if (!isset($this->env[$key]) || $this->env[$key] === '') {
                error_log('CRITICAL [SutraWerks DB]: Missing required configuration key: ' . $key);
                throw new RuntimeException('Required system configuration is missing.');
            }
        }
    }

    /**
     * SINGLETON INSTANCE
     */
    public static function getInstance(): DatabaseConnect
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * ENVIRONMENT CONFIGURATION ACCESS
     */
    public function getEnv(string $key, ?string $default = null): ?string
    {
        if (isset($this->env[$key])) {
            return $this->env[$key];
        }

        $runtimeVal = $_ENV[$key] ?? getenv($key);
        return (is_string($runtimeVal) && $runtimeVal !== '') ? $runtimeVal : $default;
    }

    /**
     * CREATE ROLE-SPECIFIC PDO CONNECTION
     */
    private function createConnection(string $userKey, string $passKey): PDO
    {
        $port = $this->getEnv('DB_PORT', '3306');

        $dsn = sprintf(
            'mysql:host=%s;port=%s;dbname=%s;charset=utf8mb4',
            $this->env['DB_HOST'],
            $port,
            $this->env['DB_NAME']
        );

        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];

        try {
            return new PDO(
                $dsn,
                $this->env[$userKey],
                $this->env[$passKey],
                $options
            );
        } catch (PDOException $exception) {
            error_log(
                'DB CONNECTION FAILURE [' . $userKey . ']: ' . $exception->getMessage()
            );
            throw new RuntimeException('Database connectivity issue.');
        }
    }

    /**
     * LEAST-PRIVILEGE CONNECTION HANDLES
     */
    public function getPDO_Select(): PDO
    {
        return $this->handles['select'] ??= $this->createConnection('DB_SELECT_USER', 'DB_SELECT_PASS');
    }

    public function getPDO_Insert(): PDO
    {
        return $this->handles['insert'] ??= $this->createConnection('DB_INSERT_USER', 'DB_INSERT_PASS');
    }

    public function getPDO_Update(): PDO
    {
        return $this->handles['update'] ??= $this->createConnection('DB_UPDATE_USER', 'DB_UPDATE_PASS');
    }

    public function getPDO_Delete(): PDO
    {
        return $this->handles['delete'] ??= $this->createConnection('DB_DELETE_USER', 'DB_DELETE_PASS');
    }

    public function getPDO_Admin(): PDO
    {
        return $this->getPDO_Update();
    }

    /* ========================================================================
       SINGLETON PROTECTION
       ======================================================================== */

    private function __clone()
    {
    }

    public function __wakeup(): void
    {
        throw new RuntimeException('Cannot unserialize database connection manager.');
    }
}

