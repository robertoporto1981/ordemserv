 <?php session_start();
?>
 
 
<html lang='pt-BR'>
 <head>
 
  		<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>                
        <link type ="text/css" rel="stylesheet" href="css/reset.css">               
        
        <link rel="stylesheet" href="css/bootstrap.css">
        
        <link type="text/css" rel="stylesheet" href="stylesheet.css">
 		
 		
 </head>

 		<title>Pagos</title>

<html>
        
        <h3><center>RELATORIO PAGOS</center></h3>

<body>
     <form action="./" id="formulario" method="post">

    <!--<input type="button" value="Altera" onclick="Acao('altera_contas_receber');"> -->

            <input type="button" id="btn" value="Voltar" onclick="Acao('menu');">
    
</form>



<?php

 $usuario = $_SESSION['login'];

// $busca = $_POST['busca'];
 $busca = "pago";


// Conexao
require_once 'conexao.php';


if ( empty( $busca ) )
				
	
{
	
	echo"<script language='javascript' type='text/javascript'>alert('Nao foi encontrado nenhum registro!');window.location.href='form_cadastro_produto.html';</script>";
	
} 


$sql = "select * from contasapagar where status = ('$busca') order by codoper desc";

$consulta = mysqli_query( $conexao, $sql );

if ( mysqli_error( $conexao ) == true ) {
				
	
	echo '<div class="error-mysql">';
				
	
	echo( "Erro! <br> " . mysqli_error( $conexao ) );
                
    
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
        
      <th scope="col">DOCUMENTO:</th>
    
      <th scope="col">DATA LANC.:</th>
    
      <th scope="col">DATA VENC.:</th>

      <th scope="col">FORNECEDOR:</th>
    
      <th scope="col">DESCRICAO:</th>
      
      <th scope="col">VALOR:</th>
      
      <th scope="col">PARCELA:</th>
                 
      <th scope="col">STATUS:</th>
      
          
          
    </tr>
    
    </thead>';

 // echo"<h1 id='borda'>Relatorio pagos</h1>";
while ( $registro = mysqli_fetch_assoc( $consulta ) ) {
				
		
	echo"<form action='./' id='formulario' method='post'>";				
	
	echo'<tr>';				
	
	echo '<td><a href="exclui_baixa_pagar.php?codoper=' . $registro["codoper"] . '"&descr=' . $registro["descr"] . '"�&valor=' . $registro["valor"] . '"#><img src="images/lixeira.png" width="20px"></td>';
				
				 
	echo '<td>' . $registro["codoper"] . '</td>';
				 			

	//Datas:                 
    
	$datalanc = $registro["data"];				 
	
	$dia = substr( "$datalanc", 0, 2 );				
	
	$mes = substr( "$datalanc", 2, 2 );				
	
	$ano = substr( "$datalanc", 4, 8 );				
	
	$datalancamento = "$dia/$mes/$ano";				
				 
	echo '<td>' . $datalancamento . '</td>';
				 				 
	$datavenc = $registro["datavenc"];					
	
	$dia = substr( "$datavenc", 0, 2 );				
	
	$mes = substr( "$datavenc", 2, 2 );				
	
	$ano = substr( "$datavenc", 4, 8 );				
	
	$datavencimento = "$dia/$mes/$ano";					
	
	echo '<td>' . $datavencimento . '</td>';             
                 
    
	//fim
    
	echo '<td>'.$registro["fornecedor"].'</td>';
				
	
	echo '<td>' . $registro["descr"] . '</td>';
				
	
	echo '<td>' . "R$" . number_format( $registro["valor"], 2, ',', '.' ) . '</td>';
				
	
	echo '<td>' . $registro['parcela'] . '</td>';
				

if ( $registro['status'] == 'RECEBER' ) {
	
	echo '<td>' . $registro["status"] . '</td>';
								
	
} else {
								
	
	echo '<td>' . $registro["status"] . '</td>';
								

} 
				
	
echo'</tr>';
				
				

} 

echo'</table>';

$sql2 = "SELECT sum(valor) FROM contasapagar where status = 'PAGO'";

$query = mysqli_query( $conexao, $sql2 );

if ( mysqli_error( $conexao ) == true ) {
	
	echo '<div class="error-mysql">';
				
	
	echo( "Erro! <br> " . mysqli_error( $conexao ) );
				
	
	echo '</div>';
				
	
	mysqli_close( $conexao );
	
	die;

} 

while ( $exibir = mysqli_fetch_array( $query ) ) {
				
		
	$total = $exibir['0'];				

} 



?>
     <h1 id ="borda2">Total a receber R$: <?php echo number_format( $total, 2, ',', '.' )?></h1>    
	

     

</body>

</html>
	  <br>
  <p>

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
