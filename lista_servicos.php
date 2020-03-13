<?php session_start(); ?>

<html>
	<head>

		<title>Serviços</title>

		<body bgcolor ="#0000FF">

<h1><body text = "white"><p align ="center"> Tabela de serviços: </h1>

</body>

<?php

//Session
$usuario = $_SESSION['login'];

//Conexao

require_once 'conexao.php';

$sql = "SELECT * FROM servicos where usuario = '$usuario' order by descricao asc";

$consulta = mysqli_query($conexao,$sql);

		echo '<font face="verdana"><table border style="width:100%">';

		echo '<tr>';

		echo '<td>Codigo:</td>';

		echo '<td>Descricao:</td>';

		echo '<td>Valor:</td>';

		echo '</tr>';


// Armazena os dados da consulta em um array associativo

while($registro = mysqli_fetch_assoc($consulta)){

		echo '<tr>';

		echo '<td>'.$registro["cod"].'</td>';

		echo '<td>'.$registro["descricao"].'</td>';

		echo '<td>'.$registro["preco"].'</td>';

		echo '</tr>';
  
}
		echo '</table>';


?>

<html>
	<head>
		<body>
		
<form method="POST" action="form_cadastro_servicos.html">

<p><input type="submit" value="voltar"></p>

</form>

</html>

</body>