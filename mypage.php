<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
$conn = new mysqli('localhost','root','','restaurant');
if(isset($_POST['name']))
{
        // Add Repas
  $sql = "INSERT INTO repas (name, price, quantity) VALUES ('".$_POST['name']."', '".$_POST['price']."', ".$_POST['quantity'].")";
  if ($conn->query($sql) === TRUE) {
    $myJSON = json_encode("New repas created successfully");
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}
else
{
    // Get Repas
$sql = "SELECT * FROM repas";
$result = $conn->query($sql);
$myArr = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $myArr[] = $row;
    }
} else {
echo "0 results";
}

$myJSON = json_encode($myArr);
echo $myJSON;
}