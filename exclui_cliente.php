<?php session_start() ?>   
<?php

	 
$nome = $_POST['nome'];
	           
//Conexao com banco:

require_once 'conexao.php';
	       
  $sql = ("DELETE FROM clientes WHERE nome = '$nome'");
  
  echo"<script language='javascript' type='text/javascript'>alert('Cliente excluido com sucesso!');window.location.href='form_cadastro_cliente.html'</script>";
	 
	
mysqli_query($conexao,$sql) or die ("Erro ao tentar apagar registro");

mysqli_close($conexao);  

?>