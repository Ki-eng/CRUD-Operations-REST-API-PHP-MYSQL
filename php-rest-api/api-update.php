<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
//header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

$data = json_decode(file_get_contents("php://input"), true);

$id = $data['id'];
$name = $data['name'];
$sclass = $data['sclass'];
$address = $data['address'];
$phone = $data['phone'];

include "config.php";

$sql = "UPDATE student SET name = '{$name}', sclass = {$sclass}, address = '{$address}' WHERE id = {$id}";

if(mysqli_query($conn, $sql)){
	echo json_encode(array('message' => 'Student Record Updated.', 'status' => true));
}else{
  echo json_encode(array('message' => 'Student Record Not Updated.', 'status' => false));
}


?>
