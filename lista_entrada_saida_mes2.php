<?php session_start() ?>

<?php date_default_timezone_set("America/Sao_Paulo");?>

<?php include 'conexao.php' ?>
<?php $ano = $_GET['ano']; ?>

<html lang='pt-BR'>    
    
    <head>	 	         
    
        <meta charset='utf-8'>	          
    
        <link rel='stylesheet' href='css/bootstrap-datepicker.min.css'>	          
    
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>                 
    
        <link type ="text/css" rel="stylesheet" href="css/reset.css">	         
    
        <link type ="text/css" rel="stylesheet" href="css/bootstrap.min.css">	         
    
        <link type="text/css" rel="stylesheet" href="stylesheet.css"> 
               
        <title>Relatorio Mês</title>
        	     
    </head>
             


<?php

    $sql2 = "SELECT sum(valor) FROM entradasaidas WHERE data BETWEEN ('$ano-01-01') AND ('$ano-01-31') and tipo = 'ENTRADA'";     
    
    $sql3 = "SELECT sum(valor) FROM entradasaidas WHERE data BETWEEN ('$ano-01-01') AND ('$ano-01-31') and tipo = 'SAIDA'";
    
    $query = mysqli_query($conexao, $sql3);
    
while ($exibir = mysqli_fetch_array($query)) {
    
            $TOTALSAIDA = $exibir['0'];
     
     } 
$total_saida_janeiro = number_format($TOTALSAIDA, 2, '.', '');
     $query = mysqli_query($conexao,$sql2);
while ($exibir = mysqli_fetch_array($query)) {
     
            $totalentrada = $exibir['0'];    
    
     } 
    $total_entrada_janeiro = number_format($totalentrada, 2, '.', '');
    ?>       
    
    
         
<?php $bruto = number_format($total_entrada_janeiro - $total_saida_janeiro, 2, ',', '.');
if ($bruto <= 0) {
    $total_bruto = 0;
    
     } else {
    $total_bruto_ = number_format($bruto, 2, ',', '.');
     } 
$total_bruto_janeiro = number_format($total_bruto, 2, ',', '.');
                     ?>                   
                
            <!--Dizimo -->  	
                <!--Dizímo R$:  -->
<?php
$perce = 0.10;
$dizimo = $totalentrada * $perce;
$Dizimo = number_format($dizimo, 2, ',', '.');
                     ?>                       
                    <!--Total Liquído -->                       
                    <?php $liquido = number_format($total_entrada_janeiro - $total_saida_janeiro - $dizimo, 2, ',', '.');
if ($liquido <= 0) {
    $total_liquido = 0;
     } else {
    
    $total_liquido = number_format($liquido, 2, '.', '.');
     } 
	$total_liquido_janeiro = number_format($total_liquido, 2, ',', '.');
                                 ?> 
                                     
        
        
<?php        
//FEVEREIRO:

    $sql2 = "SELECT sum(valor) FROM entradasaidas WHERE data BETWEEN ('$ano-02-01') AND ('$ano-02-29') and tipo = 'ENTRADA'";     
    
    $sql3 = "SELECT sum(valor) FROM entradasaidas WHERE data BETWEEN ('$ano-02-01') AND ('$ano-01-29') and tipo = 'SAIDA'";
$query = mysqli_query($conexao, $sql3);
while ($exibir = mysqli_fetch_array($query)) {
    
            $TOTALSAIDA = $exibir['0'];
     
     } 
$total_saida_fevereiro = number_format($TOTALSAIDA, 2, '.', '');
     $query = mysqli_query($conexao,$sql2);
while ($exibir = mysqli_fetch_array($query)) {
     
            $totalentrada = $exibir['0'];    
    
     } 
    $total_entrada_fevereiro = number_format($totalentrada, 2, '.', '');
        ?>    
                  <!--Total Bruto R$:  -->
<?php $bruto = number_format($totalentrada - $totalsaida, 2, ',', '.');
if ($bruto <= 0) {
    $total_bruto = 0;
    
     } else {
    $total_bruto = number_format($bruto, 2, ',', '.');
     } 
