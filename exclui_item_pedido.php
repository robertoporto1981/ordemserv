<?php

include 'conexao.php';

//Recebo a variavel    

$item = $_GET['item'];    

//Conexao

require_once 'conexao.php';
  
$sql = "DELETE FROM itensnota WHERE CODPROD = '$item' ";
      
//Imprime mensagem na tela
                              
//echo"<script language='javascript' type='text/javascript'>alert('Item cancelado');window.location.href='pedido_roberto.php'</script>";
echo"<script language='javascript' type='text/javascript'>;window.location.href='pedido_roberto.php'</script>";

//Conecta com o banco de dados

mysqli_query($conexao,$sql) or die("Erro ao tentar cadastrar registro");

//Fecha conexao com bando de dados 
mysqli_close($conexao);
    
    

?>