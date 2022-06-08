<?php session_start() ?>

<?php

$bdServidor = 'localhost';

$bdUsuario = "root";

$bdSenha = "";

// Session numero do banco:
$_SESSION['banco'] = $bdBanco = "db01";

// Conecta com o banco de dados:
$conexao = mysqli_connect( $bdServidor, $bdUsuario, $bdSenha, $bdBanco ); //or die(mysqli_error());


if ( mysqli_connect_errno() ) {
				
				echo "Falha para conectar no MySQL: " . mysqli_connect_error();
				
				die;
				
} 

?>