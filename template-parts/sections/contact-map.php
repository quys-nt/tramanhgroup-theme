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
  <!-- Thông báo zoom -->
  <div id="map-zoom-notice" class="map-zoom-notice">
    <span class="map-zoom-notice__text">
      <span class="map-zoom-notice__mac">⌘ + cuộn để zoom</span>
      <span class="map-zoom-notice__windows">Ctrl + cuộn để zoom</span>
    </span>
  </div>
</div>

<!-- Leaflet CSS & JS -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

<!-- Swiper CSS & JS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<script>
  jQuery(document).ready(function($) {
    // Detect OS
    const isMac = navigator.platform.toUpperCase().indexOf('MAC') >= 0;
    $('body').addClass(isMac ? 'is-mac' : 'is-windows');

    // Locations data from PHP
    const locations = [
      <?php if ($locations && is_array($locations)): ?>
        <?php foreach ($locations as $location):
          $gallery = $location['location_gallery'];
          $gallery_json = array();
          if ($gallery && is_array($gallery)) {
            foreach ($gallery as $img) {
              $gallery_json[] = array(
                'url' => esc_url($img['url']),
                'alt' => esc_attr($img['alt'])
              );
            }
          }
        ?> {
            name: "<?php echo esc_js($location['location_name']); ?>",
            lat: <?php echo floatval($location['latitude']); ?>,
            lng: <?php echo floatval($location['longitude']); ?>,
            address: "<?php echo esc_js($location['address']); ?>",
            phone: "<?php echo esc_js($location['phone']); ?>",
            mapUrl: "<?php echo esc_js($location['location_map']); ?>",
            gallery: <?php echo json_encode($gallery_json); ?>
          },
        <?php endforeach; ?>
      <?php endif; ?>
    ];

    // Default center
    const defaultCenter = {
      lat: <?php echo $default_center && $default_center['latitude'] ? floatval($default_center['latitude']) : 10.784167; ?>,
      lng: <?php echo $default_center && $default_center['longitude'] ? floatval($default_center['longitude']) : 106.701036; ?>
    };

    // Initialize map
    const map = L.map('leaflet-map', {
      scrollWheelZoom: false
    }).setView([defaultCenter.lat, defaultCenter.lng], <?php echo $default_zoom ? intval($default_zoom) : 16; ?>);

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

    const markerIcon = customIcon;

    // Add markers
    const markers = [];
    const swiperInstances = {};

    locations.forEach((location, index) => {
      const marker = L.marker([location.lat, location.lng], {
        icon: markerIcon
      }).addTo(map);

      // Build gallery HTML
      let galleryHtml = '';
      if (location.gallery && location.gallery.length > 0) {
        galleryHtml = `
          <div class="custom-popup__gallery">
            <div class="swiper custom-popup__gallery-swiper" id="popup-swiper-${index}">
              <div class="swiper-wrapper">
                ${location.gallery.map(img => `
                  <div class="swiper-slide">
                    <img src="${img.url}" alt="${img.alt || location.name}">
                  </div>
                `).join('')}
              </div>
              ${location.gallery.length > 1 ? `
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-pagination"></div>
              ` : ''}
            </div>
          </div>
        `;
      }

      // Custom popup content
      const popupContent = `
        <div class="custom-popup">
          ${galleryHtml}
          <div class="custom-popup__contents">
            <div class="custom-popup__header">
              <h3 class="custom-popup__title">${location.name}</h3>
            </div>
            
            <div class="custom-popup__body">
              ${location.address ? `
                <div class="custom-popup__item">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-map-green.svg" alt="Address" class="custom-popup__icon">
                  <span>${location.address}</span>
                </div>
              ` : ''}
              
              ${location.phone ? `
                <div class="custom-popup__item">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-phone-green.svg" alt="Phone" class="custom-popup__icon">
                  <a href="tel:${location.phone.replace(/[^0-9+]/g, '')}" class="custom-popup__link">${location.phone}</a>
                </div>
              ` : ''}
            </div>

            ${location.mapUrl ? `
              <a href="${location.mapUrl}" target="_blank" rel="noopener noreferrer" class="custom-popup__google-maps-btn">
                Xem trên Google Maps
              </a>
            ` : ''}
          </div>
        </div>
      `;

      marker.bindPopup(popupContent, {
        maxWidth: 400,
        className: 'custom-leaflet-popup'
      });

      // Initialize Swiper when popup opens
      marker.on('popupopen', function() {
        if (location.gallery && location.gallery.length > 0) {
          // Delay to ensure DOM is ready
          setTimeout(() => {
            if (!swiperInstances[index]) {
              swiperInstances[index] = new Swiper(`#popup-swiper-${index}`, {
                loop: location.gallery.length > 1,
                navigation: {
                  nextEl: `#popup-swiper-${index} .swiper-button-next`,
                  prevEl: `#popup-swiper-${index} .swiper-button-prev`,
                },
                pagination: {
                  el: `#popup-swiper-${index} .swiper-pagination`,
                  clickable: true,
                },
                autoplay: location.gallery.length > 1 ? {
                  delay: 3000,
                  disableOnInteraction: false,
                } : false
              });
            }
          }, 100);
        }
      });

      // Destroy Swiper when popup closes
      marker.on('popupclose', function() {
        if (swiperInstances[index]) {
          swiperInstances[index].destroy(true, true);
          delete swiperInstances[index];
        }
      });

      markers.push(marker);

      marker.on('click', function() {
        $('.p-contact-map__location-card').removeClass('active');
        $(`.p-contact-map__location-card[data-location-index="${index}"]`).addClass('active');

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

    // ===== CTRL/CMD + SCROLL ZOOM FUNCTIONALITY =====
    const $mapContainer = $('#leaflet-map');
    const $zoomNotice = $('#map-zoom-notice');
    let noticeTimeout;

    // Detect mobile/tablet
    const isMobile = /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) || window.innerWidth < 768;

    // Hiển thị thông báo zoom
    function showZoomNotice() {
      clearTimeout(noticeTimeout);
      $zoomNotice.addClass('show');

      noticeTimeout = setTimeout(() => {
        $zoomNotice.removeClass('show');
      }, 2000);
    }

    // Xử lý cho MOBILE: cho phép zoom bằng pinch và tap
    if (isMobile) {
      map.scrollWheelZoom.enable();
      map.touchZoom.enable();
      map.doubleClickZoom.enable();
      $zoomNotice.hide();

    } else {
      // Xử lý cho DESKTOP
      $mapContainer.on('mouseenter', function() {
        map.scrollWheelZoom.enable();
        $mapContainer.addClass('scroll-zoom-disabled');
      });

      $mapContainer.on('mouseleave', function() {
        $mapContainer.removeClass('scroll-zoom-disabled');
        $zoomNotice.removeClass('show');
        clearTimeout(noticeTimeout);
      });

      // Override scroll wheel zoom để chỉ hoạt động với Ctrl/Cmd
      const originalScrollWheelZoom = L.Map.ScrollWheelZoom.prototype._onWheelScroll;
      L.Map.ScrollWheelZoom.prototype._onWheelScroll = function(e) {
        const ctrlKey = isMac ? e.metaKey : e.ctrlKey;

        if (!ctrlKey) {
          showZoomNotice();
          return;
        }

        e.preventDefault();
        originalScrollWheelZoom.call(this, e);
      };
    }

    // Click card to view on map
    $('.js-view-on-map').on('click', function(e) {
      e.preventDefault();
      const lat = parseFloat($(this).data('lat'));
      const lng = parseFloat($(this).data('lng'));
      const index = $(this).data('index');

      map.setView([lat, lng], 16, {
        animate: true,
        duration: 1
      });

      markers[index].openPopup();

      $('.p-contact-map__location-card').removeClass('active');
      $(this).closest('.p-contact-map__location-card').addClass('active');

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