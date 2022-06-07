<?php session_start() ?>

<html>
	
    <head>	             

<?php echo $sweet = $_SESSION['sweet_alert']; ?>
 
        
</head>

<body> 

<?php

// Conexao com banco de dados:
require_once 'conexao.php';

// Session
$usuario = $_SESSION['login'];

if ( isset( $_SESSION['login'] ) ) {
				
	$usuario = $_SESSION['login'];
				
} else {
				
		echo"<script language='javascript' type='text/javascript'>window.location.href='index.html'</script>";
				
} 

$codigo = $_SESSION['codigo'];

$descricao = $_POST['descricao'];

$ref = $_POST['ref'];

$barras = $_POST['codbarras'];

$marca = $_POST['marca'];

$cor = $_POST['cor'];

$tamanho = $_POST['tamanho'];

$quantidade = $_POST['quantidade'];

$categoria = $_POST['categoria'];

$subgrupo = $_POST['subcategoria'];

$un = $_POST['unidade'];

$preco_compra = $_POST['preco_compra'];

$preco_venda = $_POST['preco_venda'];

$nota_compra = $_POST['nota_compra'];

$fornecedor = $_POST['fornecedor'];

$imagem_produto = $_SESSION['imagem_produto']; 

$imagem = $_FILES['arquivo'];

$destino = 'images/produtos/'. $_FILES['arquivo']['name'];


$arquivo_tmp = $_FILES['arquivo']['tmp_name'];
 
move_uploaded_file($arquivo_tmp, $destino);   

//Teste:
if($destino === "images/produtos/"){

    $caminho_imagem = $imagem_produto;                         

}else{
    
    $caminho_imagem = $destino;

}

// SQL:
    
$sql = ( "UPDATE produto SET descricao = '$descricao',referencia = '$ref',marca = '$marca',cor ='$cor', tamanho ='$tamanho',codbarras ='$barras',quantidade = '$quantidade',unidade = '$un', categoria = '$categoria', subgrupo = '$subgrupo', preco_compra = '$preco_compra',   preco_venda = '$preco_venda', nota_compra = '$nota_compra',fornecedor = '$fornecedor',imagem ='$caminho_imagem' WHERE cod = '$codigo'" );

echo "<br>";

//print_r($sql);

mysqli_query( $conexao, $sql );

if ( mysqli_error( $conexao ) == true ) {
				
		echo '<div class="error-mysql">';
				
		echo( "Erro! <br> " . mysqli_error( $conexao ) );
                 
        echo '<br>';
                                                  
        echo $sql;
				
		echo '</div>';
				
		mysqli_close( $conexao );
				
	 die;
				
} 



// echo"<script language='javascript' type='text/javascript'>alert('Produto alterado com sucesso!');window.location.href='form_cadastro_produto.html'</script>";
// echo"<script language='javascript' type='text/javascript'>alert('Produto alterado com sucesso!');window.location.href='pesquisa_produto_cod.php?codigo={$codigo}'</script>";
// Java script Sweet alert
echo "<script>
swal('Produto alterado com sucesso!')
.then((value) => {
             window.location.href='edita_produtos.php?codigo={$codigo}';
});

</script>";

unset($_SESSION['imagem_produto']); 

mysqli_close( $conexao );

?>

</body>

</html>