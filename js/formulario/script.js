var vbien = document.querySelectorAll('.bien');
var vpd = document.getElementsByClassName('mal');
var nombre = document.getElementById('nombre');
var email = document.getElementById('email');
var contra = document.getElementById('password');
var cstra = document.getElementById('confirm_password');

function vnombre(){
    if ( nombre.value.length >= 2 && nombre.value.length <= 5){
        vpd = vbien ;
    }
}
function contras(){
    if ( contra.value == cstra.value ){
        if ( contra.length >= 5 ){

        }
    }
}
function emails(){
    if ( email.value != ""){

    }
}


