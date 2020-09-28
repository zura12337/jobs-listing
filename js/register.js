var fullName = document.getElementById("full_name");
var email = document.getElementById("email");
var mobile = document.getElementById("mobile");
var radios = document.getElementsByName("company-individual");
var logo = document.getElementById("logo");
var password = document.getElementById("pass");
var repeatPassword = document.getElementById("re_pass");
var form = document.getElementById("register_form");
var labels = document.getElementsByTagName("LABEL");
var errors = document.getElementsByTagName("SPAN");

function setExtraOption(option, optionName) {
  for (var i = 0; i < option.length; i++) {
    if (option[i].htmlFor != "") {
      var elem = document.getElementById(option[i].htmlFor);
      if (elem !== null) {
        if (elem) elem[optionName] = option[i];
        console.log(elem[optionName]);
      } else {
        var id = removeLastChars(option[i].id, 6);
        var elem = document.getElementById(id);
        if (elem) elem[optionName] = option[i];
      }
    }
  }
  return elem;
}
setExtraOption(labels, "label");
setExtraOption(errors, "error");
function validate(input, label) {
  if (input === "") {
    return `Please Enter ${label} field.`;
  } else {
    return "";
  }
}
function removeLastChars(text, number) {
  return text.substring(0, text.length - number);
}

function validateInput(name) {
  return (name.error.innerHTML = validate(
    name.value,
    removeLastChars(name.label.innerHTML, 1)
  ));
}

form.addEventListener("submit", (event) => {
  event.preventDefault();

  validateInput(fullName);
  validateInput(email);
  validateInput(mobile);
  validateInput(logo);
  validateInput(password);
  validateInput(repeatPassword);
});
