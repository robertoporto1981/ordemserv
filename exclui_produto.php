<?php session_start() ?>
<html>    
    <head>              
        <?php echo $sweet = $_SESSION['sweet_alert']; ?>                         
    </head>
    <body>   
    </body>
</html>
<?php
 
include 'testa_login.php';
$usuario = $_SESSION['login'];
                                         
$codigo = $_SESSION['codigo'];

//Imagem produto:
$imagem_produto = $_SESSION['imagem_produto'];
//Conexao com banco de dados
require_once 'conexao.php';
                                                                                
//SQL
	       
$sql = ("DELETE FROM produto WHERE cod = '$codigo'");
unlink($imagem_produto);
  	
mysqli_query($conexao,$sql);
if(mysqli_error($conexao) == TRUE){
echo '<div class="error-mysql">';
echo("Erro! <br> " . mysqli_error($conexao));
echo '</div>';
 
mysqli_close($conexao);
die;
}
mysqli_close($conexao);
//Java script Sweet alert
echo "<script>
swal('Produto excluido!')
.then((value) => {
             window.location.href='menu.php';
});
</script>";
//echo"<script language='javascript' type='text/javascript'>alert('Produto excluido!');window.location.href='lista_produtos.php'</script>";
?> 