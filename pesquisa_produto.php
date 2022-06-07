<?php session_start() ?>

<html lang='pt-BR'>
	
<head>
		 <title>Produtos</title>
  
                <?php echo $sweet = $_SESSION['sweet_alert']; ?>
    
                <meta http-equiv="Content-Type" content="text/html; charset=utf-8">     

                <link type="text/css" rel="stylesheet" href="stylesheet.css"/>
            
                <link rel="stylesheet" href="css/bootstrap.css">     
    
</head>
  
<body>
  
    <!--<h1><center>PRODUTOS</center></h1><p>-->
    
<br>    

<form action="altera_produto.php" id="formulario" method="post">    

<?php
 	
$usuario = $_SESSION['login'];	
    
if(isset($_SESSION['login'])){
  
  	$usuario = $_SESSION['login'];     
  
   
}else{
 
		echo"<script language='javascript' type='text/javascript'>window.location.href='index.html'</script>"; 
}
	
//Recebo as variaveis:
$codigo_produto = $_GET['codigo'];

$descricao_produto = strtoupper($_GET['produto']);

$codigo_barras = $_GET['codbarras'];

$referencia = $_GET['referencia'];

$cor = $_GET['cor'];

$tamanho = $_GET['tamanho'];

$marca = $_GET['marca'];

$grupo = $_GET['grupo'];

$subgrupo = $_GET['subgrupo'];
  	
//conexao com banco

require_once 'conexao.php';

//SQL:   

//Codigo produto:
if($codigo_produto == TRUE){
    
    $sql = "select * from produto where cod = '$codigo_produto' order by cod asc";
}
//Descricao produto:
elseif($descricao_produto == TRUE){
    
    $sql = "select * from produto where descricao like ('%$descricao_produto%') order by descricao asc";
    
}

//Codigo de barras: 
if($codigo_barras == TRUE){

    $sql = "select * from produto where codbarras = $codigo_barras";


}

//Referência:
if($referencia == TRUE){

    $sql = "select * from produto where referencia like ('%$referencia%') order by descricao asc";
}

//Cor:
if($cor == TRUE){

    $sql = "select * from produto where cor = '$cor' order by descricao asc";
  
}

//Tamanho:
if($tamanho == TRUE){

  $sql = "select * from produto where tamanho = '$tamanho' order by descricao asc";

}

//Marca:
if($marca == TRUE){

  $sql = "select * from produto where marca like ('%$marca%') order by descricao asc";
}

//Categoria (Grupo):
if($grupo == TRUE){
  
  $sql = "select * from produto where categoria = '$grupo' order by descricao asc";

}

//Sub Categoria (Subgrupo):
if($subgrupo == TRUE){

    $sql = "select * from produto where subgrupo = '$subgrupo' order by descricao asc";

}

//Categoria e Subcategoria juntos:
if($categoria == TRUE and $subcategoria == TRUE){

echo $sql = "select * from produto where categoria = '$gruposubgrupo = '$grupo' and subgrupo = '$subgrupo' order by descricao asc";

}     
  
$consulta = mysqli_query($conexao,$sql);

$resultado = mysqli_num_rows($consulta);
  
if($resultado == 0){

   echo "<script>
swal('Produto nao encontrado!')
.then((value) => {
             window.location.href='lista_produtos.php';
});

</script>";

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

// Armazena os dados da consulta em um array associativo:

while($registro = mysqli_fetch_assoc($consulta)){
    
    echo '<tr>';

    echo '<td id="campos"><a href="edita_produtos.php?codigo='.$registro["cod"].'"#><img src="images/edit.png"></td>';
    
if($registro['imagem'] <> "images/produtos/"){
  
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

<?php
//Sessions 

$_SESSION['codigo'] = $registro['cod']; 

$_SESSION['descr'] = $registro['descricao'];      
  
    
  echo '</tr>';          
 

 
 	echo '</table>';


 
  
?>



<!--<br>

<p>

<div class="form-row">

  <div class="form-group">

    <input type="submit" class="btn btn-success" value="Alterar">

</form>
  
</div>

<div class="form-group">
<form method="POST" action="lista_produtos.php">



<p align ="left"> <input type="submit" class="btn btn-dark"value="Sair">

</form>
</div>

<div class="form-group">
<form method="POST" action="exclui_produto.php">

    <input type="submit" class="btn btn-danger" value="Excluir">

  </form>
</div>

<div class="form-group">
  
  <form method="POST" action="etiq.php">

    <input type="submit" class = "btn btn-info" value="Etiqueta">

</form>    

</div>
</div><!--fim do form-row-->
</body> 

</html>


