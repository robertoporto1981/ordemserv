<?php session_start()  ?>

<?php
 
 include 'time_zone';

 $usuario = strtoupper($_SESSION['login']); 	 

require_once 'testa_login.php';	
  
 // if(isset($_POST['nome']) and trim($_POST['nome']) <> ""){
		
   // $nome = $_POST["nome"];
	
  //}else{ 
  
  //echo"<script language='javascript' type='text/javascript'>alert('O campo nome e obrigatorio!');onclick=history.go(-1)</script>";
//
       	
    //$data=date('d/m/Y');   	
	
$nome = strtoupper($_POST['nome']);

$nomefant = strtoupper($_POST['nomefant']);
	
$cpf =  $_POST['cpf'];
	
$cnpj = $_POST['cnpj'];
	
$tipo = strtoupper($_POST['tipo']);
    	
$datanasc = $_POST['datanasc'];
	
$cep =  $_POST['cep'];
   
$rua = strtoupper($_POST['rua']);
	
$numero = $_POST['numero'];
		
$complemento = strtoupper($_POST['complemento']);
		
$bairro = strtoupper($_POST['bairro']);
		
$cidade = strtoupper($_POST['cidade']);
		
$uf = strtoupper($_POST['uf']);	
		
$telefone = $_POST['telefone'];

$celular = $_POST['celular'];
   
$email = $_POST['email'];

$site = $_POST['site'];

$observ = strtoupper($_POST['observ']);

$datacad = date('d/m/Y');
   

	     

//Conexao

require_once 'conexao.php';


$sql = "INSERT INTO clientes VALUES "; 

$sql .= "(' ','$nome','$nomefant', '$cpf','$cnpj','$tipo','$datanasc','$cep','$rua', '$numero','$complemento', '$bairro' , '$cidade', '$uf' , '$telefone','$celular','$email','$observ','$usuario','$datacad','$site','')";

	  
mysqli_query($conexao,$sql) or die ("Erro ao tentar cadastrar registro");

mysqli_close($conexao);
      



echo"<script language='javascript' type='text/javascript'>alert('Cliente cadastrado com sucesso!');window.location.href='form_cadastro_cliente.html'</script>";
	

	header('Location:pesquisa_cliente.php?busca='.$nome);

?>

    