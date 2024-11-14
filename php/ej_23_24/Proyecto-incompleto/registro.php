<?php include('conexionbbdd.php'); ?>
<html>
<body>
    <h2>Registro</h2>
    <form method="post"> 
        <table>
        <tr>
                <td>
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                </td>
            </tr>
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
                    <input type="submit" value="Registrarse">
                </td>
            </tr>
        </table>
    </form>
    <?php 
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $nombre = $_POST['nombre'];
                $email = $_POST['email'];
                $contrasena = password_hash($_POST['contrasena'], PASSWORD_DEFAULT); // Hash de la contraseña
                $administrador = 0; // Valor para indicar que no es  administrador
                // Preparar y vincular
    
                    $stmt = $conn->prepare("INSERT INTO usuarios (nombre, email, contrasena, administrador) VALUES (?, ?, ?, ? )");
                    $stmt->bind_param("sssi", $nombre, $email ,$contrasena, $administrador);

            // Ejecutar la consulta
            if ($stmt->execute()) {
                echo "Registro exitoso.";
                header("Location: index.html");
                exit();
            } else {
                echo "Error: " . $stmt->error;
            }
            // Cerrar la declaración
            $stmt->close();
        }
        $conn->close();
    ?>
</body>
</html>
