 <?php session_start(); ?>
 
 <html>
 
 <head>
 
 <link type="text/css" rel="stylesheet" href="stylesheet.css">
 
 </head>

 		<title>Receber</title>


<?php
	
 	$usuario = $_SESSION['login'];	
	
//$busca = $_POST['busca'];
    
 	$busca = "pago";
    
      	
//Conexao 
 	require_once 'conexao.php';




if(empty($busca))

{
		echo"<script language='javascript' type='text/javascript'>alert('Nao foi encontrado nenhum registro!');window.location.href='form_cadastro_produto.html';</script>";
}
	

$sql = "select * from contasapagar where status = ('$busca')";

$consulta = mysqli_query($conexao,$sql);
   

// Armazena os dados da consulta em um array associativo
 
		echo '<table border style="width:100%">';
  	
		echo '<tr>';
		
  	echo '<td id="borda">CODOPER:</td>';
	
  	echo '<td id="borda">LANCAMENTO:</td>';
	
  	echo '<td id="borda">VENCIMENTO:</td>';
	
  	//echo '<td id="borda">CLIENTE:</td>';
	
  	echo '<td id="borda">DESCRICAO:</td>';
	
 		echo '<td id="borda">VALOR:</td>';
  
  	echo '<td id="borda">PARCELA:</td>';
  
  	echo '<td id="borda-status">STATUS:</td>';
  
  	echo '</tr>'; 
    
   	echo"<h1 id='borda'>Relatorio pagos</h1>";

while($registro = mysqli_fetch_assoc($consulta)){
    
    echo"<form action='./' id='formulario' method='post'>";
  
   
		echo'<tr>';   
		
		echo '<td id="campos">'.$registro["codoper"].'</td>';
		
		echo '<td id="campos-data">'.$registro["data"].'</td>';
		
		echo '<td id="campos-data">'.$registro["datavenc"].'</td>';
		
		//echo '<td id="campos">'.$registro["nome"].'</td>';
		
		echo '<td id="campos-descricao">'.$registro["descr"].'</td>';
		
		echo '<td id="campos">'."R$".number_format($registro["valor"],2,',','.').'</td>';
		
		echo '<td id="campos-parcela">'.$registro['parcela'].'</td>';
    
if($registro['status'] == 'RECEBER'){
  
		echo '<td id="status-aberto">'.$registro["status"].'</td>';  
    
 }else{
    
    echo '<td id="status-fechado">'.$registro["status"].'</td>';
    
 }
       
	echo'</tr>'; 
  
    
}

	 echo'</table>';


	
 
  
  
	
?>
     

</body>

</html>
	  <br>
  <p>
     <form action="./" id="formulario" method="post">

    <!--<input type="button" value="Altera" onclick="Acao('altera_contas_receber');"> -->

    <input type="button" id="btn" value="Voltar" onclick="Acao('menu');">
    
</form>

<html>

<script type="text/javascript">
    // <![CDATA[
     function Acao(act){
       frm = document.getElementById('formulario');
       frm.action = act + '.php'; 
       frm.submit();
    // ]]>
    }
</script>

<hr>

</html>
