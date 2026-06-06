<?php include __DIR__ . '/../includes/header.php'; ?>

<div class="main-wrap">
    <main>
      <section class="news-section" style="padding: 60px 20px;">
        <div class="section-header">
          <h2>News &amp; Announcements</h2>
          <div class="section-header-line"></div>
          <span class="section-header-tag">Archive</span>
        </div>
        
        <div id="news-container" class="news-page-grid"></div>
      </section>
    </main>
</div>

<div id="news-modal" class="modal" style="display: none;">
  <div class="modal-content">
    <span class="modal-close">&times;</span>
    <h2 id="modal-title"></h2>
    
    <!-- This is the container the JS will inject the grid into -->
    <div id="modal-image-container"></div>
    
    <div id="modal-full-text"></div>
  </div>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>