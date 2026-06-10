<?php include __DIR__ . '/../includes/header.php'; ?>

<style>
  .page-wrap {
    min-height: 600px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    padding: 40px 20px;
    font-family: 'Source Sans 3', sans-serif;
    position: relative;
    overflow: hidden;
    background: var(--bg-page, #f5f6f8);
  }

  .err-code {
    font-family: 'Libre Baskerville', serif;
    font-size: 96px;
    font-weight: 700;
    color: var(--navy, #0a1f44);
    line-height: 1;
    letter-spacing: -2px;
    margin-bottom: 4px;
    animation: fadeDown 0.6s ease both;
  }
  .err-code span { color: var(--gold, #c9a84c); }

  .err-label {
    font-family: 'Source Sans 3', sans-serif;
    font-size: 18px;
    font-weight: 600;
    color: var(--navy, #0a1f44);
    margin-bottom: 28px;
    animation: fadeDown 0.6s 0.1s ease both;
  }

  /* ── Book ── */
  .book-scene {
    perspective: 1200px;
    width: 260px;
    height: 320px;
    margin-bottom: 32px;
    animation: fadeDown 0.5s 0.2s ease both;
    flex-shrink: 0;
  }

  .book {
    width: 260px;
    height: 320px;
    position: relative;
    transform-style: preserve-3d;
  }

  .book-back {
    position: absolute;
    inset: 0;
    background: #0d2550;
    border-radius: 4px 10px 10px 4px;
    box-shadow: -6px 8px 28px rgba(0,0,0,0.35);
  }

  .book-spine {
    position: absolute;
    left: 0; top: 0;
    width: 22px; height: 320px;
    background: linear-gradient(90deg, #050e1a 0%, #0a1f44 60%, #071530 100%);
    border-radius: 4px 0 0 4px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    gap: 6px;
  }

  .book-pages {
    position: absolute;
    left: 22px; top: 8px;
    width: 230px; height: 304px;
    background: repeating-linear-gradient(
      #f5f0ea 0px, #f5f0ea 3px,
      #ebe6df 3px, #ebe6df 6px
    );
    border-radius: 0 6px 6px 0;
  }

  .book-cover {
    position: absolute;
    left: 22px; top: 0;
    width: 238px; height: 320px;
    background: var(--navy, #0a1f44);
    border-radius: 0 8px 8px 0;
    transform-origin: left center;
    transform-style: preserve-3d;
    animation: openCover 1.3s 0.8s cubic-bezier(0.4,0,0.2,1) forwards;
    transform: rotateY(0deg);
    box-shadow: 3px 3px 12px rgba(0,0,0,0.22);
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: space-between;
    padding: 22px 18px;
    box-sizing: border-box;
  }

  .book-cover::before {
    content: '';
    position: absolute;
    inset: 12px;
    border: 1.5px solid rgba(201,168,76,0.45);
    border-radius: 4px;
    pointer-events: none;
  }
  .book-cover::after {
    content: '';
    position: absolute;
    inset: 18px;
    border: 0.5px solid rgba(201,168,76,0.2);
    border-radius: 2px;
    pointer-events: none;
  }

  .cover-top-ornament,
  .cover-bottom-ornament {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 5px;
    z-index: 1;
  }
  .ornament-line {
    height: 1px;
    background: rgba(201,168,76,0.5);
    border-radius: 1px;
  }
  .ornament-diamond {
    width: 7px; height: 7px;
    background: var(--gold, #c9a84c);
    transform: rotate(45deg);
    opacity: 0.7;
  }

  .cover-center {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 8px;
    z-index: 1;
  }
  .cover-icon { font-size: 36px; opacity: 0.85; }

  .cover-title {
    font-family: 'Libre Baskerville', serif;
    font-size: 13px;
    font-weight: 700;
    color: var(--gold, #c9a84c);
    letter-spacing: 0.14em;
    text-transform: uppercase;
    text-align: center;
    line-height: 1.5;
  }
  .cover-subtitle {
    font-family: 'Source Sans 3', sans-serif;
    font-size: 10px;
    color: rgba(201,168,76,0.55);
    letter-spacing: 0.1em;
    text-transform: uppercase;
    text-align: center;
  }

  @keyframes openCover {
    0%   { transform: rotateY(0deg); }
    100% { transform: rotateY(-158deg); }
  }

  /* ── Quote ── */
  .quote-wrap {
    max-width: 440px;
    text-align: center;
    opacity: 0;
    transform: translateY(10px);
    animation: quoteIn 0.7s 1.8s ease forwards;
  }
  .quote-line {
    width: 44px; height: 2px;
    background: var(--gold, #c9a84c);
    margin: 0 auto 16px;
    border: none;
  }
  .quote-text {
    font-family: 'Libre Baskerville', serif;
    font-size: 15px;
    font-style: italic;
    line-height: 1.85;
    color: var(--text-muted, #6b7a8d);
    margin-bottom: 10px;
  }
  .quote-attr {
    font-family: 'Source Sans 3', sans-serif;
    font-size: 12px;
    font-weight: 600;
    color: var(--gold, #c9a84c);
    letter-spacing: 0.07em;
    text-transform: uppercase;
  }

  /* ── Buttons ── */
  .err-actions {
    display: flex;
    gap: 12px;
    margin-top: 26px;
    flex-wrap: wrap;
    justify-content: center;
    opacity: 0;
    animation: quoteIn 0.5s 2.2s ease forwards;
  }
  .btn-primary {
    background: var(--navy, #0a1f44);
    color: #fff;
    padding: 12px 28px;
    border-radius: 6px;
    text-decoration: none;
    font-family: 'Source Sans 3', sans-serif;
    font-size: 14px;
    font-weight: 600;
    transition: background 0.15s, transform 0.15s;
  }
  .btn-primary:hover { background: var(--gold, #c9a84c); transform: translateY(-2px); }

  .btn-secondary {
    background: transparent;
    color: var(--navy, #0a1f44);
    padding: 12px 28px;
    border-radius: 6px;
    text-decoration: none;
    font-family: 'Source Sans 3', sans-serif;
    font-size: 14px;
    font-weight: 600;
    border: 2px solid var(--navy, #0a1f44);
    transition: all 0.15s;
  }
  .btn-secondary:hover { background: var(--navy, #0a1f44); color: #fff; transform: translateY(-2px); }

  /* ── Floating particles ── */
  .particle {
    position: absolute;
    opacity: 0;
    pointer-events: none;
    animation: floatUp linear infinite;
  }
  @keyframes floatUp {
    0%   { transform: translateY(0) rotate(0deg); opacity: 0; }
    10%  { opacity: 0.1; }
    90%  { opacity: 0.1; }
    100% { transform: translateY(-500px) rotate(300deg); opacity: 0; }
  }

  @keyframes fadeDown {
    from { opacity: 0; transform: translateY(-12px); }
    to   { opacity: 1; transform: translateY(0); }
  }
  @keyframes quoteIn {
    to { opacity: 1; transform: translateY(0); }
  }
</style>

<div class="page-wrap" id="pw">

  <div class="err-code">4<span>0</span>4</div>
  <div class="err-label">Page Not Found</div>

  <div class="book-scene">
    <div class="book">
      <div class="book-back"></div>
      <div class="book-spine">
        <div style="width:1px;height:60px;background:rgba(201,168,76,0.4);border-radius:1px;"></div>
        <div style="width:3px;height:3px;border-radius:50%;background:#c9a84c;opacity:0.5;"></div>
        <div style="width:1px;height:120px;background:rgba(201,168,76,0.4);border-radius:1px;"></div>
        <div style="width:3px;height:3px;border-radius:50%;background:#c9a84c;opacity:0.5;"></div>
        <div style="width:1px;height:60px;background:rgba(201,168,76,0.4);border-radius:1px;"></div>
      </div>
      <div class="book-pages"></div>
      <div class="book-cover">
        <div class="cover-top-ornament">
          <div class="ornament-line" style="width:60px;"></div>
          <div class="ornament-diamond"></div>
          <div class="ornament-line" style="width:40px;"></div>
        </div>
        <div class="cover-center">
          <div class="cover-icon">📖</div>
          <div class="cover-title">Palmetto<br>Unified</div>
          <div class="cover-subtitle">School District</div>
        </div>
        <div class="cover-bottom-ornament">
          <div class="ornament-line" style="width:40px;"></div>
          <div class="ornament-diamond"></div>
          <div class="ornament-line" style="width:60px;"></div>
        </div>
      </div>
    </div>
  </div>

  <div class="quote-wrap">
    <hr class="quote-line">
    <p class="quote-text">"The more that you read, the more things you will know.<br>The more that you learn, the more places you'll go."</p>
    <p class="quote-attr">— Dr. Seuss</p>
  </div>

  <div class="err-actions">
    <a href="/" class="btn-primary">← Back to Home</a>
    <a href="/pages/publicDocuments" class="btn-secondary">Public Documents</a>
  </div>

</div>

<script>
  const emojis = ['📚','📖','📝','🎓','✏️','🔖','📐','📏'];
  const pw = document.getElementById('pw');
  for (let i = 0; i < 16; i++) {
    const el = document.createElement('span');
    el.className = 'particle';
    el.textContent = emojis[Math.floor(Math.random() * emojis.length)];
    el.style.left = (Math.random() * 100) + '%';
    el.style.bottom = '-30px';
    el.style.fontSize = (13 + Math.random() * 16) + 'px';
    el.style.animationDuration = (10 + Math.random() * 12) + 's';
    el.style.animationDelay = (Math.random() * 10) + 's';
    pw.appendChild(el);
  }
</script>

<?php include __DIR__ . '/../includes/footer.php'; ?>
