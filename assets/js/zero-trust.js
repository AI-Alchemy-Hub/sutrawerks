/**
 * ============================================================================
 * SUTRAWERKS — VERITASLENS™ ZERO TRUST INTERACTIVE SCRIPT
 * ============================================================================
 * @file        zero-trust.js
 * @description Powers the interactive Zero-Trust Policy Evaluation Console.
 * ============================================================================
 */

document.addEventListener('DOMContentLoaded', () => {
    const evaluateBtn = document.getElementById('ztEvaluateBtn');
    const scenarioSelect = document.getElementById('ztScenarioSelect');
    const consoleOutput = document.getElementById('ztConsoleOutput');

    if (!evaluateBtn || !scenarioSelect || !consoleOutput) {
        return;
    }

    const scenarios = {
        valid_edge: {
            status: 'ALLOW',
            badgeClass: 'text-success',
            lines: [
                '[1/4] Verifying mTLS 1.3 handshake... OK (TLS_AES_256_GCM_SHA384)',
                '[2/4] Validating SPIFFE ID: spiffe://sutrawerks.edge/gateway-04... VALID',
                '[3/4] Checking hardware TPM quote & SBOM digest... MATCHED',
                '[4/4] DECISION: ALLOW — Telemetry stream permitted to ingest topic.'
            ]
        },
        expired_cert: {
            status: 'DENY',
            badgeClass: 'text-danger',
            lines: [
                '[1/4] Verifying mTLS 1.3 handshake... CERTIFICATE_EXPIRED',
                '[2/4] SVID TTL exceeded (expired 14m ago); auto-rotation failed.',
                '[3/4] Dropping connection at eBPF ingress hook.',
                '[4/4] DECISION: DENY — Quarantined node; alerted SOC audit ledger.'
            ]
        },
        untrusted_subnet: {
            status: 'DENY',
            badgeClass: 'text-danger',
            lines: [
                '[1/4] Inspecting source identity... NO_CLIENT_CERTIFICATE',
                '[2/4] Policy rule: OT/PLC control plane requires attested SVID.',
                '[3/4] Implicit trust disabled across VLAN boundary.',
                '[4/4] DECISION: DENY — Packet dropped; zero-trust violation logged.'
            ]
        },
        unsigned_binary: {
            status: 'DENY',
            badgeClass: 'text-warning',
            lines: [
                '[1/4] Validating workload SVID... VALID',
                '[2/4] Verifying runtime binary SHA-256 against signed SBOM... MISMATCH',
                '[3/4] EU CRA integrity check failed: unauthorized binary drift detected.',
                '[4/4] DECISION: DENY — Revoked ephemeral session token immediately.'
            ]
        }
    };

    evaluateBtn.addEventListener('click', () => {
        const key = scenarioSelect.value;
        const result = scenarios[key];
        if (!result) return;

        const timestamp = new Date().toISOString();
        let html = `<div class="${result.badgeClass} fw-bold mb-2">[${timestamp}] POLICY VERDICT: ${result.status}</div>`;
        result.lines.forEach((line) => {
            html += `<div class="zt-terminal-line">${line}</div>`;
        });

        consoleOutput.innerHTML = html;
    });
});