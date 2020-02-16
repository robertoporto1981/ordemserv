<?php session_start() ?>

<?php
//Conexao com banco de dados

		require_once 'conexao.php';
	
//Recebe dados do formulario

$codigo = $_POST['codigo'];

$descricao = $_POST['descricao'];

$endereco = $_POST['endereco'];

$numero = $_POST['numero'];

$complemento = $_POST['complemento'];

$municipio = $_POST['municipio'];

$uf = $_POST['uf'];

$cnpj = $_POST['cnpj'];

$incricao = $_POST['ie'];

$fone = $_POST['telefone'];

$email = $_POST['email'];

//Insere dados no banco de dados		

$sql = "INSERT INTO dados VALUES ('1,1,1,1')";



mysqli_query($conexao,$sql) or die ("Erro ao tentar cadastrar registro");

mysqli_close($conexao);
      
	echo"<script language='javascript' type='text/javascript'>alert('Cadastrado com sucesso!');window.location.href='menu.php'</script>";

?>













