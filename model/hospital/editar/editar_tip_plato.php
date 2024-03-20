<?php
require_once("../../../conexion/connection.php");
include("../../../controller/validar_sesion.php");

$conexion = new Database();
$con = $conexion->conectar();

// Verificar si se proporciona un ID válido a través de la URL
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id_plato = $_GET['id'];

    // Consultar la información del tipo de plato con el ID proporcionado
    $consulta = "SELECT * FROM tip_plato WHERE id_plato = $id_plato";
    $resultado = $con->query($consulta);

    if ($resultado->rowCount() == 1) {
        $fila = $resultado->fetch();
        $plato = $fila['plato'];

        // Lógica de actualización si se envió el formulario
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nuevo_plato = $_POST['nuevo_plato'];

            // Realizar la actualización en la base de datos
            $actualizarConsulta = "UPDATE tip_plato SET plato = '$nuevo_plato' WHERE id_plato = $id_plato";
            $con->exec($actualizarConsulta);

            // Redirigir a la página de lista después de la actualización
            header("Location: ../tip_plato.php");
            exit();
        }
    } else {
        // Manejar el caso en que no se encuentre el tipo de plato con el ID proporcionado
        echo "Tipo de plato no encontrado.";
        exit();
    }
} else {
    // Manejar el caso en que no se proporciona un ID válido
    echo "ID de tipo de plato no válido.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Tipo de Plato</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h1 class="text-center">Editar Tipo de Plato</h1>
    <br>
    <form method="POST">
        <div class="mb-3">
            <label for="nuevo_plato" class="form-label">Nuevo Tipo de Plato:</label>
            <input type="text" class="form-control" id="nuevo_plato" name="nuevo_plato" value="<?php echo $plato; ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        <a href="lista_tip_plato.php" class="btn btn-secondary">Cancelar</a>
    </form>
</div>

</body>
</html>