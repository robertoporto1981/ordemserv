<?php session_start() ?>

<html>
		<head>
		
		<link type="text/css" rel="stylesheetcss" href="stylesheet.css"/>
             
        <?php echo $sweet = $_SESSION['sweet_alert']; ?>  
        
</head>

<body>  

<?php
require_once 'conexao.php';

require_once 'time_zone.php';

$usuario = $_SESSION['login'];	 

$CODOPER = $_GET['codoper'];

$_SESSION['codoper'] = $CODOPER;


//SQL  
$sql = "DELETE contasareceber, entradasaidas FROM contasareceber LEFT JOIN entradasaidas ON contasareceber.codoper = entradasaidas.documento WHERE contasareceber.codoper = '$CODOPER'";


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

//Arrumar retorno da exclusao, colocar mensagem 

//Java script Sweet alert

echo "<script>
swal('Titulo excluido!')
.then((value) => {
             window.location.href='consulta_receber.php';
});

</script>";

 
mysqli_close($conexao);


  
?>   

</body>

</html>