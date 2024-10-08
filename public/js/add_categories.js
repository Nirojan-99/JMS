const trashIcon = document.getElementById("trashIcon");
const input = document.getElementById("imageInput");
const previewImage = document.getElementById("imagePreview");
const container = document.getElementById("img_label");
const plusIconLink = previewImage.getAttribute("src");
const imgLabel = document.getElementById("img_label");

let is_img_selected = false;

input.addEventListener("change", function (event) {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function (e) {
            is_img_selected = true;
            previewImage.src = e.target.result;
            previewImage.classList.add("selected_img");
            container.style.border = "none";
            trashIcon.style.zIndex = 100;
        };
        reader.readAsDataURL(file);
    }
});

trashIcon.addEventListener("click", function (event) {
    is_img_selected = false;
    container.style.border = "2px dashed #000";
    previewImage.classList.remove("selected_img");
    previewImage.src = plusIconLink;
    trashIcon.classList.add("d-none");
});

imgLabel.addEventListener("mouseenter", function () {
    is_img_selected && trashIcon.classList.remove("d-none"); 
});

imgLabel.addEventListener("mouseleave", function () {
    is_img_selected && trashIcon.classList.add("d-none"); 
});

const submit = document.getElementById("submit");
submit.addEventListener("click", function (event) {
    const name = document.getElementById("categoryName");
    const errMsg = document.getElementById("errMsg");

    if (!name.value.trim()) {
        event.preventDefault();
        errMsg.innerHTML = "Enter a valid name";
        name.style.border = "2px solid red";
        name.style.backgroundColor = "#FF00000D";
    } else {
        errMsg.innerHTML = "";
        name.style.border = "2px solid black";
        name.style.backgroundColor = "transparent";
    }
});

const cat_Name = document.getElementById("categoryName");
cat_Name.addEventListener("change", function (event) {
    const name = document.getElementById("categoryName");
    const errMsg = document.getElementById("errMsg");

    if (name.value.trim()) {
        errMsg.innerHTML = "";
        name.style.border = "2px solid black";
        name.style.backgroundColor = "transparent";
    }
});