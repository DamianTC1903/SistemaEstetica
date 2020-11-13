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
$result=mysqli_query($conn, "SELECT count(*) as total from usuarios");
$data=mysqli_fetch_assoc($result);
//echo $data['total'];

$TotalVentas = $data['total'];
//$sql = "SELECT id, firstname, lastname FROM MyGuests";
//$result = $conn->query($sql);


$conn->close();
?>


