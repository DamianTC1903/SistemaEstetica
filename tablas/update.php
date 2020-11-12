<?php
include_once 'conexion.php';

if (isset($_GET['id'])) {
	$id = (int) $_GET['id'];

	$buscar_id = $con->prepare('SELECT * FROM usuarios WHERE id_usuario=:id LIMIT 1');
	$buscar_id->execute(array(
		':id' => $id
	));
	$resultado = $buscar_id->fetch();
} else {
	header('Location: index.php');
}


if (isset($_POST['guardar'])) {
	$nombre = $_POST['nombre'];
	$apellidos = $_POST['apellidos'];
	$telefono = $_POST['telefono'];
	$ciudad = $_POST['ciudad'];
	$id = (int) $_GET['id'];

	if (!empty($nombre) && !empty($apellidos) && !empty($telefono) && !empty($ciudad)) {

		$consulta_update = $con->prepare(' UPDATE usuarios SET  
					id_usuario=:nombre,
					nombre_usuario=:apellidos,
					contraseña_usuario=:telefono,
					id_rol=:ciudad
					WHERE id_usuario=:id;');
		$consulta_update->execute(array(
			':nombre' => $nombre,
			':apellidos' => $apellidos,
			':telefono' => $telefono,
			':ciudad' => $ciudad,
			':id' => $id
		));
		header('Location: index.php');
	} else {
		echo "<script> alert('Los campos estan vacios');</script>";
	}
}

?>
<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<title>Editar Cliente</title>
	<link rel="stylesheet" href="css/estilo.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
	<div class="contenedor">
		<h2>CRUD EN PHP CON MYSQL</h2>
		<form action="" method="post">
			<div class="form-group">
				<input type="text" name="nombre" value="<?php if ($resultado) echo $resultado['id_usuario']; ?>" class="input__text">
				<input type="text" name="apellidos" value="<?php if ($resultado) echo $resultado['nombre_usuario']; ?>" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="telefono" value="<?php if ($resultado) echo $resultado['contraseña_usuario']; ?>" class="input__text">


				<select name="ciudad" class="custom-select ">
					<option selected>Roles</option>
					<option value="1">Encarcada</option>
					<option value="2">Dueña</option>
					<option value="3">Empleado</option>
				</select>
			</div>

			<div class="btn__group">
				<a href="index.php" class="btn btn__danger">Cancelar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
			</div>
		</form>
	</div>




	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>