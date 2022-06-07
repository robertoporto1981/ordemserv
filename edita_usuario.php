<?php session_start() ?>

<?php
require_once 'testa_login.php';

//Recebo a variável

$id = $_GET['ID'];


//Conexao
require_once 'conexao.php';


$sql = "SELECT * FROM usuarios where id = $id";

//echo $sql;


$consulta = mysqli_query($conexao,$sql);

if(mysqli_error($conexao) == TRUE){
	
	echo '<div class="error-mysql">';
	
	echo("Erro! <br> " . mysqli_error($conexao));
    
    echo '<br>';
                
                 echo $sql;
    
    echo '<br>';
                
                 echo $sql;

	echo '</div>';
 
	mysqli_close($conexao);
	
	die;
}

// Armazena os dados da consulta em um array associativo

while($registro = mysqli_fetch_assoc($consulta)){   
      
//Sessions:
$$ID = $registro['ID'];

$_SESSION['id'] = $registro['ID'];

$nome = $registro["nome"];

$login = $registro['login'];  

}

?>

<html lang='pt-BR'>

<head>

	<title>Usuarios</title>


	<link type="text/css" rel="stylesheet" href="stylesheet.css">

</head>

<body>
<div class="altera-login">

<form method="POST" action="altera_usuario.php"><p>


<label>ID:</label><?php echo substr($$ID,7,6) ?><br><p>

		
<label>Nome:</label><?php echo $nome ?>

<p><label>Login:</label><input type="text" value ="<?php echo $login ?>" name="login" id="login"><br><p>
		
		    <label>Senha:</label><input type="password" name="senha" id="senha"><br><p>
	
      <input type="submit" id="btn-salvar" value="Salvar" id="salvar"  name="salvar">

</form>

<form method="POST" action="exclui_usuario.php">

  <input type="submit" id="btn" value="Excluir">
  
</form>
<form method="POST" action="menu.php">

	<input type="submit" id ="btn" value="Sair">

</form>	

</div>


</body>

</html>