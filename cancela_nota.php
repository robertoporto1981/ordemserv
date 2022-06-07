<?php session_start()?>
  
<?php

// conexao
require_once 'conexao.php';

$sql = "DELETE FROM itensnota where numeroitensnota = 0";


echo"<script language='javascript' type='text/javascript'>alert('Cupom cancelado');window.location.href='pdv.php'</script>";

mysqli_query( $conexao, $sql ) or die( "Nao foi possivel cancelar a nota" );

echo '<div class="error-mysql">';

echo( "Mysql query Erro! <br> " . mysqli_error( $conexao ) );

echo '<br>';
                
echo $sql;

echo '</div>';

mysqli_close( $conexao );
die;

?>

<?php // session_destroy()






