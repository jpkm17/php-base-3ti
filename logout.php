<?php

session_start();

unset($_SESSION['id']);

//redireciona para a tela de login
header('location:login.php')

?>