<?php session_start() ?>
<html>

<head>
      <?php echo $sweet = $_SESSION['sweet_alert'];
?>
</head>

<body>

<?php

// Conexao
require_once 'conexao.php';

require_once 'testa_login.php';

date_default_timezone_set( "America/Sao_Paulo" );


$usuario = $_SESSION['login'];

$data1 = $_POST['data'];

$datavenc1 = $_POST['datavenc'];

// data:
$ano = substr( "$data1", 0, 4 );

$mes = substr( "$data1", 5, 2 );

$dia = substr( "$data1", 8, 2 );

$data = ( "$ano$mes$dia" );

$ano = substr( "$datavenc1", 0, 4 );

$mes = substr( "$datavenc1", 5, 2 );

$dia = substr( "$datavenc1", 8, 2 );

$datavenc = ( "$ano$mes$dia" );


$fornecedor = strtoupper( $_POST['fornecedor'] );

$descr = strtoupper( $_POST['descr'] );

$valor = $_POST['valor'];

$parcela = $_POST['parcela'];

 // $status = strtoupper($_POST['status']);
$status = "pagar";

 $usuario = $_SESSION['login'];


// if (isset($_POST["status"])){
// $status = $_POST["status"];
// }else{
 // echo"<script language='javascript' type='text/javascript'>alert('O campo status e obrigatorio!');window.location.href='contas_pagar.html'</script>";
// }

$sql = "INSERT INTO contasapagar VALUES";

$sql .= "(' ','$data','$datavenc','$fornecedor','$descr','$valor','$parcela', '$status','$usuario')";


// echo"<script language='javascript' type='text/javascript'>alert('Incluido com sucesso!');window.location.href='contas_pagar.html'</script>";
// Java script Sweet alert
echo "<script>
swal('Incluido com sucesso!')
.then((value) => {
             window.location.href='contas_pagar.html';
});

</script>";


// Encerro conexao com banco:
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


?>
</body>
</html>