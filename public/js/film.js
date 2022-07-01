"use strict";
const btnShowtimes = document.querySelector(".show__btn");
const hallSection = document.querySelector(".booking");

btnShowtimes.addEventListener("click", (e) => {
  e.preventDefault();
  hallSection.scrollIntoView({ behavior: "smooth" });
});

const section2 = document.querySelector(".section-2");

const tabs = document.querySelectorAll(".catigories__link");
const tabsContainer = document.querySelector(
  ".catigories__headings--container"
);
const tabsContent = document.querySelectorAll(".catigories__content");

// ==================Catigories=========================

tabsContainer.addEventListener("click", (e) => {
  e.preventDefault();
  const clicked = e.target.closest(".catigories__link");
  if (!clicked) return;

  // document.querySelector(".glide__slides").style.width = "2617px";

  tabs.forEach((tab) => tab.classList.remove("catigories__tab--active"));
  tabsContent.forEach((tab) =>
    tab.classList.remove("catigories__content--active")
  );

  clicked.classList.add("catigories__tab--active");
  document
    .querySelector(`.catigories__content--${clicked.dataset.tab}`)
    .classList.add("catigories__content--active");
});
