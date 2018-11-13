const buttonElement = document.getElementById("button");
const counterElement = document.getElementById("counter");
let countSeconds;
let start = false;

buttonElement.addEventListener("click", () => {
    if (!start) {
        countSeconds = setInterval(() => {
            const counter = Number(counterElement.textContent);
            counterElement.textContent = counter + 1;
        }, 1000);
        buttonElement.textContent = "STOP";
    } else {
        clearInterval(countSeconds);
        buttonElement.textContent = 'START';
    }
    start = !start;
});