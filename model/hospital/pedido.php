<?php
require_once("../../conexion/connection.php"); 
include("../../controller/validar_sesion.php");

$conexion = new Database();
$con = $conexion->conectar();

// Consulta SQL para obtener los datos de la tabla "pedido", "tip_plato" y "estado"
$consulta = "SELECT p.id_pedido, p.documento, p.fecha, p.total, tp.plato, e.estado
             FROM pedido p
             INNER JOIN tip_plato tp ON p.id_plato_diario = tp.id_plato
             INNER JOIN estado e ON p.id_estado = e.id_estado";
$resultado = $con->query($consulta);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de pedidos</title>
    <!-- Agregar enlaces a los archivos CSS y JavaScript de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h1 class="text-center">Lista de pedidos</h1>
    <br>
    <table class="table table-bordered">
        <thead class="table-primary">
            <tr>
                <th>id_pedido</th>
                <th>documento</th>
                <th>fecha</th>
                <th>total</th>
                <th>plato</th>
                <th>estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>

            <?php
            while ($fila = $resultado->fetch()) {
                echo '
                <tr>
                    <td>' . $fila["id_pedido"] . '</td>
                    <td>' . $fila["documento"] . '</td>
                    <td>' . $fila["fecha"] . '</td>
                    <td>' . $fila["total"] . '</td>
                    <td>' . $fila["plato"] . '</td>
                    <td>' . $fila["estado"] . '</td>
                    <td>
                        <div class="text-center">
                            <a href="editar/editar_pedido.php?id=' . $fila["id_pedido"] . '" class="btn btn-primary btn-sm">Editar</a>
                            <a href="eliminar/eliminar_pedido.php?id=' . $fila["id_pedido"] . '" class="btn btn-danger btn-sm">Eliminar</a>
                        </div>
                    </td>
                </tr>';
            }
            ?>
        </tbody>
    </table>
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