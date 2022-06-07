<?php session_start()?>

<?php

// Conexao com banco:
require_once 'conexao.php';

$sql = "DELETE FROM itensnota where numeroitensnota = 0";

echo"<script language='javascript' type='text/javascript'>alert('Pedido cancelado');window.location.href='pedido_roberto.php'</script>";


// Encerra conexao com banco:
mysqli_query( $conexao, $sql );

if ( mysqli_error( $conexao ) == true ) {
				
				echo '<div class="error-mysql">';
				
				 echo( "Mysql query Erro! <br> " . mysqli_error( $conexao ) );
                 
                 echo '<br>';
                
                 echo $sql;
				
				 echo '</div>';
				
				 mysqli_close( $conexao );
				
				 die;
				} 


mysqli_close( $conexao );

?>

<?php // session_destroy()






