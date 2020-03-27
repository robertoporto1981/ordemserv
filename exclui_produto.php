<?php session_start(); ?>

<?php
 

include 'testa_login.php';

$usuario = $_SESSION['login'];
                                         
$codigo = $_SESSION['codigo'];

//Conexao com banco de dados

require_once 'conexao.php';
                                                                                
//SQL
	       
$sql = ("DELETE FROM produto WHERE cod = '$codigo'");

  	
mysqli_query($conexao,$sql) or die ("Erro ao tentar apagar registro");

mysqli_close($conexao);

echo"<script language='javascript' type='text/javascript'>alert('Produto excluido!');window.location.href='lista_produtos.php'</script>";

?> 