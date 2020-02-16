<?php session_start() ?>

<?php include 'testa_login.php' ?>

<html lang='pt-BR'>

<head>

<!--<link type="text/css" rel="stylesheet" href="stylesheet.css">-->
	<link rel="stylesheet" href="css/bootstrap.css">
</head>

<body>
<div class ="container">

<title>Usuarios</title>

<h1>Usuários</h1>  

	<form method="POST"  action="cadastro.html">

		<input type="submit" class="btn btn-success" value="NOVO">

	</form>

	<form method="POST" action="menu.php">

		<p align ="left"><input type="submit" class="btn btn-dark" value="VOLTAR">

	</form>

<?php

// Conexão ao banco
require_once 'conexao.php';

$usuario = $_SESSION['login'];

$sql = "SELECT * FROM usuarios order by id asc ";

$consulta = mysqli_query($conexao,$sql);

			echo '<font face="verdana"><table border  class="table" style="width:60%">';

			echo '<tr>';

			echo '<td id="borda">#</td>';

			echo '<td id="borda">CODIGO</td>';

			echo '<td id="borda">NOME</td>';

			echo '<td id="borda">LOGIN</td>';

			echo '</div>';

			echo '</tr>';

			echo '</thead>';

// Armazena os dados da consulta em um array associativo

while($registro = mysqli_fetch_assoc($consulta)){

			echo '<thead class="thead-light">';

			echo '<tr>';

			echo '<td id="campos"><a href="edita_usuario.php?ID='.$registro["ID"].'"#><img src="images/edit.png"></td>';

			echo '<td id="campos">'.$registro["ID"].'</td>';

			echo '<td id="campos">'.$registro["nome"].'</td>';

			echo '<td id="campos">'.$registro["login"].'</td>';

			echo '</tr>';
}

			echo '</table>';



?>

</div>


</body>

</html>