export function setExtraOption(option, optionName) {
  for (var i = 0; i < option.length; i++) {
    if (option[i].htmlFor != "") {
      var elem = document.getElementById(option[i].htmlFor);
      if (elem !== null) {
        if (elem) elem[optionName] = option[i];
      } else {
        var id = removeLastChars(option[i].id, 6);
        var elem = document.getElementById(id);
        if (elem) elem[optionName] = option[i];
      }
    }
  }
  return elem;
}
export function validate(input, label) {
  if (input === "") {
    return `Please Enter ${label} field.`;
  } else {
    return null;
  }
}
export function removeLastChars(text, number) {
  return text.substring(0, text.length - number);
}

export function validateInput(name) {
  return (name.error.innerHTML = validate(
    name.value,
    removeLastChars(name.label.innerHTML, 1)
  ));
}
