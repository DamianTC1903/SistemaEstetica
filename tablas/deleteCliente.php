<?php 

	include_once 'conexion.php';
	if(isset($_GET['id'])){
		$id=(int) $_GET['id'];
		$delete=$con->prepare('DELETE FROM clientes WHERE id_cliente=:id');
		$delete->execute(array(
			':id'=>$id
		));
		header('Location: \stetica2/Clientes.php');
	}else{
		header('Location: \stetica2/Clientes.php');
	}
 ?>