<?php
session_start();
include_once 'php/obtenerRol.php';
if (!isset($_SESSION['verified']) || $_SESSION['verified'] !== true) {
	header("Location: login.php");


	die();
}
?>










<!--CODIGO PHP QUE LISTA LA TABLA DE CLIENTES Y SU BUSQUEDA-->
<?php
include_once 'tablas/conexion.php';

//$sentencia_select = $con->prepare('SELECT *FROM usuarios INNER JOIN roles ON usuarios.id_rol=roles.id_rol ORDER BY id_usuario DESC');
$sentencia_select = $con->prepare('SELECT *FROM clientes ORDER BY id_cliente DESC');
$sentencia_select->execute();
$resultado = $sentencia_select->fetchAll();

// metodo buscar
if (isset($_POST['btn_buscar'])) {
	$buscar_text = $_POST['buscar'];
	//$select_buscar = $con->prepare('
	//SELECT *FROM usuarios INNER JOIN roles ON usuarios.id_rol=roles.id_rol  WHERE nombre_usuario LIKE :campo OR id_usuario LIKE :campo;');

	$select_buscar = $con->prepare('
			SELECT *FROM clientes  WHERE nombre_cliente LIKE :campo OR id_cliente LIKE :campo;');




	$select_buscar->execute(array(
		':campo' => "%" . $buscar_text . "%"
	));

	$resultado = $select_buscar->fetchAll();
}

?>









<?php
//metodo que nos servira para mandar una notificacion de eliminado
include_once 'tablas/conexion.php';

if (isset($_GET['d'])) {
	$delete = (int) $_GET['d'];
} else {
	header('Location: Clientes.php?d=0');
}


if ($delete == "1") {
	//echo "se elimino con exito";
	$ocultarAlerta = "";
	header('Refresh: 6; URL=Clientes.php');
} else {
	$ocultarAlerta = "hidden";
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

	<!--js que nos permitira cerrar sesion-->
	<script src="js/script.js"></script>
	<!--Diseños del nav bar-->
	<link rel="stylesheet" href="css/navbar.css">


	<!--Font Awesome para los iconos-->
	<script src="https://kit.fontawesome.com/c2bcc47e82.js" crossorigin="anonymous"></script>

</head>

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
				<a href="Proveedores.php" class="nav-item nav-link"><i class="fas fa-truck-moving"></i><span>Proveedores</span></a>
				<a <?php echo $restringido ?> href="Usuarios.php" class="nav-item nav-link"><i class="fa fa-users"></i><span>Empleados</span></a>
				<a href="Servicios.php" class="nav-item nav-link"><i class="fas fa-cash-register"></i><span>Ventas</span></a>
				<a href="Clientes.php" class="nav-item nav-link active"><i class="fas fa-user-tag"></i><span>Clientes</span></a>
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



	<div <?php echo $ocultarAlerta ?> class="alert alert-success alert-dismissible fade show" role="alert">
		<strong>Correcto!</strong> Se elimino al cliente con exito.
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>


	<!--Card-->
	<div class="container pt-3">
		<div class="card" style="width: 50rem;">
			<div class="card-body ">

				<!--Card/inicio de mi tabla Usuarios-->

				<div class="contenedor">
					<h3>Agregar, actualizar o eliminar Clientes </h3>
					<div>
						<form action="" class="form-group pt-3" method="post">
							<input type="text" name="buscar" placeholder="Buscar nombre, id" value="<?php if (isset($buscar_text)) echo $buscar_text; ?>" class="form-control ds-input">
							<br>
							<button type="submit" class="btn btn-outline-primary" name="btn_buscar" value="Buscar">
								<i class="fas fa-search"></i> Buscar
							</button>

							<button class="btn btn-outline-primary">
								<a href="insertCliente.php" class="fas fa-user-plus">Nuevo</a>
							</button>


						</form>
					</div>

					<!--Card/tabla resposiva-->
					<div class="table-responsive">
						<table class="table">
							<tr class="head">
								<td>Id</td>
								<td>Nombre</td>
								<td>Direccion</td>
								<td>Localidad</td>
								<td>Telefono</td>
								<td colspan="2">Acción</td>
							</tr>
							<?php foreach ($resultado as $fila) : ?>
								<tr>
									<td><?php echo $fila['id_cliente']; ?></td>
									<td><?php echo $fila['nombre_cliente']; ?></td>
									<td><?php echo $fila['direccion_cliente']; ?></td>
									<td><?php echo $fila['localidad_cliente']; ?></td>
									<td><?php echo $fila['telefono_cliente']; ?></td>
									<td><a href="updateCliente.php?id=<?php echo $fila['id_cliente']; ?>" class="btn btn-info">Editar</a></td>
									<td><a href="tablas/deleteCliente.php?id=<?php echo $fila['id_cliente']; ?>" class="btn btn-danger">Eliminar</a></td>
								</tr>
							<?php endforeach ?>
						</table>
					</div>
					<!--Card/tabla resposiva-->
				</div>
				<!--Card/Fin de mi tabla Usuarios-->




			</div>
		</div>
	</div>

	<!--Fin del card-->


	</div>

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