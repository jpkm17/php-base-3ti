<?php

header("Content-Type: application/json");
header("Acess-Control-Allow-Origin: *");
header("Acess-Control-Allow-Methods: POST");
header("Acess-Control-Allow-Headers: Acess-Control-Allow-Headers,Content-Type, 
Acess-Control-Allow-Methods, Authorization");

$data = json_decode(file_get_contents("php://input"), true);

$pname = $data["name"];
$pusername = $data["username"];
$ppassword = $data["password"];
$pcity = $data["city"];
$pimage = $data["image"];
$pgender = $data["gender"];

require_once "../connect.php";

$query = "insert into reg(name,username,password,city,image,gender)value('$pname','$pusername','$ppassword','$pcity','$pimage','$pgender')";

if(mysqli_query($con, $query) or die("Insert Query Failed"))
{
	echo json_encode(array("message" => "User Inserted Successfully", "status" => true));	
}
else
{
	echo json_encode(array("message" => "Failed User Not Inserted ", "status" => false));	
}

?>