// if( document.readyState !== 'loading' ) {
//   console.log( 'document is already ready, just execute code here' );
//   myInitCode();
// } else {
//   document.addEventListener('DOMContentLoaded', function () {
//       console.log( 'document was not ready, place code here' );
//       myInitCode();
//   });
// }

let password = document.getElementById("password-signup");
password.addEventListener("focus", showBox);
password.addEventListener("blur", hideBox);
password.addEventListener("keyup", validatePassword);

let letter = document.getElementById("password-lcletter");
let capital = document.getElementById("password-ucletter");
let number = document.getElementById("password-number");
let length = document.getElementById("password-length");

function showBox() {
  document.getElementById('password-message').style.display = "block";
}

function hideBox() {
  document.getElementById('password-message').style.display = "none";
}

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
