<?php session_start() ?>

<?php $_SESSION['pagina'] = "lista_produtos.php"; ?>

<?php $_SESSION['tabela']= $tabela = "produto"; ?>

<?php include 'testa_login.php'; ?>

<?php require_once 'conexao.php'; 

$query = mysqli_query($conexao,"SELECT id,grupo FROM categoriaproduto");

$query2 = mysqli_query($conexao,"SELECT id,subgrupo FROM subcategoriaproduto");


?>     

<html lang='pt-BR'>	 	          
    <head>                          
        <meta charset="utf-8">                           
        <link rel='stylesheet' href='css/bootstrap-datepicker.min.css'>                      
        <link type ="text/css" rel="stylesheet" href="css/reset.css">                                                   
        <link type="text/css" rel="stylesheet" href="stylesheet.css"/>
        <link rel="stylesheet" href="css/bootstrap.css">      		                   
        
    <title>Lista</title> 

    </head>         
    
    <header>                               
        <h3><center></center></h3>                 
          <p>    
    </header>         
    <body>                 
        <div class="box">                         
            <div class="form-row">                                     
                <div class="form-group col-md-3">                                         
                    <form method="GET" action="pesquisa_produto.php">                                                      
                        <label>Descrição:</label>                                            
     	                                                   
                        <input type="text" name="produto" class="form-control"  maxlength="30" size="30" autocomplete="off"> 		                                                  
                        <!--<input type="text" name = "produto" size="50"-->   		                                                  
                        <!--<input type='image' SRC='images/lupa.png' width="15" height="14">-->                                   
                </div>                                     
                </form>                                    
                <div class="form-group col-md-0">                                                   
                    <form method="GET" action="pesquisa_produto.php">                                                      
                        <label>Código:                                                  
                        </label>                                                           
                        <input type="text" name="codigo" class="form-control"  maxlength="4" size="4" autocomplete="off">                                                           
                        <!--<input type='image' SRC='images/lupa.png' width="15" height="14">-->                                                 
                    </form>                                           
                </div>                                      
                <div class="form-group col-md-3">                                                           
                    <form method="GET" action="pesquisa_produto.php">                                                                        
                        <label>Ref.:                  
                        </label>                                                                   
                        <input type="text" name="referencia" class="form-control" maxlength="30" size="30" autocomplete="off">                                                                       
                    </form>                                 
                </div>                                      
                <div class="form-group col-md-2">                                                       
                    <form method="GET" action="pesquisa_produto.php">                                                                      
                        <label>Cor:                                                  
                        </label>                                                               
                        <input type="text" name="cor" class="form-control" maxlength="10" size="10" autocomplete="off">                                                           
                    </form>                                               
                </div>                                          
                <div class="form-group col-md-1">                                                   
                    <form method="GET" action="pesquisa_produto.php">                                                              
                        <label>Tamanho:                                                  
                        </label>                                                               
                        <input type="text" name="tamanho" class="form-control" maxlength="4" size="4" autocomplete="off">                                              
                    </form>                                          
                </div>                                  
            </div>                         
            <!--fim do form-row-->                          
            <div class="form-row">                                        
                <div class="form-group col-md-3">                                                       
                    <form method="GET" action="pesquisa_produto.php">                                                                     
                        <label>Marca:                                                  
                        </label>                                                                   
                        <input type="text" name="marca" class="form-control" maxlength="10" size="10" autocomplete="off">                                                           
                    </form>                                      
                </div>                                                             
                <div class="form-group col-md-2">                                                       
                    <form method="GET" action="pesquisa_produto.php">                                                               
                        <label>Cód.Barras:                                                  
                        </label>                                                               
                        <input type="text" name="codbarras" class="form-control" maxlength="13" size="13" autocomplete="off">                                                       
                    </form>                                                
                </div>                                                                                                         
                <div class="form-group col-md-2">                                                                                    
                    <form method="GET" action="pesquisa_produto.php">  	                                                                                                                                    
                        <label>Categoria                                                      
                        </label>				                                                      
                        <select name="grupo" class="form-control">					                                                              
                            <option>                                                             
                            </option>						 						                                                              
                            <?php while($prod = mysqli_fetch_array($query)) { ?>   						                                                              
                            <option value="<?php echo $prod['grupo'] ?>">                                                             
                            <?php echo $prod['grupo'] ?>                                                              
                            </option>						                                                              
                            <?php } ?>                                                                                                   
                        </select>                                                                       
                </div>                                              
                <div class="form-group col-md-3">                                                          
                    <form method="GET" action="pesquisa_produto.php">       			                                                                       
                        <label>Sub Categoria                                                      
                        </label>				                                                                       
                        <select name="subgrupo" class="form-control">				                 	                                                              
                            <option>                                                             
                            </option>				 					                                                              
                            <?php while($prod = mysqli_fetch_array($query2)) { ?>   					                                                              
                            <option value="<?php echo $prod['subgrupo'] ?>">                                                             
                            <?php echo $prod['subgrupo'] ?>                                                              
                            </option>					                                                              
                            <?php } ?>       				                                                      
                        </select>                                                                        
                </div>                                                
                <div class="form-group col-md-0">                                                              
                    <label>&nbsp;                                              
                    </label>                                                                                     
                    <input type='image' SRC='images/lupa.png' width="15" height="14" class="form-control">                                                          
                    </form>                                              
                </div>                                                               
            </div>                                     
            <!--fim do box-->
                        
             <div class="form-group row">  
            
            <div class="col-xs-2">       
            
                <form method="POST"  action="form_cadastro_produtos.php">
            
                    <input type="submit" class="btn btn-success btn-sm" value="NOVO">&nbsp; 
            
                </form>  
            
            </div>  
            
            <div class="col-xs-3">  
                <form method="POST"  action="exporta_produtos_xls.php">
                    <input type="submit" class="btn btn-secondary btn-sm" value="EXCEL">&nbsp; 
                </form>  
            </div>  
            <div class="col-xs-4">  
                <form method="POST" action="menu.php">
                    <p align ="left">
                        <input type="submit" class="btn btn-dark btn-sm" value="VOLTAR">
                </form>            
                               
                
            </div>
        </div> 
                                    
            <hr>
