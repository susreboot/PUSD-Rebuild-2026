<?php include __DIR__ . '/includes/header.php'; ?>

<title>Palmetto Unified School District</title>

  <section class="hero">
    <div class="hero-content">
      <div class="hero-eyebrow">State of South Carolina</div>
      <h1>Education That <span>Transforms</span> Lives</h1>
      <p class="hero-tagline">
        Palmetto Unified School District provides high-quality academic, vocational, and life skills
        education to the incarcerated population of the SC Department of Corrections.
      </p>
      <div class="hero-ctas">
        <a href="https://www.governmentjobs.com/careers/sc?department[0]=Department%20of%20Corrections&category[0]=Education%2C%20Training%20%26%20Library&category[1]=Education&sort=PositionTitle%7CAscending" target="_blank" class="btn-primary"><i class="ti ti-briefcase"></i> Career Opportunities</a>
        <a href="#school-directory" class="btn-outline"><i class="ti ti-school"></i> School Directory</a>
      </div>
    </div>

    <div class="hero-sidebar">
      <div class="hero-sidebar-title">Quick Access</div>
      <a href="#credential-verification" class="quick-link">
        <div class="quick-link-icon"><i class="ti ti-certificate"></i></div>
        <div>
          <div class="quick-link-text">Credential Verification</div>
          <div class="quick-link-sub">Diplomas &amp; GED transcripts</div>
        </div>
      </a>
      <a href="/pages/publicDocuments" class="quick-link">
        <div class="quick-link-icon"><i class="ti ti-file-text"></i></div>
        <div>
          <div class="quick-link-text">Public Documents</div>
          <div class="quick-link-sub">Budget, ESSER, policies</div>
        </div>
      </a>
      <a href="/pages/publicDocuments" class="quick-link">
        <div class="quick-link-icon"><i class="ti ti-calendar-event"></i></div>
        <div>
          <div class="quick-link-text">Board Meetings</div>
          <div class="quick-link-sub">Minutes &amp; agendas</div>
        </div>
      </a>
      <a href="https://screportcards.com/" class="quick-link">
        <div class="quick-link-icon"><i class="ti ti-chart-bar"></i></div>
        <div>
          <div class="quick-link-text">District Report Card</div>
          <div class="quick-link-sub">SC state scorecard</div>
        </div>
      </a>
      <a href="/pages/publicDocuments" class="quick-link">
        <div class="quick-link-icon"><i class="ti ti-award"></i></div>
        <div>
          <div class="quick-link-text">Strategic Plan</div>
          <div class="quick-link-sub">Goals &amp; initiatives</div>
        </div>
      </a>
    </div>
  </section>
        <div class="stats-strip" aria-label="District at a glance">
          <div class="stat-item">
            <div class="stat-num">21</div>
            <div class="stat-label">Schools Statewide</div>
          </div>
          <div class="stat-item">
            <div class="stat-num">2000</div>
            <div class="stat-label">2026 CTE Industry Credentials</div>
          </div>
          <div class="stat-item">
            <div class="stat-num">300</div>
            <div class="stat-label">2026 High School Equivalency Diploma (HSED)</div>
          </div>
          <div class="stat-item">
            <div class="stat-num">500</div>
            <div class="stat-label">Employability Skills Certifications</div>
          </div>
        </div>

        <div class="main-wrap">
          <main>
            <section class="news-section">
              <div class="section-header">
                <h2>News &amp; Announcements</h2>
                <div class="section-header-line"></div>
                <span class="section-header-tag">Latest</span>
              </div>
              
              <div id="news-container" class="news-grid"></div>
              
              <div class="news-footer" style="text-align: center; margin-top: 40px;">
                <a href="/pages/news" class="btn-primary">See All News</a>
              </div>
            </section>

      <section class="programs-section">
        <div class="section-header">
          <h2>District Programs</h2>
          <div class="section-header-line"></div>
        </div>
        <div class="program-cards">
          <div class="prog-card">
            <div class="prog-icon">🎓</div>
            <div class="prog-title">Education Finance Act (EFA)</div>
            <p class="prog-desc">12 high schools serving students ages 17–21 toward a high school diploma or GED credential.</p>
          </div>
          <div class="prog-card">
            <div class="prog-icon">🔧</div>
            <div class="prog-title">Career &amp; Technical Education</div>
            <p class="prog-desc">30+ CTE programs including Carpentry, Welding, HVAC, IT, Plumbing, Electrical, and more.</p>
          </div>
          <div class="prog-card">
            <div class="prog-icon">📚</div>
            <div class="prog-title">Adult Basic Education</div>
            <p class="prog-desc">21 adult programs providing academics, vocational training, and life skills for ages 22 and older.</p>
          </div>
          <div class="prog-card">
            <div class="prog-icon">🤝</div>
            <div class="prog-title">Special Education Services</div>
            <p class="prog-desc">IEP-based instruction for students up to age 22 in the least restrictive environment.</p>
          </div>
          <div class="prog-card">
            <div class="prog-icon">🏅</div>
            <div class="prog-title">Industry Credentials</div>
            <p class="prog-desc">NCCER, EPA, and ASE certifications providing nationally recognized workforce credentials.</p>
          </div>
          <div class="prog-card">
            <div class="prog-icon">📋</div>
            <div class="prog-title">Title I Programs</div>
            <p class="prog-desc">Part D supplemental services focused on Reading/ELA, Math, and successful community transition.</p>
          </div>
        </div>

        <div class="news-footer" style="text-align: center; margin-top: 40px;">
          <a href="/pages/Programs" class="btn-primary">More Information</a>
        </div>

      </section>

      <section id="school-directory">
        <div class="section-header">
          <h2>School Directory</h2>
          <div class="section-header-line"></div>
        </div>
        <div class="directory-section">
          <div class="directory-section-header">
            <h3>Our Schools</h3>
            <div class="dir-tabs">
              <button class="dir-tab active" id="tab-hs" onclick="showTab('hs')">High Schools</button>
              <button class="dir-tab" id="tab-ae" onclick="showTab('ae')">Adult Ed</button>
            </div>
          </div>
          <div id="dir-hs" class="school-grid">
            <div class="school-item">
              <div class="school-name">Allendale</div>
              <div class="school-principal">Dr. Alston</div>
              <div class="school-location"><i class="ti ti-map-pin"></i>Fairfax, SC</div>
            </div>
            <div class="school-item">
              <div class="school-name">Broad River</div>
              <div class="school-principal">Principal: Vacant</div>
              <div class="school-location"><i class="ti ti-map-pin"></i>Columbia, SC</div>
            </div>
            <div class="school-item">
              <div class="school-name">Camille Graham</div>
              <div class="school-principal">Principal: Vacant</div>
              <div class="school-location"><i class="ti ti-map-pin"></i>Columbia, SC</div>
            </div>
            <div class="school-item">
              <div class="school-name">Kirkland</div>
              <div class="school-principal">Principal: Vacant</div>
              <div class="school-location"><i class="ti ti-map-pin"></i>Columbia, SC</div>
            </div>
            <div class="school-item">
              <div class="school-name">Lee</div>
              <div class="school-principal">Dr. Lucear</div>
              <div class="school-location"><i class="ti ti-map-pin"></i>Bishopville, SC</div>
            </div>
            <div class="school-item">
              <div class="school-name">MacDougall</div>
              <div class="school-principal">Mr. Bowen</div>
              <div class="school-location"><i class="ti ti-map-pin"></i>Ridgeville, SC</div>
            </div>
            <div class="school-item">
              <div class="school-name">Manning</div>
              <div class="school-principal">Principal: Vacant</div>
              <div class="school-location"><i class="ti ti-map-pin"></i>Columbia, SC</div>
            </div>
            <div class="school-item">
              <div class="school-name">Ridgeland</div>
              <div class="school-principal">Mr. Johnson</div>
              <div class="school-location"><i class="ti ti-map-pin"></i>Ridgeland, SC</div>
            </div>
            <div class="school-item">
              <div class="school-name">Trenton</div>
              <div class="school-principal">Dr. Alston</div>
              <div class="school-location"><i class="ti ti-map-pin"></i>Trenton, SC</div>
            </div>
            <div class="school-item">
              <div class="school-name">Turbeville</div>
              <div class="school-principal">Dr. Lucear</div>
              <div class="school-location"><i class="ti ti-map-pin"></i>Turbeville, SC</div>
            </div>
            <div class="school-item">
              <div class="school-name">Tyger River</div>
              <div class="school-principal">Principal: Vacant</div>
              <div class="school-location"><i class="ti ti-map-pin"></i>Enoree, SC</div>
            </div>
            <div class="school-item">
              <div class="school-name">Wateree</div>
              <div class="school-principal">Ms. Desai</div>
              <div class="school-location"><i class="ti ti-map-pin"></i>Rembert, SC</div>
            </div>
          </div>
          <div id="dir-ae" class="school-grid" style="display:none">
            <div class="school-item">
              <div class="school-name">Evans</div>
              <div class="school-principal">Dr. Lucear</div>
              <div class="school-location"><i class="ti ti-map-pin"></i>Bennettsville, SC</div>
            </div>
            <div class="school-item">
              <div class="school-name">Goodman</div>
              <div class="school-principal">Principal: Vacant</div>
              <div class="school-location"><i class="ti ti-map-pin"></i>Columbia, SC</div>
            </div>
            <div class="school-item">
              <div class="school-name">Kershaw</div>
              <div class="school-principal">Dr. Lucear</div>
              <div class="school-location"><i class="ti ti-map-pin"></i>Kershaw, SC</div>
            </div>
            <div class="school-item">
              <div class="school-name">Leath</div>
              <div class="school-principal">Vacant</div>
              <div class="school-location"><i class="ti ti-map-pin"></i>Greenwood, SC</div>
            </div>
            <div class="school-item">
              <div class="school-name">Leiber</div>
              <div class="school-principal">Mr. Bowen</div>
              <div class="school-location"><i class="ti ti-map-pin"></i>Ridgeville, SC</div>
            </div>
            <div class="school-item">
              <div class="school-name">Livesay</div>
              <div class="school-principal">Ms. Pisa</div>
              <div class="school-location"><i class="ti ti-map-pin"></i>Spartanburg, SC</div>
            </div>
            <div class="school-item">
              <div class="school-name">McCormick</div>
              <div class="school-principal">Ms. Callan</div>
              <div class="school-location"><i class="ti ti-map-pin"></i>McCormick, SC</div>
            </div>
            <div class="school-item">
              <div class="school-name">Palmer</div>
              <div class="school-principal">Dr. Lucear</div>
              <div class="school-location"><i class="ti ti-map-pin"></i>Florence, SC</div>
            </div>
            <div class="school-item">
              <div class="school-name">Perry</div>
              <div class="school-principal">School Leader: Vacant</div>
              <div class="school-location"><i class="ti ti-map-pin"></i>Pelzer, SC</div>
            </div>
          </div>
        </div>
      </section>
    </main>

    <aside class="sidebar">
      <div class="supt-card">
        <div class="supt-avatar">BH</div>
        <p class="supt-quote">
          "Education has the power to transform lives, and we are dedicated to ensuring that each student
          has the opportunity to build a future defined by potential and purpose."
        </p>
        <div class="supt-name">Dr. Beverly Holiday</div>
        <div class="supt-title">Superintendent of Schools</div>
      </div>

      <div class="sidebar-card">
        <div class="sidebar-card-header">
          <i class="ti ti-calendar-event"></i> Upcoming Events
        </div>
        <div class="sidebar-card-body">
          <div class="event-item">
            <div class="event-date-badge">
              <div class="day">23</div>
              <div class="month">Jan</div>
            </div>
            <div>
              <div class="event-title">PUSD Board Meeting</div>
              <div class="event-meta">10:00 AM &middot; PUSD District Office</div>
            </div>
          </div>
          <div class="event-item">
            <div class="event-date-badge">
              <div class="day">3</div>
              <div class="month">Apr</div>
            </div>
            <div>
              <div class="event-title">PUSD Board Meeting</div>
              <div class="event-meta">10:00 AM &middot; PUSD District Office</div>
            </div>
          </div>
          <a href="/pages/calendar" class="view-all-link">View Full Calendar <i class="ti ti-arrow-right"></i></a>
        </div>
      </div>

      <div class="sidebar-card">
        <div class="sidebar-card-header">
          <i class="ti ti-map-pin"></i> Contact &amp; Hours
        </div>
        <div class="sidebar-card-body">
          <div class="info-row">
            <i class="ti ti-building"></i>
            <div>
              <div class="info-label">Address</div>
              1735 Haviland Circle, Columbia SC 29210
            </div>
          </div>
          <div class="info-row">
            <i class="ti ti-phone"></i>
            <div>
              <div class="info-label">Phone</div>
              (803) 896-1583
            </div>
          </div>
          <div class="info-row">
            <i class="ti ti-clock"></i>
            <div>
              <div class="info-label">Office Hours</div>
              Mon–Fri, 8:00 AM – 4:00 PM<br>
              Closed on State Holidays
            </div>
          </div>
        </div>
      </div>

      <div class="sidebar-card">
        <div class="sidebar-card-header">
          <i class="ti ti-certificate" id="credential-verification"></i> Credential Verification
        </div>
        <div class="sidebar-card-body">
          <p style="font-size:13px;color:var(--text-muted);line-height:1.65;margin-bottom:12px">
            All diploma and transcript requests go through the SC Department of Education — not PUSD directly.
          </p>
          <div class="info-row" style="padding-top:0">
            <i class="ti ti-phone"></i>
            <div>
              <div class="info-label">GED Transcripts</div>
              (803) 734-8347
            </div>
          </div>
          <div class="info-row">
            <i class="ti ti-phone"></i>
            <div>
              <div class="info-label">High School Diploma</div>
              (803) 734-8347
            </div>
          </div>
        </div>
      </div>
    </aside>
  </div>

  <section class="mission-section">
    <div class="label">Our Purpose</div>
    <h2>Educating and empowering participants to become employable, self-sufficient citizens.</h2>
    <p>
      Palmetto Unified School District and the SC Department of Corrections provide relevant academic courses,
      highly effective career-related vocational programs, and necessary life skills to make a positive impact in society.
    </p>
  </section>

  <div class="meeting-dates-box" id="meeting-box">
      <button class="close-box" onclick="document.getElementById('meeting-box').style.display='none'">×</button>
      <h4>Upcoming Board Meetings</h4>
      <ul>
          <li>
              <div class="date">July 14, 2026 - 6:00 PM</div>
              <div class="location">District Office Board Room</div>
          </li>
      </ul>
      <a href="/pages/calendar">View All Dates</a>
  </div>

<?php include __DIR__ . '/includes/footer.php'; ?>