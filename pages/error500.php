<?php include __DIR__ . '/../includes/header.php'; ?>

<style>
  .error-page {
    min-height: 80vh;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    text-align: center;
    padding: 60px 20px;
    overflow: hidden;
    position: relative;
    background: var(--bg-page, #f5f6f8);
  }

  /* Spinning gears */
  .gears-wrap {
    position: relative;
    width: 100px;
    height: 80px;
    margin-bottom: 10px;
    z-index: 1;
  }
  .gear {
    position: absolute;
    font-size: 3rem;
    line-height: 1;
  }
  .gear-big {
    top: 0; left: 0;
    font-size: 3.5rem;
    animation: spinGear 4s linear infinite;
  }
  .gear-small {
    bottom: 0; right: 0;
    font-size: 2rem;
    animation: spinGearReverse 2.8s linear infinite;
  }
  @keyframes spinGear {
    from { transform: rotate(0deg); }
    to   { transform: rotate(360deg); }
  }
  @keyframes spinGearReverse {
    from { transform: rotate(0deg); }
    to   { transform: rotate(-360deg); }
  }

  /* Pulsing warning dot */
  .warning-dot {
    position: absolute;
    top: -4px; right: -4px;
    width: 14px; height: 14px;
    background: #e74c3c;
    border-radius: 50%;
    border: 2px solid white;
    animation: pulse 1.2s ease-in-out infinite;
  }
  @keyframes pulse {
    0%, 100% { transform: scale(1); opacity: 1; }
    50%       { transform: scale(1.4); opacity: 0.6; }
  }

  .error-code {
    font-family: 'Libre Baskerville', serif;
    font-size: clamp(80px, 15vw, 140px);
    font-weight: 700;
    color: var(--navy, #0a1f44);
    line-height: 1;
    position: relative;
    z-index: 1;
  }
  .error-code span { color: var(--gold, #c9a84c); }

  .error-title {
    font-size: clamp(18px, 3vw, 26px);
    font-weight: 700;
    color: var(--navy, #0a1f44);
    margin: 16px 0 10px;
    position: relative;
    z-index: 1;
  }

  .error-quote {
    max-width: 460px;
    font-size: 15px;
    color: var(--text-muted, #6b7a8d);
    font-style: italic;
    line-height: 1.75;
    margin: 0 auto 8px;
    position: relative;
    z-index: 1;
  }
  .error-quote-attr {
    font-size: 13px;
    color: var(--gold, #c9a84c);
    font-weight: 600;
    letter-spacing: 0.05em;
    position: relative;
    z-index: 1;
    margin-bottom: 36px;
  }

  .error-divider {
    width: 48px;
    height: 3px;
    background: var(--gold, #c9a84c);
    border: none;
    margin: 20px auto 28px;
    position: relative;
    z-index: 1;
  }

  .error-actions {
    display: flex;
    gap: 14px;
    flex-wrap: wrap;
    justify-content: center;
    position: relative;
    z-index: 1;
  }
  .btn-primary {
    background: var(--navy, #0a1f44);
    color: #fff;
    padding: 12px 28px;
    border-radius: 6px;
    text-decoration: none;
    font-weight: 600;
    font-size: 14px;
    transition: background 0.15s, transform 0.15s;
  }
  .btn-primary:hover {
    background: var(--gold, #c9a84c);
    transform: translateY(-2px);
  }
  .btn-secondary {
    background: transparent;
    color: var(--navy, #0a1f44);
    padding: 12px 28px;
    border-radius: 6px;
    text-decoration: none;
    font-weight: 600;
    font-size: 14px;
    border: 2px solid var(--navy, #0a1f44);
    transition: all 0.15s;
  }
  .btn-secondary:hover {
    background: var(--navy, #0a1f44);
    color: #fff;
    transform: translateY(-2px);
  }
</style>

<div class="error-page">
  <div class="gears-wrap">
    <span class="gear gear-big">⚙️</span>
    <span class="gear gear-small" style="position:relative;">
      ⚙️
      <span class="warning-dot"></span>
    </span>
  </div>

  <div class="error-code">5<span>0</span>0</div>
  <div class="error-title">Something Went Wrong</div>
  <hr class="error-divider">
  <p class="error-quote">"It does not matter how slowly you go as long as you do not stop."</p>
  <p class="error-quote-attr">— Confucius</p>

  <div class="error-actions">
    <a href="/" class="btn-primary">← Back to Home</a>
    <a href="mailto:info@pusd.sc.gov" class="btn-secondary">Contact Us</a>
  </div>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
