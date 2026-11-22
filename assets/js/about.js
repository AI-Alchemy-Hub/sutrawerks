/**
 * ============================================================================
 * SUTRAWERKS — PRINCIPAL LEADERSHIP INTERACTIVE SCRIPT
 * ============================================================================
 * @file        about.js
 * @description Powers the interactive career & engineering milestones timeline.
 * ============================================================================
 */

document.addEventListener('DOMContentLoaded', () => {
    const timelineButtons = document.querySelectorAll('.ab-tl-btn');
    const displayContainer = document.getElementById('abTimelineDisplayContent');

    if (!timelineButtons.length || !displayContainer) {
        return;
    }

    const milestones = {
        milestone1: {
            header: '[PHASE 1: FOUNDATIONAL SYSTEMS & ACADEMIC RIGOR]',
            title: 'Computer Science Research & Core Architecture',
            desc: 'Served as Computer Science Research Assistant at the University of Roorkee on government-sponsored projects, establishing deep mastery over data structures, compiler design, and systems logic. Honored as top university chess player, cultivating strategic analytical discipline.',
            tech: 'Key Focus: C/C++ &bull; Systems Logic &bull; Algorithmic Efficiency'
        },
        milestone2: {
            header: '[PHASE 2: GLOBAL ENTERPRISE LEADERSHIP]',
            title: 'Engineering at Microsoft, Yahoo! & Cisco',
            desc: 'Directed quality systems, test automation, build verification pipelines, and release engineering for Windows Service Packs at Microsoft. Engineered low-latency, high-volume distributed systems for the Yahoo! Online Advertising Exchange and led agile modernization across Novell NetWare platforms.',
            tech: 'Key Focus: Distributed Systems &bull; Build Pipelines &bull; Low-Latency C++'
        },
        milestone3: {
            header: '[PHASE 3: INDUSTRY 5.0 & SOVEREIGN PLATFORMS]',
            title: 'SutraWerks & AI Alchemy Hub Foundation',
            desc: 'Founder and Principal Architect of SutraWerks and AI Alchemy Hub (Bengaluru). Building air-gapped Rust digital twin engines (Sentio), sovereign multi-agent LLM workflows (Ollama), and zero-trust regulatory compliance gateways while mentoring undergraduate engineers as Professor of Practice.',
            tech: 'Key Focus: Rust &bull; Ollama &bull; RAMI 4.0 AAS &bull; Sovereign Architecture'
        }
    };

    timelineButtons.forEach((btn) => {
        btn.addEventListener('click', () => {
            const key = btn.getAttribute('data-milestone');
            const data = milestones[key];
            if (!data) return;

            // Update active button state
            timelineButtons.forEach((b) => b.classList.remove('active'));
            btn.classList.add('active');

            // Render content
            displayContainer.innerHTML = `
                <div class="text-success fw-bold font-monospace mb-2">${data.header}</div>
                <h4 class="h4 text-white fw-semibold mb-3">${data.title}</h4>
                <p class="ab-card-text mb-3">${data.desc}</p>
                <div class="font-monospace small text-success">${data.tech}</div>
            `;
        });
    });
});