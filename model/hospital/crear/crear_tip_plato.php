<?php
require_once("../../../conexion/connection.php");
include("../../../controller/validar_sesion.php");

$conexion = new Database();
$con = $conexion->conectar();

// Lógica de creación si se envió el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nuevo_plato = $_POST['nuevo_plato'];

    // Insertar nuevo tipo de plato en la base de datos
    $insertarConsulta = "INSERT INTO tip_plato (plato) VALUES ('$nuevo_plato')";
    
    try {
        $con->exec($insertarConsulta);

        // Redirigir a la página de lista después de la creación
        header("Location: ../tip_plato.php");
        exit();
    } catch (PDOException $e) {
        // Manejar cualquier error de la base de datos
        echo "Error al crear el tipo de plato: " . $e->getMessage();
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Tipo de Plato</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h1 class="text-center">Crear Tipo de Plato</h1>
    <br>
    <form method="POST">
        <div class="mb-3">
            <label for="nuevo_plato" class="form-label">Nuevo Tipo de Plato:</label>
            <input type="text" class="form-control" id="nuevo_plato" name="nuevo_plato" required>
        </div>
        <button type="submit" class="btn btn-primary">Crear Tipo de Plato</button>
        <a href="lista_tip_plato.php" class="btn btn-secondary">Cancelar</a>
    </form>
</div>

</body>
</html>