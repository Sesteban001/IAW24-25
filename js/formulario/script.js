document.getElementById('formu').addEventListener('submit', function(event) {
    event.preventDefault(); // Evitar el envío del formulario hasta que se valide

    // Obtener los valores de los campos
    const nombre = document.getElementById('nombre').value;
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;
    const confirmPassword = document.getElementById('confirm_password').value;

    // Inicializar la visibilidad de los mensajes de error
    const mensajes = document.querySelectorAll('.mal');
    mensajes.forEach(mensaje => mensaje.style.display = 'none');

    let isValid = true;

    // Validar nombre
    if (nombre.length < 2 || nombre.length > 5) {
        document.getElementById('Va4').style.display = 'block';
        isValid = false;
    }

    // Validar email
    if (email.trim() === '') {
        document.getElementById('Va3').style.display = 'block';
        isValid = false;
    }

    // Validar contraseña
    if (password.length < 5) {
        document.getElementById('Va2').style.display = 'block';
        isValid = false;
    }

    // Validar confirmación de contraseña
    if (password !== confirmPassword) {
        document.getElementById('Va1').style.display = 'block';
        isValid = false;
    }

    // Si todo es válido, enviar el formulario
    if (isValid) {
        this.submit(); // Enviar el formulario
    }
});
