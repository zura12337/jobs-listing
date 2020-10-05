import { setExtraOption, validateInput } from "./validation.js";
// Declare Variables
let fullName = document.getElementById("full_name");
let email = document.getElementById("email");
let mobile = document.getElementById("mobile");
let radios = document.getElementsByName("company-individual");
let logo = document.getElementById("logo");
let preview = document.getElementById('logo-preview');
let previewBig = document.getElementById('logo-preview-big');
let previewSm = document.getElementById('logo-preview-sm');
let imageUpload = document.getElementById("image-upload");
let password = document.getElementById("pass");
let repeatPassword = document.getElementById("re_pass");
let form = document.getElementById("register_form");
let labels = document.getElementsByTagName("LABEL");
let errors = document.getElementsByTagName("SPAN");


setExtraOption(labels, "label");
setExtraOption(errors, "error");

// Toggle On Radio Button Change
radios[1].addEventListener("change", function (event) {
  imageUpload.classList.toggle("hidden");
});
radios[0].addEventListener("change", function (event) {
  imageUpload.classList.toggle("hidden");
});


// Preview Logo On Upload
logo.onchange = function() {
  if(logo.files.length > 0){
    let src = URL.createObjectURL(logo.files[0]);
    previewSm.src = src;
    previewBig.src = src;
    preview.classList.remove('hidden');
  }
}

// Validate Form
form.addEventListener("submit", (event) => {
  validateInput(fullName);
  validateInput(email);
  if (mobile.value.length <= 7) {
    mobile.error.innerHTML = "Phone number should contain at least 8 numbers";
    event.preventDefault();
  } else {
    mobile.error.innerHTML = "";
  }
  if (radios[1].checked) {
    validateInput(logo);
  }
  validateInput(password);
  let passPattern = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;
  if (!passPattern.test(password.value)) {
    password.error.innerHTML =
      "Password should contain at least 8 characters and 1 uppercase";
    event.preventDefault();
  } else {
    password.error.innerHTML = "";
  }
  if (password.value !== repeatPassword.value) {
    repeatPassword.error.innerHTML = "Passwords don't match";
    event.preventDefault();
  } else {
    repeatPassword.error.innerHTML = "";
  }
  if (
    validateInput(fullName) ||
    validateInput(email) ||
    validateInput(password)
  ) {
    event.preventDefault();
  }
});