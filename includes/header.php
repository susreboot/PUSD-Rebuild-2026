<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:wght@400;700&family=Source+Sans+3:wght@300;400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/dist/tabler-icons.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
  <meta http-equiv="Content-Security-Policy" content="default-src 'self' https:; script-src 'self' 'unsafe-inline' 'unsafe-eval' https:; style-src 'self' 'unsafe-inline' https:; connect-src 'self' https:; img-src 'self' data: https:;">
  <link rel="stylesheet" href="/assets/css/styles.css">
</head>
<body>

  <div class="util-bar">
    <span class="util-bar-left">South Carolina Department of Corrections — Palmetto Unified School District</span>
    <div class="util-bar-right">
      <span><i class="ti ti-phone"></i> (803) 896-1583</span>
      <a href="https://www.doc.sc.gov/" target="_blank">SCDC Website</a>
      <a href="https://www.governmentjobs.com/careers/sc?department[0]=Department%20of%20Corrections&category[0]=Education%2C%20Training%20%26%20Library&category[1]=Education&sort=PositionTitle%7CAscending" target="_blank">Careers</a>
    </div>
  </div>

  <nav>
    <a class="nav-logo" href="/index">
      <div class="nav-logo-icon">
        <img src="/images/PUSDLogo_Revamp.png" alt="PUSD Logo" class="logo-img">
      </div>
      <div class="nav-logo-text">
        <span class="abbr">PUSD</span>
        <span class="full">Palmetto Unified School District</span>
      </div>
    </a>

    <button class="hamburger-toggle" aria-label="Menu">
        <i class="ti ti-menu-2"></i>
    </button>

    <div class="nav-links">
      <div class="nav-item">
        <a href="#" class="active">District Overview <span class="nav-chevron">▾</span></a>
        <div class="nav-dropdown">
          <a href="/pages/about">About PUSD</a>
          <a href="/pages/about" class="sub-link">Beliefs &amp; Principles</a>
          <a href="/pages/about" class="sub-link">Our Vision</a>
          <a href="/pages/about" class="sub-link">Our Mission</a>
          <a href="/pages/about" class="sub-link">Our History</a>
          <span class="nav-parent" style="cursor: default;">Board of Trustees</span>
          <a href="/pages/Board-of-Trustees" class="sub-link">Board Members</a>
          <a href="/pages/publicDocuments" class="sub-link">Agendas & Minutes</a>
          <a href="/pages/calendar">District Calendar</a>
          <a href="https://screportcards.com/" target="_blank">District Report Card</a>
          <a href="/pages/publicDocuments">Public Documents</a>
          <a href="/pages/publicDocuments" class="sub-link">Strategic Plan</a>
          <a href="/pages/publicDocuments" class="sub-link">Non-Discrimination Policy</a>
          <a href="https://www.doc.sc.gov/policy/policy.html" target="_blank">SCDOC/PUSD Policies</a>
        </div>
      </div>
      <div class="nav-item">
        <a href="#">Schools <span class="nav-chevron">▾</span></a>
        <div class="nav-dropdown">
          <a href="/index?tab=ae">Adult Education Schools</a>
          <a href="/index?tab=hs">High Schools (EFA)</a>
          <a href="/index?tab=directory">School Directory</a>
        </div>
      </div>
      <div class="nav-item">
        <a href="#">Programs <span class="nav-chevron">▾</span></a>
        <div class="nav-dropdown">
          <a href="/pages/Programs#adult-education-section">Adult Basic Education</a>
          <a href="/pages/Programs#cte-section">Career &amp; Technical Education</a>
          <a href="/pages/Programs#efa-section">Education Finance Act (EFA)</a>
          <a href="/pages/Programs#special-education-section">Special Education Services</a>
          <a href="/pages/Programs#title-i-section">Title I Programs</a>
        </div>
      </div>
      
      <div class="nav-item"><a href="/pages/news">News</a></div>
      <div class="nav-item"><a href="https://www.governmentjobs.com/careers/sc?department[0]=Department%20of%20Corrections&category[0]=Education%2C%20Training%20%26%20Library&category[1]=Education&sort=PositionTitle%7CAscending" target="_blank">Careers</a></div>
    </div>

    <div id="search-overlay" 
      style="display:none; position:fixed; top:0; left:0; width:100%; height:100%;
              background:rgba(0,0,0,0.45); backdrop-filter:blur(4px);
              z-index:9999; align-items:flex-start; justify-content:center; padding-top:120px;"
      onclick="if(event.target===this) this.style.display='none'">

      <div style="background:white; width:90%; max-width:500px; border-radius:12px;
                  box-shadow:0 10px 25px rgba(0,0,0,0.2); position:relative;
                  padding:20px;">

          <span onclick="document.getElementById('search-overlay').style.display='none'"
                style="cursor:pointer; float:right; font-size:24px; line-height:20px; color:#666; padding: 5px;">&times;</span>
          
          <h3 style="margin-top:0">Search PUSD</h3>
          
          <input type="text" id="search-input"
                placeholder="Type at least 3 characters..."
                style="width:100%; padding:12px; border:1px solid #ddd; border-radius:6px;
                        box-sizing:border-box; font-size:16px">
          
          <div id="search-results" style="margin-top:15px; max-height:300px; overflow-y:auto;"> 
          </div>
      </div>
  </div>

  <button id="open-search" class="nav-search-btn" 
          onclick="document.getElementById('search-overlay').style.display='flex'; document.getElementById('search-input').focus();">
      <i class="ti ti-search"></i> <span>Search</span>
  </button>
  </nav>