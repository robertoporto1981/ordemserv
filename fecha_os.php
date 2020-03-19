<?php session_start(); ?>

<?php
date_default_timezone_set("America/Sao_Paulo");  
      

  $numeroord = $_SESSION['os'];

  $status = $_POST['status'];

if($status == "FINALIZADO"){

    $datasaida = date('dmY');

    $dia = substr("$datasaida",0,2);

    $mes = substr("$datasaida",2,2);

    $ano = substr("$datasaida",4,8);
    
    $previsaosaida = "$dia$mes$ano";


  }else{

  		$data = " ";
  }

  
                                     
    
//Conexao com banco de dados

require_once 'conexao.php';

	       
//$sql = ("UPDATE ordem SET status = '$status' WHERE numeroord = '$numeroord'"); 

$sql = ("UPDATE ordem SET status = '$status', previsaosaida ='$previsaosaida' WHERE numeroord = '$numeroord'"); 
	 
	
mysqli_query($conexao,$sql) or die ("Erro ao tentar cadastrar registro");
	
mysqli_close($conexao);

 if($status ='FECHADO'){

	echo"<script language='javascript' type='text/javascript'>alert('OS Alterada!');window.location.href='menu.php'</script>";
}

 

  
?>