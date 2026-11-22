/**
 * ============================================================================
 * SUTRAWERKS — ENTERPRISE CONSULTING INTERACTIVE SCRIPT
 * ============================================================================
 * @file        consulting.js
 * @description Powers the interactive Engagement Scope Estimator console.
 * ============================================================================
 */

document.addEventListener('DOMContentLoaded', () => {
    const estimateBtn = document.getElementById('csEstimateBtn');
    const scopeSelect = document.getElementById('csScopeSelect');
    const resultOutput = document.getElementById('csResultOutput');

    if (!estimateBtn || !scopeSelect || !resultOutput) {
        return;
    }

    const blueprints = {
        audit: {
            title: 'ARCHITECTURAL & SECURITY AUDIT (2 WEEKS)',
            lines: [
                '[1/3] Scope: Comprehensive review of source code, CI/CD pipelines, and cloud/edge security posture.',
                '[2/3] Deliverables: Executive risk assessment report, SBOM vulnerability matrix, and prioritized refactoring roadmap.',
                '[3/3] Engagement: Direct review sessions with Principal Architect S.P. Nigam.'
            ]
        },
        fractional_cto: {
            title: 'FRACTIONAL CTO RETAINER (QUARTERLY)',
            lines: [
                '[1/3] Scope: Executive technical leadership, team mentoring, and quarterly product architecture alignment.',
                '[2/3] Deliverables: Bi-weekly architectural steering meetings, code review oversight, and hiring/scaling guidance.',
                '[3/3] Engagement: Dedicated part-time executive retainer (flexible hours).'
            ]
        },
        industry5: {
            title: 'INDUSTRY 5.0 DIGITAL TWIN ROADMAP',
            lines: [
                '[1/3] Scope: OT/IT systems convergence planning, ISO 10816/IEC 60034 telemetry design, and RAMI 4.0 mapping.',
                '[2/3] Deliverables: Production-ready digital twin blueprint, sensor integration spec, and edge hardware sizing.',
                '[3/3] Engagement: 4-week structured strategic advisory mandate.'
            ]
        },
        sovereign_ai: {
            title: 'AIR-GAPPED SOVEREIGN AI PILOT & POC',
            lines: [
                '[1/3] Scope: Local LLM deployment planning (Ollama/Rust), data privacy compliance (GDPR/DPDP), and multi-agent DAG design.',
                '[2/3] Deliverables: Air-gapped reference architecture, quantization benchmark report, and secure workflow prototype.',
                '[3/3] Engagement: 3-week intensive advisory and prototyping sprint.'
            ]
        }
    };

    estimateBtn.addEventListener('click', () => {
        const key = scopeSelect.value;
        const bp = blueprints[key];
        if (!bp) return;

        let html = `<div class="text-success fw-bold mb-2">[BLUEPRINT] ${bp.title}</div>`;
        bp.lines.forEach((line) => {
            html += `<div class="cs-result-line">${line}</div>`;
        });

        resultOutput.innerHTML = html;
    });
});