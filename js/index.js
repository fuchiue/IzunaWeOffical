//ホーム写真の自動的な表示交換　JS　開始
const sliderItems = document.querySelectorAll("#home img");

//タイマーの間隔
const delay = 2000;

let i = 1;

// //This is the normal flashing sliders
// setInterval(function(){

//     if(i == 0){
//         sliderItems[i].style.display = 'block';
//     }else if (i == sliderItems.length){
//         sliderItems[i-1].style.display = 'none';
//         sliderItems[0].style.display = 'block';
//         i = 0;
//     }else{
//         sliderItems[i-1].style.display = 'none';
//         sliderItems[i].style.display = 'block';
//     }

//     i++;

// }, delay);

  setInterval(function(){ 

    if(i == 0) {
      sliderItems[i].className = "fade-in-image";
    } else if(i == sliderItems.length ) {
      sliderItems[i - 1].className = "fade-out-image";
      sliderItems[0].className = "fade-in-image";
      i = 0;
    } else {
      sliderItems[i - 1].className = "fade-out-image";
      sliderItems[i].className = "fade-in-image";
    }

    i++;

  }, delay);


//ホーム写真の自動的な表示交換　JS　終了

//最近のイベントの自動的な表示交換　JS　開始
var swiper = new Swiper(".s1", {
    autoplay: {
        delay: 1000, // 1000mm == 1 second
        disableOnInteraction: false,
        loop: true,
    },

    slidesPerView: 3,
    spaceBetween: 30,
    freeMode: true,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },

      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
  });
//最近のイベントの自動的な表示交換　JS　終了


// var mySwiper2 = new Swiper(".s2", {
//   effect: "coverflow",
//   grabCursor: true,
//   centeredSlides: true,
//   slidesPerView: 3,
//   coverflowEffect: {
//     rotate: 50,
//     stretch: 0,
//     depth: 100,
//     modifier: 1,
//     slideShadows: true,
//   },
//   pagination: {
//     el: ".swiper-pagination",
//   },
// });