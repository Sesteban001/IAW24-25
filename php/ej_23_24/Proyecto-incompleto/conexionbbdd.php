<?php
$servidor = "localhost"; // Cambia esto si tu servidor es diferente
$usuario = "root"; // Cambia esto por tu usuario de MySQL
$contrasena = ""; // Cambia esto por tu contraseña de MySQL
$bbdd = "bazar"; // Nombre de la base de datos

// Crear conexión
$conn = new mysqli($servidor, $usuario, $contrasena);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Verificar si la base de datos existe
$result = $conn->query("SHOW DATABASES LIKE '$bbdd'");

if ($result && $result->num_rows > 0) {
    echo "La base de datos está operativa.";
} else {
    // Incluir el script para crear la base de datos
    include('crearBBDD.php');
}

// Iniciar sesión
session_start();

// Conectar a la base de datos
$conn = new mysqli($servidor, $usuario, $contrasena, $bbdd);
    
// Verificar conexión a la base de datos
if ($conn->connect_error) {
    die("Conexión a la base de datos fallida: " . $conn->connect_error);
}

// Aquí puedes continuar con el resto de tu código para trabajar con la base de datos

// Cerrar la conexión
//$conn->close();

?>