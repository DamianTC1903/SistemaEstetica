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

$sql = "SELECT id_cliente, nombre_cliente FROM clientes";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  $options="";
  while($row = $result->fetch_assoc()) {
   // echo "id: " . $row["id_cliente"].  "<br>";
    $id_cliente= $row["id_cliente"];
    $nombre_cliente= $row["nombre_cliente"];


//echo "<option value=".$row["id_cliente"].">$nombre_cliente</option>";

$options =$options."<option   value=".$row["id_cliente"].">$row[nombre_cliente]</option>";

    
  }
} else {
  echo "0 results";
}
$conn->close();
?>