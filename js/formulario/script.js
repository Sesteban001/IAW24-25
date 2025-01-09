const nombre = document.getElementById('nombre');
const email = document.getElementById('email');
const password = document.getElementById('password');
const confirmPassword = document.getElementById('confirm_password');
const boton = document.getElementById('boton');
const mensajes = document.querySelectorAll('.mal');
const mensajeExito = document.getElementById('mensajeExito');

function mostrarMensaje(mensajeId, esValido) {
    const mensaje = document.getElementById(mensajeId);
    mensaje.style.display = 'block'; // Asegurarse de que el mensaje esté visible
    mensaje.style.color = esValido ? 'green' : 'red'; // Cambiar color según validez
    console.log(esValido ? `Validación exitosa: ${mensajeId}` : `Error de validación: ${mensajeId}`);
}

function validarNombre() {
    const nombreValue = nombre.value;
    if (nombreValue.length < 3 || nombreValue.length > 5) {
        mostrarMensaje('Va4', false);
        return false;
    } else {
        mostrarMensaje('Va4', true);
        return true;
    }
}

function validarEmail() {
    if (email.value.trim() === '') {
        mostrarMensaje('Va3', false);
        return false;
    } else {
        mostrarMensaje('Va3', true);
        return true;
    }
}

function validarPassword() {
    if (password.value.length < 5) {
        mostrarMensaje('Va2', false);
        return false;
    } else {
        mostrarMensaje('Va2', true);
        return true;
    }
}

function validarConfirmPassword() {
    if (password.value !== confirmPassword.value) {
        mostrarMensaje('Va1', false);
        return false;
    } else {
        mostrarMensaje('Va1', true);
        return true;
    }
}

function validarFormulario() {
    const validNombre = validarNombre();
    const validEmail = validarEmail();
    const validPassword = validarPassword();
    const validConfirmPassword = validarConfirmPassword();

    // Habilitar o deshabilitar el botón según las validaciones
    if (validNombre && validEmail && validPassword && validConfirmPassword) {
        boton.disabled = false;
        boton.classList.add('enabled');
        mensajeExito.style.display = 'block'; // Mostrar mensaje de éxito
        console.log("Formulario válido. Botón habilitado.");
    } else {
        boton.disabled = true;
        boton.classList.remove('enabled');
        mensajeExito.style.display = 'none'; // Ocultar mensaje de éxito
        console.log("Formulario inválido. Botón deshabilitado.");
    }
}

// Agregar eventos de entrada para validaciones en tiempo real
nombre.addEventListener('input', validarFormulario);
email.addEventListener('input', validarFormulario);
password.addEventListener('input', validarFormulario);
confirmPassword.addEventListener('input', validarFormulario);

// Validar al enviar el formulario
document.getElementById('formu').addEventListener('submit', function(event) {
    if (!validarFormulario()) {
        event.preventDefault(); // Evitar el envío si hay errores
        console.log("Envío del formulario prevenido debido a errores de validación.");
    } else {
        console.log("Formulario enviado exitosamente.");
    }
});
