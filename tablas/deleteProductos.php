<?php 

	include_once 'conexion.php';
	if(isset($_GET['id'])){
		$id=(int) $_GET['id'];
		$delete=$con->prepare('DELETE FROM productos WHERE id_producto=:id');
		$delete->execute(array(
			':id'=>$id
		));
		header('Location: \stetica2/Productos.php');
	}else{
		header('Location: \stetica2/Productos.php');
	}
 ?>