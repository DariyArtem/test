/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!******************************!*\
  !*** ./resources/js/main.js ***!
  \******************************/
$(document).ready(function () {
  var video1 = $('#video1')[0];
  var videoFile = $('.video-file');
  var videoContent = $(".video-content");
  var background = $(".video-background");
  $("#play1").click(function () {
    videoContent.animate({
      opacity: 0
    }, 500);
    videoContent.css('display', 'none');
    background.animate({
      opacity: 0
    }, 500);
    videoFile.css('z-index', 1);
    videoFile.animate({
      opacity: 1
    }, 500);
    $('.video-close').animate({
      top: 0,
      opacity: 1
    }, 500);
    video1.play();
  });
  $(".video-close").click(function () {
    videoContent.animate({
      opacity: 1
    }, 500);
    videoContent.css('display', 'block');
    background.animate({
      opacity: 1
    }, 500);
    videoFile.css('z-index', -1);
    videoFile.animate({
      opacity: 0
    }, 500);
    $('.video-close').animate({
      opacity: 0
    }, 500);
    video1.pause();
  });
  $(".header-burger").click(function () {
    $(".header-sidebar").animate({
      width: '100vw'
    }, 550);
  });
  $(".header-closeSidebar").click(function () {
    $(".header-sidebar").animate({
      width: '0px'
    }, 550);
  });
  $(".header-sidebarSearch").click(function () {
    $(".header-absoluteSearch").animate({
      opacity: 1,
      height: "60px"
    }, 750);
    $(".header-sidebar").animate({
      width: '0px'
    }, 400);
  });
  $('.absolute-searchClose').click(function () {
    $(".header-absoluteSearch").animate({
      opacity: 0,
      height: "0px"
    }, 750);
  });
});
/******/ })()
;