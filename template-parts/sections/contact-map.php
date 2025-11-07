<?php

$lang = get_current_lang();
$section_contact_map = get_field('section_contact_map');
$locations = $section_contact_map['locations']; // ACF Repeater với locations
$default_center = $section_contact_map['default_center']; // Tâm map mặc định
$default_zoom = $section_contact_map['default_zoom'] ?: 13; // Zoom level mặc định

?>

<!-- Map Container -->
<div class="p-audio__sec03--map__container">
  <div id="leaflet-map" class="p-audio__sec03--map__wrapper"></div>
</div>
<!-- Location Cards -->
<?php if ($locations && is_array($locations)): ?>
  <div class="p-contact-map__location">
    <div class="p-contact-map__location-grid">
      <?php foreach ($locations as $index => $location): ?>
        <div class="p-contact-map__location-card" data-location-index="<?php echo $index; ?>">
          <div class="location-card__thumbnail">
            <img
              src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-map-pin.svg"
              alt="Location pin"
              class="location-card__icon">
          </div>
          <div>
            <h3 class="location-card__title">
              <?php echo esc_html($location['location_name']); ?>
            </h3>
            <?php if ($location['address']): ?>
              <p class="location-card__address">
                <?php echo esc_html($location['address']); ?>
              </p>
            <?php endif; ?>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
<?php endif; ?>

<!-- Leaflet CSS & JS -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

<script>
  jQuery(document).ready(function($) {
    // Locations data from PHP
    const locations = [
      <?php if ($locations && is_array($locations)): ?>
        <?php foreach ($locations as $location): ?> {
            name: "<?php echo esc_js($location['location_name']); ?>",
            lat: <?php echo floatval($location['latitude']); ?>,
            lng: <?php echo floatval($location['longitude']); ?>,
            address: "<?php echo esc_js($location['address']); ?>",
            phone: "<?php echo esc_js($location['phone']); ?>",
            email: "<?php echo esc_js($location['email']); ?>",
            type: "<?php echo esc_js($location['location_type'] ?: 'Showroom'); ?>"
          },
        <?php endforeach; ?>
      <?php endif; ?>
    ];

    // Default center (Saigon Trade Center if not set)
    const defaultCenter = {
      lat: <?php echo $default_center && $default_center['latitude'] ? floatval($default_center['latitude']) : 10.784167; ?>,
      lng: <?php echo $default_center && $default_center['longitude'] ? floatval($default_center['longitude']) : 106.701036; ?>
    };

    // Initialize map
    const map = L.map('leaflet-map').setView([defaultCenter.lat, defaultCenter.lng], <?php echo $default_zoom ? intval($default_zoom) : 16; ?>);

    // Add OpenStreetMap tiles
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
      maxZoom: 19
    }).addTo(map);

    // Custom marker icon
    const customIcon = L.icon({
      iconUrl: '<?php echo get_template_directory_uri(); ?>/assets/images/icon-map-marker.svg',
      iconSize: [48, 52],
      iconAnchor: [20, 40],
      popupAnchor: [0, -40]
    });

    // Fallback to default marker if custom icon doesn't exist
    const markerIcon = customIcon;

    // Add markers
    const markers = [];
    locations.forEach((location, index) => {
      const marker = L.marker([location.lat, location.lng], {
        icon: markerIcon
      }).addTo(map);

      // Custom popup content
      const popupContent = `
          <div class="custom-popup">
            <div class="custom-popup__header">
              <h3 class="custom-popup__title">${location.name}</h3>
              <div class="custom-popup__type">${location.type}</div>
            </div>
            <div class="custom-popup__body">
              ${location.address ? `
                <div class="custom-popup__item">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-map.svg" alt="Address" class="custom-popup__icon">
                  <span>${location.address}</span>
                </div>
              ` : ''}
              ${location.phone ? `
                <div class="custom-popup__item">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-phone.svg" alt="Phone" class="custom-popup__icon">
                  <a href="tel:${location.phone.replace(/[^0-9+]/g, '')}" class="custom-popup__link">${location.phone}</a>
                </div>
              ` : ''}
              ${location.email ? `
                <div class="custom-popup__item">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-mail.svg" alt="Email" class="custom-popup__icon">
                  <a href="mailto:${location.email}" class="custom-popup__link">${location.email}</a>
                </div>
              ` : ''}
            </div>
          </div>
        `;

      marker.bindPopup(popupContent);
      markers.push(marker);

      // Click marker to highlight card
      marker.on('click', function() {
        $('.p-contact-map__location-card').removeClass('active');
        $(`.p-contact-map__location-card[data-location-index="${index}"]`).addClass('active');

        // Scroll to card on mobile
        if ($(window).width() < 768) {
          $('html, body').animate({
            scrollTop: $(`.p-contact-map__location-card[data-location-index="${index}"]`).offset().top - 100
          }, 500);
        }
      });
    });

    // Fit bounds to show all markers
    if (markers.length > 1) {
      const group = new L.featureGroup(markers);
      map.fitBounds(group.getBounds().pad(0.1));
    }

    // Click card to view on map
    $('.js-view-on-map').on('click', function(e) {
      e.preventDefault();
      const lat = parseFloat($(this).data('lat'));
      const lng = parseFloat($(this).data('lng'));
      const index = $(this).data('index');

      // Pan to location
      map.setView([lat, lng], 16, {
        animate: true,
        duration: 1
      });

      // Open popup
      markers[index].openPopup();

      // Highlight card
      $('.p-contact-map__location-card').removeClass('active');
      $(this).closest('.p-contact-map__location-card').addClass('active');

      // Scroll to map
      $('html, body').animate({
        scrollTop: $('#leaflet-map').offset().top - 100
      }, 500);
    });

    // Click card to highlight and pan map
    $('.p-contact-map__location-card').on('click', function(e) {
      if (!$(e.target).is('a, button')) {
        const index = $(this).data('location-index');
        const location = locations[index];

        map.setView([location.lat, location.lng], 16, {
          animate: true,
          duration: 1
        });

        markers[index].openPopup();

        $('.p-contact-map__location-card').removeClass('active');
        $(this).addClass('active');
      }
    });
  });
</script>