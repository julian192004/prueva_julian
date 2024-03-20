<?php
require_once("../../conexion/connection.php"); 


$conexion = new Database();
$con = $conexion->conectar();

// Consulta SQL para obtener los datos de la tabla "pacientes"
$consulta = "SELECT id, nombre, edad, genero, direccion, telefono FROM pacientes";
$resultado = $con->query($consulta);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Pacientes</title>
    <!-- Agregar enlaces a los archivos CSS y JavaScript de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h1 class="text-center">Lista de Pacientes</h1>
    <br>
    <table class="table table-bordered">
        <thead class="table-primary">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Edad</th>
                <th>Género</th>
                <th>Dirección</th>
                <th>Teléfono</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>

            <?php
            while ($fila = $resultado->fetch(PDO::FETCH_ASSOC)) {
                echo '
                <tr>
                    <td>' . $fila["id"] . '</td>
                    <td>' . $fila["nombre"] . '</td>
                    <td>' . $fila["edad"] . '</td>
                    <td>' . $fila["genero"] . '</td>
                    <td>' . $fila["direccion"] . '</td>
                    <td>' . $fila["telefono"] . '</td>
                    <td>
                        <div class="text-center">
                            <a href="editar/editar_paciente.php?id=' . $fila["id"] . '" class="btn btn-primary btn-sm">Editar</a>
                            <a href="eliminar/eliminar_paciente.php?id=' . $fila["id"] . '" class="btn btn-danger btn-sm">Eliminar</a>
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
