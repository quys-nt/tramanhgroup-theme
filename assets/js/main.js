$(document).ready(function () {
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
});