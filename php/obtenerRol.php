<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "estetica";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}
$name = $_SESSION["nombre_usuario"];
$sql = "SELECT id_rol FROM usuarios WHERE nombre_usuario='$name'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	// output data of each row
	while ($row = $result->fetch_assoc()) {
		//echo  $row["id_rol"];
		if ($row["id_rol"] =="1") {
			$restringido = "";
			//echo "Dueñas";
			$tipo = "dueña";
		} else if ($row["id_rol"] == "2") {
      $restringido = "";
      $tipo = "Encargada";
			//echo "Encargada";
		} else if ($row["id_rol"] == "3") {
      //echo "Empleada";
      $tipo = "Empleada";
			$restringido = "hidden";
		} else {
			echo "NO Existe";
		}
	}
} else {
	echo "0 results";
}
$conn->close();
?>