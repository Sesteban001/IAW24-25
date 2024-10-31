<?php
    session_start();
    if (!empty($_SESSION['user'])){
?>

<!DOCTYPE html>
<html lang="es">
<body>
    <h2>Sesión de secretaria</h2>
    <form action="deslogarse.pgp">
        <input type="submit" value="Login">
    </form>
</body>
</html>
<?php
    }else{
        $_SESSION['msg'] = "no has iniciado session";
        header("Location: index.php?msg=".urldecode($_SESSION['msg']));
    }
?>