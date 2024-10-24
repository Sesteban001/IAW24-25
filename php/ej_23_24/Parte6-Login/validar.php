<?php 
$uwu = $_REQUEST['user'];
$contr = $_REQUEST['contra'];

    if ( !empty($uwu) && !empty($contr) ){
        if ( $uwu == "alu" && $contr == "123"){
        session_start();
            $_SESSION['msg'] = "has introducido el usuario y contraseña ";
            $_SESSION['user'] = $uwu;
            header("Location: secreta.php");
        }else{
            $_SESSION['msg'] = "el usuario no esta en la base de datos fallo la contraseña es mala";
            header("Location: index.php?msg=".urldecode($_SESSION['msg']));
            exit;
        }
    }else {
        $_SESSION['msg'] = "No has introducido el usuario o la contrasenia";
        header("Location: index.php?msg=".urldecode($_SESSION['msg']));
    }

?>