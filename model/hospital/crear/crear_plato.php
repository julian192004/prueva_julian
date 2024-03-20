<?php
require_once("../../../conexion/connection.php");
include("../../../controller/validar_sesion.php");

$conexion = new Database();
$con = $conexion->conectar();


if (isset($_POST["MM_insert"]) && ($_POST["MM_insert"] == "formreg")) {
  
    $precio = $_POST['precio'];
    $id_plato = $_POST['id_plato'];
   
    // Corregido el nombre de las variables en la consulta
    $insertSQL = $con->prepare("INSERT INTO plato_diario(precio, id_plato) VALUES(:precio, :id_plato)");

    $insertSQL->bindParam(':precio', $precio);
    $insertSQL->bindParam(':id_plato', $id_plato);

    $insertSQL->execute();
    echo '<script> alert("REGISTRO EXITOSO");</script>';
    echo '<script>window.location="../platos_diarios.php"</script>';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../css/estilo9.css">
    <title>Registro</title>
</head>
<body>
    <div class="formulario">
        <h1>Crear plato </h1>
        <form method="POST" name="formreg" autocomplete="off">
            <div class="campos">
                <input type="text" name="precio" pattern="[0-9]{2,10}" placeholder="precio" > 
            </div>
           

            <select name="id_plato">
            <option value="">Seleccione el Tipo de plato</option>
            <?php
            $control = $con -> prepare ("SELECT * From tip_plato");$control -> execute();
            while ($fila = $control -> fetch(PDO::FETCH_ASSOC))
            {
            echo "<option value=" . $fila['id_plato'] . ">" . $fila['plato'] . "</option>";
            }
            ?>
            </select>
            
            
            
            <br><br>
            <input type="submit" name="inicio" value="Crear">
            <input type="hidden" name="MM_insert" value="formreg">
        </form>
        

</body>
</html>
