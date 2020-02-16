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
	
		
		

mysqli_query($conexao,$sql) or die ("Erro ao tentar cadastrar registro");

mysqli_close($conexao);
  

?>