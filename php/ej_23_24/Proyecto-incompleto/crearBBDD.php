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
$sql = "CREATE DATABASE IF NOT EXISTS bazar";
if ($conn->query($sql) === TRUE) {
    echo "Base de datos creada exitosamente<br>";
} else {
    echo "Error al crear la base de datos o ya estaba creada: " . $conn->error . "<br>";
}

// Seleccionar la base de datos
$conn->select_db("bazar");

// Crear tabla de usuarios
$sql = "CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE,
    contrasena VARCHAR(255) NOT NULL,
    fecha_registro DATE DEFAULT CURRENT_DATE,
    administrador TINYINT DEFAULT 0 CHECK (administrador IN (0, 1))
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
    fecha DATE DEFAULT CURRENT_DATE,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id),
    FOREIGN KEY (producto_id) REFERENCES productos(id)
)";
if ($conn->query($sql) === TRUE) {
    echo "Tabla 'pedidos' creada exitosamente<br>";
} else {
    echo "Error al crear la tabla 'pedidos': " . $conn->error . "<br>";
}

//creo un usuario administrador y lo insetro 
$nombre = 'santiago';
$email = 'admin@santiago.com';
$contrasena = password_hash('123', PASSWORD_DEFAULT); // Hash de la contraseña
$administrador = 1; // Valor para indicar que es administrador
$stmt = $conn->prepare("INSERT INTO usuarios (nombre, email, contrasena, administrador) VALUES (?, ?, ?, ?)");
$stmt->bind_param("sssi", $nombre, $email, $contrasena, $administrador);


if ($stmt->execute()) {
    echo "Usuario administrador creado exitosamente.";
} else {
    echo "Error al crear el usuario: " . $stmt->error;
}
//cerrar declaracion
$stmt->close();
// Cerrar conexión
$conn->close();
?>
