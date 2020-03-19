<?php
//Conexa com banco de dados
include 'conexao.php';

//Recebo a variavel    

$item = $_GET['item'];    

  
$sql = "DELETE FROM itensnota WHERE CODPROD = '$item' ";
      
//Imprime mensagem na tela
                              
echo"<script language='javascript' type='text/javascript'>alert('Item cancelado');window.location.href='pdv.php'</script>";

//Conecta com o banco de dados

mysqli_query($conexao,$sql) or die("Erro ao tentar cadastrar registro");

//Fecha conexao com bando de dados 
mysqli_close($conexao);    
    

?>