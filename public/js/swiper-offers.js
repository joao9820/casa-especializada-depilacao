
var swiper = new Swiper(".my-swiper", {
    slidesPerView: 1,
    spaceBetween: 30,
    slidesPerGroup: 1,
    /* centerInsufficientSlides: true, */
    breakpoints: {
    700: {
        slidesPerView: 2,
        },
    992: {
        slidesPerView: 3,
    },
    1200: {
        slidesPerView: 4,
     }
    },
    loop: false,
    navigation:{
        nextEl:".swiper-button-next",
        prevEl: ".swiper-button-prev",
    }

});
