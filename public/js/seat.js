"use strict";
const seatsContainer = document.querySelector(".container");
const seats = document.querySelectorAll(".line .seat:not(.occupied)");
const seat = document.querySelectorAll(".line .seat:not(.selected)");

const count = document.getElementById("count");
const total = document.getElementById("total");
const movieSelect = document.getElementById("movie");
const confirmSeats = document.querySelector(".confirm__seat");
const attention = document.querySelector(".attention");

//===========================Seats===========================
let price = 0,
  seatsNum = 0;

  occSeats.forEach( function fun(element) {

    var l = "seat-" + element.number;
    var s = document.querySelector('[for=' + l +']');
    s.classList.remove("selected");
    s.classList.add("occupied");
    s.style.pointerEvents = "none";

    }
  );


seats.forEach((s, i) => {
  s.addEventListener("click", (e) => {
    if (!s.classList.contains("selected")) {
      s.classList.add("selected");
      price += showPrice;
      seatsNum++;
      count.textContent = seatsNum;
      total.textContent = price;
      if (seatsNum > 0 && seatsNum <= 10) {
        confirmSeats.classList.remove("off");
      }

      if (seatsNum === 10) {
        attention.classList.remove("remove");
        window.scrollTo({
          top: 0,
          behavior: "smooth",
        });
        seats.forEach((s) => {
          if (s.classList.contains("selected")) {
            s.style.pointerEvents = "auto";
          } else {
            s.style.pointerEvents = "none";
          }
        });
      }
    } else if (s.classList.contains("selected")) {
      s.classList.remove("selected");
      price -= showPrice;
      seatsNum--;

      if (seatsNum < 10) {
        attention.classList.add("remove");
        confirmSeats.classList.remove("off");
        confirmSeats.style.pointerEvents = "auto";
        seats.forEach((s) => {
          if (!s.classList.contains("occupied")) {
            s.style.pointerEvents = "auto";
          }
        });

      }

      if (seatsNum === 0) {
        confirmSeats.classList.add("off");
      }
      count.textContent = seatsNum;
      total.textContent = price;
    }
  });
});

//===========================BOOKING===========================

// confirmSeats.addEventListener("click", (e) => {
//   e.preventDefault();
//   if (!confirmSeats.classList.contains("off")) {
//     seats.forEach((seat) => {
//       if (seat.classList.contains("selected")) {
//         seat.classList.remove("selected");
//         seat.classList.add("occupied");
//         seat.style.pointerEvents = "none";
//         confirmSeats.classList.add("off");
//       }
//     });
//   }
// });
