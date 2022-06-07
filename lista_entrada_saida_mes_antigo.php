<?php session_start() ?>
<?php
date_default_timezone_set("America/Sao_Paulo");

?>
<?php include 'testa_login.php' ?>

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
             
    <h1 id="titulo-programas">RELATÓRIO MÊS</h1>             
    
    <form method="post" action="lista_entrada_saida_mes.php">         
    
        <div class="box-entradas-saidas-mes">      	
            
                <label for="ano">Ano base:</label>                        
                
                    <input type = "text" name="ano" maxlength="4" size="3">        
                       
        <input type="submit"  id="btn-sair"  value="OK"/>    
    
        </div>
        
    </form>    
    <br>
<div class="box">
<?php
include 'conexao.php';

$ano = $_POST['ano'];
 
//Conexao com banco:

echo "Janeiro";

    $sql2 = "SELECT sum(valor) FROM entradasaidas WHERE data BETWEEN ('$ano-01-01') AND ('$ano-01-31') and tipo = 'ENTRADA'";     
    
    $sql3 = "SELECT sum(valor) FROM entradasaidas WHERE data BETWEEN ('$ano-01-01') AND ('$ano-01-31') and tipo = 'SAIDA'";
    
    $query = mysqli_query($conexao, $sql3);
    
while ($exibir = mysqli_fetch_array($query)) {
    
            $TOTALSAIDA = $exibir['0'];
     
     } 
$totalsaida = number_format($TOTALSAIDA, 2, '.', '');
     $query = mysqli_query($conexao,$sql2);
while ($exibir = mysqli_fetch_array($query)) {
     
            $totalentrada = $exibir['0'];    
    
     } 
    $totalentrada = number_format($totalentrada, 2, '.', '');
    ?>    
    <body>        
        <br>        
        <table border="2">            
            <!--Entradas -->            <td>                
                <h6>Total Entradas R$:                     
                    <?php echo number_format($totalentrada, 2, ',', '.') ?>                 
                </h6></td>            
            <!--Saídas -->		<td>                
                <h6>Total Saídas R$:                     
                    <?php echo number_format($totalsaida, 2, ',', '.') ?>                 
                </h6></td>            
            <!--Total Bruto --><td>                
                <h6>Total Bruto R$:  
<?php $bruto = number_format($totalentrada - $totalsaida, 2, ',', '.');
if ($bruto <= 0) {
    $total_bruto = 0;
    
     } else {
    $total_bruto = number_format($bruto, 2, ',', '.');
     } 
echo number_format($total_bruto, 2, ',', '.');
                     ?>                   
                </h6></td>               
            <!--Dizimo -->  	<td>                
                <h6>Dizímo R$:  
<?php
$perce = 0.10;
$dizimo = $totalentrada * $perce;
echo $Dizimo = number_format($dizimo, 2, ',', '.');
                     ?>                       
                    <!--Total Liquído -->                       
                    <div id="liquido">	<td>                            
                            <h6>Total Liquído R$: 
<?php $liquido = number_format($totalentrada - $totalsaida - $dizimo, 2, ',', '.');
if ($liquido <= 0) {
    $total_liquido = 0;
     } else {
    
    $total_liquido = number_format($liquido, 2, '.', '.');
     } 
echo number_format($total_liquido, 2, ',', '.');
                                 ?> 
                            </h6></td>	          
        </table>        
        <br>
<?php        
//FEVEREIRO:
echo "Fevereiro";
    $sql2 = "SELECT sum(valor) FROM entradasaidas WHERE data BETWEEN ('$ano-02-01') AND ('$ano-02-29') and tipo = 'ENTRADA'";     
    
    $sql3 = "SELECT sum(valor) FROM entradasaidas WHERE data BETWEEN ('$ano-02-01') AND ('$ano-01-29') and tipo = 'SAIDA'";
$query = mysqli_query($conexao, $sql3);
while ($exibir = mysqli_fetch_array($query)) {
    
            $TOTALSAIDA = $exibir['0'];
     
     } 
$totalsaida = number_format($TOTALSAIDA, 2, '.', '');
     $query = mysqli_query($conexao,$sql2);
