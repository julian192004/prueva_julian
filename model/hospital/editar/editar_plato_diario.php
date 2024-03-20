<?php
require_once("../../../conexion/connection.php");
include("../../../controller/validar_sesion.php");

$conexion = new Database();
$con = $conexion->conectar();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $id_plato_diario = $_POST["id_plato_diario"];
    $precio = $_POST["precio"];
    $id_plato = $_POST["id_plato"];

    // Actualizar la información en la base de datos
    $consulta_actualizar = "UPDATE plato_diario SET precio='$precio', id_plato='$id_plato' WHERE id_plato_diario='$id_plato_diario'";
    $con->query($consulta_actualizar);

    // Redireccionar a la página principal después de la actualización
    header("Location: ../platos_diarios.php");
    exit();
} else {
    // Obtener el ID del plato diario de la URL
    $id_plato_diario = $_GET["id"];

    // Obtener la información del plato diario para prellenar el formulario
    $consulta_plato_diario = "SELECT * FROM plato_diario WHERE id_plato_diario='$id_plato_diario'";
    $resultado_plato_diario = $con->query($consulta_plato_diario);
    $plato_diario = $resultado_plato_diario->fetch();

    // Obtener la lista de platos para el campo de selección
    $consulta_platos = "SELECT * FROM tip_plato";
    $resultado_platos = $con->query($consulta_platos);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Plato Diario</title>
    <!-- Agregar enlaces a los archivos CSS y JavaScript de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h1 class="text-center">Editar Plato Diario</h1>
    <br>
    <form method="POST" action="">
        <div class="mb-3">
            <label for="id_plato_diario" class="form-label">ID Plato Diario:</label>
            <input type="text" class="form-control" id="id_plato_diario" name="id_plato_diario" value="<?php echo $plato_diario["id_plato_diario"]; ?>" readonly>
        </div>
        <div class="mb-3">
            <label for="precio" class="form-label">Precio:</label>
            <input type="text" class="form-control" id="precio" name="precio" value="<?php echo $plato_diario["precio"]; ?>" required>
        </div>
        <div class="mb-3">
            <label for="id_plato" class="form-label">Plato:</label>
            <select class="form-control" id="id_plato" name="id_plato" required>
                <?php
                while ($fila_plato = $resultado_platos->fetch()) {
                    $selected = ($fila_plato['id_plato'] == $plato_diario['id_plato']) ? 'selected' : '';
                    echo "<option value=" . $fila_plato['id_plato'] . " $selected>"
                        . $fila_plato['plato'] . "</option>";
                }
                ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
    <br>
    <div class="row mt-3">
        <div class="col-md-6 text-start">
            <a href="../platos_diarios.php" class="btn btn-secondary">Regresar</a>
        </div>
    </div>
</div>

</body>
</html>