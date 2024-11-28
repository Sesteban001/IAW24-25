<?php
//session_start();
include('conexionbbdd.php'); // Asegúrate de que este archivo esté configurado correctamente

// Obtener productos
$result_productos = $conn->query("SELECT * FROM productos");

// Obtener usuarios
$result_usuarios = $conn->query("SELECT * FROM usuarios");

// Obtener pedidos
$result_pedidos = $conn->query("SELECT p.id, u.nombre AS nombre_usuario, u.id AS id_usuario, p.productos_comprados, p.total_precio, p.fecha  FROM pedidos p JOIN usuarios u ON p.usuario = u.id");

if (!$result_pedidos) {
    die("Error en la consulta de pedidos: " . $conn->error);
}


?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel de Administración</title>
</head>
<body>
    <h1>Panel de Administración</h1>

    <h2>Productos</h2>
    <form action="productos.php" method="POST">
        <input type="submit" value="Añadir un producto">
    </form>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Descripción</th>
            <th>Borrar</th>

        </tr>
        <?php while ($row_producto = $result_productos->fetch_assoc()): ?>
        <tr>
            <td><?php echo htmlspecialchars($row_producto['id']); ?></td>
            <td><?php echo htmlspecialchars($row_producto['nombre']); ?></td>
            <td><?php echo htmlspecialchars($row_producto['precio']); ?> €</td>
            <td><?php echo htmlspecialchars($row_producto['descripcion']); ?></td>
            <td>
                <form action="administrador.php" method="POST">
                    <input type="hidden" name="id_dp" value="<?php echo htmlspecialchars($row_producto['id']); ?>">
                    <input type="submit" value="Borrar">
                </form>
            </td>
        </tr>
        <?php endwhile; ?>

    </table>

    <h2>Pedidos</h2>
    <table border="1">
        <tr>
            <th>ID_pedido</th>
            <th>ID_uusario</th>
            <th>Usuario</th>
            <th>Cantidad</th>
            <th>Precio</th>
            <th>Fecha</th>
            <th>Borrar</th>
        </tr>
        <?php while ($row_pedido = $result_pedidos->fetch_assoc()): ?>
        <tr>
            <td><?php echo htmlspecialchars($row_pedido['id']); ?></td>
            <td><?php echo htmlspecialchars($row_pedido['id_usuario']); ?></td>
            <td><?php echo htmlspecialchars($row_pedido['nombre_usuario']); ?></td>
            <td><?php echo htmlspecialchars($row_pedido['productos_comprados']); ?></td>
            <td><?php echo htmlspecialchars($row_pedido['total_precio']); ?>€</td>
            <td><?php echo htmlspecialchars($row_pedido['fecha']); ?></td>
            <td>
                <form action="administrador.php" method="POST">
                    <input type="hidden" name="id_dpe" value="<?php echo htmlspecialchars($row_pedido['id']); ?>">
                    <input type="submit" value="Borrar">
                </form>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>

    <h2>Usuarios Registrados</h2>
        <form action="registro.php" method="POST">
            <input type="submit" value="Añadir un usuario">
        </form>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Administrador</th>
            <th>Borrar</th>
        </tr>
        <?php while ($row_usuario = $result_usuarios->fetch_assoc()): ?>
        <tr>
            <td><?php echo htmlspecialchars($row_usuario['id']); ?></td>
            <td><?php echo htmlspecialchars($row_usuario['nombre']); ?></td>
            <td><?php echo htmlspecialchars($row_usuario['email']); ?></td>
            <td><?php echo htmlspecialchars($row_usuario['administrador']); ?></td>
            <td>
                <form  method="POST">
                    <input type="hidden" name="id_dpusuario" value="<?php echo htmlspecialchars($row_usuario['id']); ?>">
                    <input type="submit" value="Borrar">
                </form>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
    <br>
    <form action="index.php" method="POST">
                <input type="submit" value="Ir a Página Principal">
    </form>
</body>
</html>
<?php
if (isset($_POST['id_dp'])) {
    $producto = $_POST['id_dp'];
    // Consulta para obtener el producto por ID
    $sql = "DELETE FROM productos WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $producto);
    $stmt->execute();
    $stmt->close();
}
if (isset($_POST['id_dpe'])) {
    $pedido = $_POST['id_dpe'];

    // Consulta para obtener el producto por ID
    $sql = "DELETE FROM pedidos WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $pedido);
    $stmt->execute();
    $stmt->close();
}

//usuarios para vorrar
    if (isset($_POST['id_dpusuario'])) {
        $id_usuario = $_POST['id_dpusuario'];
    
        // Consulta para obtener el producto por ID
        $sql = "DELETE FROM usuarios WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $id_usuario);
        $stmt->execute();
        $stmt->close();
    }
?>