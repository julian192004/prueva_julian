<?php
require_once("../../../conexion/connection.php");
include("../../../controller/validar_sesion.php");

$conexion = new Database();
$con = $conexion->conectar();

// Verificar si se proporciona un ID válido a través de la URL
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id_rol = $_GET['id'];

    // Consultar la información del tipo de usuario con el ID proporcionado
    $consulta = "SELECT * FROM tipo_usuario WHERE id_rol = $id_rol";
    $resultado = $con->query($consulta);

    if ($resultado->rowCount() == 1) {
        $fila = $resultado->fetch();
        $tipo_usu = $fila['tipo_usu'];

        // Lógica de actualización si se envió el formulario
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nuevo_tipo_usu = $_POST['nuevo_tipo_usu'];

            // Realizar la actualización en la base de datos
            $actualizarConsulta = "UPDATE tipo_usuario SET tipo_usu = '$nuevo_tipo_usu' WHERE id_rol = $id_rol";
            $con->exec($actualizarConsulta);

            // Redirigir a la página de lista después de la actualización
            header("Location: ../tipo_usuario.php");
            exit();
        }
    } else {
        // Manejar el caso en que no se encuentre el tipo de usuario con el ID proporcionado
        echo "Tipo de usuario no encontrado.";
        exit();
    }
} else {
    // Manejar el caso en que no se proporciona un ID válido
    echo "ID de tipo de usuario no válido.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Tipo de Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h1 class="text-center">Editar Tipo de Usuario</h1>
    <br>
    <form method="POST">
        <div class="mb-3">
            <label for="nuevo_tipo_usu" class="form-label">Nuevo Tipo de Usuario:</label>
            <input type="text" class="form-control" id="nuevo_tipo_usu" name="nuevo_tipo_usu" value="<?php echo $tipo_usu; ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        <a href="tipo_usuario.php" class="btn btn-secondary">Cancelar</a>
    </form>
</div>

</body>
</html>