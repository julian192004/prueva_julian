<?php
require_once("conexion/connection.php");
$DataBase = new Database;
$con = $DataBase->conectar();
session_start();
?>

	
?>

<form method="POST">
    <tr>
        <td colspan='1'></td>
    </tr>

    <input type="submit" value="Cerrar sesion" name="btncerrar" >
</tr>
</form>

<?php 

    
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Interfaz admin</title>
    <link rel="stylesheet" type="text/css" href="css/estilos4.css">
</head>
<body>
        
        <section class="container">

		<div class="all-products">
			<div class="product">
				<img src="../../img/pedido.jpg">
				<div class="product-info">
					<h4 class="product-title">pacientes</h4>
					<a class="product-btn" href="model/hospital/pacientes.php">pacientes</a>
				</div>
			</div>
            <div class="product">
				<img src="../../img/usuario.jpg">
				<div class="product-info">
					<h4 class="product-title">urgencias
					</h4>
					<a class="product-btn" href="model/hospital/urgencias.php">Ingresar</a>
				</div>
			
				</div>
				<div class="product">
				<div class="product-info">
					<h4 class="product-title">medicos
					</h4>
					<a class="product-btn" href="model/hospital/medicos.php">Ingresar</a>
				</div>
			
				
			


		</div>
		
	</section>
</body>
</html>