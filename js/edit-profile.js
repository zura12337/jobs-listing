import { setExtraOption, validateInput } from "./validation.js";

var fullName = document.getElementById("full_name");
var email = document.getElementById("email");
var mobile = document.getElementById("mobile");
var radios = document.getElementsByName("company-individual");
var logo = document.getElementById("logo");
var imageUpload = document.getElementById("image-upload");
var form = document.getElementById("edit_profile_form");
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

form.addEventListener("submit", (event) => {
  validateInput(fullName);
  validateInput(email);
  if (mobile.value.length <= 7) {
    mobile.error.innerHTML = "Phone number should contain at least 8 numbers";
    event.preventDefault();
  } else {
    mobile.error.innerHTML = "";
  }
  if (validateInput(fullName) || validateInput(email)) {
    event.preventDefault();
  }
});
