<?php

header("Content-Type: application/json");
header("Acess-Control-Allow-Origin: *");
header("Acess-Control-Allow-Methods: PUT");
header("Acess-Control-Allow-Headers: Acess-Control-Allow-Headers,Content-Type, 
Acess-Control-Allow-Methods, Authorization");

$data = json_decode(file_get_contents("php://input"), true);

$pname = $data["name"];
$pusername = $data["username"];
$ppassword = $data["password"];
$pcity = $data["city"];
$pimage = $data["image"];
$pgender = $data["gender"];
$pid = $data["id"];

require_once "../connect.php";

echo $query = "UPDATE reg set name='$pname', username='$pusername', 
      password='$ppassword', city='$pcity', image='$pimage', gender='$pgender' 
      where id=$pid;";

if(mysqli_query($con, $query) or die("Update Query Failed"))
{	
	echo json_encode(array("message" => "User Update Successfully", "status" => true));	
}
else
{	
	echo json_encode(array("message" => "Failed User Not Updated", "status" => false));	
}

?>