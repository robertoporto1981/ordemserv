<html>
	<head>
		 
		 <title>Lista</title>

<h1><p align="center">Lista de produtos</h1><p>

<body bgcolor ="#0000FF">		 

<body text="white">

<?php

require_once 'testa_login.php';

// Conexão ao banco

require_once 'conexao.php';



$sql = "SELECT * FROM produto where quantidade >= 1";

$consulta = mysqli_query($conexao,$sql);

//echo '<table>';

echo '<font face="verdana"><table border style="width:100%">';

		echo '<tr>';

		echo '<td>Produto:</td>';

		echo '<td>Quantidade em estoque:</td>';

		echo '<td>Preco de custo:</td>';

		echo '<td>Preco de venda:</td>';

echo '</tr>';

// Armazena os dados da consulta em um array associativo

while($registro = mysqli_fetch_assoc($consulta)){

		echo '<tr>';

		echo '<td>'.$registro["descricao"].'</td>';

		echo '<td>'.$registro["quantidade"].'</td>';

		echo '<td>'.$registro["preco_compra"].'</td>';

		echo '<td>'.$registro["preco_venda"].'</td>';

echo '</tr>';

}

	echo '</table>';



?>



<html>

<form method="POST" action="form_cadastro_produto.html">

<p align ="left"><input type="submit" value="voltar">

</form>

</body>

</html>

<html>