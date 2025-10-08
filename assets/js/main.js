$(document).ready(function () {
  AOS.init({
    offset: 150,
    duration: 1200,
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

    loop: true,
    speed: 600,
  });

  var swiper = new Swiper('.swiper-partners', {
    loop: true,
    slidesPerView: 6,
    spaceBetween: 0,
    speed: 6000,
    autoplay: {
      delay: 0,
      disableOnInteraction: false,
    },
    breakpoints: {
      320: {
        slidesPerView: 2.5,
      },
      768: {
        slidesPerView: 4.5,
      },
      1024: {
        slidesPerView: 6,
      },
      1550: {
        slidesPerView: 8,
      }
    },
  });
  var swiperPartners = new Swiper('.swiper-posts', {
    loop: true,
    slidesPerView: 3,
    spaceBetween: 32,
    speed: 1000,
    navigation: {
      nextEl: '.js-swiper-button-prev',
      prevEl: '.js-swiper-button-next',
    },
    breakpoints: {
      320: {
        slidesPerView: 2.5,
        spaceBetween: 10,
        speed: 4000,
      },
      768: {
        slidesPerView: 2.5,
        spaceBetween: 15,
      },
      1024: {
        slidesPerView: 3,
        spaceBetween: 32,
      },
    },
  });

  let isDown = false;
  let startX;
  let scrollLeft;

  $(document).ready(function () {
    $(window).on('scroll', function () {
      let scrollPosition = $(window).scrollTop();

      if (scrollPosition >= 700) {
        $('.js-header').addClass('is-scrolled');
      } else {
        $('.js-header').removeClass('is-scrolled');
      }
    });
  });

  $('.overflow-auto').each(function () {
    const $this = $(this);

    if ($this[0].scrollWidth > $this[0].clientWidth) {
      $this.css('cursor', 'grab');

      $this.on('mousedown', function (e) {
        isDown = true;
        $this.css('cursor', 'grabbing');
        startX = e.pageX - $this[0].offsetLeft;
        scrollLeft = $this.scrollLeft();
        e.preventDefault();
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
        const walk = (x - startX) * 2;
        $this.scrollLeft(scrollLeft - walk);
      });
    }
  });
  var $nav = $('.l-header__nav');
  if ($nav.length === 0) return;

  var $dropdownLis = $nav.find('ul > li:has(ul)');

  $dropdownLis.each(function () {
    var $li = $(this);
    var $triggerA = $li.find('> a');
    var $submenu = $li.find('> ul');

    if ($triggerA.length && $submenu.length) {
      $triggerA.on('click', function (e) {
        e.preventDefault();

        $submenu.toggleClass('show');

        if ($submenu.hasClass('show')) {
          $triggerA.addClass('is-active');
        } else {
          $triggerA.removeClass('is-active');
        }

        $dropdownLis.not($li).each(function () {
          var $otherSubmenu = $(this).find('> ul');
          var $otherTriggerA = $(this).find('> a');
          $otherSubmenu.removeClass('show');
          $otherTriggerA.removeClass('is-active');
        });
      });
    }
  });

  $(document).on('click', function (e) {
    if (!$nav.is(e.target) && $nav.has(e.target).length === 0) {
      $dropdownLis.each(function () {
        var $submenu = $(this).find('> ul');
        var $triggerA = $(this).find('> a');
        $submenu.removeClass('show');
        $triggerA.removeClass('is-active');
      });
    }
  });

  $nav.on('click', function (e) {
    if ($(e.target).closest('ul ul').length > 0) {
      e.stopPropagation();
    }
  });

  $(".js-show-menu").on("click", function () {
    $(".l-header__menu").toggleClass("is-show");
    if ($(".l-header__menu").hasClass("is-show")) {
      $("body").css({ "overflow": "hidden" })
      $(".l-header__logo--first").show()
      $(".l-header__logo--last").hide()
      $(".l-header__btn02--first").hide()
      $(".l-header__btn02--last").hide()
      $(".l-header__btn02--close").show()
    } else {
      $(".l-header__btn02--close").hide()
      $("body").removeAttr("style")
      $(".l-header__logo--close").hide()
      if ($(".js-header:not(.is-scrolled)")) {
        $(".l-header__logo--first").removeAttr("style")
        $(".l-header__logo--last").removeAttr("style")
        $(".l-header__btn02--first").removeAttr("style")
        $(".l-header__btn02--last").removeAttr("style")
      }
    }
  })

});