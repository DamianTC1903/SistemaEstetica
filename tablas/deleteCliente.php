<?php 

	include_once 'conexion.php';
	if(isset($_GET['id'])){
		$id=(int) $_GET['id'];
		$delete=$con->prepare('DELETE FROM clientes WHERE id_cliente=:id');
		$delete->execute(array(
			':id'=>$id
		));
		$eliminado="1";
		header('Location: \stetica2/Clientes.php?d='.$eliminado.'');
		
	}else{
		$eliminado="2";
		header('Location: \stetica2/Clientes.php?d='.$eliminado.'');
	}
 ?>