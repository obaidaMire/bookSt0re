let form = document.querySelector("#form");
let username = document.querySelector("#username");
let userEr = document.querySelector(".username-er");
let email = document.querySelector("#email");
let emailEr = document.querySelector(".email-er");
let password = document.querySelector("#password");
let passEr = document.querySelector(".pass-er");
let password2 = document.querySelector("#password2");
let pass2Er = document.querySelector(".pass2-er");
let fill = document.querySelector(".fill");

// username validate
let validemail =
  /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|.(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
let user = false;
let mail = false;
let pass = false;
let pass2 = false;

// username validate
username.onblur = function () {
  $.ajax({
    type: "POST",
    url: "control.php?do=checkUser",
    data: { username: username.value },
    success: function (e) {
      if (e == "exist") {
        userEr.style.display = "block";
        username.style.borderColor = "red";
        userEr.innerHTML = "This username not available";
        user = false;
      }
    },
  });
  if (username.value === "") {
    userEr.style.display = "block";
    username.style.borderColor = "red";
    userEr.innerHTML = "Username cant be empty";
  } else if (username.value.length < 5) {
    userEr.style.display = "block";
    username.style.borderColor = "red";
    userEr.innerHTML = "Username must be at least 5 characters long";
  } else {
    userEr.style.display = "none";
    username.style.borderColor = "green";
    user = true;
  }
};
// email validate
email.onblur = function () {
  if (email.value === "") {
    emailEr.style.display = "block";
    email.style.borderColor = "red";
    emailEr.innerHTML = "E-mail cant be empty";
  } else if (!email.value.match(validemail)) {
    emailEr.style.display = "block";
    email.style.borderColor = "red";
    emailEr.innerHTML = "please enter valid E-mail";
  } else {
    emailEr.style.display = "none";
    email.style.borderColor = "green";
    mail = true;
  }
};

// password validate
password.onblur = function () {
  if (password.value === "") {
    passEr.style.display = "block";
    password.style.borderColor = "red";
    passEr.innerHTML = "Password cant be empty";
  } else if (password.value.length < 8) {
    passEr.style.display = "block";
    password.style.borderColor = "red";
    passEr.innerHTML = "Password must be at least 8 characters long";
  } else {
    passEr.style.display = "none";
    password.style.borderColor = "green";
    pass = true;
  }
};
// confirm password validate
password2.onblur = function () {
  if (password2.value === "") {
    pass2Er.style.display = "block";
    password2.style.borderColor = "red";
    pass2Er.innerHTML = "please confirm password";
  } else if (password.value !== password2.value) {
    pass2Er.style.display = "block";
    password2.style.borderColor = "red";
    pass2Er.innerHTML = "Password not match";
  } else {
    pass2Er.style.display = "none";
    password2.style.borderColor = "green";
    pass2 = true;
  }
};

form.onsubmit = function (e) {
  if (!(user && mail && pass && pass2)) {
    e.preventDefault();
    fill.style.display = "block";
  }
};
