//ホーム写真の自動的な表示交換　JS　開始
const sliderItems = document.querySelectorAll("#home img");

//タイマーの間隔
const delay = 3000;

let i = 0;

setInterval(function(){

    if(i == 0){
        sliderItems[i].style.display = 'block';
    }else if (i == sliderItems.length){
        sliderItems[i-1].style.display = 'none';
        sliderItems[0].style.display = 'block';
        i = 0;
    }else{
        sliderItems[i-1].style.display = 'none';
        sliderItems[i].style.display = 'block';
    }

    i++;

}, delay);
//ホーム写真の自動的な表示交換　JS　終了

//最近のイベントの自動的な表示交換　JS　開始
var swiper = new Swiper(".card_slider", {
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
