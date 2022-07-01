"use strict";

const btnSignup = document.getElementById("signUp");
const btnSignin = document.getElementById("signIn");
const container = document.getElementById("container");

const registrationForm = document.querySelector(".registration");
const btnForgetPassword = document.querySelector(".forgetPassword");
const btnForgetSignin = document.querySelector(".form__forget--signin");
const formPic = document.querySelector(".form__pic");
const formForget = document.querySelector(".form__forget");

const registrationOverlay = document.querySelector(".registration__overlay");

//=================================Search===============================
const loader = document.querySelector(".loader");

window.addEventListener("load", function () {
  loader.style.display = "none";
});

btnSignup.addEventListener("click", () => {
  container.classList.add("right-panel-active");
});

btnSignin.addEventListener("click", () => {
  container.classList.remove("right-panel-active");
});
btnForgetPassword.addEventListener("click", function (e) {
  e.preventDefault();
  formForget.classList.add("formal");
  formPic.classList.add("formal2");
});

btnForgetSignin.addEventListener("click", function (e) {
  e.preventDefault();
  formForget.classList.remove("formal");
  formPic.classList.remove("formal2");
  container.classList.add("right-panel-active");
});
window.addEventListener("keydown", (e) => {
  if (e.key == "Escape" && !registrationForm.classList.contains("hidden")) {
    closeModal();
  }
});
