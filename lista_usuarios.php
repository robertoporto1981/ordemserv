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

<h1 id="titulo-programas">Usuários</h1>  

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
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>

</html>