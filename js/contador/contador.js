let cuenta = 0; // Inicializa la variable cuenta

function incrementar(){
    cuenta++;
    console.log("Mi cuenta es " + cuenta);
    document.getElementById("contador").innerText = cuenta;
}

function guardar(){
    document.getElementById("guardarAnteriores").innerText = cuenta;
    document.getElementById("contador").innerText = 0;
    cuenta = 0;
    numerosguardados=[];
}

function totales(){
    var contador = {};
    // Suponiendo que tienes un array de números que deseas contar

    for (var numero of numerosguardados) {
        contador[numero] = (contador[numero] || 0) + 1;
    }
    console.log("Totales:", contador);
}

const BotonI = document.getElementById("botonIncrementar");
const BotonD = document.getElementById("botonGuardar");

BotonI.addEventListener('click', incrementar);
BotonD.addEventListener('click', guardar);

// Muestra el contador inicial
console.log(cuenta);