while ($exibir = mysqli_fetch_array($query)) {
     
            $totalentrada = $exibir['0'];    
    
     } 
    $totalentrada = number_format($totalentrada, 2, '.', '');
        ?>    
        <body>        
            <br>        
            <table border="2">            
                <!--Entradas -->            <td>                
                    <h6>Total Entradas R$:                     
                        <?php echo number_format($totalentrada, 2, ',', '.') ?>                 
                    </h6></td>            
                <!--Saídas -->		<td>                
                    <h6>Total Saídas R$:                     
                        <?php echo number_format($totalsaida, 2, ',', '.') ?>                 
                    </h6></td>            
                <!--Total Bruto --><td>                
                    <h6>Total Bruto R$:  
<?php $bruto = number_format($totalentrada - $totalsaida, 2, ',', '.');
if ($bruto <= 0) {
    $total_bruto = 0;
    
     } else {
    $total_bruto = number_format($bruto, 2, ',', '.');
     } 
echo number_format($total_bruto, 2, ',', '.');
                         ?>                   
                    </h6></td>               
                <!--Dizimo -->  	<td>                
                    <h6>Dizímo R$:  
<?php
$perce = 0.10;
$dizimo = $totalentrada * $perce;
echo $Dizimo = number_format($dizimo, 2, ',', '.');
                         ?>                       
                        <!--Total Liquído -->                       
                        <div id="liquido">	<td>                            
                                <h6>Total Liquído R$: 
<?php $liquido = number_format($totalentrada - $totalsaida - $dizimo, 2, ',', '.');
if ($liquido <= 0) {
    $total_liquido = 0;
     } else {
    
    $total_liquido = number_format($liquido, 2, '.', '.');
     } 
echo number_format($total_liquido, 2, ',', '.');
                                     ?> 
                                </h6></td>	          
            </table>        
            <br>     
<?php        
//Março:
echo "Março";  
    $sql2 = "SELECT sum(valor) FROM entradasaidas WHERE data BETWEEN ('$ano-03-01') AND ('$ano-03-31') and tipo = 'Entrada'";     
    
    $sql3 = "SELECT sum(valor) FROM entradasaidas WHERE data BETWEEN ('$ano-03-01') AND ('$ano-03-31') and tipo = 'Saida'";
$query = mysqli_query($conexao, $sql3);
while ($exibir = mysqli_fetch_array($query)) {
    
            $TOTALSAIDA = $exibir['0'];
     
     } 
$totalsaida = number_format($TOTALSAIDA, 2, '.', '');
     $query = mysqli_query($conexao,$sql2);
while ($exibir = mysqli_fetch_array($query)) {
     
            $totalentrada = $exibir['0'];    
    
     } 
    $totalentrada = number_format($totalentrada, 2, '.', '');
            ?>     
            <body>        
                <br>        
                <table border="2">            
                    <!--Entradas -->            <td>                
                        <h6>Total Entradas R$:                     
                            <?php echo number_format($totalentrada, 2, ',', '.') ?>                 
                        </h6></td>            
                    <!--Saídas -->		<td>                
                        <h6>Total Saídas R$:                     
                            <?php echo number_format($totalsaida, 2, ',', '.') ?>                 
                        </h6></td>            
                    <!--Total Bruto --><td>                
                        <h6>Total Bruto R$:  
<?php $bruto = number_format($totalentrada - $totalsaida, 2, ',', '.');
if ($bruto <= 0) {
    $total_bruto = 0;
    
     } else {
    $total_bruto = number_format($bruto, 2, ',', '.');
     } 
echo number_format($total_bruto, 2, ',', '.');
                             ?>                   
                        </h6></td>               
                    <!--Dizimo -->  	<td>                
                        <h6>Dizímo R$:  
<?php
$perce = 0.10;
$dizimo = $totalentrada * $perce;
echo $Dizimo = number_format($dizimo, 2, ',', '.');
                             ?>                       
                            <!--Total Liquído -->                       
                            <div id="liquido">	<td>                            
                                    <h6>Total Liquído R$: 
<?php $liquido = number_format($totalentrada - $totalsaida - $dizimo, 2, ',', '.');
if ($liquido <= 0) {
    $total_liquido = 0;
     } else {
    
    $total_liquido = number_format($liquido, 2, '.', '.');
     } 
echo number_format($total_liquido, 2, ',', '.');
                                         ?> 
                                    </h6></td>	          
                </table>        
                <br>
<?php
//Abril:
echo "Abril";  
    $sql2 = "SELECT sum(valor) FROM entradasaidas WHERE data BETWEEN ('2020-04-01') AND ('$ano-04-30') and tipo = 'Entrada'";     
    
    $sql3 = "SELECT sum(valor) FROM entradasaidas WHERE data BETWEEN ('$ano-04-01') AND ('$ano-04-30') and tipo = 'Saida'";
