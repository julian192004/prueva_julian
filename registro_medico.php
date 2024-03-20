<?php
require_once("conexion/connection.php");
$DataBase = new Database;
$con = $DataBase->conectar();
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : null;
    $especialidad = isset($_POST['especialidad']) ? $_POST['especialidad'] : null;
    $telefono = isset($_POST['telefono']) ? $_POST['telefono'] : null;

    if ($nombre && $especialidad) {
        $insertSQL = $con->prepare("INSERT INTO medicos (nombre, especialidad, telefono) VALUES (:nombre, :especialidad, :telefono)");
        $insertSQL->bindParam(':nombre', $nombre);
        $insertSQL->bindParam(':especialidad', $especialidad);
        $insertSQL->bindParam(':telefono', $telefono);

        if ($insertSQL->execute()) {
            echo "Registro exitoso.";
        } else {
            echo "Error: No se pudo registrar el médico.";
        }
    } else {
        echo "Error: Faltan campos obligatorios.";
    }
} else {
    echo "Error: El formulario no ha sido enviado correctamente.";
}
?>
