<?php
require_once("../../conexion/connection.php");
include("../../controller/validar_sesion.php");

$conexion = new Database();
$con = $conexion->conectar();

// Consulta para obtener la información de la tabla tip_plato
$consulta = "SELECT * FROM tip_plato";
$resultado = $con->query($consulta);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Tipos de Plato</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h1 class="text-center">Lista de Tipos de Plato</h1>
    <br>
    <table class="table table-bordered">
        <thead class="table-primary">
            <tr>
                <th>ID Plato</th>
                <th>Plato</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>

            <?php
            // Mostrar resultados de la consulta
            while ($fila = $resultado->fetch()) {
                echo '
                <tr>
                    <td>' . $fila["id_plato"] . '</td>
                    <td>' . $fila["plato"] . '</td>
                    <td>
                        <div class="text-center">
                            <a href="editar/editar_tip_plato.php?id=' . $fila["id_plato"] . '" class="btn btn-primary btn-sm">Editar</a>
                            <a href="eliminar/eliminar_tip_plato.php?id=' . $fila["id_plato"] . '" class="btn btn-danger btn-sm">Eliminar</a>
                        </div>
                    </td>
                </tr>';
            }
            ?>
        </tbody>
    </table>
    <div class="row mb-3">
        <div class="col-md-6 text-start">
            <a href="crear/crear_tip_plato.php" class="btn btn-success">Crear Nuevo Tipo de plato</a>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-6 text-start">
            <form action="index.php">
                <input type="submit" value="Regresar" class="btn btn-secondary"/>
            </form>
        </div>
    </div>
</div>

</body>
</html>