$query = mysqli_query($conexao, $sql3);
while ($exibir = mysqli_fetch_array($query)) {
    
            $TOTALSAIDA = $exibir['0'];
     
     } 
$totalsaida = number_format($TOTALSAIDA, 2, '.', '');
     $query = mysqli_query($conexao,$sql2);
while ($exibir = mysqli_fetch_array($query)) {
     
            $totalentrada = $exibir['0'];    
    
     } 
    $totalentrada = number_format($totalentrada, 2, '.', '');
                ?>    
                <body>        
                    <br>        
                    <table border="2">            
                        <!--Entradas -->            <td>                
                            <h6>Total Entradas R$:                     
                                <?php echo number_format($totalentrada, 2, ',', '.') ?>                 
                            </h6></td>            
                        <!--Saídas -->		<td>                
                            <h6>Total Saídas R$:                     
                                <?php echo number_format($totalsaida, 2, ',', '.') ?>                 
                            </h6></td>            
                        <!--Total Bruto --><td>                
                            <h6>Total Bruto R$:  
<?php $bruto = number_format($totalentrada - $totalsaida, 2, ',', '.');
if ($bruto <= 0) {
    $total_bruto = 0;
    
     } else {
    $total_bruto = number_format($bruto, 2, ',', '.');
     } 
echo number_format($total_bruto, 2, ',', '.');
                                 ?>                   
                            </h6></td>               
                        <!--Dizimo -->  	<td>                
                            <h6>Dizímo R$:  
<?php
$perce = 0.10;
$dizimo = $totalentrada * $perce;
echo $Dizimo = number_format($dizimo, 2, ',', '.');
                                 ?>                       
                                <!--Total Liquído -->                       
                                <div id="liquido">	<td>                            
                                        <h6>Total Liquído R$: 
<?php $liquido = number_format($totalentrada - $totalsaida - $dizimo, 2, ',', '.');
if ($liquido <= 0) {
    $total_liquido = 0;
     } else {
    
    $total_liquido = number_format($liquido, 2, '.', '.');
     } 
echo number_format($total_liquido, 2, ',', '.');
                                             ?> 
                                        </h6></td>	          
                    </table>        
                    <br>
<?php
//Maio:
echo "Maio";  
    $sql2 = "SELECT sum(valor) FROM entradasaidas WHERE data BETWEEN ('$ano-05-01') AND ('$ano-05-31') and tipo = 'Entrada'";     
    
    $sql3 = "SELECT sum(valor) FROM entradasaidas WHERE data BETWEEN ('$ano-05-01') AND ('$ano-05-31') and tipo = 'Saida'";
$query = mysqli_query($conexao, $sql3);
while ($exibir = mysqli_fetch_array($query)) {
    
            $TOTALSAIDA = $exibir['0'];
     
     } 
$totalsaida = number_format($TOTALSAIDA, 2, '.', '');
     $query = mysqli_query($conexao,$sql2);
while ($exibir = mysqli_fetch_array($query)) {
     
            $totalentrada = $exibir['0'];    
    
     } 
    $totalentrada = number_format($totalentrada, 2, '.', '');
                    ?>    
                    <body>        
                        <br>        
                        <table border="2">            
                            <!--Entradas -->            <td>                
                                <h6>Total Entradas R$:                     
                                    <?php echo number_format($totalentrada, 2, ',', '.') ?>                 
                                </h6></td>            
                            <!--Saídas -->		<td>                
                                <h6>Total Saídas R$:                     
                                    <?php echo number_format($totalsaida, 2, ',', '.') ?>                 
                                </h6></td>            
                            <!--Total Bruto --><td>                
                                <h6>Total Bruto R$:  
<?php $bruto = number_format($totalentrada - $totalsaida, 2, ',', '.');
if ($bruto <= 0) {
    $total_bruto = 0;
    
     } else {
    $total_bruto = number_format($bruto, 2, ',', '.');
     } 
echo number_format($total_bruto, 2, ',', '.');
                                     ?>                   
                                </h6></td>               
                            <!--Dizimo -->  	<td>                
                                <h6>Dizímo R$:  
<?php
$perce = 0.10;
$dizimo = $totalentrada * $perce;
echo $Dizimo = number_format($dizimo, 2, ',', '.');
                                     ?>                       
                                    <!--Total Liquído -->                       
                                    <div id="liquido">	<td>                            
                                            <h6>Total Liquído R$: 
