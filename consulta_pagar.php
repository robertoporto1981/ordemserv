<?php session_start() ?>

<?php require_once 'testa_login.php'; ?>

 <!DOCTYPE html>
 
 <html lang='pt-BR'>
 
 <head>
 		
 		<meta chartset="uft-8">

	 		<link type="text/css" rel="stylesheet" href="stylesheet.css">
 
 </head>
 
 <title>Receber</title>

 <body>

 	<h1 id="titulo-programas">Relatorio contas a pagar</h1>

<form action="./" id="formulario" method="post">

      <input type="button" value="Voltar" id="btn" onclick="Acao('menu');">
    
</form>


<?php

 		$usuario = $_SESSION['login'];	
	
 		$busca = $_POST['busca'];

if($busca == pago){

	echo"<script language='javascript' type='text/javascript'>;window.location.href='relatorio_pagos.php';</script>";
} 		

  

//Conexao
require_once 'conexao.php';


if(empty($busca))

{

		echo"<script language='javascript' type='text/javascript'>alert('Nao foi encontrado nenhum registro!');window.location.href='contas_pagar.html';</script>";
}
		
$sql = "select * from contasapagar where status = ('$busca')";

$consulta = mysqli_query($conexao,$sql);

// Armazena os dados da consulta em um array associativo

   echo '<table border style="width:100%">';
  	
	echo '<tr>';
	
	echo '<td id="borda"></td>';

 	echo '<td id="borda">CODOPER:</td>';
	
	echo '<td id="borda">LANCAMENTO:</td>';
	
	echo '<td id="borda">VENCIMENTO:</td>';
	
	echo '<td id="borda">FORNECEDOR:</td>';
	
	echo '<td id="borda">DESCRICAO:</td>';
	
	echo '<td id="borda">VALOR:</td>';
  
	echo '<td id="borda">PARCELA:</td>';
  
	echo '<td id="borda-status">STATUS:</td>';
  
	echo '</tr>'; 
    
    //echo"<h1 id='borda'>Relatorio contas a pagar</h1>";

while($registro = mysqli_fetch_assoc($consulta)){
    
    echo"<form action='./' id='formulario' method='post'>";
      
	echo'<tr>';   
    
    echo '<td id="campos"><a href="baixa_pagar.php?codoper='.$registro["codoper"].'"#><img src="images/receber.png"></td>';
		
	echo '<td id="campos">'.$registro["codoper"].'</td>';
  
	//echo '<td id="campos">'.$registro["data"].'</td>';

	$Data = $registro["data"];

	$dia = substr("$Data",0,2);

	$mes = substr("$Data",2,2);

	$ano = substr("$Data",4,8);

	$data = "$dia/$mes/$ano";

	echo '<td id="campos">'.$data.'</td>';


    $Datavenc = $registro["datavenc"];

	$dia = substr("$Datavenc",0,2);

	$mes = substr("$Datavenc",2,2);

	$ano = substr("$Datavenc",4,8);

	$datavencimento = "$dia/$mes/$ano";

	echo '<td id="campos">'.$datavencimento.'</td>';

	  
	echo '<td id="campos">'.$registro["fornecedor"].'</td>';
  
	echo '<td id="campos">'.$registro["descr"].'</td>';
  
	echo '<td id="campos">'."R$".number_format($registro["valor"],2,',','.').'</td>';
  
	echo '<td id="campos">'.$registro['parcela'].'</td>';
    
if($registro['status'] == 'pagar'){
  
    echo '<td id="status-aberto">'.$registro["status"].'</td>';  
    
 }else{
    
    echo '<td id="status-fechado">'.$registro["status"].'</td>';
    
}
  	echo'</tr>'; 
      
}

 echo'</table>';


	
$sql2 = "SELECT sum(valor) FROM `contasapagar` where status = 'PAGAR' and usuario ='$usuario'";
   
$query = mysqli_query($conexao,$sql2);
   
while ($exibir = mysql_fetch_array($query)){
   
	$total = $exibir['0'];
//echo $exibir['0'];

}
	
?>
<h1 id ="borda2">Total a pagar R$: <?php echo number_format($total,2,',','.'); ?></h1>
</body>
	</html>
  		</br>
  			<p>
  				

<script type="text/javascript">
    // <![CDATA[
     function Acao(act){
       frm = document.getElementById('formulario');
       frm.action = act + '.php'; 
       frm.submit();
    // ]]>
}
</script>


