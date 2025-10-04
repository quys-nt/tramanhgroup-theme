$(document).ready(function () {
  AOS.init({
    offset: 300,
    duration: 1500,
    easing: 'ease',
    delay: 0,
    once: true
  });

  var swiper = new Swiper('.js-swiper-mv', {
    slidesPerView: 1,
    spaceBetween: 0,
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
      dynamicBullets: true,
    },
    autoplay: {
      delay: 2500,
      disableOnInteraction: false,
    },
    // navigation: { nextEl: '.swiper-button-next', prevEl: '.swiper-button-prev' }, // Bỏ comment nếu cần sau này
    loop: true,
    speed: 600,
  });

  let isDown = false;
  let startX;
  let scrollLeft;

  $('.overflow-auto').each(function () {
    const $this = $(this);

    // Kiểm tra nếu phần tử bị overflow (chỉ áp dụng khi cần)
    if ($this[0].scrollWidth > $this[0].clientWidth) {
      // Thêm cursor pointer để hint có thể kéo
      $this.css('cursor', 'grab');

      $this.on('mousedown', function (e) {
        isDown = true;
        $this.css('cursor', 'grabbing');
        startX = e.pageX - $this[0].offsetLeft;
        scrollLeft = $this.scrollLeft();
        e.preventDefault(); // Ngăn select text khi kéo
      });

      $this.on('mouseleave', function () {
        isDown = false;
        $this.css('cursor', 'grab');
      });

      $this.on('mouseup', function () {
        isDown = false;
        $this.css('cursor', 'grab');
      });

      $this.on('mousemove', function (e) {
        if (!isDown) return;
        e.preventDefault();
        const x = e.pageX - $this[0].offsetLeft;
        const walk = (x - startX) * 2; // Tốc độ kéo (có thể chỉnh số 2 để nhanh/chậm hơn)
        $this.scrollLeft(scrollLeft - walk);
      });
    }
  });
  var $nav = $('.l-header__nav');
  if ($nav.length === 0) return;

  // Lấy tất cả li có submenu
  var $dropdownLis = $nav.find('ul > li:has(ul)');

  // Toggle submenu on click
  $dropdownLis.each(function () {
    var $li = $(this);
    var $triggerA = $li.find('> a'); // Thẻ a chính
    var $submenu = $li.find('> ul'); // ul con

    if ($triggerA.length && $submenu.length) {
      $triggerA.on('click', function (e) {
        e.preventDefault(); // Ngăn link jump (remove nếu cần)

        // Toggle class .show trên submenu
        $submenu.toggleClass('show');

        // Kiểm tra trạng thái sau toggle và update is-active
        if ($submenu.hasClass('show')) {
          $triggerA.addClass('is-active');
        } else {
          $triggerA.removeClass('is-active');
        }

        // Đóng các submenu khác và remove active
        $dropdownLis.not($li).each(function () {
          var $otherSubmenu = $(this).find('> ul');
          var $otherTriggerA = $(this).find('> a');
          $otherSubmenu.removeClass('show');
          $otherTriggerA.removeClass('is-active');
        });
      });
    }
  });

  // Close all submenus on outside click
  $(document).on('click', function (e) {
    if (!$nav.is(e.target) && $nav.has(e.target).length === 0) {
      // Click ngoài nav -> đóng tất cả
      $dropdownLis.each(function () {
        var $submenu = $(this).find('> ul');
        var $triggerA = $(this).find('> a');
        $submenu.removeClass('show');
        $triggerA.removeClass('is-active');
      });
    }
  });

  // Prevent close khi click inside submenu (stop propagation)
  $nav.on('click', function (e) {
    if ($(e.target).closest('ul ul').length > 0) {
      e.stopPropagation();
    }
  });

  $(".js-show-menu").on("click", function () {
    $(".l-header__menu").toggleClass("is-show");
    if ($(".l-header__menu").hasClass("is-show")) {
      $("body").css({ "overflow": "hidden" })
    } else {
      $("body").removeAttr("style")
    }
  })

});