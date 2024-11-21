<?php
//session_start(); // Iniciar la sesión
include('conexionbbdd.php'); // Asegúrate de que este archivo esté configurado correctamente

// Verificar si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar que al menos uno de los campos esté lleno
    if (!empty($_POST['nombre']) && !empty($_POST['contrasena'])) {
        $nombre = $_POST['nombre'];
        $contrasena = $_POST['contrasena'];

        // Preparar la consulta para buscar el usuario por nombre
        $stmt = $conn->prepare("SELECT nombre, contrasena, administrador FROM usuarios WHERE nombre = ?");
        $stmt->bind_param("s", $nombre);
        $stmt->execute();
        $stmt->store_result();

        // Verificar si el usuario existe
        if ($stmt->num_rows > 0) {
            $stmt->bind_result($nombre_usuario, $hashed_password, $rol);
            $stmt->fetch();

            // Verificar la contraseña
            if (password_verify($contrasena, $hashed_password)) {
                // Contraseña correcta, iniciar sesión
                $_SESSION['nombre'] = $nombre_usuario; // Guardar el nombre en la sesión
                $_SESSION['administrador'] = $rol; // Guardar el rol en la sesión

                // Redirigir según el rol
                if ($rol == 1) {
                    header("Location: administrador.php"); // Redirigir a la página de administrador
                } else {
                    header("Location: pruebaindex.php"); // Redirigir a la página principal
                }
                exit; // Detener la ejecución del script
            } else {
                echo "Contraseña incorrecta.";
            }
        } else {
            echo "No se encontró un usuario con ese nombre.";
        }
        // Cerrar la declaración
        $stmt->close();
    } else {
        echo "Por favor, complete todos los campos.";
    }
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
                    <label for="nombre">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" required>
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