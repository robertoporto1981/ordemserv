<?php session_start(); ?>

<?php

//Recebo as variaveis do formulario:  
       
 $cod = $_POST['cod'];
  
 $descricao = strtoupper($_POST['descricao']);

 $grupo = strtoupper($_POST['grupo']);
       
 $codbarras = $_POST['codbarras'];
      
 $quantidade = $_POST['quantidade'];
      
 $unidade = $_POST['unidade'];
  
 $preco_compra = $_POST['preco_compra'];
  
 $preco_venda = $_POST['preco_venda'];
  
 $nota_compra = $_POST['nota_compra'];
  
 $fornecedor = strtoupper($_POST['fornecedor']);

 //$observacoes = strtoupper($_POST['observ']);

 $usuario = strtoupper($_SESSION['login']); 

 $imagem = $_FILES["imagem"];

$destino = 'images/produtos' . $_FILES['arquivo']['name'];

$arquivo_tmp = $_FILES['arquivo']['tmp_name'];
 
 	  move_uploaded_file( $arquivo_tmp, $destino);
  
//Caminho das imagens:

$caminho_imagem = $destino;

//Conexao

require_once 'conexao.php';

  
$sql = "INSERT INTO produto VALUES ";
  
$sql .= "('','$descricao','$grupo','$codbarras', '$quantidade','$unidade', '$preco_compra', '$preco_venda','$nota_compra', '$fornecedor','$usuario','$caminho_imagem')";
  

mysqli_query($conexao,$sql) or die("Erro ao tentar cadastrar registro");
 
mysqli_close($conexao);

echo"<script language='javascript' type='text/javascript'>alert('Produto cadastrado com sucesso!');window.location.href='form_cadastro_produto.html'</script>";

?>

<?php// session_destroy() ?>

