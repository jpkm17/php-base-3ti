<?php

require_once 'vendor/autoload.php';
//referenciando o namespace
use Dompdf\Dompdf;

include '../connect.php';
$sql = $con->query('select * from produto as p inner join genero as g on g.idGenero = p.fk_idGenero;');
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
              <th scope="col">Preço</th>
              <th scope="col">Quantidade</th>
              <th scope="col">Gênero</th>
            </tr>
          </thead>';
while ($linha =  mysqli_fetch_assoc($sql)){
  $html .= '<tbody>';
  $html .= '<tr> <th scope="row">' .$linha['idProduto'] .'</th>';
  $html .= '<td>' .$linha['nomeProduto'] .'</td>';
  $html .= '<td>' .$linha['preçoProduto'] .'</td>';
  $html .= '<td>' .$linha['quantidade'] .'</td>';
  $html .= '<td>' .$linha['nomeGenero'] .'</td>';
 $html .= '</tbody>';  
}
$html .='</table> </body> </html>';
// $sql = $con->query('select * from produto as p inner join genero as g on g.idGenero = p.fk_idGenero;');
// $html = '<table border=1>';
//  $html .='<thead>';
//   $html .= '<tr>';
//     $html .= '<td>ID</td>';
//     $html .= '<td>Nome</td>';
//     $html .= '<td>preço</td>';
//     $html .= '<td>quantidade</td>';
//     $html .= '<td>genero</td>';
//   $html .= '</tr>';
//  $html .='</thead>';

// while ($linha =  mysqli_fetch_assoc($sql)){
//     $html .= '<tbody>';
//      $html .= '<tr> <td>' .$linha['idProduto'] .'</td>';
//      $html .= '<td>' .$linha['nomeProduto'] .'</td>';
//      $html .= '<td>' .$linha['preçoProduto'] .'</td>';
//      $html .= '<td>' .$linha['quantidade'] .'</td>';
//      $html .=  '<td>' .$linha['nomeGenero'] .'</td></tr>';
//     $html .= '</tbody>';
// }

//instancia do dompdf
$dompdf = new Dompdf;

//converter o html
$dompdf->loadHtml('<h1>Relatorio de produtos</h1>' .$html);

//Definir o tamanho e orientação
$dompdf-> setPaper('A4', 'portrait');

//renderizar o html
$dompdf->render();

//enviar para o browser
$dompdf->stream('relatorio_produtos.pdf');
?>