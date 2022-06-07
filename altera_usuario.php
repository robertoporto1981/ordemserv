<?php session_start() ?>
<html>
		<head>
		
		<link type="text/css" rel="stylesheetcss" href="stylesheet.css"/>
             
        <?php echo $sweet = $_SESSION['sweet_alert'];
?>  
        
</head>

<body> 


<?php include 'testa_login' ?>

<?php
// Session
$id = $_SESSION['id'];

// Recebo as variáveis
$nome_usuario = $_POST['nome'];

$login = $_POST['login'];


$senha = MD5( $_POST['senha'] );

// Conexao com banco de dados
require_once 'conexao.php';

// Sql
$sql = "UPDATE usuarios set login = '$login', senha = '$senha' WHERE ID = $id";

$query = mysqli_query( $conexao, $sql );

if ( mysqli_error( $conexao ) == true ) {
				
	echo '<div class="error-mysql">';
				
	echo( "Erro! <br> " . mysqli_error( $conexao ) );
				
    echo '<br>';
                
    echo $sql;
				 
    echo '</div>';
                 				
	mysqli_close( $conexao );
				
	die;
				} 

$array = mysqli_fetch_array( $sql );

// Java script Sweet alert
echo "<script>
swal('Usuario alterado com sucesso!')
.then((value) => {
             window.location.href='lista_usuarios.php';
});

</script>";


?>

</body>

</html>