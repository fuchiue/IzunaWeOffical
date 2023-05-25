const postImg = document.getElementById('hostPostImg');
const eventHis = document.querySelector('.eventHistory');
const attendants = document.getElementById('attendantImg');
const imgBtn= document.querySelector("#imgBtn");
const attBtn= document.querySelector("#attendantBtn");
const nowEBtn= document.querySelector("#nowEventBtn");

nowEBtn.addEventListener("click",()=>{
    console.log("click");
    postImg.style.display = 'none';
    attendants.style.display = 'none';
    eventHis.style.display = 'block';

        //ボタン色コントロール
        nowEBtn.style.background='#DC0000';
        nowEBtn.style.color='#ffffff';
        nowEBtn.style.border='dashed 2px #ffffff';

        attBtn.style.background='#ffffff';
        attBtn.style.color='black';
        attBtn.style.border='dashed 2px #DC0000';

        imgBtn.style.background='#ffffff';
        imgBtn.style.color='black';
        imgBtn.style.border='dashed 2px #DC0000';

});

attBtn.addEventListener("click",()=>{
    postImg.style.display= 'none';
    attendants.style.display ='grid';
    eventHis.style.display= 'none';

            //ボタン色コントロール
            attBtn.style.background='#DC0000';
            attBtn.style.color='#ffffff';
            attBtn.style.border='dashed 2px #ffffff';
    
            nowEBtn.style.background='#ffffff';
            nowEBtn.style.color='black';
            nowEBtn.style.border='dashed 2px #DC0000';
    
            imgBtn.style.background='#ffffff';
            imgBtn.style.color='black';
            imgBtn.style.border='dashed 2px #DC0000';

});


imgBtn.addEventListener("click",()=>{
    console.log("click");
    postImg.style.display = 'grid';
    attendants.style.display = 'none';
    eventHis.style.display = 'none';

        //ボタン色コントロール
        imgBtn.style.background='#DC0000';
        imgBtn.style.color='#ffffff';
        imgBtn.style.border='dashed 2px #ffffff';

        attBtn.style.background='#ffffff';
        attBtn.style.color='black';
        attBtn.style.border='dashed 2px #DC0000';
    
        nowEBtn.style.background='#ffffff';
        nowEBtn.style.color='black';
        nowEBtn.style.border='dashed 2px #DC0000';
});

