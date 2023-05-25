const postImg = document.querySelector('#hostPostImg');
const attendants = document.querySelector('#attendantImg');
const eventControl= document.querySelector('.eventControl');
const joinedPpl_Control = document.querySelector('.joinedPpl_Control');


//ボタン
const imgBtn= document.querySelector('#imgBtn');
const attBtn= document.querySelector('#attendantBtn');
const eventControl_Btn= document.querySelector('#eventControl_Btn');
const joinedPpl_Btn=document.querySelector('#joinedPpl_Btn');

//--------------------------------------------------------------------------------//

//投稿写真＋参加者一覧エリア の　ボタン
attBtn.addEventListener("click",()=>{
    postImg.style.display= 'none';
    attendants.style.display ='grid';

            //ボタン色コントロール
            attBtn.style.background='#DC0000';
            attBtn.style.color='#ffffff';
            attBtn.style.border='dashed 2px #ffffff';
    
            imgBtn.style.background='#ffffff';
            imgBtn.style.color='black';
            imgBtn.style.border='dashed 2px #DC0000';

});


imgBtn.addEventListener("click",()=>{

    postImg.style.display = 'grid';
    attendants.style.display = 'none';


        //ボタン色コントロール
        imgBtn.style.background='#DC0000';
        imgBtn.style.color='#ffffff';
        imgBtn.style.border='dashed 2px #ffffff';
    
        attBtn.style.background='#ffffff';
        attBtn.style.color='black';
        attBtn.style.border='dashed 2px #DC0000';
});

//--------------------------------------------------------------------------------//

//イベント一覧＋ 応募者一覧エリア の　ボタン
joinedPpl_Btn.addEventListener("click",()=>{
    eventControl.style.display= 'none';
    joinedPpl_Control.style.display ='block';


            //ボタン色コントロール
            joinedPpl_Btn.style.background='#DC0000';
            joinedPpl_Btn.style.color='#ffffff';
            joinedPpl_Btn.style.border='dashed 2px #ffffff';
    
            eventControl_Btn.style.background='#ffffff';
            eventControl_Btn.style.color='black';
            eventControl_Btn.style.border='dashed 2px #DC0000';

});


eventControl_Btn.addEventListener("click",()=>{

    eventControl.style.display = 'block';
    joinedPpl_Control.style.display = 'none';

        //ボタン色コントロール
        eventControl_Btn.style.background='#DC0000';
        eventControl_Btn.style.color='#ffffff';
        eventControl_Btn.style.border='dashed 2px #ffffff';
    
        joinedPpl_Btn.style.background='#ffffff';
        joinedPpl_Btn.style.color='black';
        joinedPpl_Btn.style.border='dashed 2px #DC0000';
});
