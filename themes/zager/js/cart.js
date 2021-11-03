new Swiper('.AccessoriesSwiper', {
  slidesPerView: 'auto',
  spaceBetween: 20,

  pagination: {
    el: '.SwiperPagination',
    clickable: true,
    bulletClass: 'SwiperPagination_bullet',
    bulletActiveClass: 'SwiperPagination_bullet-active',
  },

  navigation: {
    prevEl: '.AccessoriesSection_prev',
    nextEl: '.AccessoriesSection_next',
  },

  breakpoints: {
    768: {
      slidesPerView: 4,
      spaceBetween: 34
    },
    1024: {
      spaceBetween: 48,
      slidesPerView: 4,
    },
    1200: {
      spaceBetween: 48,
      slidesPerView: 4,
      loop: true
    },
  },
});