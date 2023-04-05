let swiper = new Swiper(".mySwiper", {
    spaceBetween: 10,
    slidesPerView: 4,
    freeMode: true,
    watchSlidesProgress: true,
  });
  let swiper2 = new Swiper(".mySwiper2", {
    spaceBetween: 10,
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    thumbs: {
      swiper: swiper,
    },
  });
  let typed = new Typed(".auto-type", {
    strings: ["Buy", "Sell", "Earn Money"],
    typeSpeed: 150,
    backSpeed: 150,
    loop: true
});



//carousel last updates
let swiper3 = new Swiper(".mySwiper3", {
  // effect: "coverflow",
  grabCursor: true,
  centeredSlides: true,
  slidesPerView: "1",
  // coverflowEffect: {
  //   rotate: 50,
  //   stretch: 0,
  //   depth: 100,
  //   modifier: 1,
  //   slideShadows: true,
  // },
  pagination: {
    el: ".swiper-pagination",

  },

  breakpoints: {
    500: {
      slidesPerView: "2",
    },

    700: {
      slidesPerView: "4",
    },
    850: {
      slidesPerView: "6",
    }


  }
});