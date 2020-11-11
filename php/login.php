<?php
	session_start();

	//connect to database
	$C = mysqli_connect("localhost", "root", "", "estetica");

	//search database
	//$stmt = $C->prepare("SELECT * FROM usuarios WHERE nombre_usuario=? AND contraseña_usuario=PASSWORD(?) LIMIT 1");
	$stmt = $C->prepare("SELECT * FROM usuarios WHERE nombre_usuario=? AND contraseña_usuario=? LIMIT 1");
	$stmt->bind_param("ss", $_POST['username'], $_POST['password']);
	$stmt->execute();
	$stmt->store_result();




	if($stmt->num_rows === 1 ) {
	

		
		$_SESSION['verified'] = true;
		$_SESSION['nombre_usuario'] =$_POST['username'];
		
	

		echo "true";
		
	}
	else {

		echo "false";
		
	}

	$stmt->close();
	$C->close();
?>