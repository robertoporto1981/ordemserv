<?php session_start() ?>

<?php require_once 'testa_login.php';
?>

<html lang='pt-BR'>

 <head>

	<meta chartset='utf-8'>
		
		<link type="text/css" rel="stylesheet" href="estilo.css">
        

	 </head>
		    
     <title>Consulta clientes</title>
   
<h1>Consulta cliente</h1>
	 

	<form method="POST" action="pedido_fechamento.php">

<p align ="left"><input type="submit" id="btn-sair" value="voltar">

</form>

</html>

<?php
// Conexão ao banco
require_once 'conexao.php';

 $usuario = $_SESSION['login'];

// $sql = "SELECT * FROM clientes where usuario ='$usuario'";
$sql = "SELECT * FROM clientes where status <> 'D' order by nome asc";

$consulta = mysqli_query( $conexao, $sql );

if ( mysqli_error( $conexao ) == TRUE ) {
				
	echo '<div class="error-mysql">';
				
	echo( "Erro! <br> " . mysqli_error( $conexao ) );
                 
    echo '<br>';
                
    echo $sql;
				
	echo '</div>';
				
	mysqli_close( $conexao );
				
	die;
} 

echo '<font face="verdana"><table border style="width:100%">';

 echo '<tr>';

 echo '<td id="borda">#</td>';

 echo '<td id="borda">CLIENTE:</td>';

 echo '<td id="borda">FANTASIA:</td>';

 echo '<td id="borda">ENDERECO:</td>';

 echo '<td id="borda">NUMERO:</td>';

 echo '<td id="borda">BAIRRO:</td>';

 echo '<td id="borda">CIDADE:</td>';

 echo '<td id="borda">UF:</td>';

 echo '<td id="borda">TELEFONE:</td>';

 echo '<td id="borda">CELULAR:</td>';

 echo '</div>';

 echo '</tr>';

// Armazena os dados da consulta em um array associativo
while ( $registro = mysqli_fetch_assoc( $consulta ) ) {
				
	echo '<tr>';
				
	// echo '<td id="campos">'.$registro["cod"].'</td>';
	
	echo '<td id="campos"><a href="pedido_fechamento.php?busca=' . $registro["nome"] . '"#><input type="submit" value="SELECIONAR"' . $registr´['nome'] . '</td>';
				
	echo '<td id="campos">' . $registro["nome"] . '</td>';
				
	echo '<td id="campos">' . $registro["nomefant"] . '</td>';
				
	echo '<td id="campos">' . $registro["rua"] . '</td>';
				
	echo '<td id="campos">' . $registro["numero"] . '</td>';
				
	echo '<td id="campos">' . $registro["bairro"] . '</td>';
				
	echo '<td id="campos">' . $registro["cidade"] . '</td>';
				
	echo '<td id="campos">' . $registro["uf"] . '</td>';
				
	echo '<td id="campos">' . $registro["telefone"] . '</td>';
				
	echo '<td id="campos">' . $registro["celular"] . '</td>';
				
	echo '</tr>';
	
	$_SESSION['nome'] = $registro['nome'];

} 

echo '</table>';


mysqli_close( $conexao );
?>

<html>

	 <a title='Imprimir conteúdo' href='javascript:window.print()'><img src="images/imprimir.jpg" alt="Smiley face" height="20" width="30" border="0" /></a>

</body>

</html>

<html>