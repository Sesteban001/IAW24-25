<?php
//session_start(); // Iniciar la sesión
include('conexionbbdd.php'); // Incluir la conexión a la base de datos
$administrador=$_SESSION['administrador'];
// Verificar si el formulario ha sido enviado

    // Obtener los datos del formulario
    if (isset($administrador) &&  $administrador == 1 ){

?>
    <html>
        <body>
        <form method="POST">
            <table>
                <tr>
                    <td>
                        <label for="nombre">Nombre del producto:</label>
                        <input type="text" id="nombre" name="nombre" required>
                    </td>
                </tr>   
                <tr>
                    <td>
                        <label for="precio">Precio:</label>
                        <input type="number" id="precio" name="precio" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="descripcion">Descripcion:</label>
                        <textarea id="descripcion" name="descripcion" required></textarea>
                    </td>
                </tr>
                <tr>
                
                    <td>
                        <label for="img">Imagen:</label>
                        <input type="text" id="img" name="img">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" value="Añadir Producto">
                    </td>
                </tr>
            </table>
        </form>
        <form action="administrador.php"> 
            <input type="submit" value="Administrador">
        </form>   
        </body>
    </html>
<?php
        $nombre = $_POST['nombre'];
        $precio = $_POST['precio'];
        $descripcion = $_POST['descripcion'];
        $img = $_POST['img'];
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

