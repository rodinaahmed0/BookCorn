"use strict";
//=================================Search===============================
const loader = document.querySelector(".loader");

window.addEventListener("load", function () {
    loader.style.display = "none";
});

const dayNight = document.querySelector(".day__night");

// =================================Dark Mode=================================
let darkMode = localStorage.getItem("darkMode");

const enableDarkMode = () => {
    document.body.classList.add("dark");
    dayNight.classList.add("active");

    localStorage.setItem("darkMode", "enabled");
};

const disableDarkMode = () => {
    document.body.classList.remove("dark");
    dayNight.classList.remove("active");

    localStorage.setItem("darkMode", null);
};
if (darkMode === "enabled") {
    enableDarkMode();
} else {
    disableDarkMode();
}

dayNight.addEventListener("click", function () {
    darkMode = localStorage.getItem("darkMode");
    if (darkMode !== "enabled") {
        enableDarkMode();
    } else {
        disableDarkMode();
    }
});

//=========================== Up Button ===========================
let span = document.querySelector(".up");

window.onscroll = function () {
    this.scrollY >= 500
        ? span.classList.add("show")
        : span.classList.remove("show");
};

span.onclick = function () {
    window.scrollTo({
        top: 0,
        behavior: "smooth",
    });
};

// ================================= WIFI =============================
// const wrapper = document.querySelector(".wrapper"),
//   toast = wrapper.querySelector(".toast"),
//   title = toast.querySelector("span"),
//   subTitle = toast.querySelector("p"),
//   wifiIcon = toast.querySelector(".icon"),
//   closeIcon = toast.querySelector(".close-icon");

// window.onload = () => {
//   function ajax() {
//     let xhr = new XMLHttpRequest();
//     xhr.open("GET", "https://jsonplaceholder.typicode.com/posts", true);
//     xhr.onload = () => {
//       if (xhr.status == 200 && xhr.status < 300) {
//         toast.classList.remove("offline");
//         title.innerText = "You're online now";
//         subTitle.innerText = "Hurray! Internet is connected.";
//         wifiIcon.innerHTML = '<i class="uil uil-wifi"></i>';
//         closeIcon.onclick = () => {
//           wrapper.classList.add("hide");
//         };
//         setTimeout(() => {
//           wrapper.classList.add("hide");
//         }, 50);
//       } else {
//         offline();
//         setTimeout(() => {
//           wrapper.classList.add("hide");
//         }, 5000);
//       }
//     };
//     xhr.onerror = () => {
//       offline();
//     };
//     xhr.send();
//   }

//   function offline() {
//     wrapper.classList.remove("hide");
//     toast.classList.add("offline");
//     title.innerText = "You're offline now";
//     subTitle.innerText = "Opps! Internet is disconnected.";
//     wifiIcon.innerHTML = '<i class="uil uil-wifi-slash"></i>';
//   }
//   setInterval(() => {
//     ajax();
//   }, 100);
// };
