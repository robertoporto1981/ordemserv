<?php session_start() ?>

<?php include 'testa_login.php';
?>

<html lang='pt-BR'>
	
	<head>

    <meta charset="utf-8">

        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>                
        <link type ="text/css" rel="stylesheet" href="css/reset.css">               
        <link rel="stylesheet" href="css/bootstrap.css">        

		    <title>Lista</title>
     
<header >
     
       <h3 id="titulo-programas"><center>PRODUTOS MAIS VENDIDOS</center></h3><p>

</header>


<?php
// Conexão ao banco
require_once 'conexao.php';

// Produtos que nao mostra no SQL:
// Produto 151(Atendimento interno)
// Produto 213(Entrega POA   )
// Produto 19(Generico)
// Produto 258(diversos)

$sql = "select sum(quantidade), sum(total),codprod,descr,total,quantidade from itensnota where codprod <> 151 and codprod <> 213 and codprod <> 19 and codprod <> 258 group by codprod order by sum(quantidade) desc";


$consulta = mysqli_query( $conexao, $sql );

// Tabelas:
echo '<table class="table table-bordered">
    
    <thead class="thead-dark">
    
    <tr>      
        
      <th scope="col">CÓDIGO:</th>
    
      <th scope="col">PRODUTO:</th>
    
      <th scope="col">QUANTIDADE TOTAL VENDIDO:</th>
    
      <th scope="col">TOTAL VENDIDO:</th>    
          
    </tr>
    
    </thead>';

// Armazena os dados da consulta em um array associativo
while ( $registro = mysqli_fetch_array( $consulta ) ) {				
				
				echo '<tbody>';
				
				 echo '<tr>';
				                                
				 echo '<td id="campos">' . $registro["codprod"] . '</td>';
				
				 echo '<td id="campos-descricao">' . $registro["descr"] . '</td>';
				
				 echo '<td id="campos">' . $registro["0"] . '</td>';
				
				 echo '<td id="campos">' . "R$" . $quantidade_total_vend = number_format( $registro["1"], 2, ',', '' ) . '</td>';
				
				} 

echo '</tr>';

echo '</tbody>';


?>



<html>

  <form method="POST" action="menu.php">

  <p align ="left"><input type="submit" class="btn btn-dark" value="voltar">

</form>

  <a title='Imprimir conteúdo' href='javascript:window.print()'><img src="images/imprimir.png" alt="Smiley face" height="20" width="30" border="0" /></a>

  <hr>
</body>

</html>

<html>