$total_bruto_fevereiro = number_format($total_bruto, 2, ',', '.');
                         ?>                   
                    
                <!--Dizimo -->  	
                    <!--Dizímo R$:  -->
<?php
$perce = 0.10;
$dizimo = $totalentrada * $perce;
$Dizimo = number_format($dizimo, 2, ',', '.');
                         ?>                       
                        <!--Total Liquído -->                       

                                <!--Total Liquído R$: -->
<?php $liquido = number_format($totalentrada - $totalsaida - $dizimo, 2, ',', '.');
if ($liquido <= 0) {
    $total_liquido = 0;
     } else {
    
    $total_liquido = number_format($liquido, 2, '.', '.');
     } 
	$total_liquido_fevereiro = number_format($total_liquido, 2, ',', '.');
                                     ?> 
    
    
    
<?php        
//Março:

    $sql2 = "SELECT sum(valor) FROM entradasaidas WHERE data BETWEEN ('$ano-03-01') AND ('$ano-03-31') and tipo = 'Entrada'";     
    
    $sql3 = "SELECT sum(valor) FROM entradasaidas WHERE data BETWEEN ('$ano-03-01') AND ('$ano-03-31') and tipo = 'Saida'";
$query = mysqli_query($conexao, $sql3);
while ($exibir = mysqli_fetch_array($query)) {
    
            $TOTALSAIDA = $exibir['0'];
     
     } 
$total_saida_marco = number_format($TOTALSAIDA, 2, '.', '');
     $query = mysqli_query($conexao,$sql2);
while ($exibir = mysqli_fetch_array($query)) {
     
            $totalentrada = $exibir['0'];    
    
     } 
    $total_entrada_marco = number_format($totalentrada, 2, '.', '');
            ?>     

 <!--Total Bruto R$: -->
<?php $bruto = number_format($total_entrada_marco - $total_saida_marco, 2, ',', '.');
if ($bruto <= 0) {
    $total_bruto = 0;
    
     } else {
    $total_bruto = number_format($bruto, 2, ',', '.');
     } 
$total_bruto_marco = number_format($total_bruto, 2, ',', '.');
                             ?>                   
                          
                    <!--Dizimo -->  	
                        <!--Dizímo R$:  -->
<?php
$perce = 0.10;
$dizimo = $totalentrada * $perce;
$Dizimo = number_format($dizimo, 2, ',', '.');
                             ?>                       
                            <!--Total Liquído -->                       

                                    <!--Total Liquído R$: -->
<?php $liquido = number_format($total_entrada_marco - $total_saida_marco - $dizimo, 2, ',', '.');
if ($liquido <= 0) {
    $total_liquido = 0;
     } else {
    
    $total_liquido = number_format($liquido, 2, '.', '.');
     } 
$total_liquido_marco = number_format($total_liquido, 2, ',', '.');

 ?> 
                                    	          
                
                
<?php
//Abril:

    $sql2 = "SELECT sum(valor) FROM entradasaidas WHERE data BETWEEN ('2020-04-01') AND ('$ano-04-30') and tipo = 'Entrada'";     
    
    $sql3 = "SELECT sum(valor) FROM entradasaidas WHERE data BETWEEN ('$ano-04-01') AND ('$ano-04-30') and tipo = 'Saida'";
$query = mysqli_query($conexao, $sql3);
while ($exibir = mysqli_fetch_array($query)) {
    
            $TOTALSAIDA = $exibir['0'];
     
     } 
$total_saida_abril = number_format($TOTALSAIDA, 2, '.', '');
     $query = mysqli_query($conexao,$sql2);
while ($exibir = mysqli_fetch_array($query)) {
     
            $totalentrada = $exibir['0'];    
    
     } 
    $total_entrada_abril = number_format($totalentrada, 2, '.', '');
?>                   
                
                
<?php $bruto = number_format($totalentrada - $totalsaida, 2, ',', '.');
if ($bruto <= 0) {
    $total_bruto = 0;
    
     } else {
    $total_bruto = number_format($bruto, 2, ',', '.');
     } 
	$total_bruto_abril = number_format($total_bruto, 2, ',', '.');
                                 ?>                   
                            
                        <!--Dizimo --> 
                            <!--Dizímo R$:  -->
