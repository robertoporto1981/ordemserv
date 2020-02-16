<?php session_start() ?>
<?php

//Conexao

require_once 'conexao.php';


@header("Content-Type: text/html; charset=utf-8");	
	//$xml = simplexml_load_file("pagseguro.xml");

	$xml = simplexml_load_file("uploads/pagseguro.xml");

	

$sql = 'INSERT INTO entradasaidas VALUES ';

foreach($xml->Table as $Table){

	echo $Table->Cliente_Nome.'<br>';

	echo $Table->Debito_Credito.'<br>';

	echo $Table->Tipo_Transacao.'<br>';

	echo $Table->Valor_Bruto.'<br>';

	echo $Table->Valor_Liquido.'<br>';

echo $Table->Data_Transacao.'<br>';

	echo $Table->Bandeira_Cartao_Credito.'<br>';

	echo '<hr>';
 
	echo '<br>';

	$codigotransacao = $Table->Transacao_ID;

	$cliente = $Table->Cliente_Nome;

	$tipo = strtoupper($Table->Tipo_Transacao);

	$valor = $Table->Valor_Liquido;	

	$Data = $Table->Data_Transacao;		
//	
	$dia = substr($Data,0,2);

	$mes = substr($Data,2,2);

	$ano = substr($Data,4,8);

	$datatransacao = "$ano$mes$dia";

	echo '<td id="campos">'.$datatransacao.'</td>';

	$bandeira_cartao = strtoupper($Table->Bandeira_Cartao_Credito);	
       
$sql.= "('$datatransacao','$tipo','PAG SEGURO','$valor','ROBERTO','$codigotransacao','$bandeira_cartao')";

}

mysqli_query($conexao,$sql) or die("Erro ao tentar cadastrar registro");
 
mysqli_close($conexao);

?>



