<?php
include('conexionbbdd.php');

// Verificar si se ha eliminado un producto del carrito
if (isset($_GET['remove'])) {
    $producto_id = $_GET['remove'];
    $carrito = $_SESSION['carrito'];
    foreach ($carrito as $key => $producto) {
        if ($producto['id'] == $producto_id) {
            unset($carrito[$key]);
            $_SESSION['carrito'] = array_values($carrito);
            break;
        }
    }
}

// Verificar si se ha vaciado el carrito
if (isset($_POST['vaciar_carrito'])) {
    unset($_SESSION['carrito']);
    $_SESSION['carrito'] = [];
}

// Obtener el contenido del carrito
$carrito = $_SESSION['carrito'] ?? [];

// Calcular el total del carrito
$total = 0;
foreach ($carrito as $producto) {
    $total += $producto['precio'];
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito</title>
    <link rel="stylesheet" href="stilos.css">
</head>
<body>
    <header>
        <h1>Resumen lista para Comprar</h1>
    </header>
    <main>
        <table border="1" class="carrito">
            <tr>
                <th>Producto</th>
                <th>Precio</th>
                <th>Eliminar</th>
            </tr>
            <?php if (count($carrito) > 0): ?>
                <?php foreach ($carrito as $producto): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($producto['nombre']); ?></td>
                        <td><?php echo htmlspecialchars($producto['precio']); ?>€</td>
                        <td><a href="carro.php?remove=<?php echo htmlspecialchars($producto['id']); ?>">Eliminar</a></td>
                    </tr>
                    
                <?php endforeach; ?>
                <tr>
                    <td>
                        <?php if (count($carrito) > 0): ?>
                            <div class="total">
                                <p>Total </p>
                    <td>
                                <?php echo $total."€"; ?>      
                            </div>
                        <?php endif; ?>
                    </td>
                    <td>
                        <form action="pedidos.php" method="post">
                            <input type="submit" value="Finalizar compra">
                        </form>
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <form action="carro.php" method="post">
                            <input type="submit" name="vaciar_carrito" value="Vaciar Carrito">
                        </form>
                    </td>
                </tr>
            <?php else: ?>
                <tr>
                    <td colspan="3">El carrito está vacío.</td>
                </tr>
            <?php endif; ?>
        </table>

        <tr>
            <td>
                <form action="index.php" method="POST">
                    <input type="submit" value="Pagina Principal">
                </form>
            </td>
        </tr>
    </main>

    <footer>
        <p>&copy; 2024 Bazar Online.</p>
    </footer>
</body>
</html>