<?php
$perce = 0.10;
$dizimo = $totalentrada * $perce;
$Dizimo = number_format($dizimo, 2, ',', '.');
                                 ?>                       
                                <!--Total Liquído -->                       

                                        <!--Total Liquído R$: -->
<?php $liquido = number_format($totalentrada - $totalsaida - $dizimo, 2, ',', '.');
if ($liquido <= 0) {
    $total_liquido = 0;
     } else {
    
    $total_liquido = number_format($liquido, 2, '.', '.');
     } 
$total_liquido_abril = number_format($total_liquido, 2, ',', '.');
                                             ?> 

<?php
//Maio:

    $sql2 = "SELECT sum(valor) FROM entradasaidas WHERE data BETWEEN ('$ano-05-01') AND ('$ano-05-31') and tipo = 'Entrada'";     
    
    $sql3 = "SELECT sum(valor) FROM entradasaidas WHERE data BETWEEN ('$ano-05-01') AND ('$ano-05-31') and tipo = 'Saida'";
$query = mysqli_query($conexao, $sql3);
while ($exibir = mysqli_fetch_array($query)) {
    
            $TOTALSAIDA = $exibir['0'];
     
     } 
$total_saida_maio = number_format($TOTALSAIDA, 2, '.', '');
     $query = mysqli_query($conexao,$sql2);
while ($exibir = mysqli_fetch_array($query)) {
     
            $totalentrada = $exibir['0'];    
    
     } 
    $total_entrada_maio = number_format($totalentrada, 2, '.', '');
                    ?>    
                                       
                                         
                                
                            <!--Total Bruto -->
                                <!--Total Bruto R$:  -->
<?php $bruto = number_format($total_entrada_maio - $total_saida_maio, 2, ',', '.');
if ($bruto <= 0) {
    $total_bruto = 0;
    
     } else {
    $total_bruto = number_format($bruto, 2, ',', '.');
     } 
$total_bruto_maio = number_format($total_bruto, 2, ',', '.');
                                     ?>                   
                                
                            <!--Dizimo -->  	
                                <!--Dizímo R$:  -->
<?php
$perce = 0.10;
$dizimo = $totalentrada * $perce;
$Dizimo = number_format($dizimo, 2, ',', '.');
                                     ?>                       
                                    <!--Total Liquído -->                       

                                            <!--Total Liquído R$: -->
<?php $liquido = number_format($total_entrada_maio - $total_saida_maio - $dizimo, 2, ',', '.');
if ($liquido <= 0) {
    $total_liquido = 0;
     } else {
    
    $total_liquido = number_format($liquido, 2, '.', '.');
     } 
$total_liquido_maio = number_format($total_liquido, 2, ',', '.');

?> 



<?php
//Junho:

    $sql2 = "SELECT sum(valor) FROM entradasaidas WHERE data BETWEEN ('$ano-06-01') AND ('$ano-06-30') and tipo = 'Entrada'";     
    
    $sql3 = "SELECT sum(valor) FROM entradasaidas WHERE data BETWEEN ('$ano-06-01') AND ('$ano-06-30') and tipo = 'Saida'";
$query = mysqli_query($conexao, $sql3);
while ($exibir = mysqli_fetch_array($query)) {
    
            $TOTALSAIDA = $exibir['0'];
     
     } 
$total_saida_junho = number_format($TOTALSAIDA, 2, '.', '');
     $query = mysqli_query($conexao,$sql2);
while ($exibir = mysqli_fetch_array($query)) {
     
            $totalentrada = $exibir['0'];    
    
     } 
    $total_entrada_junho = number_format($totalentrada, 2, '.', '');

?>                                       
                              
                               
                                    <!--Total Bruto R$:  -->
<?php $bruto = number_format($totalentrada - $totalsaida, 2, ',', '.');
if ($bruto <= 0) {
    $total_bruto = 0;
    
     } else {
    $total_bruto = number_format($bruto, 2, ',', '.');
     } 
