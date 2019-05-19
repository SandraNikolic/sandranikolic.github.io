/* Fuction for MORE button */

let buttons = [];
buttons.push(...document.querySelectorAll('.btnsing'));

buttons[0].addEventListener('click', function () {
    var x = document.getElementById("fiorela");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
});

buttons[1].addEventListener('click', function () {
    var x = document.getElementById("ema");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
});

buttons[2].addEventListener('click', function () {
    var x = document.getElementById("angela");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
});



