<?php 
//iniciar las variables
$nombre_usuario = "";
$carrito = "";

//conexion a la base de datos
include('conexionbbdd.php'); 

if (!empty($_SESSION['nombre'])) {
    $nombre_usuario = $_SESSION['nombre'];
    $rol = $_SESSION['administrador'] ; //?? 0 
} else {
   // $nombre_usuario = "Invitado" = " "; // O cualquier otro valor predeterminado
    echo "no esta registrado";
}

//inicio de contador 
if (!isset($_SESSION['contador'])) {
    $_SESSION['contador'] = 0;
}

// Verificar si se ha hecho clic en el enlace "Añadir"
if (isset($_POST['add'])) {
    $_SESSION['contador']++; // Incrementar el contador
}

// Inicializar el carrito
if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = [];
}

// Verificar si se ha hecho clic en el enlace "Añadir" a través de la URL
if (isset($_GET['add'])) {
    $producto_id = $_GET['add'];

    // Consulta para obtener el producto por ID
    $sql = "SELECT * FROM productos WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $producto_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $producto = $result->fetch_assoc();
        // Añadir el producto al carrito
        $_SESSION['carrito'][] = [
            'id' => $producto['id'],
            'nombre' => $producto['nombre'],
            'precio' => $producto['precio'],
        ];
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bazar Online</title>
    <link rel="stylesheet" href="stilos.css"> 
</head>
<body>
    <header>
        <h1>Bienvenido a Nuestro Bazar <?php echo htmlspecialchars($nombre_usuario)."  👌";?></h1>
    </header>
    <?php if (isset($_SESSION['nombre'])): ?>
        <tbody>
            <form action="logout.php" method="POST">
                <input type="submit" value="Log out">
           <!--     <p><?php //var_dump($rol); ?></p>-->
            </form>
            <?php if ($rol == 1) { ?>
                <form action="administrador.php" method="POST">
                    <input type="submit" value="Modo Administrador">
                </form>
            <?php } ?>
        </tbody>
    <?php endif; ?>
    <!-- Mostrar el botón de registro solo si no hay un usuario logueado -->
    <?php
        if (empty($_SESSION['nombre'])) { // Cambia 'usuario' por el nombre de la variable de sesión que uses
    ?>
        <form method="POST" action="login.php"> 
            <input type="submit" value="Log in">
        </form>
        <form action="registro.php" method="GET">
            <input type="submit" value="Log up">
        </form>
    <?php } ?>
    <main>
        <h2>Productos</h2>
        <table border='1' class="productos">
            <tr>
                <th>ID</th>
                <th>Imagen</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Descripción</th>
                <th>Añadir</th>
            </tr>
            <!-- Consulta para obtener los productos -->
            <?php
            $sql = "SELECT * FROM productos"; // Asegúrate de que estos campos existan en tu tabla
            $result = $conn->query($sql);

            // Verificar si hay productos
            if ($result->num_rows > 0) {
                // Recorrer los productos de la base de datos
                while($row = $result->fetch_assoc()) { 
                    echo "<tr>";
                        echo "<td>".htmlspecialchars($row['id'])."</td>";
                        echo "<td><img src='" . htmlspecialchars($row['img']) . 
                             "' alt='Imagen de " . htmlspecialchars($row['nombre']) . "' style='width:100px;'></td>"; // Muestra la imagen
                        echo "<td>". htmlspecialchars($row['nombre']) . "</td>";
                        echo "<td>". htmlspecialchars($row['precio']) . "</td>";
                        echo "<td>". htmlspecialchars($row['descripcion']) . "</td>";
                        echo "<td><a href='pruebaindex.php?add=" . htmlspecialchars($row['id']) . "'>Añadir</a></td>";
                    echo "</tr>";
                    var_dump(htmlspecialchars($row['id']));
                }
            } else {
                echo "<tr><td colspan='5'>No se encontraron productos.</td></tr>";
            }
            // Cerrar la conexión
            //$conn->close();
            ?>
        </table>
        <?php 
            if (!empty($_SESSION['carrito'])) {
                echo "<h3>Contenido del Carrito:</h3>";
                echo "<ul>";
                foreach ($_SESSION['carrito'] as $producto) {
                    echo "<li>" . htmlspecialchars($producto['nombre']) . " - $" . htmlspecialchars($producto['precio']) . "</li>";
                }
                echo "</ul>";
            } else {
                echo "<p>El carrito está vacío.</p>";
            }
        $conn->close();
        ?>
    </main>
   
    <footer>
        <p>&copy; 2024 Bazar Online.</p>
        <p2>santiago esteban medina</p2>
    </footer>
</body>
</html>
