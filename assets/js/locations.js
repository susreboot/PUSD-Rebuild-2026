(function(){
  // Coordinates geocoded from each institution's actual street address (SCDC records)
  const schools = [
    { name: "Allendale",      leader: "Dr. Alston",  city: "1057 Revolutionary Trail, Fairfax, SC",     lat: 32.967929,  lon: -81.2690901 },
    { name: "Broad River",    leader: null,           city: "4460 Broad River Road, Columbia, SC",       lat: 34.0729797, lon: -81.0969014 },
    { name: "Camille Graham", leader: null,           city: "4500 Broad River Road, Columbia, SC",       lat: 34.0756166, lon: -81.1042563 },
    { name: "Kirkland",       leader: null,           city: "4344 Broad River Road, Columbia, SC",       lat: 34.0709501, lon: -81.0986381 },
    { name: "Manning",        leader: "Ms. Lakin",           city: "502 Beckman Drive, Columbia, SC",           lat: 34.080501,  lon: -80.9896295 },
    { name: "Goodman",        leader: null,           city: "4556 Broad River Road, Columbia, SC",       lat: 34.0757188, lon: -81.106906  },
    { name: "Lee",            leader: "Dr. Lucear",  city: "990 Wisacky Highway, Bishopville, SC",      lat: 34.1989097, lon: -80.2259056 },
    { name: "MacDougall",     leader: "Mr. Bowen",   city: "1516 Old Gilliard Road, Ridgeville, SC",    lat: 33.1685905, lon: -80.2954177 },
    { name: "Leiber",         leader: "Mr. Bowen",   city: "136 Wilborn Avenue, Ridgeville, SC",        lat: 33.0858296, lon: -80.2906810 },
    { name: "Ridgeland",      leader: "Mr. Johnson", city: "5 Correctional Road, Ridgeland, SC",        lat: 32.4947407, lon: -80.9676081 },
    { name: "Trenton",        leader: "Dr. Alston",  city: "84 Greenhouse Road, Trenton, SC",           lat: 33.7143267, lon: -81.8418188 },
    { name: "Turbeville",     leader: "Dr. Lucear",  city: "1578 Clarence Coker Hwy, Turbeville, SC",   lat: 33.8871790, lon: -80.0819925 },
    { name: "Tyger River",    leader: "Mr. Bartola",           city: "200 Prison Road, Enoree, SC",               lat: 34.7135581, lon: -81.8262176 },
    { name: "Wateree",        leader: "Ms. Desai",   city: "8200 State Farm Road, Rembert, SC",         lat: 34.0885809, lon: -80.5692428 },
    { name: "Evans",          leader: "Dr. Lucear",  city: "610 Highway 9 West, Bennettsville, SC",     lat: 34.6530501, lon: -79.7126646 },
    { name: "Kershaw",        leader: "Dr. Lucear",  city: "4848 Goldmine Hwy, Kershaw, SC",            lat: 34.5957509, lon: -80.5489884 },
    { name: "Leath",          leader: "Mr. Bartola",           city: "2809 Airport Road, Greenwood, SC",          lat: 34.2532637, lon: -82.1440029 },
    { name: "Livesay",        leader: "Ms. Anderson",    city: "104 Broadcast Drive, Spartanburg, SC",      lat: 34.9776685, lon: -81.9865894 },
    { name: "McCormick",      leader: "Ms. Callan",  city: "386 Redemption Way, McCormick, SC",         lat: 33.9285474, lon: -82.2497986 },
    { name: "Palmer",         leader: "Dr. Lucear",  city: "2012 Pisgah Road, Florence, SC",            lat: 34.2433549, lon: -79.8038073 },
    { name: "Perry",          leader: "Mr. Bartola",           city: "430 Oaklawn Road, Pelzer, SC",              lat: 34.6600323, lon: -82.3335865 }
  ];

  document.getElementById('sc-countLabel').textContent = schools.length + ' sites';

  const pinSvg = `
    <div class="sc-pin">
      <svg viewBox="0 0 26 34" xmlns="http://www.w3.org/2000/svg">
        <path d="M13 0C5.8 0 0 5.8 0 13c0 9.2 13 21 13 21s13-11.8 13-21C26 5.8 20.2 0 13 0z" fill="#14213D" stroke="#C9A227" stroke-width="1.4"/>
        <circle cx="13" cy="13" r="5.4" fill="#C9A227"/>
      </svg>
    </div>`;

  const map = L.map('sc-map', {
    zoomControl: true,
    attributionControl: true,
    minZoom: 6,
    maxZoom: 12
  }).setView([33.95, -80.95], 7);

  L.tileLayer('https://{s}.basemaps.cartocdn.com/dark_all/{z}/{x}/{y}{r}.png', {
    attribution: '&copy; OpenStreetMap contributors &copy; CARTO',
    subdomains: 'abcd',
    maxZoom: 19
  }).addTo(map);

  // Re-measure in case the host page's layout (fonts, ads, sticky nav)
  // settles after this script runs and the container's size changes.
  setTimeout(() => map.invalidateSize(), 200);
  window.addEventListener('load', () => map.invalidateSize());

  // South Carolina state + county outlines (US Census boundaries via us-atlas)
  Promise.all([
    fetch('https://cdn.jsdelivr.net/npm/us-atlas@3/states-10m.json').then(r => r.json()),
    fetch('https://cdn.jsdelivr.net/npm/us-atlas@3/counties-10m.json').then(r => r.json())
  ]).then(([statesTopo, countiesTopo]) => {
    const statesGeo = topojson.feature(statesTopo, statesTopo.objects.states);
    const countiesGeo = topojson.feature(countiesTopo, countiesTopo.objects.counties);

    const scState = { type: 'FeatureCollection', features: statesGeo.features.filter(f => f.id === '45') };
    const scCounties = { type: 'FeatureCollection', features: countiesGeo.features.filter(f => String(f.id).startsWith('45')) };

    L.geoJSON(scCounties, {
      style: { color: '#C9A227', weight: 1, opacity: 0.4, fillColor: '#C9A227', fillOpacity: 0.02 }
    }).addTo(map);

    const stateLayer = L.geoJSON(scState, {
      style: { color: '#E4C766', weight: 2.5, opacity: 0.9, fillOpacity: 0 }
    }).addTo(map);

    const bounds = stateLayer.getBounds();
    map.fitBounds(bounds, { padding: [22, 22] });
    map.setMaxBounds(bounds.pad(0.55));
  }).catch(err => console.error('Could not load county/state boundaries:', err));

  const markerByName = {};

  function leaderHtml(leader){
    return leader
      ? `<div class="card-row"><span class="lbl">Leader</span><span>${leader}</span></div>`
      : `<div class="card-row card-leader-vacant"><span class="lbl">Leader</span><span>Vacant</span></div>`;
  }

  schools.forEach(s => {
    const icon = L.divIcon({
      className: '',
      html: pinSvg,
      iconSize: [26, 34],
      iconAnchor: [13, 34],
      popupAnchor: [0, -30]
    });

    const marker = L.marker([s.lat, s.lon], { icon }).addTo(map);

    const popupContent = `
      <div class="card-eyebrow">SC School Site</div>
      <div class="card-name">${s.name}</div>
      <div class="card-row"><span class="lbl">Address</span><span>${s.city}</span></div>
      ${leaderHtml(s.leader)}
    `;
    marker.bindPopup(popupContent, { closeButton: false, offset: [0, -4] });

    marker.on('mouseover', function(){
      this.openPopup();
      const el = this.getElement();
      if (el) el.querySelector('.sc-pin').classList.add('active');
      const item = document.querySelector(`.school-item[data-name="${s.name}"]`);
      if (item) item.classList.add('active');
    });
    marker.on('mouseout', function(){
      this.closePopup();
      const el = this.getElement();
      if (el) el.querySelector('.sc-pin').classList.remove('active');
      const item = document.querySelector(`.school-item[data-name="${s.name}"]`);
      if (item) item.classList.remove('active');
    });

    markerByName[s.name] = marker;
  });

  // Sidebar list (sorted alphabetically for easy scanning)
  const sideList = document.getElementById('sc-sideList');
  const sorted = [...schools].sort((a, b) => a.name.localeCompare(b.name));
  sorted.forEach(s => {
    const item = document.createElement('div');
    item.className = 'school-item';
    item.dataset.name = s.name;
    item.innerHTML = `
      <div class="dot"></div>
      <div class="meta">
        <div class="nm">${s.name}</div>
        <div class="city">${s.city}</div>
      </div>`;
    item.addEventListener('mouseenter', () => {
      const m = markerByName[s.name];
      m.openPopup();
      const el = m.getElement();
      if (el) el.querySelector('.sc-pin').classList.add('active');
      item.classList.add('active');
    });
    item.addEventListener('mouseleave', () => {
      const m = markerByName[s.name];
      m.closePopup();
      const el = m.getElement();
      if (el) el.querySelector('.sc-pin').classList.remove('active');
      item.classList.remove('active');
    });
    item.addEventListener('click', () => {
      map.setView([s.lat, s.lon], 10, { animate: true });
      markerByName[s.name].openPopup();
    });
    sideList.appendChild(item);
  });

  // Mobile fallback list
  const mobileList = document.getElementById('sc-mobileList');
  sorted.forEach(s => {
    const card = document.createElement('div');
    card.className = 'mb-card';
    card.innerHTML = `
      <div class="nm">${s.name}</div>
      <div class="city">${s.city}</div>
      <div class="leader ${s.leader ? '' : 'vacant'}">${s.leader ? 'Leader: ' + s.leader : 'Leader: Vacant'}</div>
    `;
    mobileList.appendChild(card);
  });
})();
