<?php
require_once("../../../conexion/connection.php");
include("../../../controller/validar_sesion.php");

$conexion = new Database();
$con = $conexion->conectar();


// Verificar si se ha enviado un ID válido a través del parámetro GET
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id_pedido = $_GET['id'];

    // Consulta SQL para obtener los datos del pedido específico
    $consulta = "SELECT * FROM pedido WHERE id_pedido = $id_pedido";
    $resultado = $con->query($consulta);

    // Verificar si se encontró el pedido
    if ($resultado->rowCount() > 0) {
        $pedido = $resultado->fetch();
    } else {
        // Redirigir si el pedido no existe
        header("Location: ../pedido.php");
        exit();
    }
} else {
    // Redirigir si no se proporciona un ID válido
    header("Location: ../pedido.php");
    exit();
}

// Verificar si se ha enviado el formulario de edición
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos del formulario
    $documento = $_POST['documento'];
    $fecha = $_POST['fecha'];
    $total = $_POST['total'];
    $id_plato_diario = $_POST['id_plato_diario'];
    $id_estado = $_POST['id_estado'];

    // Actualizar los datos en la base de datos
    $actualizarConsulta = "UPDATE pedido
                           SET documento = :documento,
                               fecha = :fecha,
                               total = :total,
                               id_plato_diario = :id_plato_diario,
                               id_estado = :id_estado
                           WHERE id_pedido = :id_pedido";

    $stmt = $con->prepare($actualizarConsulta);

    $stmt->bindParam(':documento', $documento);
    $stmt->bindParam(':fecha', $fecha);
    $stmt->bindParam(':total', $total);
    $stmt->bindParam(':id_plato_diario', $id_plato_diario);
    $stmt->bindParam(':id_estado', $id_estado);
    $stmt->bindParam(':id_pedido', $id_pedido);

    if ($stmt->execute()) {
        // Redirigir a la página principal después de la actualización
        header("Location: ../pedido.php");
        exit();
    } else {
        echo "Error al actualizar el pedido";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Pedido</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h1 class="text-center">Editar Pedido</h1>
    <br>
    <form method="POST" action="">
        <div class="mb-3">
            <label for="documento" class="form-label">Documento</label>
            <input type="text" class="form-control" id="documento" name="documento" value="<?php echo $pedido['documento']; ?>" required>
        </div>
        <div class="mb-3">
    <label for="fecha" class="form-label">Fecha</label>
    <input type="text" class="form-control" id="fecha" name="fecha" value="<?php echo $pedido['fecha']; ?>" readonly>
</div>
        <div class="mb-3">
            <label for="total" class="form-label">Total</label>
            <input type="number" class="form-control" id="total" name="total" value="<?php echo $pedido['total']; ?>" required>
        </div>
        <div class="mb-3">
    <label for="id_plato_diario" class="form-label">ID Plato Diario</label>
    <select class="form-select" id="id_plato_diario" name="id_plato_diario" required>
        <?php
        // Consulta SQL para obtener los datos de la tabla "tip_plato"
        $consultaPlatos = "SELECT id_plato, plato FROM tip_plato";
        $resultPlatos = $con->query($consultaPlatos);

        // Mostrar opciones en la lista desplegable
        while ($filaPlato = $resultPlatos->fetch()) {
            $selected = ($filaPlato['id_plato'] == $pedido['id_plato_diario']) ? 'selected' : '';
            echo '<option value="' . $filaPlato['id_plato'] . '" ' . $selected . '>' . $filaPlato['plato'] . '</option>';
        }
        ?>
    </select>
</div>

<div class="mb-3">
    <label for="id_estado" class="form-label">ID Estado</label>
    <select class="form-select" id="id_estado" name="id_estado" required>
        <?php
        // Consulta SQL para obtener los datos de la tabla "estado"
        $consultaEstados = "SELECT id_estado, estado FROM estado";
        $resultEstados = $con->query($consultaEstados);

        // Mostrar opciones en la lista desplegable
        while ($filaEstado = $resultEstados->fetch()) {
            $selected = ($filaEstado['id_estado'] == $pedido['id_estado']) ? 'selected' : '';
            echo '<option value="' . $filaEstado['id_estado'] . '" ' . $selected . '>' . $filaEstado['estado'] . '</option>';
        }
        ?>
    </select>
</div>
        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
    </form>
</div>

</body>
</html>