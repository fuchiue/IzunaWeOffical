/* Navabarを固定する JS  開始*/
window.addEventListener("scroll",function(){
    var header = document.querySelector("header");
    header.classList.toggle("sticky", window.scrollY > 0);
})
/* Navabarを固定する JS  終了*/