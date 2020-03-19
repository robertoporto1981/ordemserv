<?php session_start() ?>
<html lang='pt-BR'>
	
<head>
		 <title>Produtos</title>
  
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">     

    <link type="text/css" rel="stylesheet" href="stylesheet.css"/>
    
</head>
  
<body>
  
    <h1 id="titulo-programas">Altera Produto</h1><p>

<?php
 	
$usuario = $_SESSION['login'];	
    
if(isset($_SESSION['login'])){
  
  	$usuario = $_SESSION['login'];     
  
   
}else{
 
		echo"<script language='javascript' type='text/javascript'>window.location.href='index.html'</script>"; 
}
	
$produto = strtoupper($_GET['produto']);
  	
//conexao com banco

$link = mysql_connect('localhost','root','');

// Seleciona o Banco de dados através da conexão acima

$conexao = mysql_select_db('aula',$link); if($conexao){

if(empty($produto)){
    
     header("Location:lista_produtos.php");
}
    
   function substitui($produto){
   
   $what = array(',','.');

   $by = array('%','%');

   return str_replace($what, $by, $produto);
     
} 

$busca = substitui($produto);    
    
    
$sql = "select * from produto where descricao like ('%$busca%') and quantidade > 0 ORDER BY descricao asc";
  
$consulta = mysql_query($sql);

$resultado = mysql_num_rows($consulta);
  
if($resultado == 0){
  
  		echo"<script language='javascript' type='text/javascript'>alert('Produto nao encontrado!');window.location.href='form_cadastro_produto.html';</script>";
  
}
    
    echo '<font face="verdana"><table border style="width:100%">';
     
    echo '<tr>';

    echo '<td id="borda">#</td>';

    echo '<td id="borda-codigo">CODIGO</td>';
  
    echo '<td id="borda">PRODUTO</td>';

    echo '<td id="borda">QUANTIDADE</td>';
      
    echo '<td id="borda">UN</td>';
  
    echo '<td id="borda">PRECO DE COMPRA</td>';
  
    echo '<td id="borda">PRECO DE VENDA</td>';
  
    echo '<td id="borda">NOTA DE COMPRA</td>';
  
    echo '<td id="borda">FORNECEDOR</td>';
  
     echo '</tr>';  


    echo '<tr>';  
  
// Armazena os dados da consulta em um array associativo

while($registro = mysql_fetch_assoc($consulta)){
    

echo '<td id="campos"><a href="pesquisa_produto.php?produto='.$registro["descricao"].'"#><img src="https://img.icons8.com/ios-glyphs/26/000000/edit.png"></td>';
  
echo'<td id="campos">'.$registro['cod'].'</td>';

echo"<td id='campos'><input type='text' name ='descricao' maxlength='40' id='formulario' value ='".$registro['descricao']."' size='40'></td>";

//echo"<td id='campos'><input type='text' name ='grupo' maxlength='40' id='formulario' value ='".$registro['grupo']."' size='60'></td>";
   
echo"<td id='campos'><input type='text' name ='quantidade' maxlength='2' id='formulario' value ='".$registro['quantidade']."' size='10'></td>";                                  


echo"<td id='campos'><input type='text' name ='unidade' maxlength='2' id='formulario' value ='".$registro['unidade']."' size='2'></td>";

echo"<td id='campos'><input type='text' name ='preco_compra' maxlength='6' id='formulario' value ='".$registro['preco_compra']."' size='6'></td>";             
    
echo"<td id='campos'><input type='text' name ='preco_venda' maxlength='6' id='formulario' value ='".$registro['preco_venda']."' size='6'></td>";  
	
echo"<td id='campos'><input type='text' name ='nota_compra' maxlength='14' id='formulario' value ='".$registro['nota_compra']."' size='14'></td>";	
	
echo"<td id='campos'><input type='text' name ='fornecedor' maxlength='10' id='formulario' value ='".$registro['fornecedor']."' size='10'></td>";	
    

//Sessions

$_SESSION['codigo'] = $registro['cod']; 

$_SESSION['descr'] = $registro['descricao'];

$_SESSION['quantidade'] = $registro['quantidade'];

$_SESSION['unidade'] = $registro['unidade'];

$_SESSION['preco_compra'] = $registro['preco_compra'];

$_SESSION['valor'] = $registro['preco_venda'];

$_SESSION['nota_compra'] = $registro['nota_compra'];

$_SESSION['fornecedor'] = $registro['fornecedor'];

$_SESSION['imagem_produto'] = $registro['imagem'];

  
    
  echo '</tr>';          
 
}
 
 	echo '</table>';

}

  
?>

<br>

<p>

<form action="./" id="formulario" method="post">

   <input type="button" id="btn-salvar" value="Alterar" onclick="Acao('altera_produto');">
    
    <input type="button" id="btn-limpar" value="Excluir" onclick="Acao('exclui_produto');">
   
    
</form>

<script type="text/javascript">
    // <![CDATA[
     function Acao(act){
       frm = document.getElementById('formulario');
       frm.action = act + '.php'; 
       frm.submit();
    // ]]>


</script>  

<form method="POST" action="form_cadastro_produto.html">

<p align ="left"> <input type="submit" value="Sair">

</form>

</body> 

</html>


