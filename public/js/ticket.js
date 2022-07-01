"use strict";

let code = document.querySelector(".qr__code");
let qrcode = new QRCode(document.querySelector("#qrcode"), {
  width: 100,
  height: 100,
  colorDark: "#000000",
  colorLight: "#ffffff",
  correctLevel: QRCode.CorrectLevel.H,
});

const chars = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
const passLength = 12;
let randomCode = "";
for (let i = 0; i < passLength; i++) {
  randomCode += chars[Math.floor(Math.random() * chars.length)];
}
code.textContent = `#${randomCode}`;

let inputValue = code.textContent;
qrcode.makeCode(inputValue);

const ticket = document.querySelector(".ticket");
const invoice = document.querySelector(".invoice__btn");
const qr = document.querySelector(".qr");
let elem = document.querySelector(".qr__circle");

var opt = {
  margin: 1,
  filename: "BookCorn.pdf",
  image: { type: "a4", quality: 0.98 },
  html2canvas: { scale: 2 },
  jsPDF: { unit: "in", format: "letter", orientation: "portrait" },
};
const printTicket = function () {
  html2pdf().set(opt).from(ticket).save();
};
const changeBackground = (e) => elem.classList.add("qr__color2");

invoice.addEventListener("click", (e) => {
  e.preventDefault();
  if (elem.classList.contains("qr__color2")) {
    elem.classList.remove("qr__color2");
  }
  elem.classList.add("qr__color");
  setTimeout(changeBackground, 100);
  printTicket();
});
