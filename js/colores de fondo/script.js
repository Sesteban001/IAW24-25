// Obtener todos los botones de color
var botones = document.querySelectorAll('.color-button');

// Agregar un evento de clic a cada botón
botones.forEach(button => {
    button.addEventListener('click', function() {
        // Obtener el color del botón que se ha clicado
        let color = this.getAttribute('data-color');
        // Cambiar el color de fondo del body
        document.body.style.backgroundColor = color;
    });
});


