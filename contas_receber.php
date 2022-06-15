<?php session_start() ?>
<html>

<head>
      <?php echo $sweet = $_SESSION['sweet_alert'];
?>
</head>

<body>

<?php
require_once 'conexao.php';

require_once 'testa_login.php';

date_default_timezone_set( 'America/Sao_Paulo' );

$usuario = $_SESSION['login'];

$data = $_POST['datalanc'];

$ano = substr( "$data", 0, 4 );

$mes = substr( "$data", 5, 2 );

$dia = substr( "$data", 8, 2 );

$datalanc = ( "$ano$mes$dia" );

// $datavenc = $_POST['datavenc'];

$codcliente = $_POST['codcliente'];

$codcliente = $_SESSION['codigo_cliente'];

$nome = strtoupper($_SESSION['cliente']);

$descr = strtoupper( $_POST['descr'] );

// $valor = $_POST['valor'];
$parcelas = $_POST['parcela'];

$total = $_POST['total'];

// $status = strtoupper($_POST['status']);
$status = "RECEBER";

$usuario = strtoupper( $_SESSION['login'] );

$valorparcela = $total / $parcelas;


// Trava do status
// if (isset($_POST["status"])){
// $status = $_POST["status"];
// }else{
// echo"<script language='javascript' type='text/javascript'>alert('O campo status e obrigatorio!');window.location.href='contas_receber.html'</script>";
// }
// Regis:
$hoje = time();

$dias = 30 * 24 * 60 * 60; //mes, horas,minutos,segundos




$sql = 'INSERT INTO contasareceber VALUES ';

for( $plano = 1; $plano <= $parcelas; $plano++ ) {
				
	
	$hoje += $dias;
	
	// $dia = date("Ymd", $hoje);
	
	$dia = date( "Ymd", $hoje );
				
	
	$valorparcela;
				
	
	$sql .= "(' ','$datalanc','{$dia}','','$codcliente','$nome','$descr','{$valorparcela}','{$plano}','$total','$status','$usuario','$parcelas'),";
				
	
} 

$sql = substr( $sql, 0, -1 );

// echo"<script language='javascript' type='text/javascript'>alert('Incluido com sucesso!');window.location.href='contas_receber.html'</script>";
// Java script Sweet alert
echo "<script>
swal('Incluido com sucesso!')
.then((value) => {
             window.location.href='form_contas_receber.php';
});

</script>";

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

</body>

</html>


























































		
