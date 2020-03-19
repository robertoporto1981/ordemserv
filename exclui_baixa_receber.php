<?php session_start(); ?>

<?php
require_once 'conexao.php';

require_once 'time_zone.php';

$usuario = $_SESSION['login'];	 

$CODOPER = $_GET['codoper'];

$_SESSION['codoper'] = $CODOPER;


//SQL  
$sql = "DELETE FROM contasareceber WHERE codoper = $CODOPER";


mysqli_query($conexao,$sql) or die("Erro ao tentar cadastrar registro");

//Arrumar retorno da exclusao, colocar mensagem 

echo"<script language='javascript' type='text/javascript'>alert('Titulo Excluido!');window.location.href='contas_pagar.html'</script>";
 
mysqli_close($conexao);


  
?>   
