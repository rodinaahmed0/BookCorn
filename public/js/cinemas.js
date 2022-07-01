"use strict";

const btnBook = document.querySelector(".book__cinema");
const cinemasContainer = document.querySelector(".cinemas");

const header = document.querySelector(".header");
const storyContent = document.querySelector(".story__content");
btnBook.addEventListener("click", (e) => {
  e.preventDefault();
  cinemasContainer.scrollIntoView({ behavior: "smooth" });
});
// const navHeight = header.getBoundingClientRect();
// console.log(navHeight.height);

// const stickyNav = function (entries) {
//   const [entry] = entries;
//   !entry.isIntersecting
//     ? header.classList.add("sticky")
//     : header.classList.remove("sticky");
// };
// const headerObserve = new IntersectionObserver(stickyNav, {
//   root: null,
//   threshold: 0,
//   rootMargin: `-${navHeight.height}px`,
// });
// headerObserve.observe(storyContent);
