<?php include __DIR__ . '/../includes/header.php'; ?>

<title>Palmetto Unified School District - News</title>

<div class="main-wrap">
 <section class="news-section">
    <div class="section-header">
      <h2>News &amp; Announcements</h2>
      <div class="section-header-line"></div>
      <span class="section-header-tag">Latest</span>
    </div>
              
    <div id="news-container" class="news-grid"></div>
 </section>

  <section class="news-section archived-news-section" id="archived-news-section" style="display: none;">
    <div class="section-header">
      <h2>Archived News</h2>
      <div class="section-header-line"></div>
      <span class="section-header-tag">Older than 2 years</span>
    </div>

    <div id="archived-news-container" class="news-grid"></div>
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