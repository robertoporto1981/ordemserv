<?php session_start(); ?>


<?php include 'testa_login' ?>

<?php 
//Session		
$id =  $_SESSION['id'];

//Recebo as variáveis
$nome_usuario = $_POST['nome'];
		
$login = $_POST['login'];


$senha = MD5($_POST['senha']);

//Conexao com banco de dados

require_once 'conexao.php';

//Sql
$sql = "UPDATE usuarios set login = '$login', senha = '$senha' WHERE ID = $id";

$query = mysqli_query($conexao,$sql);

$array = mysqli_fetch_array($sql);

echo"<script language='javascript' type='text/javascript'>alert('Usuario alterado com sucesso!');window.location.href='lista_usuarios.php'</script>";

    
?>