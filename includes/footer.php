<footer>
    <div class="footer-top">
      <div class="footer-brand">
        <span class="brand-abbr">PUSD</span>
        <span class="brand-sub">Palmetto Unified School District</span>
        <p>A division of the South Carolina Department of Corrections, serving the educational needs of incarcerated individuals statewide.</p>
        <p style="margin-top:12px">
          1735 Haviland Circle<br>
          Columbia, SC 29210<br>
          (803) 896-1583
        </p>
      </div>
      <div class="footer-col">
          <h4>District</h4>
          
          <a href="/pages/about">About PUSD</a>
          <a href="/pages/about" class="sub-link">Beliefs & Principles</a>
          <a href="/pages/about" class="sub-link">History</a>
          <span class="footer-section-header">Board of Trustees</span>
          <a href="/pages/Board-of-Trustees" class="sub-link">Board Members</a>
          <a href="/pages/publicDocuments" class="sub-link">Agendas & Minutes</a>
          <a href="https://screportcards.com/" target="_blank">District Report Card</a>
          <a href="/pages/calendar">District Calendar</a>
          <a href="/pages/publicDocuments">Public Documents</a>
          <a href="/pages/publicDocuments" class="sub-link">Strategic Plan</a>
          <a href="/pages/publicDocuments" class="sub-link">Non-Discrimination Policy</a>
          <a href="/pages/publicDocuments" class="sub-link">Organizational Chart</a>
          <a href="https://www.doc.sc.gov/policy/policy.html" target="_blank">SCDOC/PUSD Policies</a>
      </div>
      <div class="footer-col">
        <h4>Programs</h4>
          <a href="/pages/Programs#adult-education-section">Adult Basic Education</a>
          <a href="/pages/Programs#cte-section">Career &amp; Technical Education</a>
          <a href="/pages/Programs#efa-section">Education Finance Act (EFA)</a>
          <a href="/pages/Programs#special-education-section">Special Education Services</a>
          <a href="/pages/Programs#title-i-section">Title I Programs</a>
      </div>
      <div class="footer-col">
        <h4>Resources</h4>
        <a href="#">Public Documents</a>
        <a href="https://www.doc.sc.gov/policy/policy.html" target="_blank">SCDOC/PUSD Policies</a>
        <a href="/pages/publicDocuments">ARP ESSER Plan</a>
        <a href="/pages/publicDocuments">Transaction Register</a>
        <a href="/pages/publicDocuments">Non-Discrimination Policy</a>
        <a href="https://www.governmentjobs.com/careers/sc?department[0]=Department%20of%20Corrections&category[0]=Education%2C%20Training%20%26%20Library&category[1]=Education&sort=PositionTitle%7CAscending" target="_blank">Career Opportunities</a>
        <a href="/pages/publicDocuments">SDE Surplus Property</a>
      </div>
    </div>
    <hr class="footer-divider">
    <div class="footer-bottom">
      <span>&copy; 2025 Palmetto Unified School District &middot; South Carolina Department of Corrections</span>
      <div class="footer-bottom-links">
        <a href="/pages/publicDocuments">Privacy Policy</a>
        <a href="/pages/publicDocuments">Non-Discrimination</a>
        <a href="https://www.doc.sc.gov/" target="_blank">SCDC Website</a>
      </div>
    </div>
  </footer>

  <div id="news-modal">
    <div class="modal-box">
      
      <!-- Clean button: no inline onclick -->
      <button class="modal-close" id="close-modal-btn">&times;</button>
      
      <div id="modal-image-container"></div>
      <h2 id="modal-title"></h2>
      <div id="modal-full-text"></div>
    </div>
  </div>

  <script src="/assets/js/script.js" defer></script>
  <script src="/assets/js/news.js" defer></script>
  <script src="/assets/js/search.js" defer></script>
</body>

</html>

<?php
$indexFile   = $_SERVER['DOCUMENT_ROOT'] . '/assets/data/search-index.json';
$builderFile = $_SERVER['DOCUMENT_ROOT'] . '/build_search.php';
$lockFile    = $_SERVER['DOCUMENT_ROOT'] . '/assets/data/search-index.lock';
$maxAge      = 3600;

$isEmpty = !file_exists($indexFile) || filesize($indexFile) < 10;
$isStale = file_exists($indexFile) && (time() - filemtime($indexFile)) > $maxAge;
$isLocked = file_exists($lockFile) && (time() - filemtime($lockFile)) < 60;

if (($isEmpty || $isStale) && !$isLocked) {
    // Write lock so no other page load triggers a second build
    file_put_contents($lockFile, time());
    
    ob_start();
    include $builderFile;
    ob_end_clean();
    
    // Remove lock when done
    unlink($lockFile);
}
?>
