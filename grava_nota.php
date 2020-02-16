<?php session_start(); ?>

<?php
           

//Recebo valores do pdv.php     
   

$codigoproduto = $_SESSION['codproduto'];

$descr = $_SESSION['descricao'];
 
$quantidade = $_POST['quanti'];
  
$preuni = $_SESSION['preco_unit'];  

$subtotall =  $quantidade * $preuni;
      
//$total = number_format($subtotall,2, ',', '.');
                                            
$data = date('dmY'); 

  
//Conexao com banco de dados

require_once 'conexao.php';

if(empty($codigoproduto)){

	echo"<script language='javascript' type='text/javascript'>alert('Digite o codigo do produto!');window.location.href='pdv.php';</script>";

}else{

//SQL  
$sql = "INSERT INTO itensnota VALUES ";
  
//$sql .= "(' ',' ','$codigoproduto','$descr','$quantidade', '$preuni', '$total','$data')";

$sql .= "(' ',' ','$codigoproduto','$descr','$quantidade', '$preuni', '$subtotall','$data','')";

}     
                        
echo"<script language='javascript' type='text/javascript'>window.location.href='pdv.php'</script>";

mysqli_query($conexao,$sql) or die("Erro ao tentar cadastrar registro");
 
mysqli_close($conexao);


?>

<?php session_destroy(); ?>