<?php $liquido = number_format($totalentrada - $totalsaida - $dizimo, 2, ',', '.');
if ($liquido <= 0) {
    $total_liquido = 0;
     } else {
    
    $total_liquido = number_format($liquido, 2, '.', '.');
     } 
echo number_format($total_liquido, 2, ',', '.');
                                                 ?> 
                                            </h6></td>	          
                        </table>        
                        <br>
<?php
//Junho:
echo "Junho";  
    $sql2 = "SELECT sum(valor) FROM entradasaidas WHERE data BETWEEN ('$ano-06-01') AND ('$ano-06-30') and tipo = 'Entrada'";     
    
    $sql3 = "SELECT sum(valor) FROM entradasaidas WHERE data BETWEEN ('$ano-06-01') AND ('$ano-06-30') and tipo = 'Saida'";
$query = mysqli_query($conexao, $sql3);
while ($exibir = mysqli_fetch_array($query)) {
    
            $TOTALSAIDA = $exibir['0'];
     
     } 
$totalsaida = number_format($TOTALSAIDA, 2, '.', '');
     $query = mysqli_query($conexao,$sql2);
while ($exibir = mysqli_fetch_array($query)) {
     
            $totalentrada = $exibir['0'];    
    
     } 
    $totalentrada = number_format($totalentrada, 2, '.', '');
                        ?>    
                        <body>        
                            <br>        
                            <table border="2">            
                                <!--Entradas -->            <td>                
                                    <h6>Total Entradas R$:                     
                                        <?php echo number_format($totalentrada, 2, ',', '.') ?>                 
                                    </h6></td>            
                                <!--Saídas -->		<td>                
                                    <h6>Total Saídas R$:                     
                                        <?php echo number_format($totalsaida, 2, ',', '.') ?>                 
                                    </h6></td>            
                                <!--Total Bruto --><td>                
                                    <h6>Total Bruto R$:  
<?php $bruto = number_format($totalentrada - $totalsaida, 2, ',', '.');
if ($bruto <= 0) {
    $total_bruto = 0;
    
     } else {
    $total_bruto = number_format($bruto, 2, ',', '.');
     } 
echo number_format($total_bruto, 2, ',', '.');
                                         ?>                   
                                    </h6></td>               
                                <!--Dizimo -->  	<td>                
                                    <h6>Dizímo R$:  
<?php
$perce = 0.10;
$dizimo = $totalentrada * $perce;
echo $Dizimo = number_format($dizimo, 2, ',', '.');
                                         ?>                       
                                        <!--Total Liquído -->                       
                                        <div id="liquido">	<td>                            
                                                <h6>Total Liquído R$: 
<?php $liquido = number_format($totalentrada - $totalsaida - $dizimo, 2, ',', '.');
if ($liquido <= 0) {
    $total_liquido = 0;
     } else {
    
    $total_liquido = number_format($liquido, 2, '.', '.');
     } 
echo number_format($total_liquido, 2, ',', '.');
                                                     ?> 
                                                </h6></td>	          
                            </table>        
                            <br>
<?php
//Julho:
echo "Julho";  
    $sql2 = "SELECT sum(valor) FROM entradasaidas WHERE data BETWEEN ('$ano-07-01') AND ('$ano-07-31') and tipo = 'Entrada'";     
    
    $sql3 = "SELECT sum(valor) FROM entradasaidas WHERE data BETWEEN ('$ano-07-01') AND ('$ano-07-31') and tipo = 'Saida'";
$query = mysqli_query($conexao, $sql3);
while ($exibir = mysqli_fetch_array($query)) {
    
            $TOTALSAIDA = $exibir['0'];
     
     } 
$totalsaida = number_format($TOTALSAIDA, 2, '.', '');
     $query = mysqli_query($conexao,$sql2);
while ($exibir = mysqli_fetch_array($query)) {
     
            $totalentrada = $exibir['0'];    
    
     } 
    $totalentrada = number_format($totalentrada, 2, '.', '');
                            ?>    
                            <body>        
                                <br>        
                                <table border="2">            
                                    <!--Entradas -->            <td>                
                                        <h6>Total Entradas R$:                     
                                            <?php echo number_format($totalentrada, 2, ',', '.') ?>                 
                                        </h6></td>            
                                    <!--Saídas -->		<td>                
                                        <h6>Total Saídas R$:                     
                                            <?php echo number_format($totalsaida, 2, ',', '.') ?>                 
                                        </h6></td>            
                                    <!--Total Bruto --><td>                
                                        <h6>Total Bruto R$:  
