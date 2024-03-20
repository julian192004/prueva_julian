<?php
require_once("../../../conexion/connection.php");
include("../../../controller/validar_sesion.php");

$conexion = new Database();
$con = $conexion->conectar();


// Lógica de creación si se envió el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nuevo_id_rol = $_POST['nuevo_id_rol'];
    $nuevo_tipo_usu = $_POST['nuevo_tipo_usu'];

    // Insertar nuevo tipo de usuario en la base de datos
    $insertarConsulta = "INSERT INTO tipo_usuario (id_rol, tipo_usu) VALUES ('$nuevo_id_rol', '$nuevo_tipo_usu')";
    $con->exec($insertarConsulta);

    // Redirigir a la página de lista después de la creación
    header("Location: ../tipo_usuario.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Tipo de Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h1 class="text-center">Crear Tipo de Usuario</h1>
    <br>
    <form method="POST">
        <div class="mb-3">
            <label for="nuevo_id_rol" class="form-label">ID de Rol:</label>
            <input type="text" class="form-control" id="nuevo_id_rol" name="nuevo_id_rol" required>
        </div>
        <div class="mb-3">
            <label for="nuevo_tipo_usu" class="form-label">Nuevo Tipo de Usuario:</label>
            <input type="text" class="form-control" id="nuevo_tipo_usu" name="nuevo_tipo_usu" required>
        </div>
        <button type="submit" class="btn btn-primary">Crear Tipo de Usuario</button>
        <a href="lista_tipo_usuario.php" class="btn btn-secondary">Cancelar</a>
    </form>
</div>

</body>
</html>