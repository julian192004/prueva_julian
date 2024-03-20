<?php
    require_once("../../conexion/connection.php"); 
	include("../../controller/validar_sesion.php");
    $conexion = new Database();
    $con = $conexion->conectar();
	
	
?>

<form method="POST">
    <tr>
        <td colspan='1'></td>
    </tr>

    <input type="submit" value="Cerrar sesion" name="btncerrar" >
</tr>
</form>

<?php 

if(isset($_POST['btncerrar']))
{
    session_destroy();

   
    header('location: ../../login.html');
}
    
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Interfaz admin</title>
    <link rel="stylesheet" type="text/css" href="../../css/estilos4.css">
</head>
<body>
        <?php  

        $sql = $con->prepare("SELECT * FROM usuario, tipo_usuario");
        $sql -> execute();
        $fila = $sql -> fetch();
        ?>
        <section class="container">
            <h1>Bienvenido/a <?php echo $fila['tipo_usu']?> <?php echo $_SESSION['nombre']?> </h1>

		<div class="all-products">
			<div class="product">
				<img src="../../img/pedido.jpg">
				<div class="product-info">
					<h4 class="product-title">pedidos</h4>
					<a class="product-btn" href="pedido.php">Ingresar</a>
				</div>
			</div>
            <div class="product">
			<img src="../../img/plato.jpg">
				<div class="product-info">
					<h4 class="product-title">plato diario
					</h4>
					<a class="product-btn" href="platos_diarios.php">Ingresar</a>
				</div>
			</div>
            <div class="product">
				<img src="../../img/usuario.jpg">
				<div class="product-info">
					<h4 class="product-title">usuarios
					</h4>
					<a class="product-btn" href="usuario.php">Ingresar</a>
				</div>
			
				</div>
				<div class="product">
				<img src="../../img/usuario.jpg">
				<div class="product-info">
					<h4 class="product-title">estado
					</h4>
					<a class="product-btn" href="estado.php">Ingresar</a>
				</div>
			
				</div>
				<div class="product">
				<img src="../../img/usuario.jpg">
				<div class="product-info">
					<h4 class="product-title">tipo_usuario
					</h4>
					<a class="product-btn" href="tipo_usuario.php">Ingresar</a>
				</div>
			
				</div><div class="product">
				<img src="../../img/usuario.jpg">
				<div class="product-info">
					<h4 class="product-title">tip_plato
					</h4>
					<a class="product-btn" href="tip_plato.php">Ingresar</a>
				</div>
			
				</div>

			</div>

		</div>
		
	</section>
</body>
</html>