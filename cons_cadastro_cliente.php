<?php
require_once 'testa_login.php';

$pesquisa = $_POST['pesquisa'];

//Conexao com bancos:
require_once 'conexao.php';
		
$sql = "SELECT * FROM clientes WHERE NOME = ";

$sql .= "('$pesquisa%')"; 

//Encerro conexao com bancos:
mysqli_query($conexao,$sql) or die ("Erro ao tentar cadastrar registro");

mysqli_close($conexao);

echo"<script language='javascript' type='text/javascript'>alert('Cliente cadastrado com sucesso!');window.location.href='form_cadastro_cliente.html'</script>";

?>

