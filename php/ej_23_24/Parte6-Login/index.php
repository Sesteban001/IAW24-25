<!DOCTYPE html>
<html lang="es">
<head>
</head>
<body>
    <h2>Iniciar Sesion</h2>
        <form action="validar.php" method="POST" >
            <label for="user">Usuario:</label>
            <input type="text" id="user" name="user" >

            <label for="password">Contrasenia:</label>
            <input type="password" id="contra" name="contra" >
            <input type="submit" value="Enviar">
        </form>
        <?php 
        if ( isset($_GET['msg'])){ 
            echo"<h3>Hay mensaje</h3>";
            echo "<div class='mensaje'>".htmlspecialchars($_GET['msg'])."</div>";
        }
        ?>
        
</body>
</html>