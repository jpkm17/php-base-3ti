<?php
session_start();

unset($_SESSION['name']);

echo "Session name delete.";
?>