<?php session_start(); ?>   
<?php

	 
//$nome = $_GET['nome'];

$codigo_cliente = $_SESSION['cod'];
	           
//Conexao com banco:

require_once 'conexao.php';
	       
  $sql = ("DELETE FROM clientes WHERE cod = '$codigo_cliente'");
  
  echo"<script language='javascript' type='text/javascript'>alert('Cliente excluido com sucesso!');window.location.href='lista_clientes.php'</script>";
	 
	
mysqli_query($conexao,$sql) or die ("Erro ao tentar apagar registro");

mysqli_close($conexao);  

?>