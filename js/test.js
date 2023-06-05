var swiper = new Swiper(".mySwiper", {
    autoplay: {
        delay: 3000, // 1000mm == 1 second
        disableOnInteraction: false,
    },
    loop: true,

  direction: "vertical",
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
});