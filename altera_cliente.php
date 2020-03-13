<?php session_start() ?>

<?php

$usuario = $_SESSION['login'];
  
//Pega as variaveis metodo post

$codigo = $_POST['cod'];
	
$nome = $_POST['nome'];

$nomefant = $_POST['nomefant'];

$datanasc = $_POST['datanasc'];
	
$cpf =  $_POST['cpf'];
	
$cnpj = $_POST['cnpj'];
	
$cep =  $_POST['cep'];
	
$rua = $_POST['rua'];
	
$numero = $_POST['numero'];
	
$complemento = $_POST['complemento'];
	
$bairro = $_POST['bairro'];
	
$cidade = $_POST['cidade'];
	
$uf = $_POST['uf'];	
	
$telefone = $_POST['telefone'];
	
$celular = $_POST['celular'];
	
$email = $_POST['email'];

//$site = $_POST['site'];//teste

$site = $_SESSION['site'];

$observ = $_POST['observ'];

	
//Conecta com banco de dados	
      
require_once 'conexao.php';

//Atualiza dos dados na tabela clientes
	       
$sql = ("UPDATE clientes SET nome = '$nome',nomefant = '$nomefant', datanasc = '$datanasc', cpf = '$cpf',cnpj = '$cnpj',cep ='$cep',rua = '$rua', numero = '$numero',complemento = '$complemento', bairro = '$bairro' ,cidade = '$cidade',uf = '$uf' ,telefone = '$telefone',celular ='$celular', email ='$email',observ = '$observ' WHERE cod = '$codigo' and usuario = '$usuario'"); 

	
mysqli_query($conexao,$sql) or die ("Erro ao tentar cadastrar registro");
	
mysqli_close($conexao);

		echo"<script language='javascript' type='text/javascript'>alert('Cliente alterado com sucesso!');window.location.href='pesquisa_cliente_cod.php?busca={$codigo}'</script>";


?>