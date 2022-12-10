
<?php
   include_once("../banco/conexao.php");
   $conectar = getConnection();
?>

<?php
	$sql = $conectar->query('SELECT * FROM hq');

$html ='<h1> Relatorio de Campus</h1>';
$html .= '<table border=1 width=100%>';
$html .= '<thead>';
$html .= '<tr>';
$html .= '<td>ID</td>';
$html .= '<td>Nome</td>';
$html .= '<td>Ano</td>';
$html .= '<td>Número de Serie</td>';
$html .= '<td>Autor</td>';
$html .= '<td>Ilustrador</td>';
$html .= '<td>Editora</td>';
$html .= '</tr>';
$html .= '</thead>';

while ($linha = $sql->fetch(PDO::FETCH_ASSOC)) {
	$html .='<tbody>';
	$html .= '<tr><td>'.$linha['id'] .'</td>';
	$html .= '<td>'.$linha['nome'] .'</td>';
	$html .= '<td>'.$linha['ano'] .'</td></tr>';
	$html .= '<td>'.$linha['numdserie'] .'</td></tr>';
	$html .= '<td>'.$linha['autor'] .'</td></tr>';
	$html .= '<td>'.$linha['ilust'] .'</td></tr>';
	$html .= '<td>'.$linha['editora'] .'</td></tr>';
	$html .='</tbody>';	
}
$html .='</table>';


//referenciar o DomPDF com namespace
	use Dompdf\Dompdf;

	// include autoloader
	require_once("dompdf/dompdf/autoload.inc.php");

	//Criando a Instancia
	$dompdf = new DOMPDF();
	
	// Defini o tipo de Papel e sua Orientacao
	$dompdf->setPaper('A4','portrait');

	// Carrega seu HTML
	$dompdf->load_html($html);


	//Renderizar o html
	$dompdf->render();

	//Exibibir a página
	$dompdf->stream(
		"relatorio.pdf", 
		array(
			"Attachment" => false //Para realizar o download somente alterar para true
		)
	);
?>
