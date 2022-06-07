
<?php session_start() ?>

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

$data = date( 'Y-m-d' );

$CODOPER = $_GET['codoper'];

if ( empty( $CODOPER ) ) {
				
				echo"<script language='javascript' type='text/javascript'>alert('Digite o numero do titulo!');window.location.href='baixa_pagar.html'</script>";
				
				} 


$sql = "UPDATE contasapagar set status ='PAGO' where codoper = $CODOPER";

// Pego registro na tabela contasapagar:
$sql2 = "SELECT * FROM contasapagar WHERE codoper = $CODOPER";

// echo $sql2;
$consulta = mysqli_query( $conexao, $sql );

if ( mysqli_error( $conexao ) == true ) {
				
				echo '<div class="error-mysql">';
				
				 echo( "Erro! <br> " . mysqli_error( $conexao ) );
                 
                 echo '<br>';
                
                 echo $sql;
				
				echo '</div>';
				
				mysqli_close( $conexao );
				
				die;
				
				} 


$consulta2 = mysqli_query( $conexao, $sql2 );

if ( mysqli_error( $conexao ) == true ) {
				
				echo '<div class="error-mysql">';
				
				echo( "Erro! <br> " . mysqli_error( $conexao ) );
                
                echo '<br>';
                
                 echo $sql2;
				
				echo '</div>';
				
				mysqli_close( $conexao );
				die;
				} 

while ( $registro = mysqli_fetch_assoc( $consulta2 ) ) {
				
				
				$codigo = $registro["codoper"];
				
				$descricao = $registro["descr"];
				
				 $valor = $registro["valor"];
				
				 $usuario = $registro["usuario"];
				} 


// Insiro dados na tabela entradasaidas:
$sql3 = "INSERT into entradasaidas VALUES('','$data','SAIDA','$descricao','$valor','$usuario','','','','$CODOPER')";

// echo $sql3;
mysqli_query( $conexao, $sql ) or die( "Erro ao tentar cadastrar registro" );

if ( mysqli_error( $conexao ) == true ) {
				echo '<div class="error-mysql">';
				
				echo( "Erro! <br> " . mysqli_error( $conexao ) );
                
                echo '<br>';
                
                 echo $sql3;
				
				echo '</div>';
				
				mysqli_close( $conexao );
				die;
				} 

mysqli_query( $conexao, $sql2 ) or die( "Erro ao tentar cadastrar registro" );

 if ( mysqli_error( $conexao ) == true ) {
				
				echo '<div class="error-mysql">';
				
				echo( "Erro! <br> " . mysqli_error( $conexao ) );
				
				echo '</div>';
				
				mysqli_close( $conexao );
				die;
				} 
mysqli_query( $conexao, $sql3 ) or die( "Erro ao tentar cadastrar registro" );

 if ( mysqli_error( $conexao ) == true ) {
				echo '<div class="error-mysql">';
				
				echo( "Erro! <br> " . mysqli_error( $conexao ) );
				
				echo '</div>';
				
				
				die;
				} 
mysqli_close( $conexao );

// Java script Sweet Alert
echo "<script>
swal('Titulo Baixado!')
.then((value) => {
             window.location.href='contas_pagar.html';
});

</script>";

?>

</body>

</html>