<?php session_start(); ?>

<?php 

include 'conexao.php';

//Busca clientes:

//$cliente = $_GET['busca'] = $_SESSION['cliente'];

	$usuario = $_SESSION['login'];

	$buscacliente = $_GET['busca'];
	
	$_SESSION['cliente'] = $buscacliente;

	$cliente = $_SESSION['cliente'];

//Desconto:

	$percentual = $_SESSION['percentual'];   
	
	$desconto = $_GET['desconto'];
	
	$percentual_desconto = $_GET['perce_desc'];

	$perce = $percentual_desconto /100.00;

//$resultado_perce = $perce * $total;
	
	
//SQL:   
$sql2 = "SELECT sum(total) FROM `itensnota` where numeroitensnota = 0 " ;
   
$query = mysqli_query($conexao,$sql2);
   
while ($exibir = mysqli_fetch_array($query)){
   
    	 $tot = $exibir['0'];

    	 $total_produto = $tot - $desconto - $percentual;        	
	     
	     $total = number_format($total_produto, 2, '.', '');
	     
}


?>

 <?php        
      
    $pagamento = filter_input(INPUT_POST, 'pag');    
                      
    $troco = $pagamento - $total;
     
if($troco <= 0){

	$troco = ' ';

}else{

	$troco = $pagamento - $total;

}
           
if($pagamento == null) {


	$pago = ' ';

}else{

		$pago = $pagamento;
}

//Verifico se valor do pagamento é menor que o total
if($pagamento == true and $pagamento < $total){

	
	echo"<script language='javascript' type='text/javascript'>alert('Valor do pagamento menor que o total!');window.location.href='pedido_fechamento.php#';</script>";
}

$_SESSION['troco'] = $troco;


?>

 

<!DOCTYPE html>

<html lang='pt-BR'>

<head>

	<meta charset="utf-8">

	<link type="text/css" rel="stylesheet" href="css/estilo.css">

  		<script src="js/pdv.js"></script>
	
	<title>Fechamento</title>



</head>

<body>

	<h1 id="titulo-pedido-fechamento">FECHAMENTO</h1>

<form method="GET" action="#">

	<h1 id="titulo">Cliente:</h1>
	

<input type ="text" name="cliente" maxlength="40" size="40" value="<?php echo $buscacliente ?>"><a href="cons_clientes.php">  <img src="images/lupa.png" alt="Smiley face" width="25" height="20" align="absbottom"></a><?php echo $cliente ?>

</form>


<h1 id="titulo-pedido-total">Total</h1>

	<form method="POST" action="#">

	
	<h3 id="titulo">Pagamento:</h3> <input type="text"  id="fechamento-campos-pagamento" name="pag" size="8">

</form>
		
		
<h3 id="titulo">Pago:</h3><input type ="text"  id="fechamento-campos" name="pago" size="8" maxlength="9" value="<?php if($pago > 0){ echo "R$".number_format($pago, 2, ',', '.') ;} ?>">

<h3 id="titulo">Troco:</h3><input type="text" id="fechamento-campos" name="troco" size="8" value="<?php if($troco > 0){echo "R$".number_format($troco, 2, ',', '.');} ?>">

<h3 id="titulo">Total:</h3><input type="text"   id="total" name="total" size="12" value="<?php echo "R$". number_format($total,2,',','.') ?>">

<form method="GET" action="#">

<div id="desconto">
	
	<h3 id="titulo">Desconto:</h3>

	<input type="text"  id="fechamento-campos-pagamento" name="desconto" size="8" value='<?php if($desconto == TRUE){echo  "R$" . number_format($desconto, 2, ',', ''); } ?>'>

</form>

</div>



<form method="GET" action="#">

	<div id="percentual-desconto">
	
		<h3 id="titulo">%</h3>

		<input type="text"  id="fechamento-campos-pagamento" name="perce_desc" size="8" value='<?php if($percentual_desconto == TRUE){echo  $percentual_desconto; } ?>'>

</form>

</div>

<form method="POST" action="encerra_nota.php">
	
    <div id="portador">

	      <h3>Portador</h3>

<select name="porta">
	
    <option value="900" selected="900">900 - DINHEIRO</option>

    <option value="901">901 - CREDIARIO</option>				

	<option value="200">200 - CARTAO DE CREDITO</option>

	<option value="910">910 - MAESTRO</option>

	<option value="911">911 - AMEX</option>

	<option value="912">912 - VISA</option>

	<option value="913">913 - ELECTRON</option>

	<option value="914">914 - MASTERCARD</option>

	<option value="916">916 - HIPERCARD</option>

	<option value="991">991 - PAG SEGURO</option>

	<option value="987">987 - DEVOLUCAO</option>


</select>



</div>


	<input type="submit" id="btn-encerra" name="encerra" value="(F8)Encerra">
   
</form>

    <form method="POST" action="pdv.php">
    
    <input type="submit" id="btn-continuar" value="(F9)Continuar"> 


</body>

</html>

<?php 
        
      
  $_SESSION['totall'] = $total;
  
  $_SESSION['pago'] = $pago;

  $_SESSION['desconto'] = $desconto + $percentual;
  
  $_SESSION['perce_desc'] = $percentual_desconto;
	
  $_SESSION['percentual'] = $resultado_perce = $perce * $total;
  
   

  //$_SESSION['percentual'] = $perce * $total;
 
  
//ARRUMAR! depois que dou desconto, faço pagamento o programa soma o total da compra sem o desconto. 
  //o desconto esta se perdendo.




?>

 


