<?php session_start(); ?>

<?php

 $descricao = $_POST['descricao'];
  
 $preco =  $_POST['preco'];
  
 $observacoes = $_POST['observacoes'];
  
 $usuario = $_SESSION['login'];
   
    
//Conexao com banco de dados

require_once 'conexao.php';

  
$sql = "INSERT INTO servicos VALUES ";
  
$sql .= "('','$descricao', '$preco','$observacoes','$usuario')"; 

mysqli_query($conexao,$sql) or die ("Erro ao tentar cadastrar registro");

mysqli_close($conexao);

//echo "Cliente cadastrado com sucesso!";

  echo"<script language='javascript' type='text/javascript'>alert('Serviço cadastrado com sucesso!');window.location.href='form_cadastro_servicos.html'</script>";
    
?>

