"use strict";

const btnScrollTo = document.querySelector(".down");

const section2 = document.querySelector(".section-2");

const tabs = document.querySelectorAll(".catigories__link");
const tabsContainer = document.querySelector(
  ".catigories__headings--container"
);
const tabsContent = document.querySelectorAll(".catigories__content");

btnScrollTo.addEventListener("click", function (e) {
  e.preventDefault();
  section2.scrollIntoView({ behavior: "smooth" });
});

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
new Glide(".images", {
  type: "carousel",
  perView: 5,
  focusAt: "center",
  gap: 40,
  autoplay: 4000,
  breakpoints: {
    1200: {
      perView: 4,
    },
    800: {
      perView: 3,
    },
    600: {
      perView: 2,
    },
    400: {
      perView: 1,
    },
  },
}).mount();
