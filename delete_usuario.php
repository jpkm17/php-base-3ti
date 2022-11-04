<?php
include 'connect.php';
$id = $_GET['id'];
$name = $_GET['name'];
$sq = "delete from reg where id=$id";
mysqli_query($con, $sq);


$usuario = "select * from reg where id='$_SESSION[id]'";
$query = mysqli_query($con, $usuario);
$ct = mysqli_fetch_assoc($query);
function logMsg($id, $name, $nomeUsuario)
{
    $level = 'info';
    $file = '../log/main.log';
    // cota --> coluna da tabela
    $msg = '' .$nomeUsuario['name'] . ', Removeu: ' . $name . ', dos produtos.';
    $levelStr = '';

    // verifica o nível do log
    switch ($level) {
        case 'info':
            // nível de informação
            $levelStr = 'INFO';
            break;

        case 'warning':
            // nível de aviso
            $levelStr = 'WARNING';
            break;

        case 'error':
            // nível de erro
            $levelStr = 'ERROR';
            break;
    }

    date_default_timezone_set('America/Sao_Paulo');
    $date = date('Y-m-d H:i:s');

    $msg = sprintf("[%s] [%s]: %s%s", $date, $levelStr, $msg, PHP_EOL);

    file_put_contents($file, $msg, FILE_APPEND);
}
logMsg($id, $name, $ct);

  header('location:usuarios.php');
