<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Palmetto Unified School District</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:wght@400;700&family=Source+Sans+3:wght@300;400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/dist/tabler-icons.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
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
    <a class="nav-logo" href="/index.php">
      <div class="nav-logo-icon">
        <img src="/images/PUSDLogo_Revamp.png" alt="PUSD Logo" class="logo-img">
      </div>
      <div class="nav-logo-text">
        <span class="abbr">PUSD</span>
        <span class="full">Palmetto Unified School District</span>
      </div>
    </a>

    <div class="nav-links">
      <div class="nav-item">
        <a href="#" class="active">District Overview <span class="nav-chevron">▾</span></a>
        <div class="nav-dropdown">
          <a href="/pages/about.php">About PUSD</a>
          <a href="/pages/about.php" class="sub-link">Beliefs &amp; Principles</a>
          <a href="/pages/about.php" class="sub-link">Our Vision</a>
          <a href="/pages/about.php" class="sub-link">Our Mission</a>
          <a href="/pages/about.php" class="sub-link">Our History</a>
          <a href="/pages/calendar.php">District Calendar</a>
          <a href="#">Board of Trustees</a>
          <a href="/pages/Board of Trustees.php" class="sub-link">Board Members</a>
          <a href="/pages/publicDocuments.php" class="sub-link">Agendas & Minutes</a>
          <a href="#">Strategic Plan</a>
          <a href="/pages/publicDocuments.php">Public Documents</a>
          <a href="#">Non-Discrimination Policy</a>
          <a href="https://screportcards.com/" target="_blank">District Report Card</a>
          <a href="https://www.doc.sc.gov/policy/policy.html" target="_blank">SCDOC/PUSD Policies</a>
        </div>
      </div>
      <div class="nav-item">
        <a href="#">Schools <span class="nav-chevron">▾</span></a>
        <div class="nav-dropdown">
          <a href="javascript:void(0);" onclick="handleTabClick('hs')">High Schools (EFA)</a>
          <a href="javascript:void(0);" onclick="handleTabClick('ae')">Adult Education Schools</a>
          <a href="javascript:void(0);" onclick="scrollToDirectory()">School Directory</a>
        </div>
      </div>
      <div class="nav-item">
        <a href="#">Programs <span class="nav-chevron">▾</span></a>
        <div class="nav-dropdown">
          <a href="/pages/Programs.php">Career &amp; Technical Education</a>
          <a href="/pages/Programs.php">Adult Basic Education</a>
          <a href="/pages/Programs.php">Special Education Services</a>
          <a href="/pages/Programs.php">Title I Programs</a>
        </div>
      </div>
      <div class="nav-item">
        <a href="#">Board of Trustees <span class="nav-chevron">▾</span></a>
        <div class="nav-dropdown">
          <a href="/pages/Board of Trustees.php">Board Members</a>
          <a href="/pages/publicDocuments.php">Agendas &amp; Minutes</a>
        </div>
      </div>
      <div class="nav-item"><a href="/pages/news.php">News</a></div>
      <div class="nav-item"><a href="https://www.governmentjobs.com/careers/sc?department[0]=Department%20of%20Corrections&category[0]=Education%2C%20Training%20%26%20Library&category[1]=Education&sort=PositionTitle%7CAscending" target="_blank">Careers</a></div>
    </div>

    <button class="nav-search-btn" onclick="document.getElementById('search-modal').style.display='flex'">
      <i class="ti ti-search"></i> Search
    </button>
  </nav>