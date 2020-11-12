<?php
	include_once 'conexion.php';

	$sentencia_select=$con->prepare('SELECT *FROM usuarios INNER JOIN roles ON usuarios.id_rol=roles.id_rol ORDER BY id_usuario DESC');
	$sentencia_select->execute();
	$resultado=$sentencia_select->fetchAll();

	// metodo buscar
	if(isset($_POST['btn_buscar'])){
		$buscar_text=$_POST['buscar'];
		$select_buscar=$con->prepare('
			SELECT *FROM usuarios INNER JOIN roles ON usuarios.id_rol=roles.id_rol  WHERE nombre_usuario LIKE :campo OR id_usuario LIKE :campo;'
		);


		

		$select_buscar->execute(array(
			':campo' =>"%".$buscar_text."%"
		));

		$resultado=$select_buscar->fetchAll();

	}

?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Inicio</title>
	<link rel="stylesheet" href="css/estilo.css">
</head>
<body>
	<div class="contenedor">
		<h2>CRUD EN PHP CON MYSQL</h2>
		<div class="barra__buscador">
			<form action="" class="formulario" method="post">
				<input type="text" name="buscar" placeholder="buscar nombre o apellidos" 
				value="<?php if(isset($buscar_text)) echo $buscar_text; ?>" class="input__text">
				<input type="submit" class="btn" name="btn_buscar" value="Buscar">
				<a href="insert.php" class="btn btn__nuevo">Nuevo</a>
			</form>
		</div>
		<table>
			<tr class="head">
				<td>Id</td>
				<td>Nombre</td>
				<td>Contraseña</td>
				<td>Rol</td>
				<td colspan="2">Acción</td>
			</tr>
			<?php foreach($resultado as $fila):?>
				<tr >
					<td><?php echo $fila['id_usuario']; ?></td>
					<td><?php echo $fila['nombre_usuario']; ?></td>
					<td><?php echo $fila['contraseña_usuario']; ?></td>
					<td><?php echo $fila['nombre_rol']; ?></td>
					<td><a href="update.php?id=<?php echo $fila['id_usuario']; ?>"  class="btn__update" >Editar</a></td>
					<td><a href="delete.php?id=<?php echo $fila['id_usuario']; ?>" class="btn__delete">Eliminar</a></td>
				</tr>
			<?php endforeach ?>

		</table>
	</div>
</body>
</html>