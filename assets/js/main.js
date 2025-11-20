$(document).ready(function () {
  AOS.init({
    offset: 100,
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
    speed: 3000,
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
    speed: 600,
    navigation: {
      nextEl: '.js-swiper-button-next',
      prevEl: '.js-swiper-button-prev',
    },
    breakpoints: {
      320: {
        slidesPerView: 1.5,
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

  var swiper = new Swiper('.js-swiper-career01', {
    slidesPerView: 1,
    spaceBetween: 0,
    autoplay: {
      delay: 2500,
      disableOnInteraction: false,
    },
    navigation: {
      nextEl: '.js-swiper-career-button-next',
      prevEl: '.js-swiper-career-button-prev',
    },
    loop: true,
    speed: 600,
  });

  var swiper = new Swiper('.js-swiper-career02', {
    slidesPerView: 3,
    spaceBetween: 32,
    speed: 600,
    breakpoints: {
      320: {
        slidesPerView: 1.5,
      },
      768: {
        slidesPerView: 2.5,
      },
      1024: {
        slidesPerView: 3,
      }
    },
  });

  let isDown = false;
  let startX;
  let scrollLeft;

  $(window).on('scroll', function () {
    let scrollPosition = $(window).scrollTop();

    if (scrollPosition >= 700) {
      $('.js-header').addClass('is-scrolled');
    } else {
      $('.js-header').removeClass('is-scrolled');
    }
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

  $(".js-show-drop-lang").on("click", function () {
    $(".js-box-drop-lang").toggleClass("is-show");
  })

  function animateCounter($el, targetValue, suffix, hasDecimal) {
    var current = 0;
    var duration = 2000;
    var startTime = null;

    function formatNumber(num, hasDecimal) {
      var formatted;
      if (hasDecimal) {
        formatted = num.toFixed(1);
      } else {
        formatted = Math.floor(num).toString();
      }
      // Thêm dấu phân cách hàng nghìn
      return formatted.replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }

    function updateCounter(timestamp) {
      if (!startTime) startTime = timestamp;
      var progress = Math.min((timestamp - startTime) / duration, 1);
      current = targetValue * (progress < 0.5 ? 2 * progress * progress : -1 + (4 - 2 * progress) * progress);

      var displayText = formatNumber(current, hasDecimal) + suffix;
      $el.text(displayText);

      if (progress < 1) {
        requestAnimationFrame(updateCounter);
      } else {
        var finalText = formatNumber(targetValue, hasDecimal) + suffix;
        $el.text(finalText);
      }
    }
    requestAnimationFrame(updateCounter);
  }
  var observerOptions = {
    threshold: 0.5,
    rootMargin: '0px 0px -50px 0px'
  };
  var observer = new IntersectionObserver(function (entries) {
    entries.forEach(function (entry) {
      if (entry.isIntersecting) {
        var $el = $(entry.target);
        if (!$el.hasClass('counted')) {
          var originalText = $el.text().trim();
          var numericPart = originalText.replace(/[^\d.]/g, '');
          var targetValue = parseFloat(numericPart);
          var suffix = originalText.replace(/[\d.]/g, '').trim();
          var hasDecimal = numericPart.includes('.');
          if (!isNaN(targetValue)) {
            $el.data('original-text', originalText).addClass('counted');
            animateCounter($el, targetValue, suffix, hasDecimal);
          }
        }
        observer.unobserve(entry.target);
      }
    });
  }, observerOptions);

  $('.js-count-number').each(function () {
    observer.observe(this);
  });


  $('.js-tab-btn').on('click', function () {
    var tabId = $(this).data('tab');

    // Remove active class from all tabs
    $('.js-tab-btn').removeClass('active');
    $('.tab-content').removeClass('active');

    // Add active class to clicked tab
    $(this).addClass('active');
    $('#tab-' + tabId).addClass('active');

    // Update URL without reload
    var newUrl = window.location.pathname + '?tab=' + tabId;
    window.history.pushState({
      path: newUrl
    }, '', newUrl);
  });

  $('.js-close-modal-coming-soon').on('click', function () {
    $('#modal-coming-soon').hide();
  })

  $(document).on('click', 'a[href^="#"]', function (event) {
    var href = $.attr(this, 'href');
    if (href === '#' || href === '#!' || href.length <= 1) {
      return;
    }
    event.preventDefault();
    var targetId = href.substring(1);
    var escapedId;

    try {
      escapedId = CSS.escape(targetId);
    } catch (e) {
      escapedId = targetId.replace(/([!"#$%&'()*+,./:;<=>?@[\\\]^`{|}~])/g, '\\$1');
    }
    var target = $('#' + escapedId);
    if (target.length && target.offset()) {
      $('html, body').animate({
        scrollTop: target.offset().top - 100
      }, 1000);
    }
  });
});