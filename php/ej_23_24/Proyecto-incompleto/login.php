<?php
session_start(); // Iniciar la sesión

// Incluir el archivo de conexión a la base de datos
include('conexionbbdd.php'); // Asegúrate de que este archivo esté configurado correctamente

// Verificar si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $contrasena = $_POST['contrasena'];

    // Preparar la consulta para buscar el usuario por email
    $stmt = $conn->prepare("SELECT nombre, contrasena FROM usuarios WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    // Verificar si el usuario existe
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($nombre, $hashed_password);
        $stmt->fetch();

        // Verificar la contraseña
        if (password_verify($contrasena, $hashed_password)) {
            // Contraseña correcta, iniciar sesión
            $_SESSION['nombre'] = $nombre; // Guardar el nombre en la sesión
            echo "Inicio de sesión exitoso. Bienvenido, " . htmlspecialchars($nombre) . "!";
            // Redirigir a la página principal o a otra página
            header("Location: index.html");
            exit();
        } else {
            echo "Contraseña incorrecta.";
        }
    } else {
        echo "No se encontró un usuario con ese email.";
    }

    // Cerrar la declaración
    $stmt->close();
}

// Cerrar la conexión
$conn->close();
?>
<!DOCTYPE html>
<html>
<body>
    <h2>Iniciar Sesión</h2>
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
                    <label for="contrasena">Contraseña:</label>
                    <input type="password" id="contrasena" name="contrasena" required>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" value="Iniciar Sesión">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>