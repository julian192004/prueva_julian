<?php
require_once("conexion/connection.php");
$DataBase = new Database;
$con = $DataBase->conectar();
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $doc = isset($_POST['doc']) ? $_POST['doc'] : null;
    $nom = isset($_POST['nom']) ? $_POST['nom'] : null;
    $especialidad = isset($_POST['especialidad']) ? $_POST['especialidad'] : null;
    $telefono = isset($_POST['telefono']) ? $_POST['telefono'] : null;

    // Verificar si los datos mínimos requeridos están presentes
    if ($doc && $nom && $telefono) {
        // Verificar si el documento ya está registrado en la tabla de médicos
        $consulta_existencia_medico = $con->prepare("SELECT COUNT(*) FROM medicos WHERE id = :doc");
        $consulta_existencia_medico->bindParam(':doc', $doc);
        $consulta_existencia_medico->execute();
        $existe_medico = $consulta_existencia_medico->fetchColumn();

        // Verificar si el documento ya está registrado en la tabla de pacientes
        $consulta_existencia_paciente = $con->prepare("SELECT COUNT(*) FROM pacientes WHERE id = :doc");
        $consulta_existencia_paciente->bindParam(':doc', $doc);
        $consulta_existencia_paciente->execute();
        $existe_paciente = $consulta_existencia_paciente->fetchColumn();

        if ($existe_medico || $existe_paciente) {
            echo "Error: El documento ya está registrado como médico o paciente.";
        } else {
            // Insertar el nuevo registro como médico
            $insertSQL = $con->prepare("INSERT INTO medicos (id, nombre, especialidad, telefono) VALUES (:doc, :nom, :especialidad, :telefono)");
            $insertSQL->bindParam(':doc', $doc);
            $insertSQL->bindParam(':nom', $nom);
            $insertSQL->bindParam(':especialidad', $especialidad);
            $insertSQL->bindParam(':telefono', $telefono);

            if ($insertSQL->execute()) {
                echo "Registro de médico exitoso.";
            } else {
                echo "Error: No se pudo registrar al médico.";
            }
        }
    } else {
        echo "Error: Faltan campos obligatorios.";
    }
} else {
    echo "Error: El formulario no ha sido enviado correctamente.";
}
?>