$total_bruto_junho = number_format($total_bruto, 2, ',', '.');
                                         ?>                   
 
                                <!--Dizimo --> 
                                    <!--Dizímo R$:  -->
<?php
$perce = 0.10;
$dizimo = $totalentrada * $perce;
$Dizimo = number_format($dizimo, 2, ',', '.');
                                         ?>                       
                                        <!--Total Liquído -->                       
                                                
                                        <!--Total Liquído R$: -->
<?php $liquido = number_format($total_entrada_junho - $total_saida_junho - $dizimo, 2, ',', '.');
if ($liquido <= 0) {
    $total_liquido = 0;
     } else {
    
    $total_liquido = number_format($liquido, 2, '.', '.');
     } 
$total_liquido_junho = number_format($total_liquido, 2, ',', '.');

?> 
                                             

<?php
//Julho:

    $sql2 = "SELECT sum(valor) FROM entradasaidas WHERE data BETWEEN ('$ano-07-01') AND ('$ano-07-31') and tipo = 'Entrada'";     
    
    $sql3 = "SELECT sum(valor) FROM entradasaidas WHERE data BETWEEN ('$ano-07-01') AND ('$ano-07-31') and tipo = 'Saida'";
$query = mysqli_query($conexao, $sql3);
while ($exibir = mysqli_fetch_array($query)) {
    
            $TOTALSAIDA = $exibir['0'];
     
     } 
$total_saida_julho = number_format($TOTALSAIDA, 2, '.', '');
     $query = mysqli_query($conexao,$sql2);
while ($exibir = mysqli_fetch_array($query)) {
     
            $totalentrada = $exibir['0'];    
    
     } 
    $total_entrada_julho = number_format($totalentrada, 2, '.', '');
                            ?>    
                           
                           
                                        <!--Total Bruto R$:  -->
<?php $bruto = number_format($total_entrada_julho - $total_saida_julho, 2, ',', '.');
if ($bruto <= 0) {
    $total_bruto = 0;
    
     } else {
    $total_bruto = number_format($bruto, 2, ',', '.');
     } 
$total_bruto_julho = number_format($total_bruto, 2, ',', '.');
                                             ?>                   

                                    <!--Dizimo --> 
                                        <!--Dizímo R$:  -->
<?php
$perce = 0.10;
$dizimo = $totalentrada * $perce;
$Dizimo = number_format($dizimo, 2, ',', '.');
                                             ?>                       
                                            <!--Total Liquído -->                       

                                                    <!--Total Liquído R$: -->
<?php $liquido = number_format($totalentrada - $totalsaida - $dizimo, 2, ',', '.');
if ($liquido <= 0) {
    $total_liquido = 0;
     } else {
    
    $total_liquido = number_format($liquido, 2, '.', '.');
     } 
$total_liquido_julho = number_format($total_liquido, 2, ',', '.');
                                                         ?> 
                                                    
<?php
//Agosto:

    $sql2 = "SELECT sum(valor) FROM entradasaidas WHERE data BETWEEN ('$ano-08-01') AND ('$ano-08-31') and tipo = 'Entrada'";     
    
    $sql3 = "SELECT sum(valor) FROM entradasaidas WHERE data BETWEEN ('$ano-08-01') AND ('$ano-08-31') and tipo = 'Saida'";
$query = mysqli_query($conexao, $sql3);
while ($exibir = mysqli_fetch_array($query)) {
    
            $TOTALSAIDA = $exibir['0'];
     
     } 
$total_saida_agosto = number_format($TOTALSAIDA, 2, '.', '');
     $query = mysqli_query($conexao,$sql2);
while ($exibir = mysqli_fetch_array($query)) {
     
            $totalentrada = $exibir['0'];    
    
     } 
    $total_entrada_agosto = number_format($totalentrada, 2, '.', '');
                                ?>     
                                    
                                            <!--Total Bruto R$:  -->
