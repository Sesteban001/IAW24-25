
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
</head>
<body>
    <?php session_start() ?>
    <form method="POST">
        <label for="User">Usuario:</label>
            <input type="text" id="User" name="User" required>
        <label for="Password">Contraseña:</label>
            <input type="password" id="con" name="con" required>
        <input type="submit" value="Registrarse">
    </form>
    <?php
    $_SESSION['User'] = htmlspecialchars($_POST['User']);
    $_SESSION['con'] = htmlspecialchars($_POST['con']);

        if ( !empty($_SESSION['User'] && !empty($_SESSION['con']))){
            header("Location: index.php");
        } else {
            echo "No has introduicido un parametro";
        }

    ?>
</body>
</html>
