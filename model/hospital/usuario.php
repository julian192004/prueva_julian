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
    <title>Lista de Usuarios</title>
    <!-- Agregar enlaces a los archivos CSS y JavaScript de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h1 class="text-center">Usuarios Registrados</h1>
    <br>
    <table class="table table-bordered">
        <thead class="table-primary">
            <tr>
                <th>Documento</th>
                <th>Nombre</th>
                <th>Telefono</th>
                <th>Correo</th>
                <th>Tipo de Usuario</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>

            <?php
            $consulta = "SELECT * FROM usuario, tipo_usuario WHERE usuario.id_rol = tipo_usuario.id_rol";
            $resultado = $con->query($consulta);

            while ($fila = $resultado->fetch()) {
                echo '
                <tr>
                    <td>' . $fila["documento"] . '</td>
                    <td>' . $fila["nombre"] . '</td>
                    <td>' . $fila["telefono"] . '</td>
                    <td>' . $fila["correo"] . '</td>
                    <td>' . $fila["tipo_usu"] . '</td>
                    <td>
                        <div class="text-center">
                            <a href="editar/ediitar_usuario.php?id=' . $fila['documento'] . '" class="btn btn-primary btn-sm">Editar</a>
                            <a href="eliminar/eliminar_usuario.php?id=' . $fila['documento'] . '" class="btn btn-danger btn-sm">Eliminar</a>
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
        </div>
    </div>
</div>
</body>
</html>