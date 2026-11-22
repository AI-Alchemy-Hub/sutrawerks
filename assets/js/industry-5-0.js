/**
 * ============================================================================
 * FILE: industry-5-0.js
 * LOCATION: ./assets/js/industry-5-0.js
 * PURPOSE: Interactive Edge Induction Motor Digital Twin Simulator
 * ============================================================================
 */

document.addEventListener('DOMContentLoaded', () => {
  const modeButtons = document.querySelectorAll('[data-twin-mode]');
  const rmsEl = document.getElementById('twinRmsValue');
  const tempEl = document.getElementById('twinTempValue');
  const latencyEl = document.getElementById('twinLatencyValue');
  const statusBadgeEl = document.getElementById('twinStatusBadge');
  const diagnosticEl = document.getElementById('twinDiagnosticText');
  const metricCards = document.querySelectorAll('.sw-telemetry-metric');

  if (!rmsEl || !tempEl || !statusBadgeEl) return;

  const profiles = {
    nominal: {
      rmsBase: 1.42,
      rmsJitter: 0.08,
      tempBase: 64.5,
      tempJitter: 0.4,
      latencyBase: 0.38,
      stateClass: 'state-normal',
      badgeClass: 'bg-success text-white',
      badgeText: 'ISO 10816 ZONE A — NOMINAL',
      diagnostic: 'Harmonic spectrum clean. Bearing outer-race & rotor bar frequencies within deterministic envelope.'
    },
    degraded: {
      rmsBase: 4.85,
      rmsJitter: 0.25,
      tempBase: 88.2,
      tempJitter: 0.9,
      latencyBase: 0.41,
      stateClass: 'state-warning',
      badgeClass: 'bg-warning text-dark',
      badgeText: 'ISO 10816 ZONE C — EARLY CAVITATION / IMBALANCE',
      diagnostic: '2x line-frequency vibration harmonics detected. Predictive maintenance window recommended within 72 hours.'
    },
    critical: {
      rmsBase: 9.60,
      rmsJitter: 0.45,
      tempBase: 118.4,
      tempJitter: 1.5,
      latencyBase: 0.44,
      stateClass: 'state-critical',
      badgeClass: 'bg-danger text-white',
      badgeText: 'ISO 10816 ZONE D — THERMAL & MECHANICAL TRIP',
      diagnostic: 'Stator winding Class-F thermal threshold breached. Edge PLC relay interlock triggered locally in <1ms.'
    }
  };

  let activeMode = 'nominal';

  function renderTelemetry() {
    const p = profiles[activeMode];
    const rms = (p.rmsBase + (Math.random() - 0.5) * p.rmsJitter).toFixed(2);
    const temp = (p.tempBase + (Math.random() - 0.5) * p.tempJitter).toFixed(1);
    const latency = (p.latencyBase + (Math.random() - 0.5) * 0.06).toFixed(2);

    rmsEl.textContent = `${rms} mm/s`;
    tempEl.textContent = `${temp} °C`;
    latencyEl.textContent = `${latency} ms`;
  }

  function setMode(mode) {
    if (!profiles[mode]) return;
    activeMode = mode;
    const p = profiles[mode];

    modeButtons.forEach((btn) => {
      const isSelected = btn.getAttribute('data-twin-mode') === mode;
      btn.classList.toggle('btn-success', isSelected);
      btn.classList.toggle('btn-outline-dark', !isSelected);
    });

    metricCards.forEach((card) => {
      card.classList.remove('state-normal', 'state-warning', 'state-critical');
      card.classList.add(p.stateClass);
    });

    statusBadgeEl.className = `badge ${p.badgeClass} sw-mono-label px-3 py-2`;
    statusBadgeEl.textContent = p.badgeText;
    diagnosticEl.textContent = p.diagnostic;

    renderTelemetry();
  }

  modeButtons.forEach((btn) => {
    btn.addEventListener('click', () => {
      setMode(btn.getAttribute('data-twin-mode'));
    });
  });

  // Initialize and stream simulated 1kHz edge telemetry ticks every 1.2s
  setMode('nominal');
  setInterval(renderTelemetry, 1200);
});