var boton = document.getElementById('cont');
var msg = document.getElementById('mensage');
let cuenta=0;

boton.addEventListener('click', ()=>{
    cuenta++;
    msg.innerHTML += "¡Has hecho clic "+ cuenta +" en el botón! <br>";
})


