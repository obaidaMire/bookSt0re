let form = document.querySelector("#form");
let username = document.querySelector("#username");
let userEr = document.querySelector(".username-er");
let password = document.querySelector("#password");
let passEr = document.querySelector(".pass-er");
let fill = document.querySelector(".fill");

let user = false;
let pass = false;

// username validate
username.onblur = function () {
  if (username.value === "") {
    userEr.style.display = "block";
    username.style.borderColor = "red";
    userEr.innerHTML = "Username cant be empty";
  } else {
    userEr.style.display = "none";
    username.style.borderColor = "green";
    user = true;
  }
};

password.onblur = function () {
  // password validate
  if (password.value === "") {
    passEr.style.display = "block";
    password.style.borderColor = "red";
    passEr.innerHTML = "Password cant be empty";
  } else {
    passEr.style.display = "none";
    password.style.borderColor = "green";
    pass = true;
  }
};
form.onsubmit = function (e) {
  if (!(user && pass)) {
    e.preventDefault();
    fill.style.display = "block";
  }
};