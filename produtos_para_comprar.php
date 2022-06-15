<?php session_start() ?>

<?php include 'testa_login.php';
?>

<html lang='pt-BR'>
	
	<head>

    <meta charset="utf-8">

        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>                
        <link type ="text/css" rel="stylesheet" href="css/reset.css">               
        <link rel="stylesheet" href="css/bootstrap.css">
        <link type="text/css" rel="stylesheet" href="stylesheet.css">   

		    <title>Lista</title>
     
<header>
     
       <h3><center>PRODUTOS PARA COMPRAR</center></h3><p>

</header>

<html>

    <body>
        
        <form method="post" action="gera_lista.php">
<?php

// Conexão ao banco

require_once 'conexao.php';

$usuario = $_SESSION['login'];

if ( isset( $_SESSION['login'] ) ) {
				
		
  $usuario = $_SESSION['login'];
				

} else {
				
	
  echo"<script language='javascript' type='text/javascript'>window.location.href='index.html'</script>";
				
	
} 

// 9999 produtos desativados
$sql = "SELECT * FROM produto WHERE QUANTIDADE <= 0 and QUANTIDADE <> 9999 order by cod asc";


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

// Tabelas:
echo '<table class="table table-bordered">
    
    <thead class="thead-dark">
    
    <tr>          
            
      <th scope="col">#</th>
      
      <th scope="col">#</th>
    
      <th scope="col">CÓDIGO:</th>
    
      <th scope="col">PRODUTO:</th>
    
      <th scope="col">QUANTIDADE:</th>
    
      <th scope="col">UN:</th>
    
      <th scope="col">PRECO DE CUSTO:</th>
    
      <th scope="col">PRECO DE VENDA:</th>

      <th scope="col">TOTAL QT. VENDIDO:</th>
    
    </tr>
    
    </thead>';

// Armazena os dados da consulta em um array associativo
while ( $registro = mysqli_fetch_assoc( $consulta ) ) {                                        			 
                	 				 
      
  echo '<tr>';                                   
                                 
  
  echo '<td id="campos"><input type="checkbox" id="produto" name="produto[]" value='.str_replace(' ','%',$registro["descricao"]).'>';
                                                   
  
  echo '<td id="campos"><a href="pesquisa_produto.php?codigo=' . $registro["cod"] . '"#><img src="images/edit.png"></td>';
                				
	
  echo '<td id="campos">' . $registro["cod"] . '</td>';
				
	
  echo '<td id="campos-descricao">' . $registro["descricao"] . '</td>';
				
	
  echo '<td id="campos">' . $registro["quantidade"] . '</td>';       
                                                                    			                                
	
  echo '<td id="campos">' . $registro["unidade"] . '</td>';
				
	
  echo '<td id="campos">R$' . number_format( $registro["preco_compra"], 2, ',', '' ) . '</td>';
				
	
  echo '<td id="campos">R$' . number_format( $registro["preco_venda"], 2, ',', '' ) . '</td>';
				
				
// Consulto a quantidade total vendido de cada produto no laço:

				$sql2 = "SELECT SUM(quantidade) FROM itensnota WHERE codprod ='" . $registro["cod"] . "'";
				
				
				$consulta_quantidade_produto = mysqli_query( $conexao, $sql2 );
				
				
                while ( $quantidade_total_vendido = mysqli_fetch_array( $consulta_quantidade_produto ) ) {
								
								$total = $quantidade_total_vendido['0'];
								
								 echo '<td id="campos">' . $total . '</td>';
								
								
								} 
				
echo '</tr>';
				
				
				} 

echo '</table>';

echo '<input type="submit" id="btn" value="Gerar lista">';
?>



</form>
<br>
</body>

</html>

<html>

  <form method="POST" action="menu.php">

  <p align ="left"><input type="submit" id="btn" value="voltar">

</form>

  <a title='Imprimir conteúdo' href='javascript:window.print()'><img src="images/imprimir.jpg" alt="Smiley face" height="20" width="30" border="0" /></a>

  <hr>
</body>

</html>

<html>