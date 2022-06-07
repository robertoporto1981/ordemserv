<?php session_start() ?>

<?php

date_default_timezone_set("America/Sao_Paulo");

// Data:

$data = date('d/m/Y');

$dia = date('d');

$mes = date('m');

$ano = date('Y');

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

        <title>Relatorio entradas e saidas

        </title>	

    </head>

    <h3><center>RELATÓRIO</center></h3>
    
        <form method="post" action="lista_entrada_saida.php">
    
    <div class="box-entradas-saidas">
    
      	<label>Data inicial:<input type = "date" value="<?php echo $ano ?>-<?php echo $mes ?>-<?php echo "01"; ?>" name="datainicial"></label>&nbsp;<img src="images/calendar.png"><br>

	<label>Data final:<input type = "date" value="<?php echo $ano ?>-<?php echo $mes ?>-<?php echo $dia ?>" name="datafinal"></label>&nbsp;<img src="images/calendar.png"><br>
                                            
            <input type="radio" id="" name="entrada" value="ENTRADA">  
            
            <label for="entrada">Entrada</label>  
            
            <input type="radio" id="saida" name="saida" value="SAIDA">     
            
            <label for="saida">Saída</label>  
            
            <input type="radio" id="todos" name="todos" value="ENTRADASAIDAS">     
            
            <label for="louie">Todos</label> 
            
                <input type="submit"  id="btn-sair"  value="OK"/>
                
                <button onclick="window.close()" id="btn">Sair</button>

    </div>	          
  
    </form>
    <hr>

<?php
if (empty($_POST['datainicial'])) {

    $datainicial = " ";

} else {

    $datainicial = $_POST['datainicial'];             
    
}
 
                                                   
if (empty($_POST['datafinal'])) {

    $datafinal = " ";

     } else {

    $datafinal = $_POST['datafinal'];
} 

// Mes inicial:

$dia_inicial = substr($datainicial, 8, 9);

$mes_inicial = substr($datainicial, 5, 2);

$ano_inicial = substr($datainicial, 0, 4);

$data_ini = $dia_inicial . "/" . $mes_inicial . "/" . $ano_inicial;

// Mes final:
$dia_final = substr($datafinal, 8, 9);

$mes_final = substr($datafinal, 5, 2);

$ano_final = substr($datafinal, 0, 4);

$data_final = $dia_final . "/" . $mes_final . "/" . $ano_final;

//Opções:
$entrada = $_POST['entrada'];

$saida = $_POST['saida'];

$todos = $_POST['todos'];

//Conexao com banco:
require_once 'conexao.php';

if ($entrada == true) {
    
    $sql = "SELECT * FROM entradasaidas WHERE data BETWEEN ('$ano_inicial$mes_inicial$dia_inicial') AND ('$ano_final$mes_final$dia_final') AND  tipo = 'ENTRADA' order by data asc";
    
    } 

if ($saida == true) {
    
    $sql = "SELECT * FROM entradasaidas WHERE data BETWEEN ('$ano_inicial$mes_inicial$dia_inicial') AND ('$ano_final$mes_final$dia_final') AND  tipo = 'SAIDA' order by data asc";
    } 

if ($todos == true) {
    
    $sql = "SELECT * FROM entradasaidas WHERE data BETWEEN ('$ano_inicial$mes_inicial$dia_inicial') AND ('$ano_final$mes_final$dia_final') order by data asc";
    }

$consulta = mysqli_query($conexao, $sql);

if (mysqli_error($conexao) == true) {
    
    echo '<div class="error-mysql">';
    
     echo("Erro! <br> " . mysqli_error($conexao));
     
     echo '<br>';
    
     echo $sql;
    
     echo '</div>';
    
     mysqli_close($conexao);
 
    die;
} 
    
//Teste

if($entrada === "ENTRADA" OR $saida ==="SAIDA" or $todos ==="ENTRADASAIDAS"){
     
echo '<table class="table table-bordered">
    
    <thead class="thead-dark">
    
<tr>';
 
 echo '<th scope="col">CÓDIGO:</td>';
 
 echo '<th scope="col">DATA:</td>';
 
 echo '<th scope="col">TIPO:</td>'; 
 
 echo '<th scope="col">DESCRIÇÃO:</td>';
 
 echo '<th scope="col">STATUS:</td>';
 
 echo '<th scope="col">PAGAMENTO:</td>';
 
 echo '<th scope="col">VALOR R$:</td>';
 
 echo '</tr>'; 

    
echo "<br><b>Período de:" . " " . $data_ini . " " . "à" . " " . $data_final;

// Armazena os dados da consulta em um array associativo
while ($registro = mysqli_fetch_assoc($consulta)) {
    
    echo '<tbody>';
   
    echo '<tr>';
   
    echo '<td>' . $registro["codigo"] . '</td>';
     // Tratamento da data:
    $Data = $registro["data"];
    
     $dia = substr("$Data", 8, 9);
     $mes = substr("$Data", 5, 2);
     $ano = substr("$Data", 0, 4);
    
     $data = "$dia/$mes/$ano";     
    
     echo '<td>' . $data . '</td>';
     echo '<td>' . $registro["tipo"] . '</td>';
     echo '<td>' . $registro["descr"] . '</td>';
     echo '<td>' . $registro["status"] . '</td>';      
     echo '<td>' . $registro["bandeiracartao"] . '</td>';
     echo '<td>' . 'R$' . $valor = number_format($registro["valor"], 2, '.', '') . '</td>';
     // echo '<td>'.'R$'.$registro["valor"].'</td>';
    echo '</tr>';
    echo '</tbody>';
    
     } 
echo '</table>';

if ($entrada or $todos == true) {
  $sql2 = "SELECT sum(valor) FROM entradasaidas WHERE data BETWEEN ('$ano_inicial$mes_inicial$dia_inicial') AND ('$ano_final$mes_final$dia_final') and tipo = 'Entrada'";
    } 

$query = mysqli_query($conexao, $sql2);

 while ($exibir = mysqli_fetch_array($query)) {
    
    $Totalentrada = $exibir['0'];
     $totalentrada = number_format($Totalentrada, 2, '.', '');
     } 
?>

<?php
if ($saida or $todos == true) {
    $sql3 = "SELECT sum(valor) FROM entradasaidas WHERE data BETWEEN ('$ano_inicial$mes_inicial$dia_inicial') AND ('$ano_final$mes_final$dia_final') and tipo = 'Saida'";
    } 
$query = mysqli_query($conexao, $sql3);

while ($exibir = mysqli_fetch_array($query)) {
    
    $Totalsaida = $exibir['0'];
     $totalsaida = number_format($Totalsaida, 2, '.', '');
     }
      
?>
    <body>
        <br>
        <table border="2">
            <!--Entradas -->
            <td>
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
            <!--Dizimo --> 	<td>
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

}//fim

 ?>
                            </h6></td>	 
        </table>
        <br>
               
        
                        
    </body>
</html>