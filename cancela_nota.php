<?php session_start();?>

<?php

//conexao   
require_once 'conexao.php';

$sql = "DELETE FROM itensnota where numeroitensnota = 0";
  
echo"<script language='javascript' type='text/javascript'>alert('Cupom cancelado');window.location.href='pdv.php'</script>";

mysqli_query($conexao,$sql) or die("Nao foi possivel cancelar a nota");

mysqli_close($conexao);

?>

<?php //session_destroy() ?>





