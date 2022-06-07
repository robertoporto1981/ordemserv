<?php session_start() ?>

<?php
date_default_timezone_set("America/Sao_Paulo");  

//Conexao com banco de dados:

require_once 'conexao.php';      

  $numeroord = $_SESSION['os'];

  $status = $_POST['status'];

//Verifico status:
//Se o status igual a finalizado eu gravo com a data atual.

if($status == "FINALIZADO"){

    $datasaida = date('dmY');

    $dia = substr("$datasaida",0,2);

    $mes = substr("$datasaida",2,2);

    $ano = substr("$datasaida",4,8);
    
    $previsaosaida = "$dia$mes$ano";


  }else{

  		$data = " ";
  }
                                     
    
	       
//$sql = ("UPDATE ordem SET status = '$status' WHERE numeroord = '$numeroord'"); 

$sql = ("UPDATE ordem SET status = '$status', previsaosaida ='$previsaosaida' WHERE numeroord = '$numeroord'"); 
	 
	
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

 if($status ='FECHADO'){

	echo"<script language='javascript' type='text/javascript'>alert('OS Alterada!');window.location.href='menu.php'</script>";
}

 

  
?>