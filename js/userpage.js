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

