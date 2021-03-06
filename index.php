<?php
session_start();

if (!isset($_SESSION['verified']) || $_SESSION['verified'] !== true) {
	header("Location: login.php");


	die();
}
?>


<?php
include_once 'php/consultasEmpleados.php';
?>

<?php
include_once 'php/obtenerRol.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Inicio</title>
	<script src="js/script.js"></script>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">



	<script src="https://kit.fontawesome.com/c2bcc47e82.js" crossorigin="anonymous"></script>


	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<style>
		/*body {
			background: #eeeeee;
			font-family: 'Varela Round', sans-serif;
		}*/

		body {
			background-color: #330000;
			background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='100%25' height='100%25' viewBox='0 0 800 400'%3E%3Cdefs%3E%3CradialGradient id='a' cx='396' cy='281' r='514' gradientUnits='userSpaceOnUse'%3E%3Cstop offset='0' stop-color='%23D18'/%3E%3Cstop offset='1' stop-color='%23330000'/%3E%3C/radialGradient%3E%3ClinearGradient id='b' gradientUnits='userSpaceOnUse' x1='400' y1='148' x2='400' y2='333'%3E%3Cstop offset='0' stop-color='%23FA3' stop-opacity='0'/%3E%3Cstop offset='1' stop-color='%23FA3' stop-opacity='0.5'/%3E%3C/linearGradient%3E%3C/defs%3E%3Crect fill='url(%23a)' width='800' height='400'/%3E%3Cg fill-opacity='0.4'%3E%3Ccircle fill='url(%23b)' cx='267.5' cy='61' r='300'/%3E%3Ccircle fill='url(%23b)' cx='532.5' cy='61' r='300'/%3E%3Ccircle fill='url(%23b)' cx='400' cy='30' r='300'/%3E%3C/g%3E%3C/svg%3E");
			background-attachment: fixed;
			background-size: cover;
		}

		.navbar {
			color: #fff;
			background: #926dde !important;
			padding: 5px 16px;
			border-radius: 0;
			border: none;
			box-shadow: 0 0 4px rgba(0, 0, 0, .1);
		}

		.navbar img {
			border-radius: 50%;
			width: 36px;
			height: 36px;
			margin-right: 10px;
		}

		.navbar .navbar-brand {
			color: #efe5ff;
			padding-left: 0;
			padding-right: 50px;
			font-size: 24px;
		}

		.navbar .navbar-brand:hover,
		.navbar .navbar-brand:focus {
			color: #fff;
		}

		.navbar .navbar-brand i {
			font-size: 25px;
			margin-right: 5px;
		}

		.search-box {
			position: relative;
		}

		.search-box input {
			padding-right: 35px;
			min-height: 38px;
			border: none;
			background: #faf7fd;
			border-radius: 3px !important;
		}

		.search-box input:focus {
			background: #fff;
			box-shadow: none;
		}

		.search-box .input-group-addon {
			min-width: 35px;
			border: none;
			background: transparent;
			position: absolute;
			right: 0;
			z-index: 9;
			padding: 10px 7px;
			height: 100%;
		}

		.search-box i {
			color: #a0a5b1;
			font-size: 19px;
		}

		.navbar .nav-item i {
			font-size: 18px;
		}

		.navbar .nav-item span {
			position: relative;
			top: 3px;
		}

		.navbar .navbar-nav>a {
			color: #efe5ff;
			padding: 8px 15px;
			font-size: 14px;
		}

		.navbar .navbar-nav>a:hover,
		.navbar .navbar-nav>a:focus {
			color: #fff;
			text-shadow: 0 0 4px rgba(255, 255, 255, 0.3);
		}

		.navbar .navbar-nav>a>i {
			display: block;
			text-align: center;
		}

		.navbar .dropdown-item i {
			font-size: 16px;
			min-width: 22px;
		}

		.navbar .dropdown-item .material-icons {
			font-size: 21px;
			line-height: 16px;
			vertical-align: middle;
			margin-top: -2px;
		}

		.navbar .nav-item.open>a,
		.navbar .nav-item.open>a:hover,
		.navbar .nav-item.open>a:focus {
			color: #fff;
			background: none !important;
		}

		.navbar .dropdown-menu {
			border-radius: 1px;
			border-color: #e5e5e5;
			box-shadow: 0 2px 8px rgba(0, 0, 0, .05);
		}

		.navbar .dropdown-menu a {
			color: #777 !important;
			padding: 8px 20px;
			line-height: normal;
			font-size: 15px;
		}

		.navbar .dropdown-menu a:hover,
		.navbar .dropdown-menu a:focus {
			color: #333 !important;
			background: transparent !important;
		}

		.navbar .navbar-nav .active a,
		.navbar .navbar-nav .active a:hover,
		.navbar .navbar-nav .active a:focus {
			color: #fff;
			text-shadow: 0 0 4px rgba(255, 255, 255, 0.2);
			background: transparent !important;
		}

		.navbar .navbar-nav .user-action {
			padding: 9px 15px;
			font-size: 15px;
		}

		.navbar .navbar-toggle {
			border-color: #fff;
		}

		.navbar .navbar-toggle .icon-bar {
			background: #fff;
		}

		.navbar .navbar-toggle:focus,
		.navbar .navbar-toggle:hover {
			background: transparent;
		}

		.navbar .navbar-nav .open .dropdown-menu {
			background: #faf7fd;
			border-radius: 1px;
			border-color: #faf7fd;
			box-shadow: 0 2px 8px rgba(0, 0, 0, .05);
		}

		.navbar .divider {
			background-color: #e9ecef !important;
		}

		@media (min-width: 1200px) {
			.form-inline .input-group {
				width: 350px;
				margin-left: 30px;
			}
		}

		@media (max-width: 1199px) {
			.navbar .navbar-nav>a>i {
				display: inline-block;
				text-align: left;
				min-width: 30px;
				position: relative;
				top: 4px;
			}

			.navbar .navbar-collapse {
				border: none;
				box-shadow: none;
				padding: 0;
			}

			.navbar .navbar-form {
				border: none;
				display: block;
				margin: 10px 0;
				padding: 0;
			}

			.navbar .navbar-nav {
				margin: 8px 0;
			}

			.navbar .navbar-toggle {
				margin-right: 0;
			}

			.input-group {
				width: 100%;
			}
		}
	</style>

