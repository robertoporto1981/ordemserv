<?php session_start ()?>

<?php 

		include 'conexao.php';

		 $sql2 = "SELECT sum(total) FROM `nota` where numeronota = 0 " ;
   
      $query = mysqli_query($conexao,$sql2);
   
      while ($exibir = mysqli_fetch_array($query)){
   
      $total = $exibir['0'];
}


?>

<!DOCTYPE html>

<html>

<head>
	
	<link type="text/css" rel="stylesheet" href="estilo.css">
	
	<title>Fechamento</title>

</head>

<body>

	<form method="POST" action="pedido_fechamento2.php">

	

	<h3 id="titulo">Pagamento:</h3> <input type="text" name="pag" size="8">

</form>
		<h3 id="titulo">Troco:</h3><input type="text" name="troco" size="8">

		<h3 id="titulo">Total:<?php echo $total .",00"; ?></h3>


</body>

</html>





 <?php

$pagamento = $_POST['pag']; 

$troco = $pagamento - $total;





?>