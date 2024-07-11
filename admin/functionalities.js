const dropArea = document.getElementById("drop-area");
const inputFile = document.getElementById("brand_image");
let logo = document.getElementsByClassName("logo")[0]; // Assuming there's only one element with the class "logo"

inputFile.addEventListener("change", uploadImage);

function uploadImage() {
    let imgLink = URL.createObjectURL(inputFile.files[0]);
    console.log(imgLink);
    logo.style.backgroundImage = `url(${imgLink})`;
  
    console.log("success");
}

dropArea.addEventListener("dragover", function(e) {
    e.preventDefault();
});

dropArea.addEventListener("drop", function(e) {
    e.preventDefault();
    inputFile.files = e.dataTransfer.files;
    uploadImage();
});
