<?php session_start() ?>

<?php

$numeroord = $_SESSION['os']; 
//Conexao

require_once 'conexao.php';
	           
    
	       
$sql = ("DELETE FROM ordem WHERE numeroord = '$numeroord'");
  
echo"<script language='javascript' type='text/javascript'>alert('OS excluido!');window.location.href='consulta_os.html'</script>";
	 
	
mysqli_query($conexao,$sql) or die ("Erro ao tentar apagar registro");
	
mysqli_close($conexao);

  

?>