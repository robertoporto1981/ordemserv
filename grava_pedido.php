<?php session_start() ?>

<?php
                
//Recebo valores do pedido.php
    
$status = $_SESSION['status'];
   
$codigoproduto = $_SESSION['codproduto'];

$descr = $_SESSION['descricao'];
 
$quantidade = $_POST['quanti'];

$preuni = $_SESSION['preco_unit'];
  
$subtotall =  $quantidade * $preuni;
      
$total = number_format($subtotall, 3, '.','.');
                                      
$data=date('dmY'); 


//Conexao

require_once 'conexao.php';

  
$sql = "INSERT INTO itensnota VALUES ";
  
$sql .= "(' ',' ','$codigoproduto','$descr','$quantidade', '$preuni', '$total','$data','')";
     
                        
echo"<script language='javascript' type='text/javascript'>window.location.href='pedido_roberto.php'</script>";

mysqli_query($conexao,$sql) or die("Erro ao tentar cadastrar registro");
 
mysqli_close($conexao);


?>