<?php $bruto = number_format($total_entrada_agosto - $total_saida_agosto, 2, ',', '.');
if ($bruto <= 0) {
    $total_bruto = 0;
    
     } else {
    $total_bruto = number_format($bruto, 2, ',', '.');
     } 
$total_bruto_agosto = number_format($total_bruto, 2, ',', '.');
                                                 ?>                   

                                        	
                                            <!--Dizímo R$:  -->
<?php
$perce = 0.10;
$dizimo = $totalentrada * $perce;
$Dizimo = number_format($dizimo, 2, ',', '.');
                                                 ?>                       
                                                <!--Total Liquído -->                       

                                                        <!--Total Liquído R$: -->
<?php $liquido = number_format($total_entrada_agosto - $total_saida_agosto - $dizimo, 2, ',', '.');
if ($liquido <= 0) {
    $total_liquido = 0;
     } else {
    
    $total_liquido = number_format($liquido, 2, '.', '.');
     } 
$total_liquido_agosto =  number_format($total_liquido, 2, ',', '.');
                                                             ?> 
                                                        	          
                                    
                                    
<?php
//Setembro:
    $sql2 = "SELECT sum(valor) FROM entradasaidas WHERE data BETWEEN ('$ano-09-01') AND ('$ano-09-30') and tipo = 'Entrada'";     
    
    $sql3 = "SELECT sum(valor) FROM entradasaidas WHERE data BETWEEN ('$ano-09-01') AND ('$ano-09-30') and tipo = 'Saida'";
$query = mysqli_query($conexao, $sql3);
while ($exibir = mysqli_fetch_array($query)) {
    
            $TOTALSAIDA = $exibir['0'];
     
     } 
$total_saida_setembro = number_format($TOTALSAIDA, 2, '.', '');
     $query = mysqli_query($conexao,$sql2);
while ($exibir = mysqli_fetch_array($query)) {
     
            $totalentrada = $exibir['0'];    
    
     } 
    $total_entrada_setembro = number_format($totalentrada, 2, '.', '');
                                    ?>     
                                  
                                                                                                     
     <!--Total Bruto -->
                                                <!--Total Bruto R$:  -->
<?php $bruto = number_format($totalentrada - $totalsaida, 2, ',', '.');
if ($bruto <= 0) {
    $total_bruto = 0;
    
     } else {
    $total_bruto = number_format($bruto, 2, ',', '.');
     } 
	$total_bruto_setembro = number_format($total_bruto, 2, ',', '.');
                                                     ?>                   
                                                
                                            
                                                <!--Dizímo R$:  -->
<?php
$perce = 0.10;
$dizimo = $totalentrada * $perce;
$Dizimo = number_format($dizimo, 2, ',', '.');
                                                     ?>                       
                                                    <!--Total Liquído -->                       

                                                            <!--Total Liquído R$: -->
<?php $liquido = number_format($total_entrada_setembro - $total_saida_setembro - $dizimo, 2, ',', '.');
if ($liquido <= 0) {
    $total_liquido = 0;
     } else {
    
    $total_liquido = number_format($liquido, 2, '.', '.');
     } 
$total_liquido_setembro = number_format($total_liquido, 2, ',', '.');
                                                                 ?> 
                                                                     
                                        
                                        
<?php
//Outubro:

    $sql2 = "SELECT sum(valor) FROM entradasaidas WHERE data BETWEEN ('$ano-10-01') AND ('$ano-10-31') and tipo = 'Entrada'";     
    
    $sql3 = "SELECT sum(valor) FROM entradasaidas WHERE data BETWEEN ('$ano-10-01') AND ('$ano-10-31') and tipo = 'Saida'";
$query = mysqli_query($conexao, $sql3);
while ($exibir = mysqli_fetch_array($query)) {
    
            $TOTALSAIDA = $exibir['0'];
     
     } 
$total_saida_outubro = number_format($TOTALSAIDA, 2, '.', '');
     $query = mysqli_query($conexao,$sql2);
