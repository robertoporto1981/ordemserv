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
  
    <h1><center>PRODUTOS</center></h1><p>

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

    $sql = "select * from produto where referencia = '$referencia' order by descricao asc";
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

  $sql = "select * from produto where marca = '$marca' order by descricao asc";
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
    
echo '<font face="verdana"><table border style="width:100%">';
     
    echo '<tr>';

    //echo '<td id="borda">#</td>';

    echo '<td id="borda">CODIGO</td>';
  
    echo '<td id="borda">PRODUTO</td>';

    echo '<td id="borda">QUANTIDADE</td>';
      
    echo '<td id="borda">UN</td>';
  
    echo '<td id="borda">PRECO COMPRA</td>';
  
    echo '<td id="borda">PRECO VENDA</td>';
    
    echo '<td id="borda">MARGEM LUCRO R$</td>';
    
    echo '<td id="borda">MARGEM LUCRO %</td>';
  
    echo '<td id="borda">NOTA DE COMPRA</td>';
    
    echo '<td id="borda">PRECO SUGERIDO</td>';

    echo '<td id="borda">FORNECEDOR</td>';
  
     echo '</tr>';  


echo '<tr>';  
  
// Armazena os dados da consulta em um array associativo

while($registro = mysqli_fetch_assoc($consulta)){
    
    
//echo '<td id="campos"><a href="pesquisa_produto.php?produto='.$registro["descricao"].'"#><img src="https://img.icons8.com/ios-glyphs/26/000000/edit.png"></td>';
  
echo '<td id="campos">'.$registro['cod'].'</td>';


echo "<td id='campos'><input type='text' name ='descricao' maxlength='60' id='formulario' value ='".$registro['descricao']."' size='60'></td>";

//echo"<td id='campos'><input type='text' name ='grupo' maxlength='40' id='formulario' value ='".$registro['grupo']."' size='60'></td>";
   
echo "<td id='campos'><input type='text' name ='quantidade' maxlength='6' id='formulario' value ='".$registro['quantidade']."' size='6'></td>";                                  


echo "<td id='campos'><input type='text' name ='unidade' maxlength='2' id='formulario' value ='".$registro['unidade']."' size='2'></td>";

echo "<td id='campos'><input type='text' name ='preco_compra' maxlength='6' id='formulario' value ='".number_format($registro['preco_compra'], 2, ',', '')."' size='6'></td>";             
    
echo "<td id='campos'><input type='text' name ='preco_venda' maxlength='6' id='formulario' value ='".number_format($registro['preco_venda'], 2, ',', '')."' size='10'></td>";  

//Margem lucro R$ e %:
$preco_venda = $registro['preco_venda'];

$preco_compra = $registro['preco_compra'];

$margem_lucro = $preco_venda - $preco_compra;                                                                                                                                           

$margem_lucro_perce = $margem_lucro /  $preco_venda * 100;

$preco_sugerido = $preco_compra * 400 / 100;

//Prazo Pag Seguro cálculo para até 6x:

//0.17847 referente a 6x, (0.17885) fator multiplicador Pag Seguro.

$a_prazo = $preco_venda * 0.017885; 

$total_a_prazo_6x = $a_prazo * 6 + $preco_venda;

echo "<td id='campos'><input type='text' name ='margem_lucro' maxlength='6' id='formulario' value ='".number_format($margem_lucro, 2, ',', '')."' size='6'></td>";

echo "<td id='campos'><input type='text' name ='margem_lucro_percentual' maxlength='6' id='formulario' value ='".number_format($margem_lucro_perce, 2, ',', '')."%"."' size='6'></td>";
//
echo "<td id='campos'><input type='text' name ='nota_compra' maxlength='14' id='formulario' value ='".$registro['nota_compra']."' size='14'></td>";

echo "<td id='campos'><input type='text' name ='preco_sugerido' maxlength='6' id='formulario' value ='".number_format($total_a_prazo_6x, 2, ',', '')."' size='6'></td>";
 
echo "<td id='campos'><input type='text' name ='fornecedor' maxlength='15' id='formulario' value ='".$registro['fornecedor']."' size='15'></td>";	

 
//Sessions 

$_SESSION['codigo'] = $registro['cod']; 

$_SESSION['descr'] = $registro['descricao'];      
  
    
  echo '</tr>';          
 
}
 
 	echo '</table>';



  
?>



<br>

<p>

<input type="submit" id="btn-salvar" value="Alterar">

</form>


<form method="POST" action="lista_produtos.php">

<p align ="left"> <input type="submit" value="Sair">

</form>

<form method="POST" action="exclui_produto.php">

    <input type="submit" id="btn-excluir" value="Excluir">

  </form>

<form method="POST" action="etiq.php">

    <input type="submit" value="Etiqueta">

</form>    

</body> 

</html>


