<?php
session_start();

if (!isset($_SESSION['verified']) || $_SESSION['verified'] !== true) {
	header("Location: login.php");


	die();
}
?>




<?php
include_once 'php/obtenerRol.php';
?>



<?php
include_once 'SelectPromociones.php';
?>




<?php
include_once 'tablas/conexion.php';

//alertas
$ocultarAlerta = "hidden";
$ocultarAlerta1 = "hidden";
//alertas
if (isset($_POST['guardar'])) {
	$dato1 = $_POST['dato1'];
	$dato2 = $_POST['dato2'];
	$dato3 = $_POST['dato3'];
	$dato4 = $_POST['dato4'];
	$dato5 = $_POST['dato5'];

	if (!empty($dato2) && !empty($dato3) && !empty($dato4)  && !empty($dato5)) {

		$consulta_insert = $con->prepare('INSERT INTO productos(id_producto,nombre_producto,descripcion_producto,precio,id_promocion) VALUES(:dato1,:dato2,:dato3,:dato4,:dato5)');
		$consulta_insert->execute(array(
			':dato1' => $dato1,
			':dato2' => $dato2,
			':dato3' => $dato3,
			':dato4' => $dato4,
			':dato5' => $dato5
		));
		//header('Refresh: 6; Location: Clientes.php');
		header('Refresh: 10; URL=Productos.php');
		$ocultarAlerta = "";
	} else {
		//echo "<script> alert('Los campos estan vacios');</script>";
		$ocultarAlerta = "hidden";
		$ocultarAlerta1 = "";
		header('Refresh: 6; URL=Productos.php');
	}
}


?>




<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>MENUU</title>
	<!--CDN DE BOOSTRAP-->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<link rel="stylesheet" href="css/index.css">

	<!--Diseños de botoones y texto descartado de momento-->
	<script src="\stetica2/js/script.js"></script>

	<!--Diseños del nav bar-->
	<link rel="stylesheet" href="css/navbar.css">


	<!--Font Awesome para los iconos-->
	<script src="https://kit.fontawesome.com/c2bcc47e82.js" crossorigin="anonymous"></script>

</head>


<style>
	body {
		background-color: #330000;
		background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='100%25' height='100%25' viewBox='0 0 800 400'%3E%3Cdefs%3E%3CradialGradient id='a' cx='396' cy='281' r='514' gradientUnits='userSpaceOnUse'%3E%3Cstop offset='0' stop-color='%23D18'/%3E%3Cstop offset='1' stop-color='%23330000'/%3E%3C/radialGradient%3E%3ClinearGradient id='b' gradientUnits='userSpaceOnUse' x1='400' y1='148' x2='400' y2='333'%3E%3Cstop offset='0' stop-color='%23f4ff9e' stop-opacity='0'/%3E%3Cstop offset='1' stop-color='%23f4ff9e' stop-opacity='0.5'/%3E%3C/linearGradient%3E%3C/defs%3E%3Crect fill='url(%23a)' width='800' height='400'/%3E%3Cg fill-opacity='0.4'%3E%3Ccircle fill='url(%23b)' cx='267.5' cy='61' r='300'/%3E%3Ccircle fill='url(%23b)' cx='532.5' cy='61' r='300'/%3E%3Ccircle fill='url(%23b)' cx='400' cy='30' r='300'/%3E%3C/g%3E%3C/svg%3E");
		background-attachment: fixed;
		background-size: cover;
	}
</style>

