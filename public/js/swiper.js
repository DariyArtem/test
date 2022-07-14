/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!********************************!*\
  !*** ./resources/js/swiper.js ***!
  \********************************/
var swiper = new Swiper(".mySwiper", {
  slidesPerView: 1,
  spaceBetween: 30,
  slidesPerGroup: 6,
  loop: true,
  loopFillGroupWithBlank: true,
  pagination: {
    el: ".swiper-pagination",
    clickable: true
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev"
  },
  breakpoints: {
    // when window width is >= 320px
    320: {
      slidesPerView: 1.5,
      spaceBetween: 10,
      slidesPerGroup: 1
    },
    // when window width is >= 480px
    480: {
      slidesPerView: 3,
      spaceBetween: 20,
      slidesPerGroup: 3
    },
    // when window width is >= 575px
    575: {
      slidesPerView: 3,
      spaceBetween: 30,
      slidesPerGroup: 3
    },
    1199: {
      slidesPerView: 6,
      spaceBetween: 30,
      slidesPerGroup: 6
    }
  }
});
var instSwiper = new Swiper(".instagramSwiper", {
  slidesPerView: 1,
  spaceBetween: 30,
  slidesPerGroup: 6,
  loop: true,
  loopFillGroupWithBlank: true,
  pagination: {
    el: ".swiper-pagination",
    clickable: true
  },
  breakpoints: {
    // when window width is >= 320px
    320: {
      slidesPerView: 1.5,
      spaceBetween: 10,
      slidesPerGroup: 1
    },
    // when window width is >= 480px
    480: {
      slidesPerView: 2,
      spaceBetween: 21,
      slidesPerGroup: 2
    },
    // when window width is >= 575px
    767: {
      slidesPerView: 3,
      spaceBetween: 21,
      slidesPerGroup: 3
    },
    1199: {
      slidesPerView: 3,
      spaceBetween: 21,
      slidesPerGroup: 3
    },
    1399: {
      slidesPerView: 5,
      spaceBetween: 21,
      slidesPerGroup: 5
    }
  }
});
/******/ })()
;