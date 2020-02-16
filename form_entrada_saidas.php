<?php session_start() ?>

<?php $usuario = $_SESSION['login']; ?>

<?php include 'testa_login.php'; ?>

<!DOCTYPE html>

<html lang='pt-BR'>

<head>
     <meta charset='utf-8'>

	<title>Entrada/Saidas</title>

  		<link type="text/css" rel="stylesheet" href="stylesheet.css"> 

</head>

<body>

<h1 id="titulo-programas">CONTROLE ENTRADA/SAÍDAS</h1>

<div id="entradas-saidas">

	<form method="POST" action="grava_entrada_saida.php"><br>
    	                                                 
		

			<label>Data:</label>

				<input type="date" name="data" required>
   
					<label>Tipo:</label>

						<select name="tipo">

						<option value="Entrada">Entrada</option>

					<option value="Saida">Saída</option>

</select>

<p>
<label>Descrição:</label>

<input type="text" name="descr" maxlength="60" size="60" required><br><p>

<label>Valor R$:</label>

<input type="text" name="valor" maxlength="9" size="9" required><br>
	      			                                                                        
<input type="submit" id="btn-salvar" value="Registrar">
	
</form>

<form method="POST" action="menu.php">

	  	 <input type="submit" value="sair">

</form>

</div>

</body>

</html>