while ($exibir = mysqli_fetch_array($query)) {
     
            $totalentrada = $exibir['0'];    
    
     } 
    $total_entrada_outubro = number_format($totalentrada, 2, '.', '');
                                        ?>     
                                     
                                                    <!--Total Bruto R$:  -->
<?php $bruto = number_format($total_entrada_outubro - $total_saida_outubro, 2, ',', '.');
if ($bruto <= 0) {
    $total_bruto = 0;
    
     } else {
    $total_bruto = number_format($bruto, 2, ',', '.');
     } 
$total_bruto_outubro = number_format($total_bruto, 2, ',', '.');
                                                         ?>                   
                                                <!--Dizimo -->
                                                    <!--Dizímo R$:  -->
<?php
$perce = 0.10;
$dizimo = $totalentrada * $perce;
$Dizimo = number_format($dizimo, 2, ',', '.');
                                                         ?>                       
                                                        <!--Total Liquído -->                       
                                                                
                                                        <!--Total Liquído R$: -->
<?php $liquido = number_format($total_entrada_outubro - $total_saida_outubro - $dizimo, 2, ',', '.');
if ($liquido <= 0) {
    $total_liquido = 0;
     } else {
    
    $total_liquido = number_format($liquido, 2, '.', '.');
     } 
$total_liquido_outubro = number_format($total_liquido, 2, ',', '.');
                                                                     ?> 

<?php
//Novembro:

    $sql2 = "SELECT sum(valor) FROM entradasaidas WHERE data BETWEEN ('$ano-11-01') AND ('$ano-11-30') and tipo = 'Entrada'";     
    
    $sql3 = "SELECT sum(valor) FROM entradasaidas WHERE data BETWEEN ('$ano-11-01') AND ('$ano-11-30') and tipo = 'Saida'";
$query = mysqli_query($conexao, $sql3);
while ($exibir = mysqli_fetch_array($query)) {
    
            $TOTALSAIDA = $exibir['0'];
     
     } 
$total_saida_novembro = number_format($TOTALSAIDA, 2, '.', '');
     $query = mysqli_query($conexao,$sql2);
while ($exibir = mysqli_fetch_array($query)) {
     
            $totalentrada = $exibir['0'];    
    
     } 
    $total_entrada_novembro = number_format($totalentrada, 2, '.', '');
                                            ?>    
                                              
                                                        <!--Total Bruto R$:  -->
<?php $bruto = number_format($totalentrada - $totalsaida, 2, ',', '.');
if ($bruto <= 0) {
    $total_bruto = 0;
    
     } else {
    $total_bruto = number_format($bruto, 2, ',', '.');
     } 
$total_bruto_novembro = number_format($total_bruto, 2, ',', '.');
                                                             ?>                   

                                                    <!--Dizimo -->  
                                                        <!--Dizímo R$:  -->
<?php
$perce = 0.10;
$dizimo = $totalentrada * $perce;
$Dizimo = number_format($dizimo, 2, ',', '.');
                                                             ?>                       
                                                            <!--Total Liquído -->                       

                                                                    <!--Total Liquído R$: -->
<?php $liquido = number_format($total_entrada_novembro - $total_saida_novembro - $dizimo, 2, ',', '.');
if ($liquido <= 0) {
    $total_liquido = 0;
     } else {
    
    $total_liquido = number_format($liquido, 2, '.', '.');
     } 
$total_liquido_novembro = number_format($total_liquido, 2, ',', '.');
                                                                         ?> 
                                                                  
                                                
                                                
<?php
//Dezembro:

    $sql2 = "SELECT sum(valor) FROM entradasaidas WHERE data BETWEEN ('$ano-12-01') AND ('$ano-12-31') and tipo = 'Entrada'";     
    
    $sql3 = "SELECT sum(valor) FROM entradasaidas WHERE data BETWEEN ('$ano-12-01') AND ('$ano-12-31') and tipo = 'Saida'";
$query = mysqli_query($conexao, $sql3);
while ($exibir = mysqli_fetch_array($query)) {
    
            $TOTALSAIDA = $exibir['0'];
     
     } 
$total_saida_dezembro = number_format($TOTALSAIDA, 2, '.', '');
     $query = mysqli_query($conexao,$sql2);
