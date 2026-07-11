<?php include __DIR__ . '/../includes/header.php'; ?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.9.4/leaflet.css" />
<link rel="preconnect" href="https://fonts.googleapis.com">
<style>
  @import url('https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,400;9..144,600;9..144,700&family=Inter:wght@400;500;600;700&display=swap');

  /* Everything below is scoped under .sc-map-app, and that wrapper
     creates its own stacking context (isolation: isolate) so nothing
     inside — including Leaflet's controls, which use z-index up to
     1000 — can ever render above your site's nav, no matter what
     z-index value it has. */
  .sc-map-app{
    --indigo: #14213D;
    --indigo-deep: #0C1626;
    --gold: #C9A227;
    --gold-light: #E4C766;
    --palmetto: #3A6147;
    --paper: #F6F4EC;
    --slate: #8A93A3;
    --line: rgba(246,244,236,0.14);

    position: relative;
    z-index: 0;
    isolation: isolate;        /* contains all child z-index values */

    display:flex;
    flex-direction:column;
    height: 720px;             /* fixed section height instead of 100vh */
    width: 100%;
    font-family:'Inter', sans-serif;
    background: var(--indigo);
    color: var(--paper);
    border-radius: 8px;
    overflow: hidden;          /* clips internal content only, not your page */
    box-sizing: border-box;
  }
  .sc-map-app *{ box-sizing: border-box; }

  .sc-map-app header{
    flex: 0 0 auto;
    display:flex;
    align-items:baseline;
    justify-content:space-between;
    gap: 20px;
    padding: 22px 32px 16px 32px;
    border-bottom: 1px solid var(--line);
    background: linear-gradient(180deg, var(--indigo) 0%, rgba(20,33,61,0.92) 100%);
  }

  .sc-map-app .title-block{ display:flex; align-items:baseline; gap:14px; flex-wrap: wrap; }

  .sc-map-app h1{
    font-family:'Fraunces', serif;
    font-weight: 600;
    font-size: 26px;
    letter-spacing: 0.2px;
    margin: 0;
    color: var(--paper);
  }
  .sc-map-app h1 .accent{ color: var(--gold-light); font-style: italic; }

  .sc-map-app .crescent{
    width: 16px; height:16px;
    display:inline-block;
    vertical-align: -2px;
  }

  .sc-map-app .count{
    font-size: 12.5px;
    color: var(--slate);
    letter-spacing: 0.04em;
    text-transform: uppercase;
    border-left: 1px solid var(--line);
    padding-left: 14px;
  }

  .sc-map-app main{
    flex: 1 1 auto;
    position: relative;
    display:flex;
    min-height: 0;
  }

  .sc-map-app #sc-map{
    flex: 1 1 auto;
    min-height: 360px;   /* guards against flex computing 0 height in some layouts */
    background: var(--indigo-deep);
  }

  /* Many site themes (Bootstrap etc.) set a global `img { max-width:100% }`
     or `img { height:auto }` rule. That breaks Leaflet's tile images, which
     rely on explicit inline width/height. Force it back off, scoped to the
     map only, so the rest of your site is unaffected. */
  .sc-map-app .leaflet-container img{
    max-width: none !important;
    max-height: none !important;
  }

  /* Leaflet overrides for theme — scoped to descendants of .sc-map-app */
  .sc-map-app .leaflet-tile-pane{ filter: saturate(0.55) brightness(0.62) sepia(0.18) hue-rotate(170deg) contrast(1.05); }
  .sc-map-app .leaflet-container{ background: var(--indigo-deep); }
  .sc-map-app .leaflet-control-zoom a{
    background: var(--indigo);
    color: var(--paper);
    border-color: var(--line) !important;
  }
  .sc-map-app .leaflet-control-zoom a:hover{ background: var(--indigo-deep); color: var(--gold-light); }
  .sc-map-app .leaflet-control-attribution{
    background: rgba(20,33,61,0.75) !important;
    color: var(--slate) !important;
    font-size: 10px;
  }
  .sc-map-app .leaflet-control-attribution a{ color: var(--slate) !important; }

  /* Pin styling */
  .sc-map-app .sc-pin{
    width: 26px;
    height: 34px;
    position: relative;
    transform-origin: bottom center;
    transition: transform 0.18s ease;
    cursor: pointer;
  }
  .sc-map-app .sc-pin:hover, .sc-map-app .sc-pin.active{ transform: scale(1.18) translateY(-2px); }
  .sc-map-app .sc-pin svg{ width:100%; height:100%; display:block; filter: drop-shadow(0 3px 6px rgba(0,0,0,0.45)); }

  /* Tooltip / popup card */
  .sc-map-app .leaflet-popup-content-wrapper{
    background: var(--indigo);
    color: var(--paper);
    border: 1px solid var(--gold);
    border-radius: 4px;
    box-shadow: 0 12px 30px rgba(0,0,0,0.5);
  }
  .sc-map-app .leaflet-popup-tip{ background: var(--indigo); border: 1px solid var(--gold); }
  .sc-map-app .leaflet-popup-content{ margin: 14px 16px; min-width: 168px; }
  .sc-map-app .leaflet-popup-close-button{ color: var(--slate) !important; }

  .sc-map-app .card-eyebrow{
    font-size: 10px;
    letter-spacing: 0.12em;
    text-transform: uppercase;
    color: var(--gold-light);
    margin-bottom: 4px;
    font-weight: 600;
  }
  .sc-map-app .card-name{
    font-family:'Fraunces', serif;
    font-size: 17px;
    font-weight: 600;
    margin: 0 0 6px 0;
    line-height: 1.2;
  }
  .sc-map-app .card-row{
    font-size: 12.5px;
    color: var(--paper);
    opacity: 0.88;
    display:flex;
    gap: 6px;
    margin-top: 3px;
  }
  .sc-map-app .card-row .lbl{ color: var(--slate); min-width: 0; }
  .sc-map-app .card-leader-vacant{ color: var(--slate); font-style: italic; }

  /* Sidebar list */
  .sc-map-app aside{
    flex: 0 0 280px;
    border-left: 1px solid var(--line);
    overflow-y: auto;
    padding: 18px 0;
    background: rgba(12,22,38,0.5);
  }
  .sc-map-app .side-eyebrow{
    font-size: 10.5px;
    letter-spacing: 0.12em;
    text-transform: uppercase;
    color: var(--slate);
    padding: 0 22px 10px 22px;
  }
  .sc-map-app .school-item{
    display:flex;
    align-items: flex-start;
    gap: 10px;
    padding: 10px 22px;
    cursor: pointer;
    border-left: 2px solid transparent;
    transition: background 0.15s ease, border-color 0.15s ease;
  }
  .sc-map-app .school-item:hover, .sc-map-app .school-item.active{
    background: rgba(201,162,39,0.08);
    border-left-color: var(--gold);
  }
  .sc-map-app .school-item .dot{
    width: 7px; height:7px; border-radius:50%;
    background: var(--gold);
    margin-top: 6px;
    flex: 0 0 auto;
  }
  .sc-map-app .school-item .meta{ min-width: 0; }
  .sc-map-app .school-item .nm{ font-size: 13.5px; font-weight: 600; color: var(--paper); }
  .sc-map-app .school-item .city{ font-size: 11.5px; color: var(--slate); margin-top: 1px; }

  /* Mobile fallback */
  .sc-map-app .mobile-fallback{ display:none; }
  @media (max-width: 760px){
    .sc-map-app{ height: 80vh; }
    .sc-map-app main{ display:none; }
    .sc-map-app .mobile-fallback{
      display:block;
      flex: 1 1 auto;
      overflow-y: auto;
      padding: 6px 0 28px 0;
    }
    .sc-map-app .mb-note{
      margin: 14px 20px 18px 20px;
      padding: 14px 16px;
      border: 1px solid var(--line);
      border-radius: 6px;
      background: rgba(201,162,39,0.07);
      font-size: 12.5px;
      color: var(--paper);
      opacity: 0.9;
      line-height: 1.5;
    }
    .sc-map-app .mb-note b{ color: var(--gold-light); }
    .sc-map-app .mb-list{ padding: 0 20px; }
    .sc-map-app .mb-card{
      border: 1px solid var(--line);
      border-radius: 6px;
      padding: 12px 14px;
      margin-bottom: 10px;
      background: rgba(255,255,255,0.02);
    }
    .sc-map-app .mb-card .nm{ font-family:'Fraunces', serif; font-size: 15px; font-weight:600; margin-bottom:4px; }
    .sc-map-app .mb-card .city, .sc-map-app .mb-card .leader{ font-size: 12.5px; color: var(--slate); }
    .sc-map-app .mb-card .leader.vacant{ font-style: italic; }
    .sc-map-app header{ padding: 18px 18px 14px 18px; }
    .sc-map-app h1{ font-size: 20px; }
  }
