<?php session_start() ?>

<?php include 'testa_login.php' ?>

<html lang='pt-BR'>

<head>
			
	<link type="text/css" rel="stylesheet" href="stylesheet.css">

</head>

<body>
		    
<title>Usuarios</title>

<h1 id="titulo-programas">Usuarios</h1>  

<div id="usuarios">

<div id="btn-usuarios-novo">

	<form method="POST"  action="cadastro.html">

		<input type="submit" id="btn" value="NOVO">

	</form>

</div>
 


<div id="btn-usuarios-voltar">

	<form method="POST" action="menu.php">

		<p align ="left"><input type="submit" id="btn" value="VOLTAR">

	</form>

</div>	



<?php

// Conexão ao banco

require_once 'conexao.php' ;
 
 $usuario = $_SESSION['login'];




$sql = "SELECT * FROM usuarios order by id asc ";


$consulta = mysqli_query($conexao,$sql);
 


echo '<font face="verdana"><table border style="width:100%">';

			
			echo '<tr>';

			echo '<td id="borda">#</td>';

			echo '<td id="borda">CODIGO</td>';

			echo '<td id="borda">NOME</td>';

			echo '<td id="borda">LOGIN</td>';

			echo '</div>';

			echo '</tr>';

// Armazena os dados da consulta em um array associativo

while($registro = mysqli_fetch_assoc($consulta)){

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