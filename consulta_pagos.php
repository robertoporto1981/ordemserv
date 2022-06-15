 <?php session_start() ?>

 <?php require_once 'testa_login.php' ?>
   
 <html lang='pt-BR'>
          
 <head>       
        
        <meta http-equiv="Content-Language" content="pt-br">
        
        <meta charset='utf-8'> 
        
        <link type="text/css" rel="stylesheet" href="stylesheet.css">

        <link rel="stylesheet" href="css/bootstrap.css">
 
 </head>

<title>Receber</title>	 

<body>  

<form action="./" id="formulario" method="post">
    
    <input type="button" value="Voltar" class="btn btn-dark btn-sm" onclick="Acao('menu');">
    
</form>

<?php

$usuario = $_SESSION['login'];

// $busca = $_POST['busca'];
$busca = "pago";

// Conexao
require_once 'conexao.php';

if ( empty( $busca ) ){
	
	echo"<script language='javascript' type='text/javascript'>alert('Nao foi encontrado nenhum registro!');window.location.href='form_cadastro_produto.html';</script>";
} 


$sql = "select * from contasareceber where status = ('$busca') order by codoper desc";

$consulta = mysqli_query( $conexao, $sql );

if ( mysqli_error( $conexao ) == true ) {
				
	echo '<div class="error-mysql">';
				
	echo( "Mysql query Erro! <br> " . mysqli_error( $conexao ) );
				
	echo '<br>';
				
	echo $sql;
				
	echo '</div>';
				
	mysqli_close( $conexao );
				
	die;
} 


// Armazena os dados da consulta em um array associativo
echo '<table class="table table-bordered">
    
    <thead class="thead-dark">
    
    <tr>
    
      <th scope="col">#</th>
        
      <th scope="col">CODOPER:</th>
    
      <th scope="col">DATA LANCTO:</th>
    
      <th scope="col">VENCTO:</th>
    
      <th scope="col">DATA PAGTO:</th>
      
      <th scope="col">COD.CLIENTE:</th>
      
      <th scope="col">CLIENTE:</th>
      
      <th scope="col">DESCRI��O:</th>
      
      <th scope="col">VALOR:</th>
      
      <th scope="col">PARCELA:</th>
      
      <th scope="col">STATUS:</th>       
          
    </tr>
    
    </thead>';


echo"<h3><center>RELATORIO PAGOS</center></h3>";

while ( $registro = mysqli_fetch_assoc( $consulta ) ) {
				
	echo"<form action='./' id='formulario' method='post'>";
				
	echo'<tr>';
			
	echo '<td><a href="exclui_baixa_receber.php?codoper=' . $registro["codoper"] . '"&descr=' . $registro["descr"] . '"�&valor=' . $registro["valor"] . '"#><img src="images/lixeira.png" width="20px"></td>';
				
	echo '<td>' . $registro["codoper"] . '</td>';
				
// echo '<td id="campos">'.$registro["data"] = date('d/m/Y').'</td>';
	
	$datalanc = $registro["data"];
				
	$dia = substr( "$datalanc", 0, 2 );
					
	$mes = substr( "$datalanc", 2, 2 );
					
	$ano = substr( "$datalanc", 4, 8 );
				
	$datalancamento = "$dia/$mes/$ano";
				
	echo '<td>' . $datalancamento . '</td>';
				
// echo '<td id="campos">'.$registro["datavenc"] = date('d/m/Y').'</td>';
	
	$datavenc = $registro["datavenc"];
				
	$dia = substr( "$datavenc", 0, 2 );
				
	$mes = substr( "$datavenc", 2, 2 );
				
	$ano = substr( "$datavenc", 4, 8 );
				
	$datavencimento = "$dia/$mes/$ano";
				
	echo '<td>' . $datavencimento . '</td>';
				
// echo '<td id="campos-codigo">'.$registro["datapag"].'</td>';
	
	$datapagto = $registro["datapag"];
				
	$dia = substr( "$datapagto", 0, 2 );
				
	$mes = substr( "$datapagto", 2, 2 );
				
	$ano = substr( "$datapagto", 4, 8 );
				
	$datapagamento = "$dia/$mes/$ano";
				
	echo '<td>' . $datapagamento . '</td>';
				
	echo '<td>' . $registro["cod"] . '</td>';
				
	echo '<td>' . $registro["nome"] . '</td>';
				
	echo '<td>' . $registro["descr"] . '</td>';
				
	echo '<td>' . "R$" . number_format( $registro["valor"], 2, ',', '.' ) . '</td>';
			
	echo '<td>' . $registro['parcela'] . '</td>';
				
if ( $registro['status'] == 'RECEBER' ) {
								
	echo '<td>' . $registro["status"] . '</td>';
								
	} else {
								
		echo '<td>' . $registro["status"] . '</td>';
								
		// echo '<td><img src="images/certo.png" width="10px height="10px"></td>';
	} 
				
echo'</tr>';
			
				
} 

echo'</table>';

// Totalizadores:
$sql2 = "SELECT sum(valor) FROM `contasareceber` where status = 'PAGO'";

$query = mysqli_query( $conexao, $sql2 );

if ( mysqli_error( $conexao ) == true ) {
				
	echo '<div class="error-mysql">';
				
	echo( "Mysql query Erro! <br> " . mysqli_error( $conexao ) );
				
	echo '<br>';
				
	echo $sql2;
				
	echo '</div>';
				
	mysqli_close( $conexao );
				
	die;
				
} 

while ( $exibir = mysqli_fetch_array( $query ) ) {
				
	$total = $exibir['0'];
				
} 


?>
<html>

<h1 id ="borda2">Total pagos R$: <?php echo number_format( $total, 2, ',', '.' ) ?></h1>

     

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


