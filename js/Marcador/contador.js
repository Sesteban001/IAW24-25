// Cogemos los div de los dos marcadores
let loc = document.getElementById("score-a");
let vis = document.getElementById("score-b");
var time = document.getElementsByClassName("time-buttons")

// Función para score A = locA
function valA(puntos) {
    let tempA = parseInt(loc.innerText) || 0; // Convierte el texto a número, o 0 si no es un número
    tempA += puntos; // Suma los puntos
    loc.innerText = tempA; // Actualiza el texto del elemento
}

// Función para score B = locB
function valB(puntos) {
    let tempB = parseInt(vis.innerText) || 0; // Convierte el texto a número, o 0 si no es un número
    tempB += puntos; // Suma los puntos
    vis.innerText = tempB; // Actualiza el texto del elemento
}

/*
let scoreA = 0;
let scoreB = 0;
let timeLeft = 0;
let timerInterval;

// Function to update the score for Team A
function valA(points) {
  scoreA += points;
  document.getElementById("score-a").textContent = scoreA;
}

// Function to update the score for Team B
function valB(points) {
  scoreB += points;
  document.getElementById("score-b").textContent = scoreB;
}

// Function to start the timer
function startTimer() {
  timeLeft = 600; // 10 minutes in seconds
  updateTimer();
  timerInterval = setInterval(updateTimer, 1000);
  document.getElementById("start-btn").disabled = true;
  document.getElementById("pause-btn").disabled = false;
}

// Function to pause the timer
function pauseTimer() {
  clearInterval(timerInterval);
  document.getElementById("start-btn").disabled = false;
  document.getElementById("pause-btn").disabled = true;
}

// Function to update the timer display
function updateTimer() {
  const minutes = Math.floor(timeLeft / 60);
  const seconds = timeLeft % 60;
  document.getElementById("time").textContent = `${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;

  if (timeLeft === 0) {
    clearInterval(timerInterval);
    alert("Time's up!");
  } else {
    timeLeft--;
  }
}

// Add event listeners to the buttons
document.getElementById("start-btn").addEventListener("click", startTimer);
document.getElementById("pause-btn").addEventListener("click", pauseTimer);
*/