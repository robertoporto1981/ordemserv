<?php session_start(); ?>

<?php include 'testa_login.php' ?>

<html lang='pt-BR'>

<head>
	
	<meta charset='utf-8'>

	 <link rel='stylesheet' href='css/bootstrap-datepicker.min.css'>

	 <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
  
     <link type ="text/css" rel="stylesheet" href="css/reset.css">

	<link type ="text/css" rel="stylesheet" href="css/bootstrap.min.css">

	<link type="text/css" rel="stylesheet" href="stylesheet.css">

<title>Relatorio entradas e saidas</title>

	</head>

<h1 id="titulo-programas">RELATÓRIO</h1>

<form method="post" action="lista_entrada_saida.php">

	<label>Data inicial:<input type = "date"  name="datainicial"></label>&nbsp;<img src="images/calendar.png"><br>

	<label>Data final:<input type = "date" name="datafinal"></label>&nbsp;<img src="images/calendar.png"><br>

	<input type="submit"  id="btn-sair"  value="Buscar"/>

</form>

<hr>

<?php

if(empty($_POST['datainicial'])){

	$datainicial = " ";

}else{

	$datainicial = $_POST['datainicial'];

}

if(empty($_POST['datafinal'])){

	$datafinal = " ";

}else{

	$datafinal = $_POST['datafinal'];

}
//Mes inicial:

$dia_inicial = substr($datainicial,8,9);

$mes_inicial = substr($datainicial,5,2);

$ano_inicial = substr($datainicial,0,4);

$data_ini = $dia_inicial."/".$mes_inicial."/".$ano_inicial;

//Mes final:

$dia_final = substr($datafinal,8,9);

$mes_final = substr($datafinal,5,2);

$ano_final = substr($datafinal,0,4);

$data_final = $dia_final."/".$mes_final."/".$ano_final;



//Conexao
	require_once 'conexao.php';


$sql = "SELECT * FROM entradasaidas WHERE data BETWEEN ('$ano_inicial-$mes_inicial-$dia_inicial') AND ('$ano_final-$mes_final-$dia_final') order by data asc";

//echo $sql;

$consulta = mysqli_query($conexao,$sql);

		echo '<font face="verdana"><table border style="width:100%">';

		echo '<tr>';

		echo '<td id="borda">Código:</td>';

		echo '<td id="borda">DATA:</td>';

		echo '<td id="borda">TIPO:</td>';
		
		echo '<td id="borda">DESCRIÇÃO:</td>';

		echo '<td id="borda">STATUS:</td>';

		echo '<td id="borda">PAGAMENTO:</td>';

		echo '<td id="borda">VALOR R$:</td>';

		echo '</tr>';

	    echo "<br><b>Período de:"." ". $data_ini. " " . "à" . " " . $data_final;
		

// Armazena os dados da consulta em um array associativo

while($registro = mysqli_fetch_assoc($consulta)){
	
		echo '<tr>';

		echo '<td id="campos">'.$registro["codigo"].'</td>';

//Tratamento da data:
		
		$Data = $registro["data"];
	
		$dia = substr("$Data",8,9);

		$mes = substr("$Data",5,2);

		$ano = substr("$Data",0,4);
   
    	$data = "$dia/$mes/$ano";
     
//
	  echo '<td id="campos-data">'.$data.'</td>';

		echo '<td id="campos">'.$registro["tipo"].'</td>';
		
		echo '<td id="campos-descricao">'.$registro["descr"].'</td>';

		echo '<td id="campos">'.$registro["status"].'</td>';
	
		echo '<td id="campos">'.$registro["bandeiracartao"].'</td>';

		echo '<td id="campos">'.'R$'.$valor = number_format($registro["valor"], 2, '.', '').'</td>';

		//echo '<td>'.'R$'.$registro["valor"].'</td>';
 
		echo '</tr>';  
		
}
		echo '</table>';




$sql2 = "SELECT sum(valor) FROM entradasaidas WHERE data BETWEEN ('$ano_inicial-$mes_inicial-$dia_inicial') AND ('$ano_final-$mes_final-$dia_final') and tipo = 'Entrada'";
     
      $query = mysqli_query($conexao,$sql2);
   
      while ($exibir = mysqli_fetch_array($query)){
   
      $Totalentrada = $exibir['0'];

      $totalentrada =  number_format($Totalentrada, 2, '.', '');

}


?>

<?php


$sql3 = "SELECT sum(valor) FROM entradasaidas WHERE data BETWEEN ('$ano_inicial-$mes_inicial-$dia_inicial') AND ('$ano_final-$mes_final-$dia_final') and tipo = 'Saida'";

     
$query = mysqli_query($conexao,$sql3);
   
while ($exibir = mysqli_fetch_array($query)){
   
      $Totalsaida = $exibir['0'];

      $totalsaida =  number_format($Totalsaida, 2, '.', '');
}


?>


<body>

<br>

<table border="2">

<!--Entradas -->
		<td><h6>Total Entradas R$:<?php echo number_format($totalentrada,2,',','.') ?></h6></td>

<!--Saídas -->

		<td><h6>Total Saídas R$:<?php echo number_format($totalsaida,2,',','.') ?></h6></td>

<!--Total Bruto -->
<td><h6>Total Bruto R$:

<?php $bruto = number_format($totalentrada - $totalsaida,2,',','.');

if($bruto <= 0){

	$total_bruto = 0;
	
}else{

	$total_bruto = number_format($bruto,2,',','.');
}

echo number_format($total_bruto,2,',','.');

?>
</h6></td>
 
<!--Dizimo -->
	<td><h6>Dizímo R$:

<?php 
		
$perce = 0.10;

$dizimo = $totalentrada * $perce;

echo  $Dizimo = number_format($dizimo, 2, ',', '.');

?>

<!--Total Liquído -->

<div id="liquido">

	<td><h6>Total Liquído R$:<?php $liquido = number_format($totalentrada - $totalsaida - $dizimo,2,',','.');
	
if($liquido <= 0){

	$total_liquido = 0;

}else{
	
	$total_liquido = number_format($liquido,2,'.','.');
} 	

	echo number_format($total_liquido,2,',','.');	
	
?>

</h6>

</td>

	
</table>

<br>

<form method="post" action="menu.php">

<hr>
	<input type="submit" id="btn" value="Sair"/>

</form>	


</body>

</html>



