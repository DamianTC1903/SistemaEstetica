<?php 

	include_once 'conexion.php';
	if(isset($_GET['id'])){
		$id=(int) $_GET['id'];
		$delete=$con->prepare('DELETE FROM ventaproductos WHERE id_venta=:id');
		$delete->execute(array(
			':id'=>$id
		));
		header('Location: \stetica2/VentaProductos.php');
	}else{
		header('Location: \stetica2/VentaProductos.php');
	}
 ?>