while ($exibir = mysqli_fetch_array($query)) {
     
            $totalentrada = $exibir['0'];    
    
     } 
    $total_entrada_dezembro = number_format($totalentrada, 2, '.', '');
                                                ?>     
                                            
                                                
                                                
                                                 
                                                            <!--Total Bruto R$:  -->
<?php $bruto = number_format($totalentrada - $totalsaida, 2, ',', '.');
if ($bruto <= 0) {
    $total_bruto = 0;
    
     } else {
    $total_bruto = number_format($bruto, 2, ',', '.');
     } 
	$total_bruto_dezembro = number_format($total_bruto, 2, ',', '.');
                                                                 ?>                   
                                                            
                                                        <!--Dizimo -->  	
                                                            <!--Dizímo R$:  -->
<?php
$perce = 0.10;
$dizimo = $totalentrada * $perce;
$Dizimo = number_format($dizimo, 2, ',', '.');
                                                                 ?>                       
                                                                <!--Total Liquído -->                       
                                                                
                                                                <!--Total Liquído R$: -->
<?php $liquido = number_format($total_entrada_dezembro - $total_saida_dezembro - $dizimo, 2, ',', '.');
if ($liquido <= 0) {
    $total_liquido = 0;
     } else {
    
    $total_liquido = number_format($liquido, 2, '.', '.');
     } 
$total_liquido_dezembro = number_format($total_liquido, 2, ',', '.');
                                                                             ?> 
                                                               
                                                   

<!--Tabelas -->
<!DOCTYPE html>
<body>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Mês</th>
      <th scope="col">Total Entrada</th>
      <th scope="col">Total Saída</th>
      <th scope="col">Total Bruto</th>
      <th scope="col">Total liquído</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">Janeiro</th>
      <td><?php echo $total_entrada_janeiro ?></td>
      <td><?php echo $total_saida_janeiro ?></td>
      <td><?php echo $total_bruto_janeiro ?></td>
      <td><?php echo $total_liquido_janeiro ?></td>
    </tr>
    <tr>
      <th scope="row">Fevereiro</th>
      <td><?php echo $total_entrada_fevereiro ?></td>
      <td><?php echo $total_saida_fevereiro ?></td>
      <td><?php echo $total_bruto_fevereiro ?></td>
      <td><?php echo $total_liquido_fevereiro ?></td>
    </tr>
    <tr>
      <th scope="row">Marco</th>
      <td><?php echo $total_entrada_marco ?></td>
      <td><?php echo $total_saida_marco ?></td>
      <td><?php echo $total_bruto_marco ?></td>
      <td><?php echo $total_liquido_marco ?></td>
    </tr>
     <tr>
      <th scope="row">Abril</th>
     <td><?php echo $total_entrada_abril ?></td>
      <td><?php echo $total_saida_abril ?></td>
      <td><?php echo $total_bruto_abril ?></td>
      <td><?php echo $total_liquido_abril ?></td>
    </tr>
     <tr>
      <th scope="row">Maio</th>
      <td><?php echo $total_entrada_maio ?></td>
      <td><?php echo $total_saida_maio ?></td>
      <td><?php echo $total_bruto_maio ?></td>
      <td><?php echo $total_liquido_maio ?></td>
    </tr>
    <tr>
      <th scope="row">Junho</th>
      <td><?php echo $total_entrada_junho ?></td>
      <td><?php echo $total_saida_junho ?></td>
      <td><?php echo $total_bruto_junho ?></td>
      <td><?php echo $total_liquido_junho ?></td>
    </tr>
    <tr>
      <th scope="row">Julho</th>
     <td><?php echo $total_entrada_julho ?></td>
      <td><?php echo $total_saida_julho ?></td>
      <td><?php echo $total_bruto_julho ?></td>
      <td><?php echo $total_liquido_julho ?></td>
    </tr>
    <tr>
      <th scope="row">Agosto</th>
   	<td><?php echo $total_entrada_agosto ?></td>
      <td><?php echo $total_saida_agosto ?></td>
      <td><?php echo $total_bruto_agosto ?></td>
      <td><?php echo $total_liquido_agosto ?></td>
    </tr>
    <tr>
      <th scope="row">Setembro</th>
   <td><?php echo $total_entrada_setembro ?></td>
      <td><?php echo $total_saida_setembro ?></td>
      <td><?php echo $total_bruto_setembro ?></td>
      <td><?php echo $total_liquido_setembro ?></td>
    </tr>
    <tr>
      <th scope="row">Outubro</th>
    <td><?php echo $total_entrada_outubro ?></td>
      <td><?php echo $total_saida_outubro ?></td>
      <td><?php echo $total_bruto_outubro ?></td>
      <td><?php echo $total_liquido_outubro ?></td>
    </tr>
    <tr>
      <th scope="row">Novembro</th>
      <td><?php echo $total_entrada_novembro ?></td>
      <td><?php echo $total_saida_novembro ?></td>
      <td><?php echo $total_bruto_novembro ?></td>
      <td><?php echo $total_liquido_novemro ?></td>
    </tr>
    <tr>
      <th scope="row">Dezembro</th>
      <td><?php echo $total_entrada_dezembro ?></td>
      <td><?php echo $total_saida_dezembro ?></td>
      <td><?php echo $total_bruto_dezembro ?></td>
      <td><?php echo $total_liquido_dezembro ?></td>
    </tr>

  </tbody>