<body>


	<!--Inicio del navbar-->
	<nav class="navbar navbar-expand-xl navbar-dark bg-dark">
		<img src="img/Logo.svg" width="900" height="90" alt="">
		<a href="index.php" class="navbar-brand">Frida<b>kahlo</b></a>
		<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
			<span class="navbar-toggler-icon"></span>
		</button>
		<!-- Collection of nav links, forms, and other content for toggling -->
		<div id="navbarCollapse" class="collapse navbar-collapse justify-content-start">
			<form class="navbar-form form-inline">
				<!--Ignoramos el search
				<div class="input-group search-box">
					<input type="text" id="search" class="form-control" placeholder="Search here...">
					<span class="input-group-addon"><i class="material-icons">&#xE8B6;</i></span>
				</div>

				 -->
			</form>
			<div class="navbar-nav ml-auto">
				<a href="index.php" class="nav-item nav-link"><i class="fa fa-home"></i><span>Home</span></a>
				<a href="Proveedores.php" class="nav-item nav-link active"><i class="fas fa-truck-moving"></i><span>Proveedores</span></a>
				<a <?php echo $restringido ?> href="Usuarios.php" class="nav-item nav-link"><i class="fa fa-users"></i><span>Empleados</span></a>
				<a href="Servicios.php" class="nav-item nav-link"><i class="fas fa-cash-register"></i><span>Ventas</span></a>
				<a href="Clientes.php" class="nav-item nav-link"><i class="fas fa-user-tag"></i><span>Clientes</span></a>
				<a href="Servicios.php" class="nav-item nav-link"><i class="fas fa-female"></i><span>Servicios</span></a>

				<div class="dropdown">
					<a class="nav-item nav-link dropdown-toggle user-action" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<img src="img/admin.png" class="avatar" alt="Avatar"> <?php echo $_SESSION["nombre_usuario"] . "/" . $tipo; ?> <b class="caret"></b>
					</a>
					<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
						<a class="dropdown-item" href="#"><i class="fa fa-user-o"></i>Perfil</a>
						<a onclick="logout();" class="dropdown-item" href="#"><i class="material-icons">&#xE8AC;</i>Cerrar Sesion</a>
					</div>
				</div>

			</div>
		</div>
	</nav>
	<!--Fin del navbar-->


	<!--ALERTAS-->
	<div <?php echo $ocultarAlerta ?> class="alert alert-success alert-dismissible fade show" role="alert">
		<strong>Correcto!</strong> Producto añadido.
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>

	<div <?php echo $ocultarAlerta1 ?> class="alert alert-danger alert-dismissible fade show" role="alert">
		<strong>Aviso!</strong> No se realizo ningun cambio.
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
	<!--ALERTAS-->




	<!--Card-->
	<div class="container pt-3">
		<div class="card" style="width: 50rem;">
			<div class="card-body ">
				<h4>Nuevo Producto</h4>
				<form action="" method="post">
					<div class="form-group">
						<input type="hidden" name="dato1" value="" class="form-control">
						<input type="text" name="dato2" placeholder="Nombre" class="form-control" required>
					</div>

					<div class="form-group">
						<input type="text" name="dato3" placeholder="Descripcion" class="form-control" required>
					</div>

					<div class="form-group">
						<input type="number" name="dato4" placeholder="precio" class="form-control" required>
					</div>

					<div class="form-group">
						<select size="5" name="dato5" class="custom-select" required>
							<option value="">Selecciona el descuento en %</option>
							<?php echo "descuento".$optionsProductosDescuento ?>
						</select>
					</div>


					<div class="btn_group">
						<a href="Productos.php" class="btn btn-secondary">Cancelar</a>
						<input type="submit" name="guardar" value="Guardar" class="btn btn-success">
					</div>
				</form>





			</div>
		</div>
	</div>

	<!--Fin del card-->




	<!--Estilo de boton_lo suplimos por bootstrap

	<style>
		.btn {
			background: #be03fc;
			padding: 2px 15px;
			border-radius: 3px;
			font-size: 1.2em;
			cursor: pointer;
			margin: 5px 0;
			color: white;
			font-weight: bold;
			user-select: none;
			display: inline-block;
			transition: background .3s;
		}

		.btn:hover {
			background: #a702de;
		}

		.btn:active {
			box-shadow: inset 0 0 3px 4px rgba(0, 0, 0, .2);
		}
	</style>

-->








	<!--BUNDLE DE BOOSTRAP-->
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>

</html>