</style>

<div class="sc-map-app">
  <header>
    <div class="title-block">
      <svg class="crescent" viewBox="0 0 24 24" fill="none"><path d="M16 4C11 5 8 9 8 13.5C8 18 11 21.5 15.5 22C12 23.5 7.5 22.5 5 19C2 15 2.5 9.5 6 6C9 3 13 2.5 16 4Z" fill="#C9A227"/></svg>
      <h1>Palmetto Unified School District <span class="accent">School Locations</span></h1>
    </div>
    <div class="count" id="sc-countLabel">21 sites</div>
  </header>

  <main>
    <div id="sc-map"></div>
    <aside>
      <div class="side-eyebrow">All locations</div>
      <div id="sc-sideList"></div>
    </aside>
  </main>

  <div class="mobile-fallback">
    <div class="mb-note">This map is built for a larger screen, so it's turned off here. <b>View on a desktop or tablet</b> to see the interactive map with hover details &mdash; the full list is below in the meantime.</div>
    <div class="mb-list" id="sc-mobileList"></div>
  </div>
</div>

<script src="/assets/js/leaflet.js"></script>
<script src="/assets/js/topojson-client.min.js"></script>
<script src="/assets/js/locations.js"></script>


<?php include __DIR__ . '/../includes/footer.php'; ?>