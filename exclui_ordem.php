<?php session_start() ?>

<html>
	<head>
 <?php echo $sweet = $_SESSION['sweet_alert']; ?>  

</head>

</html>
<?php
//Session
$numeroord = $_SESSION['os']; 

//Conexao com banco de dados

require_once 'conexao.php';
	           
    
	       
$sql = ("DELETE FROM ordem WHERE numeroord = '$numeroord'");
  
//echo"<script language='javascript' type='text/javascript'>alert('OS excluido!');window.location.href='consulta_os.html'</script>";

//Java script Sweet alert

echo "<script>
swal('OS Exluida!')
.then((value) => {
             window.location.href='consulta_os.html';
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