<?php $bruto = number_format($totalentrada - $totalsaida, 2, ',', '.');
if ($bruto <= 0) {
    $total_bruto = 0;
    
     } else {
    $total_bruto = number_format($bruto, 2, ',', '.');
     } 
echo number_format($total_bruto, 2, ',', '.');
                                             ?>                   
                                        </h6></td>               
                                    <!--Dizimo -->  	<td>                
                                        <h6>Dizímo R$:  
<?php
$perce = 0.10;
$dizimo = $totalentrada * $perce;
echo $Dizimo = number_format($dizimo, 2, ',', '.');
                                             ?>                       
                                            <!--Total Liquído -->                       
                                            <div id="liquido">	<td>                            
                                                    <h6>Total Liquído R$: 
<?php $liquido = number_format($totalentrada - $totalsaida - $dizimo, 2, ',', '.');
if ($liquido <= 0) {
    $total_liquido = 0;
     } else {
    
    $total_liquido = number_format($liquido, 2, '.', '.');
     } 
echo number_format($total_liquido, 2, ',', '.');
                                                         ?> 
                                                    </h6></td>	          
                                </table>        
                                <br>  
<?php
//Agosto:
echo "Agosto";  
    $sql2 = "SELECT sum(valor) FROM entradasaidas WHERE data BETWEEN ('$ano-08-01') AND ('$ano-08-31') and tipo = 'Entrada'";     
    
    $sql3 = "SELECT sum(valor) FROM entradasaidas WHERE data BETWEEN ('$ano-08-01') AND ('$ano-08-31') and tipo = 'Saida'";
$query = mysqli_query($conexao, $sql3);
while ($exibir = mysqli_fetch_array($query)) {
    
            $TOTALSAIDA = $exibir['0'];
     
     } 
$totalsaida = number_format($TOTALSAIDA, 2, '.', '');
     $query = mysqli_query($conexao,$sql2);
while ($exibir = mysqli_fetch_array($query)) {
     
            $totalentrada = $exibir['0'];    
    
     } 
    $totalentrada = number_format($totalentrada, 2, '.', '');
                                ?>     
                                <body>        
                                    <br>        
                                    <table border="2">            
                                        <!--Entradas -->            <td>                
                                            <h6>Total Entradas R$:                     
                                                <?php echo number_format($totalentrada, 2, ',', '.') ?>                 
                                            </h6></td>            
                                        <!--Saídas -->		<td>                
                                            <h6>Total Saídas R$:                     
                                                <?php echo number_format($totalsaida, 2, ',', '.') ?>                 
                                            </h6></td>            
                                        <!--Total Bruto --><td>                
                                            <h6>Total Bruto R$:  
<?php $bruto = number_format($totalentrada - $totalsaida, 2, ',', '.');
if ($bruto <= 0) {
    $total_bruto = 0;
    
     } else {
    $total_bruto = number_format($bruto, 2, ',', '.');
     } 
echo number_format($total_bruto, 2, ',', '.');
                                                 ?>                   
                                            </h6></td>               
                                        <!--Dizimo -->  	<td>                
                                            <h6>Dizímo R$:  
<?php
$perce = 0.10;
$dizimo = $totalentrada * $perce;
echo $Dizimo = number_format($dizimo, 2, ',', '.');
                                                 ?>                       
                                                <!--Total Liquído -->                       
                                                <div id="liquido">	<td>                            
                                                        <h6>Total Liquído R$: 
<?php $liquido = number_format($totalentrada - $totalsaida - $dizimo, 2, ',', '.');
if ($liquido <= 0) {
    $total_liquido = 0;
     } else {
    
    $total_liquido = number_format($liquido, 2, '.', '.');
     } 
echo number_format($total_liquido, 2, ',', '.');
                                                             ?> 
                                                        </h6></td>	          
                                    </table>        
                                    <br>  
<?php
//Setembro:
echo "Setembro";  
    $sql2 = "SELECT sum(valor) FROM entradasaidas WHERE data BETWEEN ('$ano-09-01') AND ('$ano-09-30') and tipo = 'Entrada'";     
    
    $sql3 = "SELECT sum(valor) FROM entradasaidas WHERE data BETWEEN ('$ano-09-01') AND ('$ano-09-30') and tipo = 'Saida'";
