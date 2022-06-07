<?php

//Conexao
require_once 'conexao.php';


    
  $data = $_POST['data'];
 
  $valor = $_POST['valor'];
 
  $descr = $_POST['descr'];
 
  $status = $_POST['status'];
  
  
  	
if (isset($_POST["descr"])){
	
	$descr = $_POST["descr"];                             

}else{
		
		die("O campo descricao e obrigatorio!");
}		


$sql = "DELETE FROM  contasareceber WHERE"; 

$sql .= "('$data','$valor', '$descr','$status')";
          echo $sql;
	               
        //echo"<script language='javascript' type='text/javascript'>alert('Incluido com sucesso!');window.location.href='contas_receber.html'</script>";
	
		
		

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
  

?>