<?php session_start() ?>   
<html>
		<head>
		
		<link type="text/css" rel="stylesheetcss" href="stylesheet.css"/>
             
        <?php echo $sweet = $_SESSION['sweet_alert']; ?>  
        
</head>

<body>  

<?php

//Sessions:
$codigo_cliente = $_SESSION['cod'];
$status = $_SESSION['status'];

	           
//Conexao com banco:
require_once 'conexao.php';

//Verifica se o cliente tem titulos abertos:
$sql = "SELECT * FROM CONTASARECEBER WHERE CODCLIENTE = '$codigo_cliente' AND STATUS = 'RECEBER'";

$consulta = mysqli_query( $conexao, $sql );
$contas_a_receber = mysqli_num_rows ( $consulta );

if ($contas_a_receber > 0 ) {				
				
    echo "<script>
        swal('Nao e possivel excluir! cliente com titulos em aberto!')
        .then((value) => {
         window.location.href='_altera_cliente.php?codigo=$codigo_cliente';
});

</script>";

die;    				
				 } 
                 

//Coloca o cliente na lista de desativados:
if($status != "D"){
  
$sql = ("UPDATE CLIENTES SET status = 'D' WHERE COD = '$codigo_cliente'");

}

//Se o cliente já esta na lista de desativados então exclui.
if($status == "D"){

$sql = ("DELETE FROM CLIENTES WHERE status = 'D' AND COD = '$codigo_cliente'");

}

  
//Java script Sweet alert:

echo "<script>
swal('Cliente excluido com sucesso!')
.then((value) => {
             window.location.href='lista_clientes.php';
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