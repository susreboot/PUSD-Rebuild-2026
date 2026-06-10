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

  /* Animated lock icon */
  .lock-wrap {
    position: relative;
    z-index: 1;
    margin-bottom: 10px;
  }
  .lock-icon {
    font-size: 72px;
    display: block;
    animation: lockShake 3.5s ease-in-out infinite;
    filter: drop-shadow(0 4px 16px rgba(10,31,68,0.12));
  }
  @keyframes lockShake {
    0%, 100%  { transform: rotate(0deg) scale(1); }
    10%       { transform: rotate(-8deg) scale(1.05); }
    20%       { transform: rotate(8deg) scale(1.05); }
    30%       { transform: rotate(-5deg) scale(1.02); }
    40%       { transform: rotate(5deg) scale(1.02); }
    50%       { transform: rotate(0deg) scale(1); }
  }

  /* Ripple rings behind lock */
  .ripple-ring {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    border-radius: 50%;
    border: 2px solid var(--gold, #c9a84c);
    opacity: 0;
    animation: ripple 3.5s ease-out infinite;
  }
  .ripple-ring:nth-child(2) { animation-delay: 0.5s; }
  .ripple-ring:nth-child(3) { animation-delay: 1s; }
  @keyframes ripple {
    0%   { width: 60px; height: 60px; opacity: 0.5; }
    100% { width: 160px; height: 160px; opacity: 0; }
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
  <div class="lock-wrap">
    <div class="ripple-ring"></div>
    <div class="ripple-ring"></div>
    <div class="ripple-ring"></div>
    <span class="lock-icon">🔒</span>
  </div>

  <div class="error-code">4<span>0</span>3</div>
  <div class="error-title">Access Denied</div>
  <hr class="error-divider">
  <p class="error-quote">"Education is the passport to the future, for tomorrow belongs to those who prepare for it today."</p>
  <p class="error-quote-attr">— Malcolm X</p>

  <div class="error-actions">
    <a href="/" class="btn-primary">← Back to Home</a>
    <a href="/pages/publicDocuments" class="btn-secondary">Public Documents</a>
  </div>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
