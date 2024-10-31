<?php session_start();

$pro1 = $_POST['pizza1'];
$pro2 = $_POST['pizza2'];
$pro3 = $_POST['pizza3'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
</head>
<body>
    <h1>Bienvenido, <?php echo htmlspecialchars($usuario); ?>!</h1>
    <h2>Lista de Productos</h2>
    <ul>
        <?php foreach ($productos as $producto): ?>
            <li><?php echo htmlspecialchars($producto); ?></li>
        <?php endforeach; ?>
    </ul>
    <a href="logout.php">Cerrar sesión</a> <!-- Enlace para cerrar sesión -->
</body>
</html>

