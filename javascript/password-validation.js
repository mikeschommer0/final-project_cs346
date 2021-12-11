
let password = document.getElementById("password-signup");
password.addEventListener("focus", showBox);
password.addEventListener("blur", hideBox);
password.addEventListener("keyup", validatePassword);

let letter = document.getElementById("password-lcletter");
let capital = document.getElementById("password-ucletter");
let number = document.getElementById("password-number");
let length = document.getElementById("password-length");

//when password box is focused, show password display
function showBox() {
  document.getElementById('password-message').style.display = "block";
}

//when not in focus, hide password display
function hideBox() {
  document.getElementById('password-message').style.display = "none";
}

//validation to show what the user typed is correct
function validatePassword() {
  let validLCLetters = /[a-z]/g;
  if(this.value.match(validLCLetters)) {
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
}

  //validate capital letters
  let validUCLetters = /[A-Z]/g;
  if(this.value.match(validUCLetters)) {
    capital.classList.remove("invalid");
    capital.classList.add("valid");
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
  }

  //validate numbers
  let validNumbers = /[0-9]/g;
  if(this.value.match(validNumbers)) {
    number.classList.remove("invalid");
    number.classList.add("valid");
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }

  //validate length
  if(this.value.length >= 10) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }
}
