/* ==========================================================================
   SutraWerks Interactive Telemetry & UI Controller
   ========================================================================== */

document.addEventListener('DOMContentLoaded', () => {
  // 1. Initialize Animate On Scroll (AOS)
  if (typeof AOS !== 'undefined') {
    AOS.init({
      duration: 650,
      easing: 'ease-out-cubic',
      once: true,
      offset: 60
    });
  }

  // 2. Render Industry 5.0 Sentio Digital Twin Benchmark Chart (Homepage)
  const chartCanvas = document.getElementById('sentioTelemetryChart');
  if (chartCanvas && typeof Chart !== 'undefined') {
    new Chart(chartCanvas, {
      type: 'line',
      data: {
        labels: ['Q1 Baseline', 'Q2 Edge Twin', 'Q3 Agentic QA', 'Q4 Zero-Trust'],
        datasets: [
          {
            label: 'Equipment OEE (%)',
            data: [74, 83, 89, 94.5],
            borderColor: '#34d399',
            backgroundColor: 'rgba(52, 211, 153, 0.14)',
            borderWidth: 2.5,
            tension: 0.35,
            fill: true
          },
          {
            label: 'Compute & Energy Overhead Index',
            data: [100, 81, 68, 56],
            borderColor: '#38bdf8',
            backgroundColor: 'rgba(56, 189, 248, 0.08)',
            borderWidth: 2,
            borderDash: [5, 5],
            tension: 0.35,
            fill: false
          }
        ]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            labels: { color: '#e2e8f0', font: { size: 12 } }
          }
        },
        scales: {
          x: {
            ticks: { color: '#94a3b8' },
            grid: { color: 'rgba(255, 255, 255, 0.06)' }
          },
          y: {
            ticks: { color: '#94a3b8' },
            grid: { color: 'rgba(255, 255, 255, 0.06)' },
            suggestedMin: 40,
            suggestedMax: 100
          }
        }
      }
    });
  }

  // 3. Back to Top Button Controller
  const backToTopBtn = document.getElementById('swBackToTop');
  if (backToTopBtn) {
    const toggleBackToTop = () => {
      if (window.scrollY > 320) {
        backToTopBtn.classList.add('show');
      } else {
        backToTopBtn.classList.remove('show');
      }
    };

    window.addEventListener('scroll', toggleBackToTop, { passive: true });
    toggleBackToTop();

    backToTopBtn.addEventListener('click', () => {
      window.scrollTo({ top: 0, behavior: 'smooth' });
    });
  }

});