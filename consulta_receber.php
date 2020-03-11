 <?php session_start(); ?>

 <?php require_once 'testa_login.php'; ?>
 
 <html lang='pt-BR'>
 
 		<head>
 
 				<link type="text/css" rel="stylesheet" href="stylesheet.css">
 
 					</head>

<body>

<h1 id="titulo-programas">Relatorio contas a receber</h1>

<form action="./" id="formulario" method="post">

    <!--<input type="button" value="Altera" onclick="Acao('altera_contas_receber');"> -->

    <input type="button" id="btn" value="Retornar" onclick="Acao('menu');">
    

</form> 					

<?php
	
$usuario = $_SESSION['login'];	 		
	
$busca = $_POST['busca'];    
   
if($busca == "pago"){
  
 header("Location:consulta_pagos.php");

}else{ 

	$busca = "receber";    

}  	

//Conexao
require_once 'conexao.php';



if(empty($busca))

{
		echo"<script language='javascript' type='text/javascript'>alert('Nao foi encontrado nenhum registro!');window.location.href='form_cadastro_produto.html';</script>";
}	


$sql = "select * from contasareceber where status = ('$busca') order by codoper asc";


$consulta = mysqli_query($conexao,$sql);
		  

// Armazena os dados da consulta em um array associativo
 
	echo '<table border style="width:100%">';
  	
	echo '<tr>';	
		
	echo '<td id="borda"></td>';

	echo '<td id="borda"></td>';

  	echo '<td id="borda">CODOPER:</td>';
	
  	echo '<td id="borda">LANCAMENTO:</td>';
	
  	echo '<td id="borda">VENCIMENTO:</td>';
	
  	echo '<td id="borda">CLIENTE:</td>';
	
  	echo '<td id="borda">DESCRICAO:</td>';
	
 	echo '<td id="borda">VLR.PARCELA:</td>';
      
    echo '<td id="borda">TOTAL:</td>';
                                         
  	echo '<td id="borda">PARCELA:</td>';
  
  	echo '<td id="borda">STATUS:</td>';
  
  	echo '</tr>'; 
    
   	//echo"<h1 id='titulo-programas'>Relatorio contas a receber</h1>";
 		

while($registro = mysqli_fetch_assoc($consulta)){
    
   	echo"<form action='./' id='formulario' method='post'>";
  
	echo'<tr>';   

  	//echo '<td id="campos"><a href="baixa_receber.php?codoper='.$registro["codoper"].'"#><img src="https://img.icons8.com/material/24/000000/request-money.png"></td>';

  	echo '<td id="campos-descricao"><a href="baixa_receber.php?codoper='.$registro["codoper"].'"&descr='.$registro["descr"].'"¨&valor='.$registro["valor"].'"#><img src="images/receber.png"></td>';

  	echo '<td id="campos-descricao"><a href="exclui_baixa_receber.php?codoper='.$registro["codoper"].'"&descr='.$registro["descr"].'"¨&valor='.$registro["valor"].'"#><img src="images/lixeira.png" width="20px"></td>';
		
	echo '<td id="campos">'.$registro["codoper"].'</td>';

	//echo '<td id="campos">'.$registro["data"].'</td>';

	$datalanc = $registro["data"];

	$dia = substr("$datalanc",0,2);

	$mes = substr("$datalanc",2,2);

	$ano = substr("$datalanc",4,8);

	$datalancamento = "$dia/$mes/$ano";

	echo '<td id="campos-data">'.$datalancamento.'</td>';
		
	//echo '<td id="campos">'.$registro["datavenc"] = date('d/m/Y').'</td>';
	$datavenc = $registro["datavenc"];

	$dia = substr("$datavenc",0,2);

	$mes = substr("$datavenc",2,2);

	$ano = substr("$datavenc",4,8);

	$datavencimento = "$dia/$mes/$ano";

	echo '<td id="campos-data">'.$datavencimento.'</td>';

		
	//echo '<td id="campos">'.$registro["datavenc"] = date('d/m/Y').'</td>';
		
	echo '<td id="campos-cliente">'.$registro["nome"].'</td>';
		
	echo '<td id="campos-descricao">'.$registro["descr"].'</td>';
		
	echo '<td id="campos-parcela">'."R$".number_format($registro["valor"],2,',','.').'</td>';
    
    echo '<td id="campos-parcela">'."R$".number_format($registro["total"],2,',','.').'</td>';
		
	echo '<td id="campos-parcela">'.$registro['parcela'].'</td>';
    
if($registro['status'] == 'RECEBER'){
  
	echo '<td id="status-aberto">'.$registro["status"].'</td>';  
    
 }else{
    
    echo '<td id="status-fechado">'.$registro["status"].'</td>';
    
 }
       
	echo'</tr>'; 
      
}

	 echo'</table>';

	
$sql2 = "SELECT sum(valor) FROM `contasareceber` where status = 'RECEBER'  and usuario = '$usuario'";
   
$query = mysqli_query($conexao,$sql2);
   
while ($exibir = mysqli_fetch_array($query)){
   
		$total = $exibir['0'];

}
  

	
?>
     <h1 id ="borda2">Total a receber R$: <?php echo number_format($total,2,',','.' )?></h1>


</html>
	   


<script type="text/javascript">
    // <![CDATA[
     function Acao(act){
       frm = document.getElementById('formulario');
       frm.action = act + '.php'; 
       frm.submit();
    // ]]>
    }
</script>





</body>

</html>