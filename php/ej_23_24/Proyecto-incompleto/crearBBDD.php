<?php
// Configuración de la base de datos
$servidor = "localhost"; // Cambia esto si tu servidor es diferente
$usuario = "root"; // Cambia esto por tu usuario de MySQL
$contrasena = ""; // Cambia esto por tu contraseña de MySQL

// Crear conexión
$conn = new mysqli($servidor, $usuario, $contrasena);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Crear base de datos
$sql = "CREATE DATABASE IF NOT EXISTS carrito_compras";
if ($conn->query($sql) === TRUE) {
    echo "Base de datos creada exitosamente<br>";
} else {
    echo "Error al crear la base de datos o ya estaba creada: " . $conn->error . "<br>";
}

// Seleccionar la base de datos
$conn->select_db("carrito_compras");

// Crear tabla de usuarios
$sql = "CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    contrasena VARCHAR(255) NOT NULL,
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
if ($conn->query($sql) === TRUE) {
    echo "Tabla 'usuarios' creada exitosamente<br>";
} else {
    echo "Error al crear la tabla 'usuarios': " . $conn->error . "<br>";
}

// Crear tabla de productos
$sql = "CREATE TABLE IF NOT EXISTS productos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    img VARCHAR (255) NOT NULL,
    nombre VARCHAR(100) NOT NULL,
    precio DECIMAL(10, 2) NOT NULL,
    descripcion TEXT
)";
if ($conn->query($sql) === TRUE) {
    echo "Tabla 'productos' creada exitosamente<br>";
} else {
    echo "Error al crear la tabla 'productos': " . $conn->error . "<br>";
}

// Crear tabla de pedidos
$sql = "CREATE TABLE IF NOT EXISTS pedidos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT NOT NULL,
    producto_id INT NOT NULL, 
    fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id),
    FOREIGN KEY (producto_id) REFERENCES productos(id)
)";
if ($conn->query($sql) === TRUE) {
    echo "Tabla 'pedidos' creada exitosamente<br>";
} else {
    echo "Error al crear la tabla 'pedidos': " . $conn->error . "<br>";
}

// Cerrar conexión
$conn->close();
?>
