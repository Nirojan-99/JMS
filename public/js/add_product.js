

const trashIcons = [
    document.getElementById("trashIcon"),
    document.getElementById("trashIcon1"),
    document.getElementById("trashIcon2"),
    document.getElementById("trashIcon3"),
];

const containers = [
    document.getElementById("img_label"),
    document.getElementById("img_label1"),
    document.getElementById("img_label2"),
    document.getElementById("img_label3"),
];

let is_img_selected = [false, false, false, false];

const plusIconLinks = [
    document.getElementById("imagePreview0").getAttribute("src"),
    document.getElementById("imagePreview1").getAttribute("src"),
    document.getElementById("imagePreview2").getAttribute("src"),
    document.getElementById("imagePreview3").getAttribute("src"),
];

function previewImage(inputId, previewId, index) {
    const input = document.getElementById(inputId);
    input.addEventListener("change", function (event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                const previewImage = document.getElementById(previewId);
                is_img_selected[index] = true;
                previewImage.src = e.target.result;
                previewImage.classList.add("selected_img");
                containers[index].style.border = "none";
                trashIcons[index].style.zIndex = 100;
            };
            reader.readAsDataURL(file);
        }
    });
}

for (let i = 0; i < 4; i++) {
    previewImage(`imageInput${i}`, `imagePreview${i}`, i);

    containers[i].addEventListener("mouseenter", function () {
        is_img_selected[i] && trashIcons[i].classList.remove("d-none");
    });

    containers[i].addEventListener("mouseleave", function () {
        is_img_selected[i] && trashIcons[i].classList.add("d-none");
    });

    trashIcons[i].addEventListener("click", function (event) {
        const previewImage = document.getElementById(`imagePreview${i}`);
        is_img_selected[i] = false;
        containers[i].style.border = "2px dashed #000";
        previewImage.classList.remove("selected_img");
        previewImage.src = plusIconLinks[i];
        trashIcons[i].classList.add("d-none");
    });
}
