                
<?php session_start() ?>


<?php


$usuario = $_SESSION['login'];
  
$codoper = $_SESSION['codoper'];


//Conecta com banco de dados

require_once 'conexao.php';


//Faz consulta no banco com a variavel gravada $os

$sql = "select * from contasareceber where codoper = '$codoper' and usuario ='$usuario'";

                                                	     
$consulta = mysqli_query($conexao,$sql);
   
//Pega dados da consulta e transforma em array

while ($contasareceber = mysqli_fetch_array($consulta)){
           
           
    $codigooperacao = $contasareceber[0]; 
    
    $datapagamento = $contasareceber[3];

    $cliente = $contasareceber[4]; 
    		
	  $prestacao = $contasareceber[6];
    
    $vencimento = $contasareceber[2];

    $valor = $contasareceber[6];

    $parcela = $contasareceber[7];

    $total = $contasareceber[8];


?>


<html lang='pt-BR'>

     <head>

           <meta charset="utf-8">

      <title>Comprovante</title>

        <link type="text/css" rel="stylesheet" href="css/stylesheet.css">

    </head>

<body>

<h3 id="comprovante-baixa">COMPROVANTE DE PAGAMENTO</h3>

    <h3 id="comprovante-baixa"><?php echo $data = date("d/m/Y") ?> </h3>

        <h3 id="comprovante-baixa">Cliente..:<?php echo $cliente ?></h3>


        <h3 id="comprovante-baixa">Documento..nº: <?php echo $codigooperacao ?></h3>          <h3 id="comprovante-baixa">Prestacao..:0<?php echo $parcela ?> </h3>

          <h3 id="comprovante-baixa">Vencimento..R$:<?php echo $vencimento ?> </h3>

            <h3 id="comprovante-baixa">Pagamento..R$:<?php echo $datapagamento ?></h3>

             <h3 id="comprovante-baixa">Valor..R$:<?php echo $valor ?></h3>            <h3 id="comprovante-baixa">Encargos..R$: 0</h3>

<h3 id="comprovante-baixa">Desconto..R$: 0</h3>              <h3 id="comprovante-baixa">Total..R$:<?php echo $total ?></h3>


</body>

</html>

