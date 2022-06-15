<?php
require_once 'testa_login.php';

$pesquisa = $_POST['pesquisa'];

// Conexao com bancos:
require_once 'conexao.php';

$sql = "SELECT * FROM clientes WHERE NOME = ";

$sql .= "('$pesquisa%')";

// Encerro conexao com bancos:
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

echo"<script language='javascript' type='text/javascript'>alert('Cliente cadastrado com sucesso!');window.location.href='form_cadastro_cliente.html'</script>";

?>

