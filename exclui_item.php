<?php
//Conexão com banco de dados:
include 'conexao.php';

//Recebo a variável:    

$item = $_GET['item'];    
 
$sql = "DELETE FROM itensnota WHERE CODPROD = '$item' ";
      
//Imprime mensagem na tela:
                              
echo"<script language='javascript' type='text/javascript'>alert('Item cancelado');window.location.href='pdv.php'</script>";

//Conecta com o banco de dados

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

//Encerra conexão com bando de dados.
mysqli_close($conexao);    
    

?>