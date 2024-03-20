<?php
require_once("conexion/connection.php");
$DataBase = new Database;
$con = $DataBase->conectar();
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_paciente = isset($_POST['id_paciente']) ? $_POST['id_paciente'] : null;
    $id_medico = isset($_POST['id_medico']) ? $_POST['id_medico'] : null;
    $fecha = isset($_POST['fecha']) ? $_POST['fecha'] : null;
    $enfermedad = isset($_POST['enfermedad']) ? $_POST['enfermedad'] : null;

    if ($id_paciente && $id_medico && $fecha) {
        $insertSQL = $con->prepare("INSERT INTO urgencias (id_paciente, id_medico, fecha, enfermedad) VALUES (:id_paciente, :id_medico, :fecha, :enfermedad)");
        $insertSQL->bindParam(':id_paciente', $id_paciente);
        $insertSQL->bindParam(':id_medico', $id_medico);
        $insertSQL->bindParam(':fecha', $fecha);
        $insertSQL->bindParam(':enfermedad', $enfermedad);

        if ($insertSQL->execute()) {
            echo "Registro de urgencia exitoso.";
        } else {
            echo "Error: No se pudo registrar la urgencia.";
        }
    } else {
        echo "Error: Faltan campos obligatorios.";
    }
} else {
    echo "Error: El formulario no ha sido enviado correctamente.";
}
?>
