<?php

require_once 'vendor/autoload.php';
//referenciando o namespace
use Dompdf\Dompdf;

include '../connect.php';

$sql = $con->query('select * from reg as r inner join adm as a on a.id_Adm = r.fk_adm;');
$html = '<table border=1>';
 $html .='<thead>';
  $html .= '<tr>';
    $html .= '<td>id</td>';
    $html .= '<td>Nome</td>';
    $html .= '<td>Usuario</td>';
    $html .= '<td>Gender</td>';
    $html .= '<td>Permissão</td>';
  $html .= '</tr>';
 $html .='</thead>';

while ($linha =  mysqli_fetch_assoc($sql)){
    $html .= '<tbody>';
     $html .= '<tr> <td>' .$linha['id'] .'</td>';
     $html .= '<td>' .$linha['name'] .'</td>';
     $html .= '<td>' .$linha['username'] .'</td>';
     $html .= '<td>' .$linha['gender'] .'</td>';
     $html .= '<td>' .$linha['perm'] .'</td>';
    $html .= '</tbody>';
}

$html .='</table>';

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