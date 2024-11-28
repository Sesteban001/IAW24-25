<?php
include('conexionbbdd.php'); 

$conn->close();
session_unset();
session_destroy();

header("Location: index.php");
?>