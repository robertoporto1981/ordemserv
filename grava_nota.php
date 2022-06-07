<?php session_start() ?>

<?php

// Conexao com banco de dados:
require_once 'conexao.php';

$data = date( 'dmY' );

// Recebo as variáveis do pdv.php:
echo $usuario = $_SESSION['login'];

$codigoproduto = $_SESSION['codproduto'];

$descr = $_SESSION['descricao'];

$quantidade = $_POST['quanti'];

$estoque = $_SESSION['quantidade'];

$preuni = $_SESSION['preco_unit'];

$subtotall = $quantidade * $preuni;

// Verifica se foi digitado o código do produto:
if ( empty( $codigoproduto ) ) {
				
				echo "<script language='javascript' type='text/javascript'>alert('Digite o codigo do produto!');window.location.href='pdv.php';</script>";
				
				 } else {
				
				
				$sql = "INSERT INTO itensnota VALUES ";
				
				 // $sql .= "(' ',' ','$codigoproduto','$descr','$quantidade', '$preuni', '$total','$data')";
				$sql .= "(' ',' ','$codigoproduto','$descr','$quantidade', '$preuni', '$subtotall','$data','')";
				
				
				// Verifica se a quantidade digitada é maior que a do estoque:
				if ( $usuario != "ADMIN" and $quantidade > $estoque ) {
								
								echo"<script language='javascript' type='text/javascript'>alert('Quantidade digitada maior que o estoque!');window.location.href='pdv.php';</script>";
								
								 die;
								
								} 
				
				
				// Verifica se a quantidade do produto é negativa ou zerada:
				if ( $usuario != "ADMIN" and $estoque <= 0 ) {
								
								echo"<script language='javascript' type='text/javascript'>alert('Produto sem estoque!');window.location.href='pdv.php';</script>";
								
								 die;
								
								} 
				
				// Verifica se o produto é inativo (9999):
				if ( $usuario != "ADMIN" and $estoque == 9999 ) {
								
								echo"<script language='javascript' type='text/javascript'>alert('Produto inativo!');window.location.href='pdv.php';</script>";
								
								 die;
								
								} 
				
				// $total = number_format($subtotall,2, ',', '.');
				} 



echo"<script language='javascript' type='text/javascript'>window.location.href='pdv.php'</script>";

mysqli_query( $conexao, $sql );

if ( mysqli_error( $conexao ) == true ) {
				
				echo '<div class="error-mysql">';
				
				 echo( "Erro! <br> " . mysqli_error( $conexao ) );
				
				 echo '<br>';
				
				 echo $sql;
				
				 echo '</div>';
				
				 mysqli_close( $conexao );
				
				 die;
				} 

mysqli_close( $conexao );


?>
// Destruo a Session:
<?php unset( $_SESSION['codproduto'] );
?>




