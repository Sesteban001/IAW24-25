<?php
include ('conexionbbdd.php');
//conternido del carrito 
$carrito = $_SESSION['carrito'] ?? [];

// Verificar si se han enviado los productos desde el carrito y si esta logueado
if (!empty($carrito)  && isset($_SESSION['nombre'])) {
     // Obtener el ID del usuario
     $sql = "SELECT id FROM usuarios WHERE nombre = '" . $_SESSION['nombre'] . "'";
     $result = $conn->query($sql);
     if ($result && $result->num_rows > 0) {
         $usuario = $result->fetch_assoc()['id'];  // fetch the user ID
     } 

    $total_dinero = 0;
    $producto_total = 0; 
        foreach ($carrito as $producto) {
            $total_dinero += $producto['precio'];
            $producto_total++;
        }
            // Insertar los datos del pedido en la base de datos
            $stmt = $conn->prepare("INSERT INTO pedidos (usuario, productos_comprados, total_precio, fecha) VALUES (?, ?, ?, NOW())");
            $stmt->bind_param("iid", $usuario, $producto_total, $total_dinero);
        
            if ($stmt->execute()) {
                // Vaciar el carrito
                unset($_SESSION['carrito']);
        
            //consulta para sacar el id del pedido
                $sql = "SELECT id FROM pedidos WHERE fecha = NOW() ORDER BY id DESC LIMIT 1"; // Get the last inserted order
                $result = $conn->query($sql);
                $row_count = $result->num_rows;
                while($row = $result->fetch_assoc()) {
                    $pedido_id = $row['id']; // en 'nombre' es el nombre de la columna de la BBDD
                }
                
            // Redirigir al usuario a una página de confirmación o de agradecimiento
            } else {
                echo "Error al guardar el pedido: " . $stmt->error;
            }
        
            $stmt->close();

    } elseif (empty($_SESSION['nombre'])){
        header("Location: login.php"); 
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Pedidos</title>
</head>
<body>
    <h1>Página de Pedidos</h1>
    <?php if (empty($pedido_id)): ?>
        <h2>Gracias por tu pedido!</h2>
        <p>Tu número de pedido es:  <!--<?php echo $pedido_id; ?></p> -->
    <?php else:  ?>
        <p>No se han enviado productos desde el carrito.</p>
    <?php endif; ?>
</body>
</html>