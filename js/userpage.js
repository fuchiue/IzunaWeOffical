const postImg = document.getElementById('userPostImg');
const eventHis = document.querySelector('.eventHistory');
const imgBtn= document.querySelector("#imgBtn");
const historyBtn= document.querySelector("#historyBtn");

historyBtn.addEventListener("click",()=>{
    console.log("click");
    postImg.style.display = 'none';
    eventHis.style.display = 'block';

        //ボタン色コントロール
        historyBtn.style.background='#DC0000';
        historyBtn.style.color='#ffffff';
        historyBtn.style.border='dashed 2px #ffffff';

        imgBtn.style.background='#ffffff';
        imgBtn.style.color='black';
        imgBtn.style.border='dashed 2px #DC0000';

});


imgBtn.addEventListener("click",()=>{
    console.log("click");
    postImg.style.display = 'grid';
    eventHis.style.display = 'none';

        //ボタン色コントロール
        imgBtn.style.background='#DC0000';
        imgBtn.style.color='#ffffff';
        imgBtn.style.border='dashed 2px #ffffff';
    
        historyBtn.style.background='#ffffff';
        historyBtn.style.color='black';
        historyBtn.style.border='dashed 2px #DC0000';
});
////////////////////////////////////////////////////////////////////////////////////////////////////
//ポップアップエリアのJS

function togglePopup(imgsrc){
    const popup= document.querySelectorAll('.full-screen');
    popup.forEach((element) => {
        const targetimg = element.querySelector('img').getAttribute('src');
        if(imgsrc == targetimg){
            element.classList.toggle('hidden');
        }
    });
}

const imgList = document.querySelectorAll(".imgBox");

imgList.forEach((element) => {
    element.addEventListener("click", (e) => {
        e.preventDefault();
        const imgsrc = element.querySelector('img').getAttribute('src');
        togglePopup(imgsrc);

    });
});

const hiddenContent = document.querySelectorAll(".hidden-content-left");
hiddenContent.forEach((element) => {
    const imgsrc = element.querySelector('img').getAttribute('src');
    const closeBtn = element.querySelector(".closePopup");
    closeBtn.addEventListener("click", (e) => {
        e.preventDefault();
        togglePopup(imgsrc);
    });
});

const hiddenBox = document.querySelectorAll(".hidden-content");
hiddenBox.forEach((element) => {
    const grayArea = element.parentNode;
    grayArea.addEventListener("click",(e)=>{
        console.log(grayArea)
        if(!grayArea.classList.contains(".hidden")){
            grayArea.classList.toggle('hidden');
        }

    });
});

// document.querySelector(".closePopup").addEventListener("click", () => {
//     console.log("削除")
//     togglePopup();
// });