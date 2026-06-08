<?php include __DIR__ . '/../includes/header.php'; ?>

<div style="max-width:1200px; margin:0 auto; padding:52px 40px;">
  <section class="news-section">
    <div class="section-header">
      <h2>News &amp; Announcements</h2>
      <div class="section-header-line"></div>
      <span class="section-header-tag">Archive</span>
    </div>
    <div id="news-container" class="news-page-grid"></div>
  </section>
</div>

<div id="news-modal" class="modal" style="display: none;">
  <div class="modal-box">
    <span class="modal-close">&times;</span>
    <h2 id="modal-title"></h2>
    <div id="modal-image-container"></div>
    <div id="modal-full-text"></div>
  </div>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>