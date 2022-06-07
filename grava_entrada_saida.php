<?php session_start() ?>

<html>

	<head>

		<?php echo $sweet = $_SESSION['sweet_alert']; ?>  

</head>

<body>

<?php


include 'time_zone.php';

include 'conexao.php';

//Recebo as variáveis:

$DATA = $_POST['data'];

$ano = substr("$DATA",0,4);

$mes = substr("$DATA",5,2);

$dia = substr("$DATA",8,2);

$data = ("$ano$mes$dia");

$tipo = strtoupper($_POST['tipo']);

$descricao = strtoupper($_POST['descr']);

$valor = $_POST['valor'];

$usuario = "ROBERTO";

//	$usuario = $_POST['usuario'];



//SQL
$sql = "INSERT INTO entradasaidas VALUES";
  
$sql .= "('','$data','$tipo','$descricao','$valor','$usuario','','','','')";

            
echo "<script>
swal('INCLUIDO!')
.then((value) => {
             window.location.href='form_entrada_saidas.php';
});

</script>";                        


mysqli_query($conexao,$sql);

if(mysqli_error($conexao) == TRUE){

	echo '<div class="error-mysql">';

	echo("Erro! <br> " . mysqli_error($conexao));
    
    echo '<br>';
    
    echo $sql;

	echo '</div>';
 
	mysqli_close($conexao);

	die;
}
 
mysqli_close($conexao);

?>

</body>

</html>