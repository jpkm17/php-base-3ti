<?php
include 'connect.php';
$sq="delete from city where idCity ";
mysqli_query($con,$sq);
header('location:viewall_city.php');
?>