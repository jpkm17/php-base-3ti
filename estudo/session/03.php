<?php
session_start();

//excluir somente uma session
unset($_SESSION['name']);

//deleta todas as variaveis
session_unset();
?>