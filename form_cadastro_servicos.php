<?php session_start() ?>

<?php

 $descricao = $_POST['descricao'];
  
 $preco =  $_POST['preco'];
  
 $observacoes = $_POST['observacoes'];
  
 $usuario = $_SESSION['login'];
   
    
//Conexao com banco de dados

require_once 'conexao.php';

  
$sql = "INSERT INTO servicos VALUES ";
  
$sql .= "('','$descricao', '$preco','$observacoes','$usuario')"; 

mysqli_query($conexao,$sql);

if(mysqli_error($conexao) == TRUE){
echo '<div class="error-mysql">';

echo("Erro! <br> " . mysqli_error($conexao));

echo '<br>';
    
echo $sql;

echo '</div>';
 
mysqli_close($conexao);
die;
}

mysqli_close($conexao);

//echo "Cliente cadastrado com sucesso!";

  echo"<script language='javascript' type='text/javascript'>alert('Serviço cadastrado com sucesso!');window.location.href='form_cadastro_servicos.html'</script>";
    
?>

