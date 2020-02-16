<?php session_start ()?>

<?php

//Conexao com banco:   
require_once 'conexao.php';
  
$sql = "DELETE FROM itensnota where numeroitensnota = 0";
  
echo"<script language='javascript' type='text/javascript'>alert('Pedido cancelado');window.location.href='pedido_roberto.php'</script>";


//Encerra conexao com banco:
mysqli_query($conexao,$sql) or die("Nao foi possivel cancelar a nota");
 
mysqli_close($conexao);

?>

<?php //session_destroy() ?>





