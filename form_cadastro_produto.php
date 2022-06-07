<?php session_start() ?>

<html>         
    <head>                  

        <?php echo $sweet = $_SESSION['sweet_alert']; ?>                      

        <?php echo $CSS = $_SESSION['css']; ?>                        
    </head>    
    <html>        
        <body>
<?php
     
//Recebo as variaveis do formulario:  
       
$cod = $_POST['cod'];
 
$descricao = strtoupper($_POST['descricao']); 
 
$codbarras = $_POST['codbarras'];
 
$referencia = strtoupper($_POST['ref']);
 
$marca = strtoupper($_POST['marca']);
 
$cor = strtoupper($_POST['cor']);
 
$tamanho = strtoupper($_POST['tamanho']); 
 
$unidade = strtoupper($_POST['unidade']);
 
$categoria = strtoupper($_POST['categoria']);

$subcategoria = strtoupper($_POST['subcategoria']);
    
$grupo = strtoupper($_POST['grupo']);
                                        
$quantidade = $_POST['quantidade'];
      
$preco_compra = $_POST['preco_compra'];
  
$preco_venda = $_POST['preco_venda'];
  
$nota_compra = $_POST['nota_compra'];
  
$fornecedor = strtoupper($_POST['fornecedor']);
 //$observacoes = strtoupper($_POST['observ']);
$usuario = strtoupper($_SESSION['login']); 

$imagem = $_FILES["imagem"];

$destino = 'images/produtos/' . $_FILES['arquivo']['name'];

$arquivo_tmp = $_FILES['arquivo']['tmp_name'];
 
move_uploaded_file( $arquivo_tmp, $destino);
      
//Verica se os campos obrigatorios estao vazios:      
if(empty($descricao)){
      
    echo"<script language='javascript' 
      type='text/javascript'>alert('Descricao nao pode ser vazia!');window.location.href='form_cadastro_produtos.php'</script>";
                         
//Volta para p�gina de origem:
    //header(sprintf('location: %s', $_SERVER['HTTP_REFERER']));
} 

if(empty($preco_venda)){
      
    echo"<script language='javascript' type='text/javascript'>alert('Preco venda nao pode ser vazia!');window.location.href='form_cadastro_produtos.php'</script>";
                         
//Volta para p�gina de origem:
    //header(sprintf('location: %s', $_SERVER['HTTP_REFERER']));
}
if(empty($quantidade)){
      
    echo"<script language='javascript' type='text/javascript'>alert('Quantidade nao pode ser vazia!');window.location.href='form_cadastro_produtos.php'</script>";
                         
//Volta para p�gina de origem:
    //header(sprintf('location: %s', $_SERVER['HTTP_REFERER']));
} 
 
  
//Caminho das imagens:
$caminho_imagem = $destino;

//Conexao com banco:
require_once 'conexao.php';

$sql = "INSERT INTO produto VALUES ";
  
$sql .= "('','$descricao','$grupo','$codbarras', '$quantidade','$unidade', '$preco_compra', '$preco_venda','$nota_compra', '$fornecedor','$usuario','$caminho_imagem','$marca','$categoria','$subcategoria','$tamanho','$cor','$referencia')";

mysqli_query($conexao,$sql);// or die(mysqli_error($conexal);

if(mysqli_error($conexao) == TRUE){
    
    echo '<div class="error-mysql">';
    
    echo("Erro! <br> " . mysqli_error($conexao));
    
    echo '<br>';
    
    echo $sql;
    
    echo '</div>';
 
mysqli_close($conexao);

die;

}

echo "<script>
swal('Produto cadastrado com sucesso!')
.then((value) => {
             
             window.location.href='edita_produtos.php?codigo={$codigo}';
});
</script>";
?>            
            <?php// session_destroy() ?>        
        </body>    
    </html>