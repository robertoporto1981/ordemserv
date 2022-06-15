<?php session_start() ?>

<?php  

//Recebo as variaveis:
$codigo_produto = $_GET['codigo'];

//Conexão com banco de dados:
require_once 'conexao.php';

//Consulta Grupo e subgrupo:
$query = mysqli_query($conexao,"SELECT id,grupo FROM categoriaproduto");

$query2 = mysqli_query($conexao,"SELECT id,subgrupo FROM subcategoriaproduto");


//SQL:
$sql = "select * from produto where cod = '$codigo_produto'";

$consulta = mysqli_query($conexao,$sql);

while($produto = mysqli_fetch_array($consulta)){

    $cod = $produto['cod'];
        
    $descr = $produto['descricao'];

    $barras = $produto['codbarras'];
    
	$ref = $produto['referencia'];
    
	$cor = $produto['cor'];
    
	$tamanho = $produto['tamanho'];
        
    
	$marca = $produto['marca'];
        
    
	$quantidade = $produto['quantidade'];
        
    
	$grupo = $produto['categoria'];
        
    
	$subgrupo = $produto['subgrupo'];      
        
    
	$preco_compra = $produto['preco_compra'];
        
    
	$preco_venda = $produto['preco_venda'];  
        
    
	$nota_compra = $produto['nota_compra'];
        
    
	$un = $produto['unidade'];
        
    
	$fornec = $produto['fornecedor'];
        
    
	$imagem_produto = $produto['imagem'];      
        
        
    
	$_SESSION['codigo'] = $produto['cod']; 

    
	$_SESSION['descr'] = $produto['descricao'];
        
    
	$_SESSION['imagem_produto'] = $produto['imagem']; 
        

//Margem lucro R$ e %:

$margem_lucro = $preco_venda - $preco_compra;                                                                                                                                           

$margem_lucro_perce = $margem_lucro /  $preco_venda * 100;

$preco_sugerido = $preco_compra * 400 / 100;

//Prazo Pag Seguro cálculo para até 6x:

//0.17847 referente a 6x, (0.17885) fator multiplicador Pag Seguro.

$a_prazo = $preco_venda * 0.017885; 

$total_a_prazo_6x = $a_prazo * 6 + $preco_venda;            
          
        
       
 }   
    
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
	</style>

</head>
<body class="center">

	<div class="container">
		
        <title>Produto</title>
		<!--<h1 align="center">Cadastro de produtos</h1>-->           
    <br>
<hr>    
    <table border="1" width="10%" cellpadding="0">
        
        <tr>
    
           <form method="POST" action="menu.php">
            
                 <button onclick="window.close()" class="btn btn-dark btn-sm">Sair</button>
            
            </form>
    
        <form method="POST" action="exclui_produto.php">
            
                <button onclick="window.close()" class="btn btn-danger btn-sm">Excluir</button>
            
            </form>
                            
	
    <!--<form method="POST" action="form_cadastro_produto.php">-->


    <form action="altera_produto.php" id="formulario" method="post" enctype="multipart/form-data"> 

        <input type="submit"  class="btn btn-success btn-sm" value="Salvar">
    </tr>
            
</table>        	                

<hr>

        <div class="form-row">
			
            <div class="form-group col-md-1">
				<label for="codigo">Código:</label>
                
				<input type="text" id="cod" name ="codigo" value ='<?php echo $cod ?>'" disabled class="form-control">
			
            </div>
            
            <div class="form-group col-md-4">
				<label for="descricao">Descrição:*</label>
				<input type="text" id="descricao" name ="descricao" value ='<?php echo $descr ?>'" autocomplete="off"  maxlength="40"size="40" class="form-control">
			</div>

			<div class="form-group col-md-2">
				<label for="codbarras">Cód. de Barras:</label>
				<input type="text" name="codbarras" maxlength="13" value='<?php echo $barras ?>'" autocomplete="off" size="13" class="form-control">
			</div>

			<div class="form-group col-md-3">
				<label for="ref">Ref.</label>
				<input type="text" id="ref" name="ref" maxlengt="14" value='<?php echo $ref ?>'" autocomplete="off" size="14" class="form-control">

			</div>
		</div>
        
        <div class="form-row">
		                                                                   
            <div class="form-group col-md-2">
           
                 <label for="marca">Marca:</label>
           
                    <input type="text" id="marca" name="marca" maxlengt="20" value='<?php echo $marca ?>'"autocomplete="off" size="22" class="form-control">
            
            </div>
                    
        <div class="form-group col-md-2">
        
            <label for="cor">Cor:</label>
                <input type="text" id="cor" name="cor" maxlengt="10" value='<?php echo $cor ?>'" autocomplete="off" size="12" class="form-control">
                                            
        </div>
        <div class="form-group col-md-0">
                 <label for="tamanho">Tamanho</label>
                 <input type="text" id="tamanho" name="tamanho" maxlength="4" value='<?php echo $tamanho ?>'" size="5" class="form-control">
        
            </div>
        
        	<div class="form-group col-md-1">
				<label>Unidade:</label>
				<select name="unidade" class="form-control">
                
                	<option selected value="<?php echo $un ?>">						
						<?php echo $un ?>	

					</option>                        
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
<!--Categorias dos produtos -->
			<div class="form-group col-md-3">
				<label>Categoria</label>
				<select name="categoria" class="form-control">
					<option selected value="<?php echo $grupo ?>">
						
						<?php echo $grupo ?>	

					</option>  

						<!--Abrimos um contador while para que enquanto houver registros ele continua no loopin-->
						<?php while($categoria_produto = mysqli_fetch_array($query)) { ?>
						<option value="<?php echo $categoria_produto['grupo'] ?>"><?php echo $categoria_produto['grupo'] ?></option>
						<?php } ?>

				</select>
			</div>
    </div>            
    <div class="form-row">	

			<div class="form-group col-md-3">
