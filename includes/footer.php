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
        <a href="#">District Overview</a>
        <a href="#">Strategic Plan</a>
        <a href="#">Board of Trustees</a>
        <a href="#">Organizational Chart</a>
        <a href="#">District Report Card</a>
        <a href="#">District Calendar</a>
        <a href="#">History</a>
      </div>
      <div class="footer-col">
        <h4>Programs</h4>
        <a href="#">High Schools (EFA)</a>
        <a href="#">Adult Education</a>
        <a href="#">Career &amp; Technical</a>
        <a href="#">Special Education</a>
        <a href="#">Title I</a>
        <a href="#">NCCER Credentials</a>
        <a href="#">OJT Certificates</a>
      </div>
      <div class="footer-col">
        <h4>Resources</h4>
        <a href="#">Public Documents</a>
        <a href="https://www.doc.sc.gov/policy/policy.html" target="_blank">SCDOC/PUSD Policies</a>
        <a href="#">ARP ESSER Plan</a>
        <a href="#">Transaction Register</a>
        <a href="#">Non-Discrimination Policy</a>
        <a href="#">Career Opportunities</a>
        <a href="#">SDE Surplus Property</a>
      </div>
    </div>
    <hr class="footer-divider">
    <div class="footer-bottom">
      <span>&copy; 2025 Palmetto Unified School District &middot; South Carolina Department of Corrections</span>
      <div class="footer-bottom-links">
        <a href="#">Privacy Policy</a>
        <a href="#">Non-Discrimination</a>
        <a href="https://www.doc.sc.gov/" target="_blank">SCDC Website</a>
      </div>
    </div>
  </footer>

  <div id="search-modal" style="display:none;position:fixed;inset:0;background:rgba(5,14,26,0.7);z-index:999;align-items:flex-start;justify-content:center;padding-top:80px" onclick="if(event.target===this)this.style.display='none'">
    <div style="background:#fff;border-radius:12px;width:100%;max-width:560px;overflow:hidden;box-shadow:0 20px 60px rgba(0,0,0,0.3)">
      <div style="display:flex;align-items:center;padding:16px 20px;border-bottom:0.5px solid var(--border);gap:12px">
        <i class="ti ti-search" style="font-size:20px;color:var(--text-faint)"></i>
        <input type="text" placeholder="Search PUSD — schools, programs, documents..." autofocus
          style="flex:1;border:none;outline:none;font-size:16px;font-family:'Source Sans 3',sans-serif;color:var(--text-dark)">
        <button onclick="document.getElementById('search-modal').style.display='none'"
          style="background:none;border:none;cursor:pointer;color:var(--text-faint);font-size:20px;line-height:1;padding:0">
          <i class="ti ti-x"></i>
        </button>
      </div>
      <div style="padding:16px 20px;font-size:13px;color:var(--text-faint)">
        Start typing to search the site&hellip;
      </div>
    </div>
  </div>

  <script src=/assets/js/script.js"></script>
  <script src="/assets/js/news.js" defer></script>

  <div id="news-modal">
    <div class="modal-box">
      
      <!-- Clean button: no inline onclick -->
      <button class="modal-close" id="close-modal-btn">&times;</button>
      
      <div id="modal-image-container"></div>
      <h2 id="modal-title"></h2>
      <div id="modal-full-text"></div>
    </div>
  </div>

</body>
</html>