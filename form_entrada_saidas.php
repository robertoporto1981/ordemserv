<?php session_start() ?>

<?php $usuario = $_SESSION['login']; ?>

<?php include 'testa_login.php'; ?>

<?php
// Data:

$data = date('d/m/Y');

$dia = date('d');

$mes = date('m');

$ano = date('Y');


?>

<!DOCTYPE html>

<html lang='pt-BR'>

<?php session_start ?>
<head>
     <meta charset='utf-8'>

	<title>Entrada/Saidas</title>

		  <link type="text/css" rel="stylesheet" href="stylesheet.css"> 
		  
		<!--  <link rel="stylesheet" href="css/bootstrap.css"> -->

</head>

<body>

<h1 id="titulo-programas">CONTROLE ENTRADA/SAÍDAS</h1>

<div id="entradas-saidas">

	<form method="POST" action="grava_entrada_saida.php"><br>
    	                                                 
		

			<label>Data:</label>

				<input type="date" value="<?php echo $ano ?>-<?php echo $mes ?>-<?php echo $dia; ?>" name="data"  required>
   
					<label>Tipo:</label>

						<select name="tipo">

						<option value="Entrada">Entrada</option>

					<option value="Saida">Saída</option>

</select>

<p>
<label>Descrição:</label>

<input type="text" name="descr" maxlength="60" size="60" autocomplete="off" required><br><p>

<label>Valor R$:</label>

<input type="text" name="valor" maxlength="9" size="9" autocomplete="off" required><br>
	      			                                                                        
<input type="submit" id="btn-salvar" value="Incluir">
	
</form>
   <button onclick="window.close()" id="btn">Sair</button>
</div>
   
</body>

</html>