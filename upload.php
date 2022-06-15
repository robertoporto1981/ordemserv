<?php

//Para importar o arquivo XML tem que mudar o nome para pagseguro.xml

@header( "Content-Type: text/html; charset=utf-8" );

date_default_timezone_set( 'America/Sao_Paulo' );

// Conexao com banco de dados:
require_once 'conexao.php';

// Caminho onde vai ler o XML:
$diretorio = "uploads";

$diretorio = $diretorio . "/" . basename( $_FILES["objetoarquivo"]["name"] );

if ( move_uploaded_file( $_FILES["objetoarquivo"]["tmp_name"], $diretorio ) ) {
				
// Le o arquivo xml:
	
	$xml = simplexml_load_file( "uploads/pagseguro.xml" );
				
				
// Insere os dados na tabela	:
	
	$sql = 'INSERT INTO entradasaidas VALUES';
				
	
foreach( $xml -> Table as $Table ) {
								
		
	echo $Table -> Cliente_Nome . '<br>';
								
	
	echo $Table -> Debito_Credito . '<br>';
								
	
	echo $Table -> Tipo_Transacao . '<br>';
								
	
	echo $Table -> Valor_Bruto . '<br>';
								
	
	echo $Table -> Valor_Liquido . '<br>';
								
	
	echo $Table -> Data_Transacao . '<br>';
								
	
	echo $Table -> Bandeira_Cartao_Credito . '<br>';
								
	
	echo '<hr>';
								
	
	echo '<br>';
								
	
	$codigotransacao = $Table -> Transacao_ID;
								
	
	$cliente = $Table -> Cliente_Nome;
								
	
	$tipo = strtoupper( $Table -> Tipo_Transacao );
								
								

if ( $tipo == "PAGAMENTO" ) {
												
	
	$tipot = "ENTRADA";												

} 

if ( $tipo == "SAQUE" ) {
												
	
	$tipot = "SAIDA";
												
} 										
												
	
$status = strtoupper( $Table -> Status );
								

$valor = $Table -> Valor_Liquido;
								

// $data = $Table->Data_Transacao;

$Data = $Table -> Data_Transacao;

// 

$dia = substr( $Data, 0, 2 );

								 
$mes = substr( $Data, 3, 2 );
								

$ano = substr( $Data, 6, 4 );
								

$datatransacao = "$ano$mes$dia";
								

$bandeira_cartao = strtoupper( $Table -> Bandeira_Cartao_Credito );
								
								

$sql .= "('','$datatransacao','$tipot','PAG SEGURO','$valor','ROBERTO','$codigotransacao','$bandeira_cartao','$status',''),";
								

} 
				

// echo $sql;

// echo '<br>';

} else {
				

	echo "Ocorreu um erro ao enviar o arquivo!";

} 
$sql = substr( $sql, 0, -1 );


mysqli_query( $conexao, $sql );

if ( mysqli_error( $conexao ) == true ) {
	
	echo '<div class="error-mysql">';
				
	
	echo( "Erro! <br> " . mysqli_error( $conexao ) );
				
	
	echo '</div>';
				
	
	mysqli_close( $conexao );
	
	die;

} 

?>	