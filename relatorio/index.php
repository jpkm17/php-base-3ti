<?php

require_once 'vendor/autoload.php';
//referenciando o namespace
use Dompdf\Dompdf;

include '../connect.php';

$sql = $con->query('SELECT * FROM produto');
$html = '<table border=1>';
 $html .='<thead>';
  $html .= '<tr>';
    $html .= '<td>ID</td>';
    $html .= '<td>Nome</td>';
    $html .= '<td>preço</td>';
    $html .= '<td>quantidade</td>';
    $html .= '<td>genero</td>';
  $html .= '</tr>';
 $html .='</thead>';

while ($linha =  mysqli_fetch_assoc($sql)){
    $html .= '<tbody>';
     $html .= '<tr> <td>' .$linha['idProduto'] .'</td>';
     $html .= '<td>' .$linha['nomeProduto'] .'</td>';
     $html .= '<td>' .$linha['preçoProduto'] .'</td>';
     $html .= '<td>' .$linha['quantidade'] .'</td>';
     $html .=  '<td>' .$linha['fk_idGenero'] .'</td></tr>';
    $html .= '</tbody>';
}

$html .='</table>';

//instancia do dompdf
$dompdf = new Dompdf;

//converter o html
$dompdf->loadHtml('<h1>Relatorio de produtos</h1>' .$html);

//Definir o tamanho e orientação
$dompdf-> setPaper('A4', 'portrait');

//renderizar o html
$dompdf->render();

//enviar para o browser
$dompdf->stream('relatorio.pdf');
?>