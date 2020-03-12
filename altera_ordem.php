<?php session_start() ?>

<?php
     
$cod = $_POST['cod'];

$cliente = $_POST['cliente'];
 
//Conexao com banco de dados:
require_once 'conexao.php';    
	       
$sql = ("UPDATE ordem SET status = '$nome', cpf = '$cpf',cnpj = '$cnpj',cep ='$cep',rua = '$rua', numero = '$numero',complemento = '$complemento', bairro = '$bairro' ,cidade = '$cidade',uf = '$uf' ,telefone = '$telefone',celular ='$celular', email ='$email' WHERE nome = '$nome'"); 
	 
	
mysqli_query($conexao,$sql) or die ("Erro ao tentar cadastrar registro");

mysqli_close($conexao);

echo"<script language='javascript' type='text/javascript'>alert('OS Encerrada!');window.location.href='pesquisa_os.php'</script>";


?>