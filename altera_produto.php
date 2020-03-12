<?php session_start () ?>

<?php
 
$usuario = $_SESSION['login'];
  
if(isset($_SESSION['login'])){
  
  $usuario = $_SESSION['login'];     
        
 }else{
 
 echo"<script language='javascript' type='text/javascript'>window.location.href='index.html'</script>";
      
 }  
  
  $codigo = $_SESSION['codigo'];

$descricao = $_POST['descricao'];

		
$quantidade = $_POST['quantidade'];
		
$preco_compra = $_POST['preco_compra'];

$preco_venda = $_POST['preco_venda'];

$nota_compra = $_POST['nota_compra'];

$fornecedor = $_POST['fornecedor'];

//Conexao com banco de dados:

 require_once 'conexao.php';

  
$sql = ("UPDATE produto SET descricao = '$descricao', quantidade = '$quantidade',preco_compra = '$preco_compra',   preco_venda = '$preco_venda', nota_compra = '$nota_compra',fornecedor = '$fornecedor' WHERE cod = '$codigo'");

//print_r($sql);
 
mysqli_query($conexao,$sql) or die("Erro ao tentar cadastrar registro");



//echo"<script language='javascript' type='text/javascript'>alert('Produto alterado com sucesso!');window.location.href='form_cadastro_produto.html'</script>";

echo"<script language='javascript' type='text/javascript'>alert('Produto alterado com sucesso!');window.location.href='pesquisa_produto_cod.php?codigo={$codigo}'</script>";

mysqli_close($conexao);

?>