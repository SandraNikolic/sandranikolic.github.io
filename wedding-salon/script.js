/* Fuction for MORE button */

let buttons = [];
buttons.push(...document.querySelectorAll('.btndetails'));

buttons[0].addEventListener('click', function () {
    var x = document.getElementById("restaurant");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
});

buttons[1].addEventListener('click', function () {
    var x = document.getElementById("flowers");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
});

buttons[2].addEventListener('click', function () {
    var x = document.getElementById("salon");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
});