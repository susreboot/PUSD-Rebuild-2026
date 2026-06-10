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

  /* Floating books */
  .book {
    position: absolute;
    font-size: 2rem;
    opacity: 0.15;
    animation: floatBook linear infinite;
    user-select: none;
    pointer-events: none;
  }
  @keyframes floatBook {
    0%   { transform: translateY(110vh) rotate(0deg); opacity: 0; }
    10%  { opacity: 0.15; }
    90%  { opacity: 0.15; }
    100% { transform: translateY(-10vh) rotate(360deg); opacity: 0; }
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
  .error-code span {
    color: var(--gold, #c9a84c);
  }

  .error-title {
    font-size: clamp(18px, 3vw, 26px);
    font-weight: 700;
    color: var(--navy, #0a1f44);
    margin: 16px 0 10px;
    position: relative;
    z-index: 1;
  }

  .error-quote {
    max-width: 480px;
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

<div class="error-page" id="error-page">

  <!-- Floating books injected by JS -->

  <div class="error-code">4<span>0</span>4</div>
  <div class="error-title">Page Not Found</div>
  <hr class="error-divider">
  <p class="error-quote">"The more that you read, the more things you will know. The more that you learn, the more places you'll go."</p>
  <p class="error-quote-attr">— Dr. Seuss</p>

  <div class="error-actions">
    <a href="/" class="btn-primary">← Back to Home</a>
    <a href="/pages/publicDocuments" class="btn-secondary">Public Documents</a>
  </div>
</div>

<script>
  const books = ['📚', '📖', '📝', '🎓', '📐', '✏️', '📏', '🔖'];
  const container = document.getElementById('error-page');

  for (let i = 0; i < 18; i++) {
    const el = document.createElement('span');
    el.classList.add('book');
    el.textContent = books[Math.floor(Math.random() * books.length)];
    el.style.left = Math.random() * 100 + 'vw';
    el.style.fontSize = (1.2 + Math.random() * 2) + 'rem';
    el.style.animationDuration = (8 + Math.random() * 14) + 's';
    el.style.animationDelay = (Math.random() * 10) + 's';
    container.appendChild(el);
  }
</script>

<?php include __DIR__ . '/../includes/footer.php'; ?>
