<?php session_start() ?>

<?php
// Conexao com banco de dados
require_once 'conexao.php';

// Recebe dados do formulario
$codigo = $_POST['codigo'];

$descricao = $_POST['descricao'];

$endereco = $_POST['endereco'];

$numero = $_POST['numero'];

$complemento = $_POST['complemento'];

$municipio = $_POST['municipio'];

$uf = $_POST['uf'];

$cnpj = $_POST['cnpj'];

$ie = $_POST['ie'];

$fone = $_POST['telefone'];

$email = $_POST['email'];

// Insere dados no banco de dados

echo $sql = "INSERT INTO `empresa`(`codigo`, `descricao`, `endereco`, `numero`, `complemento`, `municipio`, `uf`, `cnpj`, `ie`, `telefone`, `email`) VALUES ('$codigo','$descricao','$endereco','$numero','$complemento','$municipio','$uf','$cnpj','$ie','$fone','$email')";



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

echo"<script language='javascript' type='text/javascript'>alert('Cadastrado com sucesso!');window.location.href='menu.php'</script>";

?>