<!--Subcategorias dos produtos -->
				<label>Sub Categoria</label>
				<select name="subcategoria" class="form-control">
					<option selected value="<?php echo $subgrupo ?>">

						<?php echo $subgrupo ?>
                            
                            </option> 

					//abrimos um contador while para que enquanto houver registros ele continua no loopin
					<?php while($subcategoria_produto = mysqli_fetch_array($query2)) { ?>
					<option value="<?php echo $subcategoria_produto['subgrupo'] ?>"><?php echo $subcategoria_produto['subgrupo'] ?></option>
					<?php } ?>

				</select>
			</div>

			<div class="form-group col-md-2">
				<label for="precocompr">Preço de compra R$:</label>
				<input type="text" id="precocompr" name="preco_compra" maxlength="7" value='<?php echo $preco_compra ?>'"size="7" autocomplete="off" class="form-control">
			</div>

			<div class="form-group col-md-2">
				<label for="precovenda">Preço de venda R$:* </label>
				<input type="text" id="precovenda" name="preco_venda" maxlength="7" value='<?php echo number_format($preco_venda, 2, ',', '') ?>'" size="7" autocomplete="off" class="form-control">
			</div>
                       
            
                                 	                                                                                             
		   <div class="form-group col-md-2">
				<label for="quantidade">Quantidade:*</label>
				<input type="text" name="quantidade" value='<?php echo $quantidade ?>'" maxlength="4" size="4" class="form-control">
			</div>
    </div> 
    <!--fim do form-row-->
                                                        
        
		 <div class="form-row">
            <div class="form-group col-md-2">
            
                <label for="precosugerido">Preço Sugerido R$: </label>
                
				<input type="text" id="precosugerido" name="preco_sugerido" maxlength="7" value='<?php echo number_format($total_a_prazo_6x, 2, ',', '') ?>'" size="7"  disabled class="form-control">
            
            </div>
            
                  <div class="form-group col-md-2">
            
                <label for="precosugerido">Margem lucro %: </label>
                
				<input type="text" id="margem_lucro" name="margem_lucro" maxlength="7" value='<?php echo number_format($margem_lucro_perce, 2, ',', '')."%" ?>'" size="7" disabled class="form-control">
            
            </div>
            
            
            
                <div class="form-group col-md-2">
                
				<label for="notacompra">Nota de compra nº:</label>
                
				<input type="text" id="notacompra" name = "nota_compra"  value='<?php echo $nota_compra ?>'" maxlength="10" size="10" autocomplete="off" class="form-control">
                
			   </div>

		      <div class="form-group col-md-3">
              
				<label for="fornecedor">Fornecedor:</label>
                
				<input type="text" id="fornec" name = "fornecedor" value='<?php echo $fornec ?>'" maxlenght="12" size="12" autocomplete="off" class="form-control">

            </div>			          
	
    </div><!--fim do form-row-->
    
<div class="form-row">
<!--Imagem do produto -->    

<table width="10%" border="blue">  
    
    <td align="center" width="25%">   
    
        <img src="<?php echo $imagem_produto ?>" alt="Smiley face" height="80px" width="80px" border="0" />
</td>

</table>       
       <!--<img src="images/sem_imagem.png" alt="Smiley face" height="80px" width="80px" border="0" />-->

</div>
  <br>
    <div class="form-row">
    	              
			<input name="arquivo" type="file" class="form-control"/>  
<hr>	
</form>	

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