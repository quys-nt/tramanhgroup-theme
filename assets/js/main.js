$(document).ready(function () {
  $(".js-show-menu").on("click", function () {
    $(this).toggleClass("is-active")
    if ($(this).hasClass("is-active")) {
      $(".js-menu-sp").addClass("is-show")
    } else {
      $(".js-menu-sp").removeClass("is-show")
    }
  });


  $(".js-tab-btn").on("click", function () {
    closeAllTabs();
    $(this).addClass("is-active")
    let clickedTab = $(this).data("tab")
    openTab(clickedTab);
    console.log(dataTab)
  })
  function closeAllTabs() {
    // Đóng tất cả tab buttons
    $('.js-tab-btn').removeClass('is-active');

    // Đóng tất cả tab lists
    $('.js-tab-list').removeClass('is-active');
  }
  function openTab(tabId) {
    // Mở tab button tương ứng
    $('[data-tab="' + tabId + '"].js-tab-btn').addClass('is-active');

    // Đóng tab list hiện tại và mở tab mới với hiệu ứng
    $('.js-tab-list.is-active').fadeOut(300, function () {
      $('[data-tab="' + tabId + '"].js-tab-list').fadeIn(300);
    });

    // Thêm class is-active cho tab list mới
    $('[data-tab="' + tabId + '"].js-tab-list').addClass('is-active');
  }

});


// Đảm bảo Swiper đã được load
document.addEventListener('DOMContentLoaded', function () {
  // Kiểm tra nếu Swiper có sẵn
  if (typeof Swiper === 'undefined') {
    console.warn('Swiper library not loaded');
    return;
  }

  // Kiểm tra nếu đang ở mobile
  function isMobile() {
    return window.innerWidth <= 767;
  }

  // Khởi tạo Swiper
  let swiper;

  function initSwiper() {
    // Kiểm tra xem element container có tồn tại không
    const container = document.querySelector('.js-product-images-container');
    if (!container) {
      // Nếu không có container, không làm gì cả
      console.log('Product images container not found, skipping Swiper initialization');
      return;
    }

    const images = container.querySelectorAll('.js-product-image');
    
    // Kiểm tra nếu không có ảnh hoặc không phải mobile
    if (!isMobile() || images.length <= 1) {
      // PC hoặc chỉ có 1 ảnh: không cần swiper
      return;
    }

    try {
      // Destroy swiper cũ nếu có
      if (swiper) {
        swiper.destroy(true, true);
      }

      // Wrap images trong swiper structure
      const swiperHTML = `
        <div class="swiper product-image-swiper">
          <div class="swiper-wrapper">
            ${Array.from(images).map(img =>
        `<div class="swiper-slide">${img.outerHTML}</div>`
      ).join('')}
          </div>
          <!-- Navigation buttons -->
          <div class="swiper-button-next"></div>
          <div class="swiper-button-prev"></div>
        </div>
      `;

      // Replace container content
      container.innerHTML = swiperHTML;

      // Khởi tạo Swiper
      swiper = new Swiper('.product-image-swiper', {
        // Responsive breakpoints
        slidesPerView: 1,
        spaceBetween: 10,

        // Navigation
        navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
        },

        // Pagination
        pagination: {
          el: '.swiper-pagination',
          clickable: true,
          dynamicBullets: true,
        },

        // Effects
        effect: 'slide',
        speed: 300,

        // Touch settings
        touchRatio: 1,
        touchAngle: 45,
        simulateTouch: true,
        grabCursor: true,

        // Keyboard control
        keyboard: {
          enabled: true,
        },

        // Responsive
        breakpoints: {
          // Mobile
          320: {
            slidesPerView: 1,
            spaceBetween: 10,
          },
          // Tablet nhỏ
          480: {
            slidesPerView: 1,
            spaceBetween: 15,
          }
        },

        // Auto height cho ảnh
        autoHeight: true,

        // Loop (tùy chọn)
        loop: images.length > 1,

        // Lazy loading (tùy chọn)
        lazy: {
          loadPrevNext: true,
        },

        // Observer để detect changes
        observer: true,
        observeParents: true,
      });
    } catch (error) {
      console.error('Error initializing Swiper:', error);
    }
  }

  // Khởi tạo lần đầu
  initSwiper();

  // Listen cho resize event
  let resizeTimer;
  window.addEventListener('resize', function () {
    clearTimeout(resizeTimer);
    resizeTimer = setTimeout(function () {
      // Re-init khi resize
      if (window.innerWidth !== prevWidth) {
        prevWidth = window.innerWidth;
        initSwiper();
      }
    }, 250);
  });

  // Lưu width trước đó
  let prevWidth = window.innerWidth;

  // Handle orientation change trên mobile
  window.addEventListener('orientationchange', function () {
    setTimeout(initSwiper, 500);
  });
});