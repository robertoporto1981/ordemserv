<?php session_start() ?>
<?php header( "Content-type: text/html; charset=utf-8" );
?>

<html>
		<head>
		
		<link type="text/css" rel="stylesheetcss" href="stylesheet.css"/>
             
        <?php echo $sweet = $_SESSION['sweet_alert'];
?>  
        
</head>

<body>  

<?php
require_once 'conexao.php';

require_once 'time_zone.php';

$usuario = $_SESSION['login'];


$CODOPER = $_GET['codoper'];

$_SESSION['codoper'] = $CODOPER;

$data = date( 'dmY' );

if ( empty( $CODOPER ) ) {
				
	echo"<script language='javascript' type='text/javascript'>alert('Digite o numero do titulo!');window.location.href='baixa_receber.html'</script>";

} 

$sql = "UPDATE contasareceber set datapag ='$data', status ='PAGO' where codoper = $CODOPER";

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

// mysqli_close($strcon);

 // Insere dados na tabela entradasaidas:
// $sql2 = "INSERT into entradasaidas VALUES('','$data','ENTRADA','$descricao','$valor','$usuario','','','')";
$sql2 = "SELECT * FROM contasareceber WHERE codoper = '$CODOPER'";

 $consulta = mysqli_query( $conexao, $sql2 );

 if ( mysqli_error( $conexao ) == true ) {
				
		echo '<div class="error-mysql">';
				
		echo( "Mysql query Erro! <br> " . mysqli_error( $conexao ) );
                 
        echo '<br>';
                
        echo $sql2;
				
		echo '</div>';
				
		mysqli_close( $conexao );
				
		die;
} 

while ( $registro = mysqli_fetch_assoc( $consulta ) ) {
				
		$codigo = $registro["codoper"];
				
				 $Data = $registro["datapag"];
				
				 $descricao = $registro["descr"];
				
				 $valor = $registro["valor"];
				
// Ajusto formato de data para Y-m-d:
				 $dia = substr( "$Data", 0, 2 );
				
				 $mes = substr( "$Data", 2, 2 );
				
				 $ano = substr( "$Data", 4, 7 );
				
				 $datapag = "$ano$mes$dia";
				
				} 


// Insiro dados na tabela entradasadias:
$sql3 = "INSERT into entradasaidas VALUES('','$datapag','ENTRADA','$descricao','$valor','$usuario','','','',$codigo)";

mysqli_query( $conexao, $sql3 );

if ( mysqli_error( $conexao ) == true ) {
				
				echo '<div class="error-mysql">';
				
				 echo( "Mysql query Erro! <br> " . mysqli_error( $conexao ) );
                 
                 echo '<br>';
                
                 echo $sql3;
				
				 echo '</div>';
				
				 mysqli_close( $conexao );
				
				 die;
				} 

mysqli_close( $conexao );


// Java script Sweet alert
echo "<script>
swal('Titulo baixado!')
.then((value) => {
             window.location.href='comprovante_baixa.php';
});

</script>";

?>

</body>

</html>