$query = mysqli_query($conexao, $sql3);
while ($exibir = mysqli_fetch_array($query)) {
    
            $TOTALSAIDA = $exibir['0'];
     
     } 
$totalsaida = number_format($TOTALSAIDA, 2, '.', '');
     $query = mysqli_query($conexao,$sql2);
while ($exibir = mysqli_fetch_array($query)) {
     
            $totalentrada = $exibir['0'];    
    
     } 
    $totalentrada = number_format($totalentrada, 2, '.', '');
                                    ?>     
                                    <body>        
                                        <br>        
                                        <table border="2">            
                                            <!--Entradas -->            <td>                
                                                <h6>Total Entradas R$:                     
                                                    <?php echo number_format($totalentrada, 2, ',', '.') ?>                 
                                                </h6></td>            
                                            <!--Saídas -->		<td>                
                                                <h6>Total Saídas R$:                     
                                                    <?php echo number_format($totalsaida, 2, ',', '.') ?>                 
                                                </h6></td>            
                                            <!--Total Bruto --><td>                
                                                <h6>Total Bruto R$:  
<?php $bruto = number_format($totalentrada - $totalsaida, 2, ',', '.');
if ($bruto <= 0) {
    $total_bruto = 0;
    
     } else {
    $total_bruto = number_format($bruto, 2, ',', '.');
     } 
echo number_format($total_bruto, 2, ',', '.');
                                                     ?>                   
                                                </h6></td>               
                                            <!--Dizimo -->  	<td>                
                                                <h6>Dizímo R$:  
<?php
$perce = 0.10;
$dizimo = $totalentrada * $perce;
echo $Dizimo = number_format($dizimo, 2, ',', '.');
                                                     ?>                       
                                                    <!--Total Liquído -->                       
                                                    <div id="liquido">	<td>                            
                                                            <h6>Total Liquído R$: 
<?php $liquido = number_format($totalentrada - $totalsaida - $dizimo, 2, ',', '.');
if ($liquido <= 0) {
    $total_liquido = 0;
     } else {
    
    $total_liquido = number_format($liquido, 2, '.', '.');
     } 
echo number_format($total_liquido, 2, ',', '.');
                                                                 ?> 
                                                            </h6></td>	          
                                        </table>        
                                        <br>  
<?php
//Outubro:
echo "Outubro";  
    $sql2 = "SELECT sum(valor) FROM entradasaidas WHERE data BETWEEN ('$ano-10-01') AND ('$ano-10-31') and tipo = 'Entrada'";     
    
    $sql3 = "SELECT sum(valor) FROM entradasaidas WHERE data BETWEEN ('$ano-10-01') AND ('$ano-10-31') and tipo = 'Saida'";
$query = mysqli_query($conexao, $sql3);
while ($exibir = mysqli_fetch_array($query)) {
    
            $TOTALSAIDA = $exibir['0'];
     
     } 
$totalsaida = number_format($TOTALSAIDA, 2, '.', '');
     $query = mysqli_query($conexao,$sql2);
while ($exibir = mysqli_fetch_array($query)) {
     
            $totalentrada = $exibir['0'];    
    
     } 
    $totalentrada = number_format($totalentrada, 2, '.', '');
                                        ?>     
                                        <body>        
                                            <br>        
                                            <table border="2">            
                                                <!--Entradas -->            <td>                
                                                    <h6>Total Entradas R$:                     
                                                        <?php echo number_format($totalentrada, 2, ',', '.') ?>                 
                                                    </h6></td>            
                                                <!--Saídas -->		<td>                
                                                    <h6>Total Saídas R$:                     
                                                        <?php echo number_format($totalsaida, 2, ',', '.') ?>                 
                                                    </h6></td>            
                                                <!--Total Bruto --><td>                
                                                    <h6>Total Bruto R$:  
<?php $bruto = number_format($totalentrada - $totalsaida, 2, ',', '.');
if ($bruto <= 0) {
    $total_bruto = 0;
    
     } else {
    $total_bruto = number_format($bruto, 2, ',', '.');
     } 
echo number_format($total_bruto, 2, ',', '.');
                                                         ?>                   
                                                    </h6></td>               
                                                <!--Dizimo -->  	<td>                
                                                    <h6>Dizímo R$:  
<?php
$perce = 0.10;
$dizimo = $totalentrada * $perce;
echo $Dizimo = number_format($dizimo, 2, ',', '.');
                                                         ?>                       
                                                        <!--Total Liquído -->                       
                                                        <div id="liquido">	<td>                            
                                                                <h6>Total Liquído R$: 
