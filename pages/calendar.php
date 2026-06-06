<?php include __DIR__ . '/../includes/header.php'; ?>
<section class="calendar-section">
    <h2>District Calendar</h2>
  <div class="calendar-footer" style="margin-top: 50px; text-align: center;">
          <h3>Official Board-Approved Calendar</h3>
          <p>Click the image below to view or download the full version.</p>
          <a href="/assets/pdf/board-approved-calendar.pdf" target="_blank">
              <img src="/images/DistrictCalendar.png" alt="Board Approved Calendar" style="max-width: 100%; border: 1px solid #ddd; border-radius: 8px;">
          </a>
      </div>
    <div id="calendar-container" class="calendar-grid"></div>

</section>
<script src="/assets/js/calendar.js" defer></script>
<?php include __DIR__ . '/../includes/footer.php'; ?>