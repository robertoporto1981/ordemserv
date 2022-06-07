<?php session_start() ?>
<html>

<head>
    <?php echo $sweet = $_SESSION['sweet_alert']; ?>

</head>

</html>

<?php
     require_once 'conexao.php';
    
     $descr = $_GET['descricao'];
     
//SQL

$sql = "INSERT INTO `subcategoriaproduto` (`subgrupo`) VALUES ('$descr')";

mysqli_query($conexao,$sql);

if(mysqli_error($conexao) == TRUE){
	
	echo '<div class="error-mysql">';

	echo("Mysql query Erro! <br> " . mysqli_error($conexao));
    
    echo '<br>';
    
    echo $sql;

	echo '</div>';
 
	mysqli_close($conexao);

	die;

}

mysqli_close($conexao);



echo "<script>
swal('Sub-categoria castrada com sucesso!')
.then((value) => {
             window.location.href='lista_subgrupos.php';
});

</script>";


?>