<?php 

	include_once 'conexion.php';
	if(isset($_GET['id'])){
		$id=(int) $_GET['id'];
		$delete=$con->prepare('DELETE FROM usuarios WHERE id_usuario=:id');
		$delete->execute(array(
			':id'=>$id
		));
		header('Location: \stetica2/Usuarios.php');
	}else{
		header('Location: \stetica2/Usuarios.php');
	}
 ?>