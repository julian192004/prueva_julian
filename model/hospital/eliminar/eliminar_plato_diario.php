<?php
    require_once("../../../conexion/connection.php"); 
    include("../../../controller/validar_sesion.php");

    $conexion = new Database();
    $con = $conexion->conectar();

    $insertSQL = $con -> prepare("DELETE FROM plato_diario WHERE id_plato_diario = '".$_GET['id']."'");      
    $insertSQL->execute();
    echo '<script>alert ("Registro eliminado exitosamente.");</script>';
    echo '<script>window.location="../platos_diarios.php"</script>';
?>