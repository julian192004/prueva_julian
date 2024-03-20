<?php
    require_once("../../conexion/connection.php"); 
    include("../../controller/validar_sesion.php");
    $conexion = new Database();
    $con = $conexion->conectar();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de platos</title>
    <!-- Agregar enlaces a los archivos CSS y JavaScript de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h1 class="text-center">Lista de platos</h1>
    <br>
    <table class="table table-bordered">
        <thead class="table-primary">
            <tr>
                <th>id_plato_diario</th>
                <th>plato</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>

            <?php
            $consulta = "SELECT * FROM plato_diario, tip_plato where plato_diario.id_plato = tip_plato.id_plato";
             
            $resultado = $con->query($consulta);

            while ($fila = $resultado->fetch()) {
                echo '
                <tr>
                    <td>' . $fila["id_plato_diario"] . '</td>
                    <td>' . $fila["plato"] . '</td>
                    <td>' . $fila["precio"] . '</td>
                    <td>
                        <div class="text-center">
                            <a href="editar/editar_plato_diario.php?id=' . $fila["id_plato_diario"] . '" class="btn btn-primary btn-sm">Editar</a>
                            <a href="eliminar/eliminar_plato_diario.php?id=' . $fila["id_plato_diario"] . '" class="btn btn-danger btn-sm">Eliminar</a>
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
        <div class="col-md-6 text-end">
            <a href="crear/crear_plato.php" class="btn btn-success">Crear plato</a>
        </div>
    </div>
</div>
</body>
</html>