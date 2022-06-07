<?php session_start() ?>

<?php 
//Session		
$id =  $_SESSION['id'];

//Recebo as variáveis
$nome_usuario = $_POST['nome'];
		
$login = $_POST['login'];

$senha = MD5($_POST['senha']);

//Conexao com banco de dados

require_once 'conexao.php';

//SQL
$sql = "DELETE FROM Usuarios WHERE ID = '$id'";


$query = mysqli_query($conexao,$sql);

if(mysqli_error($conexao) == TRUE){
	
	echo '<div class="error-mysql">';

	echo("Erro! <br> " . mysqli_error($conexao));
    
    echo '<br>';
    
    echo $sql;

	echo '</div>';
 
	mysqli_close($conexao);
	
	die;
}

$array = mysqli_fetch_array($select);

echo"<script language='javascript' type='text/javascript'>alert('Usuario excluido com sucesso!');window.location.href='lista_usuarios.php'</script>";
    

?>