</table>
</body>
</html>


<?php
 
//Totalizadores:
 //Totais no ano  
    $sql2 = "SELECT sum(valor) FROM entradasaidas WHERE data BETWEEN ('$ano-01-01') AND ('$ano-12-31') and tipo = 'Entrada'";     
    
    $sql3 = "SELECT sum(valor) FROM entradasaidas WHERE data BETWEEN ('$ano-01-01') AND ('$ano-12-31') and tipo = 'Saida'";
$query = mysqli_query($conexao, $sql3);
while ($exibir = mysqli_fetch_array($query)) {
    
            $TOTALSAIDA = $exibir['0'];
     
     } 
$total_saida_ano = number_format($TOTALSAIDA, 2, '.', '');
     $query = mysqli_query($conexao,$sql2);
while ($exibir = mysqli_fetch_array($query)) {
     
            $totalentrada = $exibir['0'];    
    
     } 
    $total_entrada_ano = number_format($totalentrada, 2, '.', '');
                                                ?>     

                                                        <!--Total Bruto R$:  -->
<?php $bruto = number_format($totalentrada - $totalsaida, 2, ',', '.');
if ($bruto <= 0) {
    $total_bruto = 0;
    
     } else {
    $total_bruto = number_format($bruto, 2, ',', '.');
     } 
	$total_bruto_ano = number_format($total_bruto, 2, ',', '.');
                                                                 ?>                   
                                                            
                                                        <!--Dizimo -->      
                                                            <!--Dizímo R$:  -->
<?php
$perce = 0.10;
$dizimo = $totalentrada * $perce;
$Dizimo = number_format($dizimo, 2, ',', '.');
                                                                 ?>                       
                                                                <!--Total Liquído -->                       
                                                                                         
                                                                <!--Total Liquído R$: -->
<?php $liquido = number_format($totalentrada - $totalsaida - $dizimo, 2, ',', '.');
if ($liquido <= 0) {
    $total_liquido = 0;
     } else {
    
    $total_liquido = number_format($liquido, 2, '.', '.');
     } 
 $total_liquido_ano = number_format($total_liquido, 2, ',', '.');
                                                                             ?>
<br>

<br>


<!--Tabela totalizadores -->
<table class="table">
  <thead>
    <tr>
      <th scope="col">Total mês</th>
      <th scope="col">Total entradas</th>
      <th scope="col">Total saídas</th>
      <th scope="col">Total Bruto</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">Totalizador</th>
      <td><?php echo $total_entrada_ano ?></td>
      <td><?php echo $total_saida_ano ?></td>
      <td><?php echo $total_bruto_ano ?></td>
    </tr>                                                                             
