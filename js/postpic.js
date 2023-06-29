const dragArea = document.querySelector(".drag-area"),
button = document.querySelector("#selectPicBtn"),
newSelectBtn = document.querySelector("#newSelectBtn"),
uploadTilte = document.querySelector("#uploadTitle"), //投稿ボックスの文字をコントロールするため
input = document.querySelector("input");

let file;

//ブラウズボタンを押したら
button.onclick = (event) =>{
    //input area もclickされる
    event.preventDefault(); 
    input.click();
}

newSelectBtn.onclick = (event) =>{
    //input area もclickされる
    event.preventDefault(); 
    input.click();
}

input.addEventListener("change", function(){
    file = this.files[0];
    //画像アップロード機能を起動する
    showFile();
    dragArea.classList.add("active");
});



//ドロップエリアにファイルを入れる時、BorderのCSS変化
dragArea.addEventListener("dragover", (event)=>{
    event.preventDefault(); //preventing from default behaviour
    // console.log("File is over dragArea");
    dragArea.classList.add("active");
});

//ドロップエリアからファイルを外す時、BorderのCSS変化
dragArea.addEventListener("dragleave",()=>{
    // console.log("File is outside dragArea");
    dragArea.classList.remove("active");
    dragText.textContent = "ファイルをドラッグ＆ドロップしてください"
});

//ドロップエリア内ではファイルがある時
dragArea.addEventListener("drop",(event)=>{
    event.preventDefault();
    //ユーザーがアップロードしたファイルを取得する
    file = event.dataTransfer.files[0];
        // console.log("File is dropped on dragArea");
    //画像アップロード機能を起動する
    showFile();
});

function showFile(){
    let fileType = file.type;
    let fileSize = file.size;
    console.log(fileType);

    let validExtensions = ["image/jpeg", "image/jpg", "image/png", ];
    if(validExtensions.includes(fileType)){ //もしアップロードされたファイルは画像の型なら
        if(fileSize > 5 * 1024 * 1024){
            alert("アップロードされた画像のサイズが5MBを超えています。5MB以下の画像を選択してください。");
            elem.value = ""; // ファイル選択をリセット
            thumbImage.removeAttribute("src"); // 画像プレビューを削除
            return; // 処理を終了
        }
        
        //新しいファイル読み込みを作成
        let fileReader = new FileReader();
        fileReader.onload = () =>{
            //アップロードされたファイルのソースをfileURLに保存する
            let fileURL = fileReader.result;
            console.log(fileURL);

            //新しいimgタグを作って、取得したfileURLを入れる
            // let imgTag = `<img src="${fileURL}" alt="">`;

            //もし元々ドラッグで画像があれば、元の画像を消す
            let image = dragArea.querySelector("img");
            if(image){
                dragArea.removeChild(image);
            }

            //ドラッグエリアにimgタグを追加する
            let imgTag = document.createElement("img");
            imgTag.setAttribute("src",fileURL);
            dragArea.appendChild(imgTag);
            uploadTilte.style.display = "none";
            button.style.display = "none";
            newSelectBtn.style.display = "block";
        }
        fileReader.readAsDataURL(file);
    }else{
        alert("画像ファイルを再選択してください。")
        dragArea.classList.remove("active");
    }
}

function handleEventSelection(event) {
    var eventItem = event.target.closest('.event-item');
    var eventItems = document.querySelectorAll('.event-item');
    eventItems.forEach(function(item) {
      item.classList.remove('selected');
    });
    eventItem.classList.add('selected');
}

const submitBtn = document.querySelector("#signUp_BtnArea");
const uploadphoto = document.querySelector("#photo");
const radio = document.querySelectorAll('input[name="value"]');

submitBtn.addEventListener("click", (event) => {
    /** 画像が添付されるかを確認 */ 
    if(!uploadphoto.files || uploadphoto.files.length === 0){
        event.preventDefault(); // 送信をキャンセル
        alert("画像を添付してください");
    }
    
    /** イベントが選択されるかを確認 */ 
    let isChecked = false;
    for(let i = 0; i < radio.length; i++ ){
        if(radio[i].checked) {
            isChecked = true;
            break;
        }
    }
    if(!isChecked){
        event.preventDefault(); // 送信をキャンセル
        alert("イベントを選択してください");
    }
});