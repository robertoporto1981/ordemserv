<?php session_start() ?>

<?php require_once 'testa_login.php';
?>

 <!DOCTYPE html>
 
 <html lang='pt-BR'>
 
 <head>
 		
 		<meta chartset="uft-8">
			 <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>                
        	<link type ="text/css" rel="stylesheet" href="css/reset.css">               
        	<link rel="stylesheet" href="css/bootstrap.css">
	        <link type="text/css" rel="stylesheet" href="stylesheet.css">
 
 </head>
 
 <title>Pagar</title>

 <body>

 	<h3><center>RELATORIO CONTAS A PAGAR</center></h3>

<form action="menu.php" id="formulario" method="post">

      <input type="submit" value="Voltar" id="btn">
    
</form>


<?php

 $usuario = $_SESSION['login'];

 $busca = $_POST['busca'];

if ( $busca == pago ) {
				
	echo"<script language='javascript' type='text/javascript'>;window.location.href='relatorio_pagos.php';</script>";
} 



// Conexao
require_once 'conexao.php';


if ( empty( $busca ) ){
				
	echo"<script language='javascript' type='text/javascript'>alert('Nao foi encontrado nenhum registro!');window.location.href='contas_pagar.html';</script>";
} 

$sql = "select * from contasapagar where status = ('$busca') order by codoper asc";

$consulta = mysqli_query( $conexao, $sql );

// Armazena os dados da consulta em um array associativo
echo '<table class="table table-bordered">
    
    <thead class="thead-dark">
    
    <tr>
    
      <th scope="col">#</th>
      
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


 // echo"<h1 id='borda'>Relatorio contas a pagar</h1>";
while ( $registro = mysqli_fetch_assoc( $consulta ) ) {
				
		echo"<form action='./' id='formulario' method='post'>";
				
		echo'<tr>';
				
		echo '<td><a href="baixa_pagar.php?codoper=' . $registro["codoper"] . '"#><img src="images/receber.png"></td>';
				
		echo '<td><a href="exclui_baixa_pagar.php?codoper=' . $registro["codoper"] . '"&descr=' . $registro["descr"] . '"�&valor=' . $registro["valor"] . '"#><img src="images/lixeira.png" width="20px"></td>';
				
		echo '<td>' . $registro["codoper"] . '</td>';
				
	// echo '<td id="campos">'.$registro["data"].'</td>';
		$Data = $registro["data"];						 
				
		$data = date('d/m/Y',strtotime($Data));
				
		echo '<td>' . $data . '</td>';			
				
		$Datavenc = $registro["datavenc"];				 
				
		$datavencimento = date('d/m/Y',strtotime($Datavenc));
				
		echo '<td>' . $datavencimento . '</td>';				
				
		echo '<td>' . $registro["fornecedor"] . '</td>';
				
		echo '<td>' . $registro["descr"] . '</td>';
				
		echo '<td>' . "R$" . number_format( $registro["valor"], 2, ',', '.' ) . '</td>';
				
		echo '<td>' . $registro['parcela'] . '</td>';
				
	if ( $registro['status'] == 'pagar' ) {
								
		echo '<td>' . strtoupper( $registro["status"] ) . '</td>';
								
		} else {
								
			echo '<td>' . strtoupper( $registro["status"] ) . '</td>';
								
								} 
				echo'</tr>';				
	} 

echo'</table>';

$sql2 = "SELECT sum(valor) FROM `contasapagar` where status = 'PAGAR'";

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

	// echo $exibir['0'];

} 

?>
<h1 id ="borda2">Total a pagar R$: <?php echo number_format( $total, 2, ',', '.' );
?></h1>
</body>
	</html>
  		
  			<p>
  				

<script type="text/javascript">
    // <![CDATA[
     function Acao(act){
       frm = document.getElementById('formulario');
       frm.action = act + '.php'; 
       frm.submit();
    // ]]>
}
</script>


