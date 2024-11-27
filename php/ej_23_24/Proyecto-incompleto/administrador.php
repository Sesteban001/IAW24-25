<?php
//session_start();
include('conexionbbdd.php'); // Asegúrate de que este archivo esté configurado correctamente

// Obtener productos
$result_productos = $conn->query("SELECT * FROM productos");

// Obtener usuarios
$result_usuarios = $conn->query("SELECT * FROM usuarios");

// Obtener pedidos
$result_pedidos = $conn->query("SELECT p.id, u.nombre AS nombre_usuario, p.producto_id, p.fecha  FROM pedidos p JOIN usuarios u ON p.usuario_id = u.id");

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
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Descripción</th>
        </tr>
        <?php while ($row_producto = $result_productos->fetch_assoc()): ?>
        <tr>
            <td><?php echo htmlspecialchars($row_producto['id']); ?></td>
            <td><?php echo htmlspecialchars($row_producto['nombre']); ?></td>
            <td><?php echo htmlspecialchars($row_producto['precio']); ?></td>
            <td><?php echo htmlspecialchars($row_producto['descripcion']); ?></td>
        </tr>
        <?php endwhile; ?>
    </table>

    <h2>Pedidos</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Usuario</th>
            <th>ID Producto</th>
            <th>Cantidad</th>
            <th>Fecha</th>
        </tr>
        <?php while ($row_pedido = $result_pedidos->fetch_assoc()): ?>
        <tr>
            <td><?php echo htmlspecialchars($row_pedido['id']); ?></td>
            <td><?php echo htmlspecialchars($row_pedido['nombre_usuario']); ?></td>
            <td><?php echo htmlspecialchars($row_pedido['producto_id']); ?></td>
            <td><?php echo "";//htmlspecialchars($row_pedido['cantidad']); ?></td>
            <td><?php echo htmlspecialchars($row_pedido['fecha']); ?></td>
        </tr>
        <?php endwhile; ?>
    </table>

    <h2>Usuarios Registrados</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Borrar</th>
            <th>Añadir</th>
        </tr>
        <?php while ($row_usuario = $result_usuarios->fetch_assoc()): ?>
        <tr>
            <td><?php echo htmlspecialchars($row_usuario['id']); ?></td>
            <td><?php echo htmlspecialchars($row_usuario['nombre']); ?></td>
            <td><?php echo htmlspecialchars($row_usuario['email']); ?></td>
            <td>
                <form action="administrador.php" method="POST">
                    <input type="hidden" name="id_dpusuario" value="<?php echo htmlspecialchars($row_usuario['id']); ?>">
                    <input type="submit" value="Borrar">
                </form>
            </td>
            <td>
            <form action="registro.php" method="POST">
                    <input type="hidden" name="id_adusuario" value="<?php echo htmlspecialchars($row_usuario['id']); ?>">
                    <input type="submit" value="Añadir">
                </form>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
    <br>
    <form action="pruebaindex.php" method="POST">
                <input type="submit" value="Ir a Página Principal">
    </form>
</body>
</html>
<?php
//usuarios para vorrar
    if (!empty($_POST('id_dpusuario'))){

        $sql = "DELETE FROM usuarios WHERE id = $id_usuario" ;
        $conn->query($sql);

        header("Location: administrador.php");

    
}
?>