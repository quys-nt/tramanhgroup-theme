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
  let isDown = false;
    let startX;
    let scrollLeft;

    $('.overflow-auto').each(function() {
        const $this = $(this);

        // Kiểm tra nếu phần tử bị overflow (chỉ áp dụng khi cần)
        if ($this[0].scrollWidth > $this[0].clientWidth) {
            // Thêm cursor pointer để hint có thể kéo
            $this.css('cursor', 'grab');

            $this.on('mousedown', function(e) {
                isDown = true;
                $this.css('cursor', 'grabbing');
                startX = e.pageX - $this[0].offsetLeft;
                scrollLeft = $this.scrollLeft();
                e.preventDefault(); // Ngăn select text khi kéo
            });

            $this.on('mouseleave', function() {
                isDown = false;
                $this.css('cursor', 'grab');
            });

            $this.on('mouseup', function() {
                isDown = false;
                $this.css('cursor', 'grab');
            });

            $this.on('mousemove', function(e) {
                if (!isDown) return;
                e.preventDefault();
                const x = e.pageX - $this[0].offsetLeft;
                const walk = (x - startX) * 2; // Tốc độ kéo (có thể chỉnh số 2 để nhanh/chậm hơn)
                $this.scrollLeft(scrollLeft - walk);
            });
        }
    });
});