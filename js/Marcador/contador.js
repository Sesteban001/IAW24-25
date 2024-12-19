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

