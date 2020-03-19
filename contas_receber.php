<?php session_start(); ?>

<?php
require_once 'conexao.php';

require_once 'testa_login.php';
  
date_default_timezone_set('America/Sao_Paulo');
 
$usuario = $_SESSION['login'];  
    		
$data = $_POST['datalanc'];

$ano = substr("$data",0,4);

$mes = substr("$data",5,2);

$dia = substr("$data",8,2);

$datalanc = ("$dia$mes$ano");

//$datavenc = $_POST['datavenc'];
		
$nome = strtoupper($_POST['nome']);
		
$descr = strtoupper($_POST['descr']);
		
//$valor = $_POST['valor'];
		
$parcelas = $_POST['parcela'];
    
$total = $_POST['total'];
 		
//$status = strtoupper($_POST['status']);

$status = "RECEBER";

$usuario = $_SESSION['login'];
 
$valorparcela = $total / $parcelas;     
    
//
     	
if (isset($_POST["status"])){
	
		$status = $_POST["status"];                             

}else{
		
		echo"<script language='javascript' type='text/javascript'>alert('O campo status e obrigatorio!');window.location.href='contas_receber.html'</script>";
		
}	

//Regis:

$hoje = time();

$dias = 30 * 24 * 60 * 60;  //mes, horas,minutos,segundos



$sql = 'INSERT INTO contasareceber VALUES ';

for($plano =1; $plano <= $parcelas; $plano++){
   
		$hoje += $dias;
//$dia = date("Ymd", $hoje);

    	$dia = date("dmY", $hoje);
	    
    	$valorparcela;
       
$sql .= "(' ','$datalanc','{$dia}','','$nome','$descr','{$valorparcela}','{$plano}','$total','$status','$usuario'),";
      
} 
  
$sql = substr($sql,0,-1);
 
  

echo"<script language='javascript' type='text/javascript'>alert('Incluido com sucesso!');window.location.href='contas_receber.html'</script>";
	
	mysqli_query($conexao,$sql) or die (mysqli_error($conexao));
  	
	mysqli_close($conexao);
   	
?>    



























































		
