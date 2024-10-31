<!DOCTYPE html>
<html>
<head>
    <title>Carrito de Compras</title>
</head>
<body>
    <h2>Formulario de Carrito de Compras</h2>
    <form action="procesar_compra.php" method="post">
        <h3>Productos:</h3>
        <label for="pizza1">Carbonara:</label>
        <input type="number" id="pizza1" name="pizza1" min="0" value="0"><br>
        <label for="pizza2">4 Quesos:</label>
        <input type="number" id="pizza2" name="pizza2" min="0" value="0"><br>
        <label for="pizza3">Mediterranea:</label>
        <input type="number" id="pizza3" name="pizza3" min="0" value="0"><br>

        <h3>Información de Envío:</h3>
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required><br>
        <label for="direccion">Dirección:</label>
        <input type="text" id="direccion" name="direccion" required><br>
        <label for="ciudad">Ciudad:</label>
        <input type="text" id="ciudad" name="ciudad" required><br>
        <label for="codigo_postal">Código Postal:</label>
        <input type="text" id="codigo_postal" name="codigo_postal" required><br>

        <input type="submit" value="Realizar Pedido">
    </form>
</body>
</html>
