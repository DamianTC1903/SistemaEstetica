<?php 

	include_once 'conexion.php';
	if(isset($_GET['id'])){
		$id=(int) $_GET['id'];
		$delete=$con->prepare('DELETE FROM servicios WHERE id_servicios=:id');
		$delete->execute(array(
			':id'=>$id
		));
		header('Location: \stetica2/Servicios.php');
	}else{
		header('Location: \stetica2/Servicios.php');
	}
 ?>