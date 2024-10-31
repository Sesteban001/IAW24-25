<!DOCTYPE html>
<html>
<head>
    <title>Carrito de Compras</title>
</head>
<body>
<?php session_start() ?>
    <h2>Iniciar Sesion</h2>
    <table>
        <tr>
            <td>
                <form method="POST">
                    <label for="User">Usuario:</label>
                        <input type="text" id="User" name="User" required>
                </form>
                <td>
                    <form>
                        <label for="Password">Contrasenia:</label>
                        <input type="password" id="Password" name="Password" required>
                        <th><input type="submit" value="Inicio"></th>
                    </form>
                </td>
            </td>
            <form action="registro.php">
                <th><input type="submit" value="Registrar"></th>
            </form>
        </tr>
    </table>
    <?php if (empty($_SESSION['User']) && empty($_SESSION['Password'])):   ?>
            
    <?php endif; ?>

    <?php if (isset($_SESSION['User']) && isset($_SESSION['Password'])): session_start()?>
    <h2>Formulario de Carrito de Compras</h2>
    <form action="presonal.php" method="POST">
        <h3>Productos:</h3>
        <label for="pizza1">Carbonara:</label>
            <input type="number" id="pizza1" name="pizza1" min="0" value="0"><br>
        <label for="pizza2">4 Quesos:</label>
            <input type="number" id="pizza2" name="pizza2" min="0" value="0"><br>
        <label for="pizza3">Mediterranea:</label>
            <input type="number" id="pizza3" name="pizza3" min="0" value="0"><br>
        <input type="submit" value="Ordenar">
    </form>
    <?php endif; ?>
</body>
</html>
