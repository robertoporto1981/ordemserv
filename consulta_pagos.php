 <?php session_start(); ?>

 <?php require_once 'testa_login.php' ?>
 
 <html>
 
 <head>
 
 <link type="text/css" rel="stylesheet" href="stylesheet.css">
 
 </head>

 		<title>Receber</title>	 
  
<form action="./" id="formulario" method="post">
    
    <input type="button" value="Voltar" id="btn" onclick="Acao('menu');">
    
</form>

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
	

$sql = "select * from contasareceber where status = ('$busca')";

$consulta = mysqli_query($conexao,$sql);
   

// Armazena os dados da consulta em um array associativo
 
		echo '<table border style="width:100%">';
  	
		echo '<tr>';
		
  		echo '<td id="borda">CODOPER:</td>';
	
  		echo '<td id="borda">LANCAMENTO:</td>';
	
		echo '<td id="borda">VENCIMENTO:</td>';

		echo '<td id="borda">DATA PAGTO:</td>';			  
	
  		echo '<td id="borda">CLIENTE:</td>';
	
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
		
		//echo '<td id="campos">'.$registro["data"] = date('d/m/Y').'</td>';

		$datalanc = $registro["data"];

		$dia = substr("$datalanc",0,2);

		$mes = substr("$datalanc",2,2);

		$ano = substr("$datalanc",4,8);

		$datalancamento = "$dia/$mes/$ano";

		echo '<td id="campos">'.$datalancamento.'</td>';
		
		//echo '<td id="campos">'.$registro["datavenc"] = date('d/m/Y').'</td>';
		$datavenc = $registro["datavenc"];

		$dia = substr("$datavenc",0,2);

		$mes = substr("$datavenc",2,2);

		$ano = substr("$datavenc",4,8);

		$datavencimento = "$dia/$mes/$ano";

		echo '<td id="campos">'.$datavencimento.'</td>';
						
		//echo '<td id="campos-codigo">'.$registro["datapag"].'</td>';
		$datapagto = $registro["datapag"];

		$dia = substr("$datapagto",0,2);

		$mes = substr("$datapagto",2,2);

		$ano = substr("$datapagto",4,8);

		$datapagamento = "$dia/$mes/$ano";		
	
		echo '<td id="campos">'.$datapagamento.'</td>';		
		
		echo '<td id="campos-cliente">'.$registro["nome"].'</td>';
		
		echo '<td id="campos-descricao">'.$registro["descr"].'</td>';
		
		echo '<td id="campos">'."R$".number_format($registro["valor"],2,',','.').'</td>';
		
		echo '<td id="campos-parcela">'.$registro['parcela'].'</td>';
    
if($registro['status'] == 'RECEBER'){
  
		echo '<td id="status-aberto">'.$registro["status"].'</td>';  
    
 }else{
    
    echo '<td id="status-fechado">'.$registro["status"].'</td>';

    //echo '<td><img src="images/certo.png" width="10px height="10px"></td>';
    
 }
       
	echo'</tr>'; 
  
    
}

	 echo'</table>';


  

//Totalizadores:

$sql2 = "SELECT sum(valor) FROM `contasareceber` where status = 'PAGO'  and usuario = '$usuario'";
   
$query = mysqli_query($conexao,$sql2);
   
while ($exibir = mysqli_fetch_array($query)){
   
	$total = $exibir['0'];

}

	
?>
<html>

<h1 id ="borda2">Total pagos R$: <?php echo number_format($total,2,',','.') ?></h1>

     

</body>

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


