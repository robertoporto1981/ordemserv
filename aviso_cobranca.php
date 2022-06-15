 <?php session_start() ?>

 <?php require_once 'testa_login.php';

require_once 'vendors/PHPMailer/src/PHPMailer.php';
require_once 'vendors/PHPMailer/src/SMTP.php';
require_once 'vendors/PHPMailer/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

?>

 <html lang='pt-BR'>
 
 		<head>
 
 		<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>                
        <link type ="text/css" rel="stylesheet" href="css/reset.css">               
        <link type="text/css" rel="stylesheet" href="stylesheet.css">
        <link rel="stylesheet" href="css/bootstrap.css">
        
 
</head>

<body>

<center>COBRANCA AUTOMATICA</center>

<form action="./" id="formulario" method="post">

       <input type="button" class="btn btn-dark btn-sm" value="Voltar" onclick="Acao('menu');"><p>
    

</form> 
</form><!--Funcao javascript-->
<script type="text/javascript">
    // <![CDATA[
     function Acao(act){
       frm = document.getElementById('formulario');
       frm.action = act + '.php'; 
       frm.submit();
    // ]]>
    }
</script>					

<?php

$data_atual = date( 'Ymd' );

$usuario = $_SESSION['login'];

// Conexao
require_once 'conexao.php';

// $sql = "select * from contasareceber where status = 'receber' order by codoper asc";
echo $sql = "SELECT contasareceber.codcliente, contasareceber.nome,contasareceber.datavenc,contasareceber.codoper,clientes.email, contasareceber.status FROM contasareceber INNER JOIN clientes ON contasareceber.codcliente = clientes.cod WHERE contasareceber.status = 'RECEBER' 
AND contasareceber.datavenc < '$data_atual'";


$consulta = mysqli_query( $conexao, $sql );

if ( mysqli_error( $conexao ) == true ) {
	
	echo '<div class="error-mysql">';
				
	echo( "Erro! <br> " . mysqli_error( $conexao ) );
				
	echo '<br>';
				
	echo $sql;
				
	echo '</div>';
				
	mysqli_close( $conexao );

	die;
	
} 


// Armazena os dados da consulta em um array associativo
while ( $registro = mysqli_fetch_assoc( $consulta ) ) {
				
		$registro["descr"];
				
		$registro["codoper"];
				
		$datalanc = $registro["data"];
				
		$datalancamento = date( 'd/m/Y', strtotime( $datalanc ) );
				
		$datavenc = $registro["datavenc"];
				
		$datavencimento = date( 'd/m/Y', strtotime( $datavenc ) );
				
		echo $registro["nome"];
				
		$registro["descr"];
				
		$registro["valor"];
				
		$registro["total"];
				
		echo $registro["parcela"];
			
		echo $registro["email"];				
               
		echo "<br>";
				
		Mandaemail( $registro["nome"], $registro["email"], $datavencimento, $registro["parcela"], $registro["codoper"], $valor_parcela );				
				
} 

// Envia o Email:
Function MandaEmail( $nome, $email, $datavencimento, $parcela, $titulo, $valor_parcela )

{
				
$mensagem = "<strong>Prezado(a) Sr(a)</strong> $nome,<br><br>

Consta em nossos registros que o pagamento referente a $parcela <strong>parcela</strong> do <strong>documento n�: </strong><strong>$titulo</strong>, com vencimento no <strong>dia $datavencimento</strong>, ainda encontra-se em aberto.<br>

Dessa forma, fazemos uso do presente para cientifica-lo(a) do d�bito pendente e solicitar sua mais breve regularizac�o.<br>

Caso o pagamento ja tenha sido efetuado, por favor desconsidere.<p><strong>Whatsapp:</strong><br>(51)98660-0428";
				
$mail = new PHPMailer( true );
try {
								
// Server settings
$mail -> SMTPDebug = false;
	
$mail -> isSMTP();
	
$mail -> Host = 'smtp.outlook.office365.com';
	
$mail -> SMTPAuth = true;
	
$mail -> Username = 'roberto.porto@outlook.com';
	
$mail -> Password = '200176210@aB';
	
$mail -> SMTPSecure = 'tls';
	
$mail -> Port = 587;
								
// Recipients:
	
$mail -> setFrom( 'roberto.porto@outlook.com', 'Aviso de cobranca' );

$mail -> addAddress( $email, $email );
							
$mail -> Subject = $email;

$mail -> msgHTML( "<html>{$mensagem}</html>" );

$mail -> AltBody = "{$email}\nmensagem: {$mensagem}";
								
if ( $mail -> send() ) {

	$_SESSION["success"] = "Mensagem enviada com sucesso";
	
	header( "Location: menu.php" );
												
	} else {

$_SESSION["danger"] = "Erro ao enviar mensagem " . $mail -> ErrorInfo;

	header( "Location: contato.php" );

} 
								} 
catch ( Exception $e ) {

	echo 'Message could not be sent.';
	
	echo 'Mailer Error: ' . $mail -> ErrorInfo;
	 } 
		
} 


?>

</html>
	   


<script type="text/javascript">
    // <![CDATA[
     function Acao(act){
       frm = document.getElementById('formulario');
       frm.action = act + '.php'; 
       frm.submit();
    // ]]>
    }
</script>





</body>

</html>