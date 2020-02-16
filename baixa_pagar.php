
<?php session_start() ?>

<?php

require_once 'conexao.php';
require_once 'time_zone.php';

$data = date('Y-m-d');

$CODOPER = $_GET['codoper'];

if(empty($CODOPER)){

    echo"<script language='javascript' type='text/javascript'>alert('Digite o numero do titulo!');window.location.href='baixa_pagar.html'</script>";

}

    
  $sql = "UPDATE contasapagar set status ='PAGO' where codoper = $CODOPER";
  
  //Pego registro na tabela contasapagar:

  $sql2 = "SELECT * FROM contasapagar WHERE codoper = $CODOPER";

  //echo $sql2;

  $consulta = mysqli_query($conexao,$sql);
  

  $consulta2 = mysqli_query($conexao,$sql2);

  while($registro = mysqli_fetch_assoc($consulta2)){

      
    $codigo = $registro["codoper"];
      
    $descricao = $registro["descr"];

    $valor = $registro["valor"];

    $usuario = $registro["usuario"];
}


//Insiro dados na tabela entradasaidas:

$sql3 = "INSERT into entradasaidas VALUES('','$data','SAIDA','$descricao','$valor','$usuario','','','')";

//echo $sql3;

mysqli_query($conexao,$sql) or die("Erro ao tentar cadastrar registro");

mysqli_query($conexao,$sql2) or die("Erro ao tentar cadastrar registro");

mysqli_query($conexao,$sql3) or die("Erro ao tentar cadastrar registro");

mysqli_close($conexao);
  
echo"<script language='javascript' type='text/javascript'>alert('Titulo baixado!');window.location.href='contas_pagar.html'</script>";
	
?>

