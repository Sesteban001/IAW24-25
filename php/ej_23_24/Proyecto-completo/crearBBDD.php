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
    img VARCHAR (255),
    nombre VARCHAR(100) NOT NULL,
    precio DECIMAL(10, 2) NOT NULL,
    descripcion VARCHAR(100)
)";
if ($conn->query($sql) === TRUE) {
    echo "Tabla 'productos' creada exitosamente<br>";
} else {
    echo "Error al crear la tabla 'productos': " . $conn->error . "<br>";
}

// Crear tabla de pedidos
$sql = "CREATE TABLE IF NOT EXISTS pedidos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario INT NOT NULL,
    productos_comprados INT NOT NULL,
    total_precio DECIMAL(10, 2) NOT NULL,
    fecha DATE DEFAULT CURRENT_DATE,
    FOREIGN KEY (usuario) REFERENCES usuarios(id)

)";
if ($conn->query($sql) === TRUE) {
    echo "Tabla 'pedidos' creada exitosamente<br>";
} else {
    echo "Error al crear la tabla 'pedidos': " . $conn->error . "<br>";
}
/*
//crear los detalles del pedido
    $sql = "CREATE TABLE IF NOT EXISTS pedidos_detalle (
        id INT AUTO_INCREMENT PRIMARY KEY,
        pedido_id INT ,
        producto_id INT ,
        cantidad INT NOT NULL,
        precio DECIMAL(10, 2) NOT NULL,
        FOREIGN KEY (producto_id) REFERENCES productos(id),
        FOREIGN KEY (pedido_id) REFERENCES pedidos(id)

    )";
    if ($conn->query($sql) === TRUE) {
        echo "Tabla 'pedidos' creada exitosamente<br>";
    } else {
        echo "Error al crear la tabla 'pedidos': " . $conn->error . "<br>";
    }
*/
//creo un usuario administrador y lo insetro 
$nombre = 'santiago';
$email = 'admin@bazar.es';
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
$sql = "INSERT INTO productos (nombre, descripcion, precio, img) VALUES 
('Camiseta básica', 'Camiseta de algodón 100%, disponible en varios colores', 15.99, 'img/camiseta.jpg'),
('Pantalones vaqueros', 'Pantalones vaqueros de corte ajustado, con bolsillos', 39.99, 'img/pantalon.jpg'),
('Zapatos deportivos', 'Zapatos deportivos ligeros y cómodos para uso diario', 49.99, 'img/zapatos_deportivos.webp'),
('Bolso de mano', 'Bolso de cuero sintético con varios compartimentos', 29.99, 'img/bolso.webp'),
('Reloj de pulsera', 'Reloj de pulsera con correa de cuero y esfera analógica', 89.99, 'img/relog.webp'),
('Gafas de sol', 'Gafas de sol con protección UV y diseño moderno', 19.99, 'img/gafas.jpg'),
('Cartera de hombre', 'Cartera de cuero con múltiples ranuras para tarjetas', 24.99, 'img/cartera.jpg'),
('Vestido de verano', 'Vestido ligero de tela suave, ideal para el verano', 34.99, 'img/vestido.jpg'),
('Zapatillas de casa', 'Zapatillas de casa cómodas con suela antideslizante', 14.99, 'img/zapatillas_casa.webp'),
('Mochila escolar', 'Mochila espaciosa con varios compartimentos y diseño ergonómico', 49.99, 'img/mochila.webp')
";
$conn -> query($sql);

// Cerrar conexión
$conn->close();
?>
