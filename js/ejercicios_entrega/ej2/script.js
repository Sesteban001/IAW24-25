var formulario = document.querySelectorAll('formulario');
var nombre = document.getElementById('nombre').value;
var apellido = document.getElementById('apellido').value;
var con1 = document.getElementById('password').value;
var con2 = document.getElementById('cpassword').value;
var edad = document.getElementById('edad').value;
var msg = document.getElementById('mensaje').textContent;
var bt = document.getElementById('boton');

var contrasenas = [con1, con2];

/*
El botón de enviar aparecerá deshabilitado y se habilitará cuando se cumplan todas las validaciones.
Aunque se habilitará el botón (manualmente) el formulario no debe enviarse sino se cumplen todas las validaciones.
Cada validación tendrá un mensaje asociado que indicará al usuarios que está fallando.
Todas o algunas validaciones deben detectarse en tiempo real, conforme el usuario escribe, y los mensajes asociados reaccionan de acuerdo a lo que el usuario esté escribiendo.
Se hacen al menos 3 validaciones distintas (un número dentro de un rango, longitud de cadena de texto, que dos contraseñas sean iguales, empieza por una letra, acaba por una letra, etc.)

*/
formulario.addEventListener('click', (event)=>{
    event.preventDefault();
});
nombre.addEventListener('input', function vnom(){
        if ( nombre.length >= 3 && nombre.length <= 20){
            msg='La longitud esta dentro de la longitud'
            if (/^[a-zA-Z]+$/.test(nombre)){
                msg='El nombre tiene letras';
                validateForm();
            }else{
                msg='tiene numeros no valido';
            }
        }else{
            msg='tiene mas o menos de la longitud permitida';
        }
});
 apellido.addEventListener('input', function vap(){
    if ( apellido.length <= 3 && apellido.length >= 20){
        msg='La longitud esta dentro de la longitud'
        if (/^[a-zA-Z]+$/.test(apellido)){
            msg='El nombre tiene letras';
            validateForm();
        }else{
            msg='tiene numeros no valido';
        }
    }else{
        msg='tiene mas o menos de la longitud permitida';
    }
});
contrasenas.addEventListener('input', function vcon(){
    if (con1 === con2 ){
        msg='las contraseñas son iguales';
        if (con2.length >=3 && con2.length <=16){
            msg='La longitud esta dentro de la longitud';
            validateForm();
        }else{
            msg='tiene mas o menos de la longitud permitida';
        }
    }else{
        msg='tiene mas o menos de la longitud permitida';
    }
    
});
edad.addEventListener('input', function ved(){
    if (edad >= 16 && edad <= 30 ){
        msg='La edad es correcta';
        validateForm();
    }else{
        msg='tiene mas o menos de la edad permitida';
    }
});
function validateForm() {
    var valnom=vnom();
    var valap=vap();
    var valcon=vcon();
    var valed=ved();
   
   if(valap && valnom && valed && valco){
      boton.disabled=false; 
   }else{
      boton.disabled=true; 
   }
}