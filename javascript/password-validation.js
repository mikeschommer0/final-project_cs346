var password = document.getElementById("password-signup");
var letter = document.getElementById("password-lcletter");
var capital = document.getElementById("password-ucletter");
var number = document.getElementById("password-number");
var length = document.getElementById("password-length");

password.onfocus = function() {
  document.getElementById("password-message").style.display = "block";
}

password.onblur = function() {
  document.getElementById("password-message").style.display = "none";
}

password.onkeyup = function() {
  //validate lowercase letters
  var validLCLetters = /[a-z]/g;
  if(password.value.match(validLCLetters)) {
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
}

  //validate capital letters
  var validUCLetters = /[A-Z]/g;
  if(password.value.match(validUCLetters)) {
    capital.classList.remove("invalid");
    capital.classList.add("valid");
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
  }

  //validate numbers
  var validNumbers = /[0-9]/g;
  if(password.value.match(validNumbers)) {
    number.classList.remove("invalid");
    number.classList.add("valid");
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }

  //validate length
  if(password.value.length >= 10) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }
}