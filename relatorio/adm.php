<?php

require_once 'vendor/autoload.php';
//referenciando o namespace
use Dompdf\Dompdf;

include '../connect.php';

$sql = $con->query('select * from reg as r inner join profile_reg as pr on pr.idProfile = r.fk_profile;');

$html = '
  <!DOCTYPE html>
  <html lang="pt-BR">
  <head>
    <meta charset="UTF-8">
    <title>TABELA</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
      
    <style>
      body{
        font-family:-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif;
      }
      .table, th, th {
        border:1px solid #dee2e6;border-radius:.25rem;max-width:100%;height:auto;
      }
      .table .thead-dark th{
        color:#FFF;
        background-color:#212529;
        border-color:#32383e;
      }
      .table td,.table th{padding:.75rem;vertical-align:top;border-top:1px solid #dee2e6;}
    </style>
  </head>
  <body>
      <table class="table">
          <thead class="thead-dark">
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Nome</th>
              <th scope="col">Endereço</th>
              <th scope="col">Gênero</th>
              <th scope="col">Permissão</th>
            </tr>
          </thead>';
while ($linha =  mysqli_fetch_assoc($sql)){
  $html .= '<tbody>';
  $html .= '<tr> <th scope="row">' .$linha['id'] .'</th>';
  $html .= '<td>' .$linha['name'] .'</td>';
  $html .= '<td>' .$linha['city'] .'</td>';
  $html .= '<td>' .$linha['gender'] .'</td>';
  $html .= '<td>' .$linha['nameProfile'] .'</td>';
 $html .= '</tbody>';  
}


// $html = '<table border=1>';
//  $html .='<thead>';
//   $html .= '<tr>';
//     $html .= '<td>id</td>';
//     $html .= '<td>Nome</td>';
//     // $html .= '<td>Usuario</td>';
//     $html .= '<td>Gênero</td>';
//     $html .= '<td>Permissão</td>';
//   $html .= '</tr>';
//  $html .='</thead>';

// while ($linha =  mysqli_fetch_assoc($sql)){
//     $html .= '<tbody>';
//      $html .= '<tr> <td>' .$linha['id'] .'</td>';
//      $html .= '<td>' .$linha['name'] .'</td>';
//     //  $html .= '<td>' .$linha['username'] .'</td>';
//      $html .= '<td>' .$linha['gender'] .'</td>';
//      $html .= '<td>' .$linha['nameProfile'] .'</td>';
//     $html .= '</tbody>';
// }

$html .='</table> </body> </html>';

//instancia do dompdf
$dompdf = new Dompdf;

//converter o html
$dompdf->loadHtml('<h1>Funcionarios cadastrados</h1>' .$html);

//Definir o tamanho e orientação
$dompdf-> setPaper('A4', 'portrait');

//renderizar o html
$dompdf->render();

//enviar para o browser
$dompdf->stream('relatorio_usuarios.pdf');
?>