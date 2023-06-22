/** 画像の表示 */ 
const uploadIcon = document.querySelector( "#inputIcon" );
let validExtensions = ["image/jpeg","image/jpe","image/png"];

uploadIcon.onchange = (event) => {
    const elem = event.currentTarget;
    const thumbImage = document.querySelector( "#icon img" );
    const imageArea = document.querySelector( "#icon" );
    let files = elem.files[ elem.files.length -1 ];
    let fileType = files.type;
    let fileSize = files.size;

    console.log(fileSize);

    if(validExtensions.includes(fileType)){
        if(fileSize > 5 * 1024 * 1024){
            alert("アップロードされた画像のサイズが5MBを超えています。5MB以下の画像を選択してください。");
            elem.value = ""; // ファイル選択をリセット
            thumbImage.removeAttribute("src"); // 画像プレビューを削除
            return; // 処理を終了
        }

        let reader = new FileReader();
        reader.readAsDataURL(files);

        reader.onload = (event) => {
            let base64Img = event.target.result;
            imageArea.classList.add('d-inline-block','me-1','mt-1','mb-5');
            thumbImage.classList.add('img-thumbnail', 'col-auto');
            thumbImage.style.height = "100px";
            thumbImage.setAttribute( "src", base64Img );      
        }
    }else{
        alert("画像ファイル以外はアップロードできません");
        elem.value = "";
        thumbImage.removeAttribute("src");
    }   
}

/** 画像が添付されるかどうかを確認 */ 
const submitBnt = document.querySelector("#enter_InfoSubmit");

submitBnt.addEventListener("click", (event) =>{
    if(!uploadIcon.files || uploadIcon.files.length === 0){
        event.preventDefault(); // 送信をキャンセル
        alert("画像を添付してください");
    }
});