import { setExtraOption, validateInput } from "./validation.js";

var fullName = document.getElementById("full_name");
var email = document.getElementById("email");
var mobile = document.getElementById("mobile");
var radios = document.getElementsByName("company-individual");
var logo = document.getElementById("logo");
var imageUpload = document.getElementById("image-upload");
var password = document.getElementById("pass");
var repeatPassword = document.getElementById("re_pass");
var form = document.getElementById("register_form");
var labels = document.getElementsByTagName("LABEL");
var errors = document.getElementsByTagName("SPAN");

setExtraOption(labels, "label");
setExtraOption(errors, "error");

radios[1].addEventListener("change", function (event) {
  imageUpload.classList.toggle("hidden");
});
radios[0].addEventListener("change", function (event) {
  imageUpload.classList.toggle("hidden");
});

console.log(email.error);
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
  var passPattern = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;
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
