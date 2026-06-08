<?php include __DIR__ . '/../includes/header.php'; ?>
<div class="main-wrap">
 <section class="news-section">
    <div class="section-header">
      <h2>News &amp; Announcements</h2>
      <div class="section-header-line"></div>
      <span class="section-header-tag">Latest</span>
    </div>
              
    <div id="news-container" class="news-grid"></div>
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