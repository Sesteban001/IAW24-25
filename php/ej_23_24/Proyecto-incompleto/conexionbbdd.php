<?php
$servidor = "localhost"; // Cambia esto si tu servidor es diferente
$usuario = "root"; // Cambia esto por tu usuario de MySQL
$contrasena = ""; // Cambia esto por tu contraseña de MySQL
$bbdd="bazar"; //tenemos la base de datos
$conn = new mysqli($servidor, $usuario, $contrasena);

if (!empty ($conn->select_db("bazar"))){
    echo "la base de datos esta operativa";
}else   {
    include('crearBBDD.php');
}

$conn = new mysqli($servidor, $usuario, $contrasena, $bbdd);

?>