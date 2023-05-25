const dropArea = document.querySelector(".drag-area");

let file;

//ドロップボックスにファイルを入れる時、BorderのCSS変化
dropArea.addEventListener("dragover", (event)=>{
    event.preventDefault(); //preventing from default behaviour
    // console.log("File is over dropArea");
    dropArea.classList.add("active");
});

//ドロップボックスからファイルを外す時、BorderのCSS変化
dropArea.addEventListener("dragleave",()=>{
    // console.log("File is outside dropArea");
    dropArea.classList.remove("active");
});

//ドロップボックス内ではファイルがある時
dropArea.addEventListener("drop",(event)=>{
    event.preventDefault();
    //
    file = event.dataTransfer.files[0];
    // console.log("File is dropped on dropArea");
});