<?php
    require_once("../../../conexion/connection.php"); 
    include("../../../controller/validar_sesion.php");

    $conexion = new Database();
    $con = $conexion->conectar();

    $insertSQL = $con -> prepare("DELETE FROM tipo_usuario WHERE id_rol = '".$_GET['id']."'");      
    $insertSQL->execute();
    echo '<script>alert ("Registro eliminado exitosamente.");</script>';
    echo '<script>window.location="../tipo_usuario.php"</script>';



?>