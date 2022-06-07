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

<h3 id="titulo-programas"><center>USUÁRIOS</center></h3>  

	<form method="POST"  action="cadastro.html">

<input type="submit" class="btn btn-success btn-sm" value="NOVO">

<a href="menu.php" class="btn btn-dark btn-sm">VOLTAR</a>


	</form>

<?php

// Conexão ao banco
require_once 'conexao.php';

$usuario = $_SESSION['login'];

$sql = "SELECT * FROM usuarios order by nome asc ";

$consulta = mysqli_query($conexao,$sql);

if(mysqli_error($conexao) == TRUE){
	
	echo '<div class="error-mysql">';

	echo("Erro! <br> " . mysqli_error($conexao));
    
    echo '<br>';
    
    echo $sql;

	echo '</div>';
 
	mysqli_close($conexao);
	
	die;
}
    
 echo '<table class="table table-bordered">
    
    <thead class="thead-dark">
    
    <tr>
              
      <th scope="col">#</th>
      
      <th scope="col">CÓDIGO:</th>
      
      <th scope="col">NOME:</th>
    
      <th scope="col">LOGIN:</th>  
          
          
    </tr>
    
    </thead>';   
			

// Armazena os dados da consulta em um array associativo:

while($registro = mysqli_fetch_assoc($consulta)){
		
	echo '<tr>';

	echo '<td id="campos"><a href="edita_usuario.php?ID='.$registro["ID"].'"#><img src="images/edit.png"></td>';

	echo '<td id="campos">'.substr($registro["ID"],7,6).'</td>';

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