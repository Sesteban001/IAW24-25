var Na = parseInt(document.getElementById('apuesta').value);
var res = document.getElementById('resultado');
var Ns = Math.floor(Math.random() * 11);
var bt = document.getElementById("boton");
let int = 0;

console.log('prueba de juego');

function adivinar(){
    if ( Na < 0 && Na > 11 ){
        console.log('error1');
        res.innerHTML = "Introduce un número válido";
        }
    int++;
    if ( Na === Ns){
        console.log("¡Felicidades! Has ganado en " + int + " intentos");
        res.innerHTML = "¡Felicidades! Has ganado en " + int + " intentos";
        document.getElementById("boton").disabled = true;
        return;
    } else if (Na > Ns){
         console.log('Tu numero es muy alto')
         res.innerHTML='Tu numero es muy alto'
     }else{
         console.log('Tu numero es muy bajo')
         res.innerHTML='Tu numero es muy bajo'
     }
}

bt.addEventListener("click", adivinar);