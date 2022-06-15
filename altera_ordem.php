<?php session_start() ?>

<?php

//Conexao com banco de dados:
require_once 'conexao.php';

$cod = $_POST['cod'];

$cliente = $_POST['cliente'];

$sql = ( "UPDATE ordem SET status = '$nome', cpf = '$cpf',cnpj = '$cnpj',cep ='$cep',rua = '$rua', numero = '$numero',complemento = '$complemento', bairro = '$bairro' ,cidade = '$cidade',uf = '$uf' ,telefone = '$telefone',celular ='$celular', email ='$email' WHERE nome = '$nome'" );


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

echo"<script language='javascript' type='text/javascript'>alert('OS Encerrada!');window.location.href='pesquisa_os.php'</script>";


?>