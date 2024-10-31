<?php
session_start(); // Iniciar la sesión

// Simulando la verificación de usuario y contraseña
$usuarioValido = "usuario"; // Cambia esto por tu lógica de validación
$contraseñaValida = "contrasenia"; // Cambia esto por tu lógica de validación

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = htmlspecialchars($_POST['User']);
    $contraseña = htmlspecialchars($_POST['con']);

    // Verificar las credenciales
    if ($usuario === $usuarioValido && $contraseña === $contraseñaValida) {
        $_SESSION['User'] = $usuario; // Guardar el usuario en la sesión
        $_SESSION['con'] = $contraseña; // Guardar la contraseña en la sesión (no recomendado)
        header("Location: index.php"); // Redirigir a la página principal
    } else {
        echo "Usuario o contraseña incorrectos.";
    }
}
?>