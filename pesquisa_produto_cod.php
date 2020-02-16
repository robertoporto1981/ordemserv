<?php session_start() ?>

<html lang='pt-BR'>
	
<head>
		 <title>Produtos</title>
  
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">     

    <link type="text/css" rel="stylesheet" href="stylesheet.css"/>
    
</head>
  
<body>
  
    <h1 id="titulo-programas">Produto</h1><p>

<form action="altera_produto.php" id="formulario" method="post">    

<?php
 	
$usuario = $_SESSION['login'];	
    
if(isset($_SESSION['login'])){
  
  	$usuario = $_SESSION['login'];     
  
   
}else{
 
		echo"<script language='javascript' type='text/javascript'>window.location.href='index.html'</script>"; 
}
	
$codigo_produto = $_GET['codigo'];
  	
//conexao com banco

require_once 'conexao.php';


//SQL   
    
$sql = "select * from produto where cod = $codigo_produto order by cod asc";

  
$consulta = mysqli_query($conexao,$sql);

$resultado = mysqli_num_rows($consulta);
  
if($resultado == 0){
  
    echo"<script language='javascript' type='text/javascript'>alert('Produto nao encontrado!');window.location.href='form_cadastro_produto.html';</script>";
  
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

//Margem lucro R$ e %
$preco_venda = $registro['preco_venda'];

$preco_compra = $registro['preco_compra'];

$margem_lucro = $preco_venda - $preco_compra;                                                                                                                                           

$margem_lucro_perce = $margem_lucro /  $preco_venda * 100;

$preco_sugerido = $preco_compra * 400 / 100;

echo "<td id='campos'><input type='text' name ='margem_lucro' maxlength='6' id='formulario' value ='".number_format($margem_lucro, 2, ',', '')."' size='6'></td>";

echo "<td id='campos'><input type='text' name ='margem_lucro_percentual' maxlength='6' id='formulario' value ='".number_format($margem_lucro_perce, 2, ',', '')."%"."' size='6'></td>";
//
echo "<td id='campos'><input type='text' name ='nota_compra' maxlength='14' id='formulario' value ='".$registro['nota_compra']."' size='14'></td>";

echo "<td id='campos'><input type='text' name ='preco_sugerido' maxlength='6' id='formulario' value ='".number_format($preco_sugerido, 2, ',', '')."' size='6'></td>";	
 

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


