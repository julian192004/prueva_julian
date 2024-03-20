<?php
    require_once("../../../conexion/connection.php"); 
    include("../../../controller/validar_sesion.php");

    $conexion = new Database();
    $con = $conexion->conectar();

    $insertSQL = $con -> prepare("DELETE FROM tip_plato WHERE id_plato = '".$_GET['id']."'");      
    $insertSQL->execute();
    echo '<script>alert ("Registro eliminado exitosamente.");</script>';
    echo '<script>window.location="../tip_plato.php"</script>';
?>