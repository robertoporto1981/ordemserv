<?php session_start() ?>

<html>
	<head>
	
	<meta charset="utf-8">
	
    <?php echo $sweet = $_SESSION['sweet_alert'];
?>
    
	<link type="text/css" rel="stylesheet" href="stylesheet.css">
	<link rel="stylesheet" href="css/bootstrap.css">
		
	
  	 <title>Serviços</title>
<!--<h1><p align="center">Tabela de serviços</h1><p>-->
		 
<h3><center>TABELA DE VALORES</center></h3>

<hr>
<?php

 $usuario = $_SESSION['login'];

if ( isset( $_SESSION['login'] ) ) {
				
				$usuario = $_SESSION['login'];
				
				
				} else {
				
				echo"<script language='javascript' type='text/javascript'>window.location.href='index.html'</script>";
				
				
				 } 

$serv = $_POST['serv'];


if ( empty( $serv ) ) {
				
				$serv = "%%";
				
				} else {
				
				$serv = $_POST['serv'];
				
				} 

// conexao com banco
require_once 'conexao.php';



$sql = "select * from servicos where descricao like ('%$serv%') ORDER BY descricao asc";


$consulta = mysqli_query( $conexao, $sql );

if ( mysqli_error( $conexao ) == true ) {
				
				echo '<div class="error-mysql">';
				
				 echo( "Erro! <br> " . mysqli_error( $conexao ) );
				
				 echo '</div>';
				
				 mysqli_close( $conexao );
				
				die;
				
				} 


$resultado = mysqli_num_rows( $consulta );

// Java script Sweet alert:
if ( $resultado == 0 ) {
				
				echo "<script>
		swal('Servico nao encontrado!')
		.then((value) => {
             window.location.href='form_cadastro_servicos.html';
});

</script>";
				
				
				} 

echo '<table class="table table-bordered">
    
    <thead class="thead-dark">
    
    <tr>
    
      <th scope="col">CÓDIGO:</th>
    
      <th scope="col">DESCRIÇÃO:</th>
    
      <th scope="col">VALOR:</th>
    
      <th scope="col">OBSERVAÇÃO:</th>
          
    </tr>
  	
  	</thead>';


// Armazena os dados da consulta em um array associativo
while ( $registro = mysqli_fetch_assoc( $consulta ) ) {
				
				
				echo '<tr>';
				
				 echo '<td>' . $registro["cod"] . '</td>';
				
				 echo '<td>' . strtoupper( $registro["descricao"] ) . '</td>';
				
				 echo '<td>' . "R$" . $registro["preco"] . ",00" . '</td>';
				
				 echo '<td>' . strtoupper( $registro["observacoes"] ) . '</td>';
				
				 echo '</tr>';
				
				} 

echo '</table>';





?>

<hr>
<form method="POST" action="form_cadastro_servicos.html">

    <p align ="left"> <input type="submit" id="btn-sair" value="Sair">
 
    <a title='Imprimir conteúdo' href='javascript:window.print()'><img src="images/imprimir.png" alt="Smiley face" height="20" width="30" border="0" /></a>

</form>
 




