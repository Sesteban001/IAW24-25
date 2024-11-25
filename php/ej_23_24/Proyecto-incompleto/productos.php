<?php
//session_start(); // Iniciar la sesión
include('conexionbbdd.php'); // Incluir la conexión a la base de datos
$administrador=$_SESSION['administrador'];
// Verificar si el formulario ha sido enviado

    // Obtener los datos del formulario
    if (isset($administrador) &&  $administrador == 1 ){
        $nombre = $$_REQUEST['nombre'];
        $precio = $_REQUEST['precio'];
        $descripcion = $_REQUEST['descripcion'];
        $img = $_REQUEST['img'];
?>
    <html>
        <body>
            <form method="POST">
                <label for="nombre">Nombre del producto:</label>
                <input type="text" id="nombre" name="nombre" required>
                
                <label for="precio">Precio:</label>
                <input type="number" id="precio" name="precio" required>

                <label for="descripcion">Descripcion:</label>
                <textarea id="descripcion" name="descripcion" required></textarea>
                
                <label for="img">Imagen:</label>
                <input type="text" id="img" name="img">

                <input type="submit" value="Añadir Producto">
            </form>
        </body>
    </html>
<?php
    // Preparar la consulta para insertar el producto en la tabla de pedidos
    $stmt = $conn->prepare("INSERT INTO productos (nombre, precio, Descripcion, img) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $nombre, $precio, $descripcion, $img); // 'ssss' indica que todos los tipos son string

    // Ejecutar la consulta
        if ($stmt->execute()) {
            echo "Producto añadido exitosamente.";
           
        } else {
            echo "Error al añadir el producto: " . $stmt->error;
        }

        // Cerrar la declaración
        $stmt->close();
    }


    // Cerrar la conexión
$conn->close();
?>

