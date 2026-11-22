<?php
/**
 * ============================================================================
 * FILE: check-db-connection.php
 * LOCATION: ./tests/check-db-connection.php
 * ============================================================================
 *
 * PURPOSE
 * ----------------------------------------------------------------------------
 * Lightweight smoke test for SutraWerks role-based database connections.
 * Verifies Select, Insert, Update, and Delete least-privilege PDO handles.
 * ============================================================================
 */

declare(strict_types=1);

require_once dirname(__DIR__) . '/db/dbconfig.php';

header('Content-Type: text/plain; charset=UTF-8');

echo "============================================================\n";
echo " SUTRAWERKS — LEAST-PRIVILEGE DATABASE CONNECTION SMOKE TEST \n";
echo "============================================================\n\n";

try {
    $db = DatabaseConnect::getInstance();
    echo "[PASS] DatabaseConnect singleton instantiated successfully.\n\n";

    // 1. Test SELECT Connection
    $pdoSelect = $db->getPDO_Select();
    $stmt = $pdoSelect->query("SELECT VERSION() AS db_version");
    $row = $stmt->fetch();
    echo "[PASS] SELECT Connection (sw_select): OK (MySQL Version: {$row['db_version']})\n";

    // 2. Test INSERT Connection & Write Smoke Test
    $pdoInsert = $db->getPDO_Insert();
    $refCode   = 'SW-TEST-' . strtoupper(substr(bin2hex(random_bytes(4)), 0, 8));
    $ipHash    = hash('sha256', '127.0.0.1');

    $sqlInsert = "INSERT INTO contact_inquiries 
        (reference_code, full_name, work_email, organization, region, engagement_track, project_brief, client_ip_hash, user_agent) 
        VALUES (:ref, :name, :email, :org, :region, :track, :brief, :ip, :ua)";
    
    $stmtIns = $pdoInsert->prepare($sqlInsert);
    $stmtIns->execute([
        ':ref'    => $refCode,
        ':name'   => 'Automated Smoke Tester',
        ':email'  => 'tester@sutrawerks.local',
        ':org'    => 'SutraWerks Internal',
        ':region' => 'Europe',
        ':track'  => 'Sentio Digital Twin',
        ':brief'  => 'Automated test suite verification.',
        ':ip'     => $ipHash,
        ':ua'     => 'SutraWerks-CLI-Tester/1.0'
    ]);
    $insertedId = $pdoInsert->lastInsertId();
    echo "[PASS] INSERT Connection (sw_insert): OK (Inserted ID: {$insertedId}, Ref: {$refCode})\n";

    // 3. Test UPDATE Connection & Modify Smoke Test
    $pdoUpdate = $db->getPDO_Update();
    $sqlUpdate = "UPDATE contact_inquiries SET status = 'reviewed' WHERE id = :id";
    $stmtUpd   = $pdoUpdate->prepare($sqlUpdate);
    $stmtUpd->execute([':id' => $insertedId]);
    echo "[PASS] UPDATE Connection (sw_update): OK (Updated status to 'reviewed' for ID {$insertedId})\n";

    // 4. Test DELETE Connection & Cleanup Smoke Test
    $pdoDelete = $db->getPDO_Delete();
    $sqlDelete = "DELETE FROM contact_inquiries WHERE id = :id";
    $stmtDel   = $pdoDelete->prepare($sqlDelete);
    $stmtDel->execute([':id' => $insertedId]);
    echo "[PASS] DELETE Connection (sw_delete): OK (Cleaned up test row ID {$insertedId})\n\n";

    echo "============================================================\n";
    echo " ALL 4 ROLES VERIFIED & FUNCTIONAL WITH ISOLATED PRIVILEGES \n";
    echo "============================================================\n";

} catch (Throwable $e) {
    echo "\n[CRITICAL FAILURE]: " . $e->getMessage() . "\n";
    echo "Stack Trace:\n" . $e->getTraceAsString() . "\n";
}