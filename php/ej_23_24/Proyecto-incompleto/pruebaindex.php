<?php 
include('conexionbbdd.php'); 
//session_start(); // Asegúrate de iniciar la sesión
if (!empty($_SESSION['nombre'])) {
    $nombre_usuario = $_SESSION['nombre'];
} else {
   // $nombre_usuario = "Invitado"; // O cualquier otro valor predeterminado
    echo "no esta registrado";
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bazar Online</title>
    <link rel="stylesheet" href="stilos.css"> <!-- Enlaza a un archivo CSS para estilos -->
</head>
<body>
    <header>
        <h1>Bienvenido a Nuestro Bazar <?php echo htmlspecialchars($nombre_usuario)."👌";?></h1>
    </header>
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
        <table border='1'>
            <tr>
                <!--<th>ID</th> -->
                <th>Imagen</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Descripción</th>
            </tr>
            <!-- Consulta para obtener los productos -->
            <?php
            $sql = "SELECT img, nombre, precio, Descripcion FROM productos"; // Asegúrate de que estos campos existan en tu tabla
            $result = $conn->query($sql);

            // Verificar si hay productos
            if ($result->num_rows > 0) {
                // Recorrer los productos de la base de datos
                while($row = $result->fetch_assoc()) { 
                    echo "<tr>";
                        //echo "<td>".$row['ID']."</td>";
                        echo "<td><img src='" . htmlspecialchars($row['img']) . 
                             "' alt='Imagen de " . htmlspecialchars($row['nombre']) . "' style='width:100px;'></td>"; // Muestra la imagen
                        echo "<td>" . htmlspecialchars($row['nombre']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['precio']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['Descripcion']) . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No se encontraron productos.</td></tr>";
            }

            // Cerrar la conexión
            $conn->close();
            ?>
        </table>
    </main>
   
    <footer>
        <p>&copy; 2024 Bazar Online.</p>
        <p>santiago esteban medina</p>
    </footer>
</body>
</html>
