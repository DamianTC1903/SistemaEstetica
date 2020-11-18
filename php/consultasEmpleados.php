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

$TotalUsuarios = $data['total'];
//$sql = "SELECT id, firstname, lastname FROM MyGuests";
//$result = $conn->query($sql);





// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$result=mysqli_query($conn, "SELECT count(*) as total from servicios");
$data=mysqli_fetch_assoc($result);
//echo $data['total'];

$TotalServicios = $data['total'];
//$sql = "SELECT id, firstname, lastname FROM MyGuests";
//$result = $conn->query($sql);






if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  $result=mysqli_query($conn, "SELECT count(*) as total from clientes");
  $data=mysqli_fetch_assoc($result);
  //echo $data['total'];
  
  $TotalClientes = $data['total'];
  //$sql = "SELECT id, firstname, lastname FROM MyGuests";
  //$result = $conn->query($sql);



  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  $result=mysqli_query($conn, "SELECT count(*) as total from usuarios");
  $data=mysqli_fetch_assoc($result);
  //echo $data['total'];
  
  $TotalEmpleados = $data['total'];
  //$sql = "SELECT id, firstname, lastname FROM MyGuests";
  //$result = $conn->query($sql);




  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  $result=mysqli_query($conn, "SELECT FORMAT (SUM(precio_servicio), 'C') AS value_sum FROM servicios");
  $data=mysqli_fetch_assoc($result);
  //echo $data['total'];
  $suma =  $data['value_sum'];
  

  //$sql = "SELECT id, firstname, lastname FROM MyGuests";
  //$result = $conn->query($sql);


  


$conn->close();
?>


