<!DOCTYPE html>
<html>
<head>
    <title>Carrito de Compras</title>
</head>
<body>
<?php session_start()   ?>
    <h2>Iniciar Sesion</h2>
    <form method="POST" action="login.php"> 
        <table>
            <tr>
                <td>
                    <label for="User">Usuario:</label>
                    <input type="text" id="User" name="User" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="con">Contrasenia:</label>
                    <input type="password" id="con" name="con" required>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" value="Log in">
                </td>
            </tr>
        </table>
    </form>
    <form action="registro.php" method="GET">
            <input type="submit" value="Log up">
    </form>
   
        

    <?php if (!empty($_SESSION['User']) && !empty($_SESSION['con'])): ?>
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
    <?php else: ?>
            <p> No has introducido bien los valores </p>
    <?php endif; ?>
</body>
</html>
