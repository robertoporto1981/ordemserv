<?php

$datainicial = $_POST['datainicial'];

$datafinal = $_POST['datafinal'];

echo $datainicial;

//conexao

require_once 'conexao.php';



$sql = "SELECT * FROM entradasaidas order by codigo asc";


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


// Armazena os dados da consulta em um array associativo:

while($registro = mysqli_fetch_assoc($consulta)){
	
		echo '<tr>';

		echo '<td>'.$registro["codigo"].'</td>';

		//echo '<td>'.$registro["data"].'</td>';


		$Data = $registro["data"];

		$dia = substr("$Data",0,2);

		$mes = substr("$Data",2,2);

		$ano = substr("$Data",4,8);
   
    $data = "$dia/$mes/$ano";


	  echo '<td id="campos">'.$data.'</td>';

		echo '<td>'.$registro["tipo"].'</td>';
		
		echo '<td>'.$registro["descr"].'</td>';

		echo '<td>'.$registro["status"].'</td>';

		echo '<td>'.$registro["bandeiracartao"].'</td>';

		echo '<td>'.'R$'.$registro["valor"].'</td>';

		echo '</tr>';  
}
		echo '</table>';





$sql2 ="SELECT sum(valor) FROM entradasaidas where tipo ='Entrada'"; 
     
      $query = mysqli_query($conexao,$sql2);
   
      while ($exibir = mysql_fetch_array($query)){
   
      $Totalentrada = $exibir['0'];

      $totalentrada =  number_format($Totalentrada, 2, '.', '');


}



?>

<?php

$sql3 ="SELECT sum(valor) FROM entradasaidas where tipo ='Saida'";
     
      $query = mysqli_query($conexao,$sql3);
   
      while ($exibir = mysql_fetch_array($query)){
   
      $Totalsaida = $exibir['0'];

      $totalsaida =  number_format($Totalsaida, 2, '.', '');


}



?>


<body>

<br>

<table border="2">

			<td><h4>Entradas R$:<?php echo $totalentrada ?></h4></td>

		<td><h4>Saídas R$:<?php echo $totalsaida ?></h4></td>

<div id="liquido">

	<td><h4>Liquído R$:<?php echo $totalentrada - $totalsaida ?></h4></td>

	<td><h4>Dizímo R$:<?php 
	
	$liquido = $totalentrada - $totalsaida;	

	$perce = 0.10;

	$dizimo = $liquido * $perce;

	echo $dizimo;

	?>