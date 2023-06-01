const dropArea = document.querySelector(".drag-area"),
button = document.querySelector("button"),
input = document.querySelector("input");

let file;

//ブラウズボタンを押したら
button.onclick = () =>{
    //input area もclickされる
    input.click();
}

input.addEventListener("change", function(){
    file = this.files[0];
    //画像アップロード機能を起動する
    showFile();
    dropArea.classList.add("active");
});



//ドロップエリアにファイルを入れる時、BorderのCSS変化
dropArea.addEventListener("dragover", (event)=>{
    event.preventDefault(); //preventing from default behaviour
    // console.log("File is over dropArea");
    dropArea.classList.add("active");
});

//ドロップエリアからファイルを外す時、BorderのCSS変化
dropArea.addEventListener("dragleave",()=>{
    // console.log("File is outside dropArea");
    dropArea.classList.remove("active");
    dragText.textContent = "ファイルをドラッグ＆ドロップしてください"
});

//ドロップエリア内ではファイルがある時
dropArea.addEventListener("drop",(event)=>{
    event.preventDefault();
    //ユーザーがアップロードしたファイルを取得する
    file = event.dataTransfer.files[0];
        // console.log("File is dropped on dropArea");
    //画像アップロード機能を起動する
    showFile();
});

function showFile(){
    let fileType = file.type;
    console.log(fileType);

    let validExtensions = ["image/jpeg", "image/jpg", "image/png", ];
    if(validExtensions.includes(fileType)){ //もしアップロードされたファイルは画像の型なら
        
        //新しいファイル読み込みを作成
        let fileReader = new FileReader();
        fileReader.onload = () =>{
            //アップロードされたファイルのソースをfileURLに保存する
            let fileURL = fileReader.result;
            console.log(fileURL);

            //新しいimgタグを作って、取得したfileURLを入れる
            let imgTag = `<img src="${fileURL}" alt="">`;

            //ドロップエリアにimgタグを追加する
            dropArea.innerHTML= imgTag;
        }
        fileReader.readAsDataURL(file);
    }else{
        alert("画像ファイルを再選択してください。")
        dropArea.classList.remove("active");
    }
}