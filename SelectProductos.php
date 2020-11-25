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

$sql = "SELECT *FROM productos INNER JOIN promociones ON productos.id_promocion=promociones.id_promocion  ORDER BY id_producto DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  $optionsProductos="";
  while($row = $result->fetch_assoc()) {
   // echo "id: " . $row["id_cliente"].  "<br>";
    $id_cliente= $row["id_producto"];
    $nombre_cliente= $row["nombre_producto"];


//echo "<option value=".$row["id_cliente"].">$nombre_cliente</option>";

$optionsProductos =$optionsProductos."<option   value=".$row["id_producto"].">$row[nombre_producto]</option>";

    
  }
} else {
  echo "0 results";
}
$conn->close();
?>