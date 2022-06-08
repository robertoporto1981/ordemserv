 <?php session_start() ?>

 <?php require_once 'testa_login.php'; ?>
 
 <html lang='pt-BR'>
 
 		<head>
 
 		<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>                
        <link type ="text/css" rel="stylesheet" href="css/reset.css">               
        <link rel="stylesheet" href="css/bootstrap.css">
        <link type="text/css" rel="stylesheet" href="stylesheet.css">
 
</head>

<body>

<h3><center>RELATORIO CONTAS A RECEBER</center></h3>

<form action="./" id="formulario" method="post">

    <!--<input type="button" value="Altera" onclick="Acao('altera_contas_receber');"> -->

    <input type="button" class="btn btn-dark btn-sm" value="Voltar" onclick="Acao('menu');"><p>
    

</form> 					

<?php

$usuario = $_SESSION['login'];


require_once 'vendors/PHPMailer/src/PHPMailer.php';
require_once 'vendors/PHPMailer/src/SMTP.php';
require_once 'vendors/PHPMailer/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

$busca = $_POST['busca'];

if ( $busca == "pago" ) {
				
				header( "Location:consulta_pagos.php" );
				
				} else {
				
				$busca = "receber";
				
				} 

// Conexao
require_once 'conexao.php';



if ( empty( $busca ) )
				
				 {
				echo"<script language='javascript' type='text/javascript'>alert('Nao foi encontrado nenhum registro!');window.location.href='form_cadastro_produto.html';</script>";
				} 


$sql = "select * from contasareceber where status = ('$busca') order by codoper desc";


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
echo '<table class="table table-bordered">
    
    <thead class="thead-dark">
    
    <tr>
    
    <th scope="col">#</th>
    
    <th scope="col">#</th>
    
      <th scope="col">CODOPER:</th>
    
      <th scope="col">DATA LANCTO:</th>
    
      <th scope="col">DATA VENCTO:</th>
    
      <th scope="col">CLIENTE:</th>
      
      <th scope="col">DESCRICAO:</th>
      
      <th scope="col">VLR.PARCELA:</th>
      
      <th scope="col">TOTAL:</th>
      
      <th scope="col">PARCELA:</th>
      
      <th scope="col">STATUS:</th>    
          
    </tr>
    
    </thead>';



while ( $registro = mysqli_fetch_assoc( $consulta ) ) {
				
				echo"<form action='./' id='formulario' method='post'>";
				
				 echo'<tr>';
				
				 // echo '<td id="campos"><a href="baixa_receber.php?codoper='.$registro["codoper"].'"#><img src="https://img.icons8.com/material/24/000000/request-money.png"></td>';
				echo '<td><a href="baixa_receber.php?codoper=' . $registro["codoper"] . '"&descr=' . $registro["descr"] . '"¨&valor=' . $registro["valor"] . '"#><img src="images/receber.png"></td>';
				
				
				 echo '<td><a href="exclui_baixa_receber.php?codoper=' . $registro["codoper"] . '"&descr=' . $registro["descr"] . '"¨&valor=' . $registro["valor"] . '"#><img src="images/lixeira.png" width="20px"></td>';
				
				 echo '<td>' . $registro["codoper"] . '</td>';
				
				 // echo '<td id="campos">'.$registro["data"].'</td>';
				$datalanc = $registro["data"];
				
				 $dia = substr( "$datalanc", 0, 2 );
				
				 $mes = substr( "$datalanc", 2, 2 );
				
				 $ano = substr( "$datalanc", 4, 8 );
				
				 $datalancamento = "$dia/$mes/$ano";
				
				 echo '<td>' . $datalancamento . '</td>';
				
				 // echo '<td id="campos">'.$registro["datavenc"] = date('d/m/Y').'</td>';
				$datavenc = $registro["datavenc"];
				
				 $dia = substr( "$datavenc", 0, 2 );
				
				 $mes = substr( "$datavenc", 2, 2 );
				
				 $ano = substr( "$datavenc", 4, 8 );
				
				 $datavencimento = "$dia/$mes/$ano";
				
				 echo '<td>' . $datavencimento . '</td>';
				
				
				 // echo '<td id="campos">'.$registro["datavenc"] = date('d/m/Y').'</td>';
				echo '<td>' . $cliente = $registro["nome"] . '</td>';
				
				 echo '<td>' . $registro["descr"] . '</td>';
				
				 echo '<td>' . "R$" . number_format( $registro["valor"], 2, ',', '.' ) . '</td>';
				
				 echo '<td>' . "R$" . number_format( $registro["total"], 2, ',', '.' ) . '</td>';
				
				 echo '<td>' . $registro['parcela'] . '</td>';
				


$nome = "RJ INFORMATICA";
$email = "roberto.porto@outlook.com";
$mensagem = "Caro $cliente vc esta com a parcela $datavencimento atrasada.";
								
								 } 

				
				echo'</tr>';
				



$mail = new PHPMailer(true);
try {

     //Server settings
    $mail->SMTPDebug = 2;               
    $mail->isSMTP();                               
    $mail->Host = 'smtp.office365.com';  
    $mail->SMTPAuth = true;             
    $mail->Username = 'roberto.porto@outlook.com';
    $mail->Password = '200176210@aB';     
    $mail->SMTPSecure = 'tls';               
    $mail->Port = 587;                                 

    //Recipients
    $mail->setFrom('roberto.porto@outlook.com', 'Ordem de Servicos');
    $mail->addAddress('roberto.porto@outlook.com', 'Roberto Porto');  

    $mail->Subject = "roberto.porto@outlook.com";
    $mail->msgHTML("<html>De: {$nome}<br/>Email: {$email}<br/>Mensagem: {$mensagem}</html>");
    $mail->AltBody = "De: {$nome}\nemail:{$email}\nmensagem: {$mensagem}";

    if ($mail->send()) {
        $_SESSION["success"] = "Mensagem enviada com sucesso";
        header("Location: index.php");
    } else {
        $_SESSION["danger"] = "Erro ao enviar mensagem " . $mail->ErrorInfo;
        header("Location: contato.php");
    }
} catch (Exception $e) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
}
die();


				 

echo'</table>';


$sql2 = "SELECT sum(valor) FROM `contasareceber` where status = 'RECEBER'";

$query = mysqli_query( $conexao, $sql2 );

if ( mysqli_error( $conexao ) == true ) {
				echo '<div class="error-mysql">';
				
				echo( "Erro! <br> " . mysqli_error( $conexao ) );
                
                echo '<br>';
                
                 echo $sql2;
				
				echo '</div>';
				
				mysqli_close( $conexao );
				die;
				} 

while ( $exibir = mysqli_fetch_array( $query ) ) {
				
				$total = $exibir['0'];
				
				} 



?>
     <h1 id ="borda2">Total a receber R$: <?php echo number_format( $total, 2, ',', '.' )?></h1>


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