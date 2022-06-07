<?php require_once 'conexao.php';

$query = mysqli_query( $conexao, "SELECT id,grupo,subgrupo FROM categoriaproduto`" );

$query2 = mysqli_query( $conexao, "SELECT id,grupo,subgrupo FROM categoriaproduto`" );

?>

<html lang='pt-BR'>
<head>
	<meta charset='utf-8'>
	<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
	<link rel='stylesheet' href='css/bootstrap-datepicker.min.css'>
	<link rel="stylesheet" href="css/bootstrap.css">
	<!--<link type="text/css" rel="stylesheet" href="stylesheet.css"/> -->

	<script src="cadastro_produto.js" ></script>

	<style type="text/css">
		.container {
			max-width: 80vw;
			position: relative;
			margin: auto 10vw auto 10vw;
		}
	</style>

</head>
<body class="center">

	<div class="container">
		<title>Cadastro de produtos</title>
		<h1 align="center">Cadastro de produtos</h1>

	<!--<form method="POST" action="form_cadastro_produto.php">-->

	<form method="POST" action="form_cadastro_produto.php" enctype="multipart/form-data">

		<div class="form-row">
			<div class="form-group col-md-6">
				<label for="descricao">Descrição:*</label>
				<input type="text" id="descricao" name ="descricao" autocomplete="off"  maxlength="40"size="40" class="form-control" required>
			</div>

			<div class="form-group col-md-2">
				<label for="codbarras">Cód. de Barras:</label>
				<input type="text" name="codbarras" maxlength="13" autocomplete="off" size="13" class="form-control">
			</div>

			<div class="form-group col-md-1">
				<label>Unidade:</label>
				<select name="unidade" class="form-control">
					<option value="UN">UN</option>
					<option value="MM">MM</option>
					<option value="CM">CM</option>
					<option value="MT">MT</option>
					<option value="KG">KG</option>
					<option value="GR">GR</option>
					<option value="BA">BA</option>
					<option value="ML">ML</option>
					<option value="LT">LT</option>
					<option value="TL">TL</option>
				</select>
			</div>
		</div> <!-- Form-row -->

		<div class="form-row">

			<div class="form-group col-md-3">
				<label>Categoria</label>
				<select class="form-control">
					<option>Selecione...</option>

						//abrimos um contador while para que enquanto houver registros ele continua no loopin
						<?php while ( $prod = mysqli_fetch_array( $query ) ) {
				?>
						<option value="<?php echo $prod['id'] ?>"><?php echo $prod['grupo'] ?></option>
						<?php } 
?>

				</select>
			</div>

			<div class="form-group col-md-3">
				<label>Sub Categoria</label>
				<select class="form-control">
					<option>Selecione...</option>

					//abrimos um contador while para que enquanto houver registros ele continua no loopin
					<?php while ( $prod = mysqli_fetch_array( $query2 ) ) {
				?>
					<option value="<?php echo $prod['id'] ?>"><?php echo $prod['subgrupo'] ?></option>
					<?php } 
?>

				</select>
			</div>

			<div class="form-group col-md-2">
				<label for="precocompr">Preço de compra R$:</label>
				<input type="number" id="precocompr" name = "preco_compra" maxlength="7" size="7" autocomplete="off" class="form-control">
			</div>

			<div class="form-group col-md-2">
				<label for="precovenda">Preço de venda R$:* </label>
				<input type="number" id="precovenda" name = "preco_venda" maxlength="7" size="7" autocomplete="off" required class="form-control">
			</div>

        </div> <!-- Form-row #2 -->

		<div class="form-row">

			<div class="form-group col-md-2">
				<label for="quantidade">Quantidade:*</label>
				<input type="text" name="quantidade" maxlength="4" size="4" class="form-control" required>
			</div>

			<div class="form-group col-md-2">
				<label for="notacompra">Nota de compra nº:</label>
				<input type="text" id="notacompra" name = "nota_compra" maxlength="10" size="10" class="form-control">
			</div>

			<div class="form-group col-md-2">
				<label for="fornecedor">Fornecedor:</label>
				<input type="text" id="fornecedor" name = "fornecedor" maxlenght="12" size="12" class="form-control"><p><br>
			</div>

		</div> <!-- Form-row #3 -->

	<div class="form-row">
		<div class="form-group col-md-4">
			<input name="arquivo" type="file" class="form-control"/>
		</div>
</form>		
		<div class="form-group col-md-1">
			<input type="submit" class="btn btn-success btn-lg" value="Salvar">
		</div>
		<div class="form-group col-md-1">
			<input type="reset" class="btn btn-secondary btn-lg" value="Limpar">
		</div>

		<div class="form-group col-md-1">
			
				
			
		</div>
	</div>
	

	<script type="text/javascript" src="js/bootstrap.js"></script>
	
</body>

</html>