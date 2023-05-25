const dropArea = document.querySelector(".drag-area");

dropArea.addEventListener("dragover", ()=>{
    console.log("File is over dragarea");
    dropArea.classList.add("active");
});

dropArea.addEventListener("dragleave",()=>{
    console.log("File is outside dragarea");
    dropArea.classList.remove("active");
});