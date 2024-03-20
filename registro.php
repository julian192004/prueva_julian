<?php
require_once("conexion/connection.php");
$DataBase = new Database;
$con = $DataBase->conectar();
session_start();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $doc = isset($_POST['doc']) ? $_POST['doc'] : null;
    $nom = isset($_POST['nom']) ? $_POST['nom'] : null;
    $edad = isset($_POST['edad']) ? $_POST['edad'] : null;
    $genero = isset($_POST['genero']) ? $_POST['genero'] : null;
    $direccion = isset($_POST['direccion']) ? $_POST['direccion'] : null;
    $telefono = isset($_POST['telefono']) ? $_POST['telefono'] : null;

    if ($doc && $nom && $telefono) {
        $insertSQL = $con->prepare("INSERT INTO pacientes (id, nombre, edad, genero, direccion, telefono) VALUES (:doc, :nom, :edad, :genero, :direccion, :telefono)");
        $insertSQL->bindParam(':doc', $doc);
        $insertSQL->bindParam(':nom', $nom);
        $insertSQL->bindParam(':edad', $edad);
        $insertSQL->bindParam(':genero', $genero);
        $insertSQL->bindParam(':direccion', $direccion);
        $insertSQL->bindParam(':telefono', $telefono);

        if ($insertSQL->execute()) {
            echo "Registro exitoso.";
        } else {
            echo "Error: No se pudo registrar el paciente.";
        }
    } else {
        echo "Error: Faltan campos obligatorios.";
    }
} else {
    echo "Error: El formulario no ha sido enviado correctamente.";
}
?>