<?php

//Páginação:
require 'paginacao.php';

//Fim da páginação//


?>            
<?php        
//SQL
//Quantidade 999999 produto desativado, nao aparece no relatório:
$sql = "SELECT * FROM produto order by descricao asc LIMIT $inicio,$qnt";

$consulta = mysqli_query($conexao,$sql);

if(mysqli_error($conexao) == TRUE){

    echo '<div class="error-mysql">';

    echo("Mysql query Erro! <br> " . mysqli_error($conexao));
    
    echo '<br>';
    
    echo $sql;

    echo '</div>';
 
    mysqli_close($conexao);

    die;

} 

 echo '<table class="table table-bordered">
    
    <thead class="thead-dark">
    
    <tr>
    <th scope="col">#</th>
    
      <th scope="col">IMAGEM:</th>
      
      <th scope="col">CÓDIGO:</th>
      
      <th scope="col">CÓD.BARRAS:</th>
    
      <th scope="col">PRODUTO:</th>
    
      <th scope="col">REF.:</th>
    
      <th scope="col">COR:</th>
      
      <th scope="col">TAM.:</th>
      
      <th scope="col">QUANT:</th>
      
      <th scope="col">UN:</th>
      
      <th scope="col">P.CUSTO:</th>
      
      <th scope="col">P.VENDA:</th>    
          
    </tr>
    
    </thead>';

// Armazena os dados da consulta em um array associativo
while($registro = mysqli_fetch_assoc($consulta)){
    echo '<tr>';
    
    echo '<td id="campos"><a href="pesquisa_produto.php?codigo='.$registro["cod"].'"#><img src="images/edit.png"></td>';
    
if($registro['imagem'] === "images/produtos/"){
    
    $registro['imagem'] = "";

}    
    
if($registro['imagem'] == TRUE){
  
    echo '<td><img src='.$registro["imagem"].' width="80px" height="80px"></td>';
      
}else{
    
    echo '<td><img src="images/sem_imagem.png" alt="Smiley face" height="80px" width="80px" border="0" /></a></td>';
}
    echo '<td>'.$registro["cod"].'</td>';
    
    echo '<td>'.$registro["codbarras"].'</td>';
                             
    echo '<td>'.$registro["descricao"].'</td>';
    
    echo '<td>'.$registro["referencia"].'</td>';
    
    echo '<td>'.$registro["cor"].'</td>';
    
    echo '<td>'.$registro["tamanho"].'</td>';
    
    echo '<td>'.$registro["quantidade"].'</td>';
  
    echo '<td>'.$registro["unidade"].'</td>';
  
//Alteração Felipe

    //if(trim($registro["preco_compra"] != "")){
     
      //$valor = number_format($registro["preco_compra"], 2, ',', '');
    
//}
    
//echo '<td id="campos">R$'. $valor .'</td>';        
//Fim 
    echo '<td>R$'.number_format($registro["preco_compra"], 2, ',', '').'</td>';
    
    echo '<td>R$'.number_format($registro["preco_venda"], 2, ',', '').'</td>';
    
    echo '</tr>';
    
    
}
    echo '</table>';
?>    


       
    </body>
</html>
<html>