<?php $liquido = number_format($totalentrada - $totalsaida - $dizimo, 2, ',', '.');
if ($liquido <= 0) {
    $total_liquido = 0;
     } else {
    
    $total_liquido = number_format($liquido, 2, '.', '.');
     } 
echo number_format($total_liquido, 2, ',', '.');
                                                                     ?> 
                                                                </h6></td>	          
                                            </table>        
                                            <br>
<?php
//Novembro:
echo "Novembro";  
    $sql2 = "SELECT sum(valor) FROM entradasaidas WHERE data BETWEEN ('$ano-11-01') AND ('$ano-11-30') and tipo = 'Entrada'";     
    
    $sql3 = "SELECT sum(valor) FROM entradasaidas WHERE data BETWEEN ('$ano-11-01') AND ('$ano-11-30') and tipo = 'Saida'";
$query = mysqli_query($conexao, $sql3);
while ($exibir = mysqli_fetch_array($query)) {
    
            $TOTALSAIDA = $exibir['0'];
     
     } 
$totalsaida = number_format($TOTALSAIDA, 2, '.', '');
     $query = mysqli_query($conexao,$sql2);
while ($exibir = mysqli_fetch_array($query)) {
     
            $totalentrada = $exibir['0'];    
    
     } 
    $totalentrada = number_format($totalentrada, 2, '.', '');
                                            ?>    
                                            <body>        
                                                <br>        
                                                <table border="2">            
                                                    <!--Entradas -->            <td>                
                                                        <h6>Total Entradas R$:                     
                                                            <?php echo number_format($totalentrada, 2, ',', '.') ?>                 
                                                        </h6></td>            
                                                    <!--Saídas -->		<td>                
                                                        <h6>Total Saídas R$:                     
                                                            <?php echo number_format($totalsaida, 2, ',', '.') ?>                 
                                                        </h6></td>            
                                                    <!--Total Bruto --><td>                
                                                        <h6>Total Bruto R$:  
<?php $bruto = number_format($totalentrada - $totalsaida, 2, ',', '.');
if ($bruto <= 0) {
    $total_bruto = 0;
    
     } else {
    $total_bruto = number_format($bruto, 2, ',', '.');
     } 
echo number_format($total_bruto, 2, ',', '.');
                                                             ?>                   
                                                        </h6></td>               
                                                    <!--Dizimo -->  	<td>                
                                                        <h6>Dizímo R$:  
<?php
$perce = 0.10;
$dizimo = $totalentrada * $perce;
echo $Dizimo = number_format($dizimo, 2, ',', '.');
                                                             ?>                       
                                                            <!--Total Liquído -->                       
                                                            <div id="liquido">	<td>                            
                                                                    <h6>Total Liquído R$: 
<?php $liquido = number_format($totalentrada - $totalsaida - $dizimo, 2, ',', '.');
if ($liquido <= 0) {
    $total_liquido = 0;
     } else {
    
    $total_liquido = number_format($liquido, 2, '.', '.');
     } 
echo number_format($total_liquido, 2, ',', '.');
                                                                         ?> 
                                                                    </h6></td>	          
                                                </table>        
                                                <br>  
<?php
//Dezembro:
echo "Dezembro";  
    $sql2 = "SELECT sum(valor) FROM entradasaidas WHERE data BETWEEN ('$ano-12-01') AND ('$ano-12-31') and tipo = 'Entrada'";     
    
    $sql3 = "SELECT sum(valor) FROM entradasaidas WHERE data BETWEEN ('$ano-12-01') AND ('$ano-12-31') and tipo = 'Saida'";
$query = mysqli_query($conexao, $sql3);
while ($exibir = mysqli_fetch_array($query)) {
    
            $TOTALSAIDA = $exibir['0'];
     
     } 
$totalsaida = number_format($TOTALSAIDA, 2, '.', '');
     $query = mysqli_query($conexao,$sql2);
while ($exibir = mysqli_fetch_array($query)) {
     
            $totalentrada = $exibir['0'];    
    
     } 
    $totalentrada = number_format($totalentrada, 2, '.', '');
                                                ?>     
                                                <body>        
                                                    <br>        
                                                    <table border="2">            
                                                        <!--Entradas -->            <td>                
                                                            <h6>Total Entradas R$:                     
                                                                <?php echo number_format($totalentrada, 2, ',', '.') ?>                 
                                                            </h6></td>            
                                                        <!--Saídas -->		<td>                
                                                            <h6>Total Saídas R$:                     
                                                                <?php echo number_format($totalsaida, 2, ',', '.') ?>                 
                                                            </h6></td>            
                                                        <!--Total Bruto --><td>                
                                                            <h6>Total Bruto R$:  
