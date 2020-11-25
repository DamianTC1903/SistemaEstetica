
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

$sql = "SELECT *FROM promociones ORDER BY id_promocion DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  $optionsProductosDescuento="";
  while($row = $result->fetch_assoc()) {
   // echo "id: " . $row["id_cliente"].  "<br>";



//echo "<option value=".$row["id_cliente"].">$nombre_cliente</option>";

$optionsProductosDescuento =$optionsProductosDescuento."<option value=".$row["id_promocion"].">$row[Descuento]</option>";

    
  }
} else {
  echo "0 results";
}
$conn->close();
?>