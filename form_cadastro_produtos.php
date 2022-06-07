<?php session_start() ?>

<?php require_once 'conexao.php';

$query = mysqli_query($conexao,"SELECT id,grupo FROM categoriaproduto");

$query2 = mysqli_query($conexao,"SELECT id,subgrupo FROM subcategoriaproduto");

?>

<html lang='pt-BR'>
<head>
	<meta charset='utf-8'>
	
	<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
	
	<link rel='stylesheet' href='css/bootstrap-datepicker.min.css'>
	
	<link rel="stylesheet" href="css/bootstrap.css">
	<!--<link type="text/css" rel="stylesheet" href="stylesheet.css"/>-->

	<script src="cadastro_produto.js" ></script>

	<style type="text/css">
		.container {
			max-width: 80vw;
			position: relative;
			margin: auto 10vw auto 10vw;
		}
/*Deixa o asterisco com a cor vermelha */       
      .ast { }

    .ast::after {
	       content: '*';
	       color: #c00;
}        
	</style>

</head>
<body class="center">

	<div class="container">
		<title>CADASTRO DE PRODUTOS</title>
		<!--<h1 align="center">Cadastro de produtos</h1>-->

<hr>
    <div class="form-group row">
            
            <div class="col-xs-1">
            
           <form method="POST" action="menu.php">
            
            <button onclick="window.close()" class="btn btn-dark btn-sm">Sair</button>&nbsp;
      </div>            
            </form>
	
    <!--<form method="POST" action="form_cadastro_produto.php">-->

	 
        
        <div class="col-xs-2">
    
            <form method="POST" action="form_cadastro_produto.php" enctype="multipart/form-data">

                <input type="submit"  class="btn btn-success btn-sm" value="Salvar">&nbsp;
            </div>
         <div class>             
        	<input type="reset" class="btn btn-secondary btn-sm" value="Limpar">
            
            </div>  
       </div> 
       
<hr>

        <div class="form-row">
			<div class="form-group col-md-4">
				<label for="descricao" class="ast">Descrição: </label>
				<input type="text" id="descricao" name ="descricao" autocomplete="off"  maxlength="40"size="40" class="form-control">
			</div>

			<div class="form-group col-md-3">
				<label for="codbarras">Cód. de Barras:</label>
				<input type="text" name="codbarras" maxlength="13" autocomplete="off" size="13" class="form-control">
			</div>

			<div class="form-group col-md-3">
				<label for="ref">Ref.</label>
				<input type="text" id="ref" name="ref" maxlengt="14" autocomplete="off" size="14" class="form-control">

			</div>
		</div>
        
        <div class="form-row">
		                                                                   
            <div class="form-group col-md-2">
           
                 <label for="marca">Marca:</label>
           
                    <input type="text" id="marca" name="marca" maxlengt="20" autocomplete="off" size="22" class="form-control">
            
            </div>
                    
        <div class="form-group col-md-2">
        
            <label for="cor">Cor:</label>
                <input type="text" id="cor" name="cor" maxlengt="10" autocomplete="off" size="12" class="form-control">
                                            
        </div>
        <div class="form-group col-md-0">
                 <label for="tamanho">Tamanho</label>
                 <input type="text" id="tamanho" maxlength="4" size="5" class="form-control">
        
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
<!--NAO ESTA ENVIANDO AS CATEGORIAS E SUBCATEGORIAS PARA O BANCO-->
			<div class="form-group col-md-3">
				<label>Categoria</label>
				<select name="categoria" class="form-control">
					<option></option>

						//abrimos um contador while para que enquanto houver registros ele continua no loopin
						<?php while($prod = mysqli_fetch_array($query)) { ?>
						<option value="<?php echo $prod['grupo'] ?>"><?php echo $prod['grupo'] ?></option>
						<?php } ?>

				</select>
			</div>
    </div>            
    <div class="form-row">	
			<div class="form-group col-md-3">
				<label>Sub Categoria</label>
				<select name="subcategoria" class="form-control">
					<option></option>

					//abrimos um contador while para que enquanto houver registros ele continua no loopin
					<?php while($prod = mysqli_fetch_array($query2)) { ?>
					<option value="<?php echo $prod['subgrupo'] ?>"><?php echo $prod['subgrupo'] ?></option>
					<?php } ?>

				</select>
			</div>

			<div class="form-group col-md-2">
				<label for="precocompr">Preço de compra R$:</label>
				<input type="text" id="precocompr" name="preco_compra" maxlength="7" size="7" autocomplete="off" class="form-control">
			</div>

			<div class="form-group col-md-2">
				<label for="precovenda" class="ast">Preço de venda R$: </label>
				<input type="text" id="precovenda" name="preco_venda" maxlength="7" size="7" autocomplete="off" class="form-control">
			</div>                     	                                                                                             
		   <div class="form-group col-md-2">
				<label for="quantidade" class="ast">Quantidade: </label>
				<input type="text" name="quantidade" maxlength="4" size="4" class="form-control">
			</div>
    </div> 
    <!--fim do form-row-->
                                                        
        
		 <div class="form-row">
                <div class="form-group col-md-2">
                
				<label for="notacompra">Nota de compra nº:</label>
                
				<input type="text" id="notacompra" name = "nota_compra" maxlength="10" size="10" class="form-control">
                
			   </div>

		      <div class="form-group col-md-3">
              
				<label for="fornecedor">Fornecedor:</label>
                
				<input type="text" id="fornecedor" name = "fornecedor" maxlenght="12" size="12" class="form-control">

            </div>			          
	
    </div><!--fim do form-row-->
    
    <div class="form-row">	
			<input name="arquivo" type="file" class="form-control"/>
	
</form>		
<!--		<div class="form-group col-md-1">
			<input type="submit"  class="btn btn-success btn-sm" value="Salvar">
		</div>
		<div class="form-group col-md-1">
			<input type="reset" class="btn btn-secondary btn-sm" value="Limpar">
		</div>

		<div class="form-group col-md-1">

					<button onclick="window.close()" class="btn btn-dark btn-sm">Sair</button>

		</div>
	</div>-->
	

	<script type="text/javascript" src="js/bootstrap.js"></script>

</body>

</html>