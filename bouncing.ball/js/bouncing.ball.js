const startButton = document.getElementById('start');
const stopButton = document.getElementById('stop');
const frameElement = document.getElementById('frame');
const ballElement = document.getElementById('ball');
const frameWidth = parseFloat(getComputedStyle(frameElement).width);
const movement = Number(prompt('Enter speed of movement between 1 and 100: \n 1-Very Slow speed of ball movement \n 100-Very Fast speed of ball movement'));
let animationId = null;
let ballDirection = 1;
const xMin = 0;

const moveBall = () => {
    const ballWidth = parseFloat(getComputedStyle(ballElement).width);
    const xBall = parseFloat(getComputedStyle(ballElement).left);
    if (xBall + ballWidth > frameWidth || xBall < xMin) {
        ballDirection *= -1;
    }
    ballElement.style.left = (xBall + movement * ballDirection) + "px";
    animationId = requestAnimationFrame(moveBall);
}

startButton.addEventListener("click", () => {
    startButton.disabled = true;
    stopButton.disabled = false;
    animationId = requestAnimationFrame(moveBall);
});

stopButton.addEventListener("click", () => {
    startButton.disabled = false;
    stopButton.disabled = true;
    cancelAnimationFrame(animationId);
});