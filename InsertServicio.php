<?php
session_start();

if (!isset($_SESSION['verified']) || $_SESSION['verified'] !== true) {
	header("Location: login.php");


	die();
}
?>



<?php
include_once 'tablas/conexion.php';

if (isset($_POST['guardar'])) {
	$nombre = $_POST['nombre'];
	$apellidos = $_POST['apellidos'];
	$telefono = $_POST['telefono'];
	$ciudad = $_POST['ciudad'];
	$telefono_cliente = $_POST['telefono_cliente'];

	if (!empty($apellidos) && !empty($telefono) && !empty($ciudad)  && !empty($telefono_cliente)) {

		$consulta_insert = $con->prepare('INSERT INTO servicios(id_servicios,id_cliente,tipo_servicio,fecha_servicio,precio_servicio) VALUES(:nombre,:apellidos,:telefono,:ciudad,:telefono_cliente)');
		$consulta_insert->execute(array(
			':nombre' => $nombre,
			':apellidos' => $apellidos,
			':telefono' => $telefono,
			':ciudad' => $ciudad,
			':telefono_cliente' => $telefono_cliente
		));
		header('Location: Servicios.php');
	} else {
		echo "<script> alert('Los campos estan vacios');</script>";
	}
}


?>


<?php
include_once 'SelectClientes.php';
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
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<img href="#" src="\stetica2/img/Logo.svg" width="60" height="60" class="d-inline-block align-top" alt="" loading="lazy">
		<a class="nav-link" href="index.php">Salón Frida <span class="sr-only">(current)</span></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item">
					<a class="nav-link" href="#">Proveedores <span class="sr-only">(current)</span></a>
				</li>

				<li class="nav-item">
					<a class="nav-link" href="Clientes.php">Clientes</a>
				</li>


				<li class="nav-item dropdown ">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Usuarios
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="Usuarios.php">Empleados</a>
						<a class="dropdown-item" href="#">Roles de Empleados</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="#">Clientes</a>
					</div>
				</li>



				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Proveedores
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="#">Lista de proveedores</a>
						<a class="dropdown-item" href="#">Productos</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="#">Almacen</a>
					</div>
				</li>




				<li class="nav-item dropdown active">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Ventas
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="#">Productos</a>
						<a class="dropdown-item" href="Servicios.php">Servicios</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="CorteDeCaja.php">Corte de Caja</a>
					</div>
				</li>


				<li class="nav-item">
					<a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Boton no activo</a>
				</li>
			</ul>
			<form class="form-inline my-2 my-lg-0">
				<h5>bienvenido(a): <?php
									echo $_SESSION["nombre_usuario"]; ?></h5>

				&nbsp;&nbsp;

				<div class="btn btn-info" onclick="logout();">Salir</div>
			</form>
		</div>
	</nav>
	<!--Fin del navbar-->





	<!--Card-->
	<div class="container pt-3">
		<div class="card" style="width: 50rem;">
			<div class="card-body ">
				<h4>Datos del nuevo Servicio</h4>
				<form action="" method="post">
					<div class="form-group">
						<input type="hidden" name="nombre" value="" class="form-control">


						<select size="5" name="apellidos" class="custom-select" required>
						<option value="">Selecciona al cliente</option>
						<?php echo $options?>
						</select>

					</div>

					<div class="form-group">
						<input type="text" name="telefono" placeholder="Servicio" class="form-control" required>
					</div>

					<div class="form-group">
						<input type="datetime-local" name="ciudad" placeholder="Fecha y Hora" class="form-control" required>
					</div>

					<div class="form-group">
						<input type="Number" name="telefono_cliente" placeholder="Precio" class="form-control" required>
					</div>



					<div class="btn_group">
						<a href="Servicios.php" class="btn btn-secondary">Cancelar</a>
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