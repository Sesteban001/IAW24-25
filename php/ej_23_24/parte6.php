 
    <?php 
    /* session_start();
        ;  if (empty($_SESSION['contador'])) {
                $_SESSION['contador'] = 0;
            } 
            $_SESSION['contador']++;
            if ( !empty ($_POST['reiniciar'])) {
                session_destroy();
                unset($_SESSION['contador']);
                header("Location:  parte6.php");
            }
        */
    ?>
<!-- ej1
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Contador de Recargas</title>
    </head>
    <body>
        <h1>Contador de Recargas de Página</h1>
        <p>Has recargado la página  <?php //echo $_SESSION['contador']?> veces.</p>

        <form method="post">
            <input type="submit" name="reiniciar" value="Reninice contador" />
        </form>
    </body>
    </html>
 -->

<?php 
    session_start();
    $_SESSION['$VR'] = rand(1,100) ;
    $N=$_SESSION['num'];
    
    if (empty($_SESSION['contador'])) {
        $_SESSION['contador'] = 0;
    } 
    if ( $N != $VR){
        print_r($VR2);
        $_SESSION['contador'] = $_SESSION['contador']++; 
    }else{
        $_SESSION['contador']; 
    }

?>
<!DOCTYPE html>
<html lang="es">
<body>
    <form name="formulario" method="post" >
        pon un numero del 1 al 100 : <input type="text" name="num" >
        <p> numero de intentos <?php echo $_SESSION['contador']?> . </p>
        <input type="submit" />
    </form>
</body>
</html>
