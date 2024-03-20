<?php
require_once("../../conexion/connection.php"); 
$conexion = new Database();
$con = $conexion->conectar();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de urgencias</title>
    <!-- Enlazar Bootstrap desde un CDN estable -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h1 class="text-center">Urgencias Registradas</h1>
    <br>
    <table class="table table-bordered">
        <thead class="table-primary">
            <tr>
                <th>ID</th>
                <th>ID Paciente</th>
                <th>ID Médico</th>
                <th>Fecha</th>
                <th>Enfermedad</th>
            </tr>
        </thead>
        <tbody>

            <?php
            // Consulta para obtener las emergencias
            $consulta = "SELECT * FROM urgencias";
            $resultado = $con->query($consulta);

            // Verificar si hay resultados
            if ($resultado) {
                // Recorrer los resultados
                while ($fila = $resultado->fetch(PDO::FETCH_ASSOC)) {
                    // Mostrar cada emergencia en una fila de la tabla
                    echo '
                    <tr>
                        <td>' . htmlspecialchars($fila["id"]) . '</td>
                        <td>' . htmlspecialchars($fila["id_paciente"]) . '</td>
                        <td>' . htmlspecialchars($fila["id_medico"]) . '</td>
                        <td>' . htmlspecialchars($fila["fecha"]) . '</td>
                        <td>' . htmlspecialchars($fila["enfermedad"]) . '</td>
                        <td
                        </td>
                    </tr>';
                }
            } else {
                // Manejo de error si la consulta falla
                echo '<tr><td colspan="6" class="text-center">No se encontraron emergencias.</td></tr>';
            }
            ?>
        </tbody>
    </table>
    <!-- Otras partes del contenido de la página -->
</div>

<!-- Agregar enlaces a archivos JavaScript de Bootstrap y otros si es necesario -->
</body>
</html>
