<?php
// serve para armazenar informaçoes que podem ser utilizadas em varias paginas

//usado para carrinhos de compra sistemas de login

session_start();

$_SESSION['cor'] = "Verde";
$_SESSION['carro'] = "Veloster";
echo $_SESSION['cor']
?>