<style>
	.card {
		background-color: #ffebee;
		border-radius: 10px;
	
	}
</style>
</head>

<body>
	<nav class="navbar navbar-expand-xl navbar-dark bg-dark">
		<img src="img/Logo.svg" width="900" height="90" alt="">
		<a href="index.php" class="navbar-brand">Frida<b>Kahlo</b></a>
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
				<a href="index.php" class="nav-item nav-link active"><i class="fa fa-home"></i><span>Home</span></a>
				<a href="Proveedores.php" class="nav-item nav-link"><i class="fas fa-truck-moving"></i><span>Proveedores</span></a>
				<a <?php echo $restringido ?> href="Usuarios.php" class="nav-item nav-link"><i class="fa fa-users"></i><span>Empleados</span></a>
				<a href="Servicios.php" class="nav-item nav-link"><i class="fas fa-cash-register"></i><span>Ventas</span></a>
				<a href="Clientes.php" class="nav-item nav-link"><i class="fas fa-user-tag"></i><span>Clientes</span></a>
				<a href="#" class="nav-item nav-link"><i class="fas fa-female"></i><span>Servicios</span></a>

				<div class="dropdown">
					<a class="nav-item nav-link dropdown-toggle user-action" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<img src="img/admin.png" class="avatar" alt="Avatar"> <?php echo $_SESSION["nombre_usuario"] . "/" . $tipo; ?> <b class="caret"></b>
					</a>

					<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
						<a class="dropdown-item" href="#"><i class="fa fa-user-o"></i>Perfil</a>
						<a onclick="logout();" class="dropdown-item" href="#"  ><i class="material-icons">&#xE8AC;</i>Cerrar Sesion</a>
					</div>
				</div>

			</div>
		</div>
	</nav>














	<!--BUNDLE DE BOOSTRAP-->
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

</body>

</html>