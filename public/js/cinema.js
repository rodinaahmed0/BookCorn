"use strict";
const btnBook = document.querySelector(".book__cinema");
const filmsContainer = document.querySelector(".films");

const header = document.querySelector(".header");
const storyContent = document.querySelector(".story__content");
btnBook.addEventListener("click", (e) => {
  e.preventDefault();
  filmsContainer.scrollIntoView({ behavior: "smooth" });
});
