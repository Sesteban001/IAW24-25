<?php 
session_start();
include('conexionbbdd.php');

// Preparar y vincular
$stmt = $conn->prepare("INSERT INTO usuarios (nombre, email, contrasena, fecha_registro) VALUES (?, ?, NOW())");
$stmt->bind_param($nombre_usuario, $email ,$contrasena);

// Ejecutar la consulta
if ($stmt->execute()) {
    echo "Registro exitoso.";
} else {
    echo "Error: " . $stmt->error;
}
 // Cerrar la declaración
$stmt->close();

$conn->close();
?>

<html>
<body>
    <h2>Registro</h2>
    <form method="POST"> 
        <table>
            <tr>
                <td>
                    <label for="nombre">Usuario:</label>
                    <input type="text" id="nombre" name="nombre" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="contrasena">Contrasenia:</label>
                    <input type="password" id="contrasena" name="contrasena" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" value="Registrarse">
                </td>
            </tr>
        </table>
    </form>
    <?php  header("Location: index.html"); ?>
</body>
</html>