<?php $bruto = number_format($totalentrada - $totalsaida, 2, ',', '.');
if ($bruto <= 0) {
    $total_bruto = 0;
    
     } else {
    $total_bruto = number_format($bruto, 2, ',', '.');
     } 
echo number_format($total_bruto, 2, ',', '.');
                                                                 ?>                   
                                                            </h6></td>               
                                                        <!--Dizimo -->  	<td>                
                                                            <h6>Dizímo R$:  
<?php
$perce = 0.10;
$dizimo = $totalentrada * $perce;
echo $Dizimo = number_format($dizimo, 2, ',', '.');
                                                                 ?>                       
                                                                <!--Total Liquído -->                       
                                                                <div id="liquido">	<td>                            
                                                                        <h6>Total Liquído R$: 
<?php $liquido = number_format($totalentrada - $totalsaida - $dizimo, 2, ',', '.');
if ($liquido <= 0) {
    $total_liquido = 0;
     } else {
    
    $total_liquido = number_format($liquido, 2, '.', '.');
     } 
echo number_format($total_liquido, 2, ',', '.');
                                                                             ?> 
                                                                        </h6></td>	          
                                                    </table>
</div>                                                     
                                                    <hr>
<div class="box">                                                      
<?php
//Totalizador:
echo "Totais no ano de $ano:";  
    $sql2 = "SELECT sum(valor) FROM entradasaidas WHERE data BETWEEN ('$ano-01-01') AND ('$ano-12-31') and tipo = 'Entrada'";     
    
    $sql3 = "SELECT sum(valor) FROM entradasaidas WHERE data BETWEEN ('$ano-01-01') AND ('$ano-12-31') and tipo = 'Saida'";
$query = mysqli_query($conexao, $sql3);
while ($exibir = mysqli_fetch_array($query)) {
    
            $TOTALSAIDA = $exibir['0'];
     
     } 
$totalsaida = number_format($TOTALSAIDA, 2, '.', '');
     $query = mysqli_query($conexao,$sql2);
while ($exibir = mysqli_fetch_array($query)) {
     
            $totalentrada = $exibir['0'];    
    
     } 
    $totalentrada = number_format($totalentrada, 2, '.', '');
                                                ?>     
                                                <body>        
                                                    <br>        
                                                    <table border="2">            
                                                        <!--Entradas -->            <td>                
                                                            <h6>Total Entradas R$:                     
                                                                <?php echo number_format($totalentrada, 2, ',', '.') ?>                 
                                                            </h6></td>            
                                                        <!--Saídas -->      <td>                
                                                            <h6>Total Saídas R$:                     
                                                                <?php echo number_format($totalsaida, 2, ',', '.') ?>                 
                                                            </h6></td>            
                                                        <!--Total Bruto --><td>                
                                                            <h6>Total Bruto R$:  
<?php $bruto = number_format($totalentrada - $totalsaida, 2, ',', '.');
if ($bruto <= 0) {
    $total_bruto = 0;
    
     } else {
    $total_bruto = number_format($bruto, 2, ',', '.');
     } 
echo number_format($total_bruto, 2, ',', '.');
                                                                 ?>                   
                                                            </h6></td>               
                                                        <!--Dizimo -->      <td>                
                                                            <h6>Dizímo R$:  
<?php
$perce = 0.10;
$dizimo = $totalentrada * $perce;
echo $Dizimo = number_format($dizimo, 2, ',', '.');
                                                                 ?>                       
                                                                <!--Total Liquído -->                       
                                                                <div id="liquido">  <td>                            
                                                                        <h6>Total Liquído R$: 
<?php $liquido = number_format($totalentrada - $totalsaida - $dizimo, 2, ',', '.');
if ($liquido <= 0) {
    $total_liquido = 0;
     } else {
    
    $total_liquido = number_format($liquido, 2, '.', '.');
     } 
echo number_format($total_liquido, 2, ',', '.');
                                                                             ?> 
                                                                        </h6></td>            
                                                    </table>
</div>
<br>                                                    

                                                    <button onclick="window.close()" id="btn">Sair
                                                    </button>                             
                                                </body>
</html>