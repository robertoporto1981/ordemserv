<?php session_start() ?>
<html>
    <head>
        
    <link type="text/css" rel="stylesheetcss" href="stylesheet.css"/>
             
    <?php echo $sweet = $_SESSION['sweet_alert'];
?>  
        
</head>

<body>

<?php

$OS = $_SESSION['os'];

$cliente = strtoupper( $_POST['cliente'] );

// $previsaosaida = $_POST["prevsaid"];
// Teste data saida:
$datasaida = date( 'd/m/Y' );

$dia = substr( "$datasaida", 0, 2 );

$mes = substr( "$datasaida", 3, 2 );

$ano = substr( "$datasaida", 6, 8 );

$previsaosaida = "$ano$mes$dia";

$endereco = strtoupper( $_POST["endereco"] );

// *$numero = $_POST["numero"];
$bairro = strtoupper( $_POST["bairro"] );

$cidade = strtoupper( $_POST["cidade"] );

$uf = strtoupper( $_POST["uf"] );

$cep = $_POST["cep"];

$cpfcnpj = $_POST["cpfcnpj"];

$rg = $_POST["rg"];

$telef = $_POST["telef"];

$telef2 = $_POST["telef2"];

$marca = $_POST["marca"];

$email = $_POST["email"];

$equipamento = strtoupper( $_POST["equipamento"] );

$modelo = $_POST["modelo"];

$marca = strtoupper( $_POST["marca"] );

$serial = $_POST["serial"];

$acessorios = $_POST["acessorios"];

$detalhes1 = strtoupper( $_POST["detalhes"] );

$detalhes2 = preg_replace( '/\t||\r/', '', $detalhes1 );

$defeito = strtoupper( $_POST["mensage"] );

$servexec1 = strtoupper( $_POST["servexec"] );

$servexec = preg_replace( '/\t||\r/', '', $servexec1 );

$status = $_POST["status"];

$anotacaotecnica = trim( $_POST["anotatec"] );


if ( $status == "SEM CONSERTO" OR "GARANTIA" OR "ORCAMENTO" ) {
				
	$sql = ( "UPDATE ordem SET previsaosaida = '', cliente = '$cliente',endereco = '$endereco',bairro = '$bairro',cidade = '$cidade',telef ='$telef', telef2 ='$telef2',marca ='$marca',serial = '$serial', acessorios = '$acessorios',equipamento = '$equipamento', modelo ='$modelo',detalhes = '$detalhes2', mensage = '$defeito',servexec = '$servexec',status = '$status',anotatec = '$anotacaotecnica' WHERE NumeroOrd = '$OS'" );
				
} 

if ( $status == "FINALIZADO" or "CANCELADO" or "NAO APROVADO" ) {
				
	$data = date( 'd/m/Y' );
				
	 $sql = ( "UPDATE ordem SET previsaosaida ='$previsaosaida', cliente = '$cliente',endereco = '$endereco',bairro = '$bairro',cidade = '$cidade',telef ='$telef', telef2 ='$telef2',marca ='$marca',serial = '$serial', acessorios = '$acessorios',equipamento = '$equipamento', modelo ='$modelo',detalhes = '$detalhes2', mensage = '$defeito',servexec = '$servexec',status = '$status',anotatec = '$anotacaotecnica' WHERE NumeroOrd = '$OS'" );
				
} 

// Conecta com o bando de dados:
require_once 'conexao.php';


// Encerra conexao com banco:
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


// Java script Sweet alert
echo "<script>
swal('OS Alterada!')
.then((value) => {
             window.location.href='edita_os2.php?os={$OS}';
});

</script>";

?>

</body>

</html>