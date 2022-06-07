 <?php session_start() ?>

 <?php require_once 'testa_login.php';
?>
 
 <html lang='pt-BR'>
 
 		<head>
 
 		<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>                
        <link type ="text/css" rel="stylesheet" href="css/reset.css">               
        <link rel="stylesheet" href="css/bootstrap.css">
        <link type="text/css" rel="stylesheet" href="stylesheet.css">
 
</head>

<body>

<!--<h3><center>RELATORIO VENCIDOS</center></h3>-->

<form action="./" id="formulario" method="post">

    <!--<input type="button" value="Altera" onclick="Acao('altera_contas_receber');"> -->

    <input type="button" class="btn btn-dark btn-sm" value="Voltar" onclick="Acao('menu');"><p>
    

</form> 					

<!--Aviso de cobrança -->
<form method="POST" action="aviso_cobranca.php">

	<input type="submit" class="btn-danger btn-sm" value="ENVIAR AVISO DE COBRANCA">

</form>
<br>
<?php

//Data:
$data_atual = date('Ymd');

//SESSIONS:
$usuario = $_SESSION['login'];


// Conexao
require_once 'conexao.php';

$sql = "SELECT contasareceber.codcliente,contasareceber.codoper,contasareceber.nome,contasareceber.descr,contasareceber.data,contasareceber.parcela,contasareceber.total,contasareceber.datavenc,clientes.email, contasareceber.status FROM contasareceber INNER JOIN clientes ON contasareceber.codcliente = clientes.cod WHERE contasareceber.status = 'RECEBER' 
AND contasareceber.datavenc < '$data_atual'";


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
    
      <th scope="col">DOCUMENTO:</th>
    
      <th scope="col">DATA LANCTO:</th>
    
      <th scope="col">DATA VENCTO:</th>
    
	<th scope="col">COD.CLIENTE:</th>

      <th scope="col">CLIENTE:</th>
          
      
      <th scope="col">DESCRICAO:</th>
      
      <th scope="col">VLR.PARCELA:</th>
      
      <th scope="col">TOTAL:</th>
      
      <th scope="col">PARCELA:</th>
      
      <th scope="col">STATUS:</th>    
     
     <th scope="col">EMAIL:</th>
          
    </tr>
    
    </thead>';



while ( $registro = mysqli_fetch_assoc( $consulta ) ) {
				
				echo"<form action='./' id='formulario' method='post'>";
				
				 echo'<tr>';
					
				
				 echo '<td>' . $registro["codoper"] . '</td>';
				
				 // echo '<td id="campos">'.$registro["data"].'</td>';
				$datalanc = $registro["data"];
				
				 
				
				 $datalancamento = date('d/m/Y',strtotime($datalanc));
				
				 echo '<td>' . $datalancamento . '</td>';
				
				 // echo '<td id="campos">'.$registro["datavenc"] = date('d/m/Y').'</td>';
				$datavenc = $registro["datavenc"];				 
				
				 				
				 $datavencimento = date('d/m/Y',strtotime($datavenc));
				
				 echo '<td>' . $datavencimento . '</td>';
				
				
				 // echo '<td id="campos">'.$registro["datavenc"] = date('d/m/Y').'</td>';
				
				echo '<td>' . $registro["codcliente"] . '</td>';				 

				echo '<td>' . $registro["nome"] . '</td>';
				
				 echo '<td>' . $registro["descr"] . '</td>';
				
				 echo '<td>' . "R$" . number_format( $registro["valor"], 2, ',', '.' ) . '</td>';
				
				 echo '<td>' . "R$" . number_format( $registro["total"], 2, ',', '.' ) . '</td>';
				
				 echo '<td>' . $registro['parcela'] . '</td>';
				
				if ( $registro['status'] == 'RECEBER' ) {
								
								echo '<td>' . $registro["status"] . '</td>';
								
								 } else {
								
								echo '<td>' . $registro["status"] . '</td>';
								
								 } 
				echo '<td>' . $registro["email"] . '</td>';
                
				echo'</tr>';
				
				} 

echo'</table>';


$sql2 = "SELECT sum(valor) FROM `contasareceber` where status = 'RECEBER' and datavenc < '$data_atual'";

$query = mysqli_query( $conexao, $sql2 );

if ( mysqli_error( $conexao ) == true ) {
				echo '<div class="error-mysql">';
				
				echo( "Erro! <br> " . mysqli_error( $conexao ) );
                
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
     <h1 id ="borda2">Total a receber R$: <?php echo number_format( $total, 2, ',', '.' )?></h1>


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





</body>

</html>