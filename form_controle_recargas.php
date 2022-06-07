<?php session_start() ?>

<?php
//Conexao com banco de dados:

require_once 'conexao.php';

 $usuario = $_SESSION['login'];

 $descricao = $_POST['descricao'];
  
 $marca =  $_POST['marca'];
 
 $cor =  $_POST['cor'];
  
 $numero_serie = $_POST['serie'];
 
 $numero_de_recargas = $_POST['nrecargas'];
 
 $ultima_recarga = $_POST['dataultimarecarga']; 


//SQL:  
$sql = "INSERT INTO recargas VALUES ";
  
$sql .= "('','$descricao', '$marca','$cor','$numero_serie','$numero_de_recargas','$ultima_recarga','$usuario')"; 

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

  echo"<script language='javascript' type='text/javascript'>alert('Cadastrado com sucesso!');window.location.href='form_cadastro_servicos.html'</script>";
    
?>

