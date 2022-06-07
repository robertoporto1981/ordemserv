
<?php session_start() ?>

<!DOCTYPE html>

<html lang='pt-BR'>

<?php

date_default_timezone_set("America/Sao_Paulo");

$usuario = $_SESSION['login'];     

include 'testa_login.php';

	$data = date("d/m/Y");

	$hora = date("H:i:s");
	   
//Faz conexao com banco de dados

include 'conexao.php';

//include 'testa_login.php';
  
		$cod = $_SESSION['cod'];

		$nome = $_SESSION['nome'];

		$endereco = $_SESSION['rua'];

		$numero = $_SESSION['numero'];

		$bairro =	$_SESSION['bairro'];

		$cidade = $_SESSION['cidade'];

		$uf =	$_SESSION['uf']; 

		$cep = $_SESSION['cep'];

		$cpf =	$_SESSION['cpf'];

		$telefone = $_SESSION['telefone'];

		$celular = $_SESSION['celular'];

		$email = $_SESSION['email'];

		
  
//if(isset($_SESSION['login'])){
  
  //$usuario = $_SESSION['login'];     
 
  
//}else{
 
 //echo"<script language='javascript' type='text/javascript'>window.location.href='index.html'</script>";
 
 
//}
?>

<?php

  $usuario = $_SESSION['login'];

$data=date('d/m/Y');  

$query = false;     
 	 
if(array_key_exists("busca", $_GET)){
  
    $codigo = $_GET["busca"];  
    
    
//Delaro que a variavel barras é igual a codigo 
    
    $barras = $codigo;

//Variaravel percentual
    
    $perce = 100;

//Conto a variavel:
    
    $leitura = strlen($barras);

//Pego codigo do produto e corto.(Codigo do produto ate 3 digitos)   
    
    $codigoproduto = substr($barras,0,3);

//Quantidade produto: (Tenho que arrumar)

   $quantidadeproduto = substr($barras,0);


//Produto balanca:

   $produtobalanca = substr($barras,5,2);
  
                                  
//Pego variavel precoproduto e corto:                                 
    
    $precoproduto = substr($barras,8,4);
                                    
//Substituo os zeros:
    
    $precoproduto2 = str_replace(0,0,$precoproduto);

//Calculo o valor do produto:
    
    $precoproduto3 = $precoproduto2 / $perce;

//Resultado:
    
    $preco_unit = number_format($precoproduto3, 2, '.', '');
          
//Conta quantos caracteres tem a variavel codigo:

  
//Se a variavel produtobalanca for = 000: 

if($produtobalanca == 000){
        
    $query = mysqli_query($conexao,"SELECT cod,descricao,quantidade,preco_venda FROM produto where cod = '$codigoproduto'");


}elseif($resultado == 13){
	
    $query = mysqli_query($conexao,"SELECT cod,codbarras, descricao,quantidade,preco_venda FROM produto where codbarras = '$codigo'");

	
}else {
			
		$query = mysqli_query($conexao,"SELECT cod,codbarras, descricao,quantidade,preco_venda FROM produto where codbarras = '$codigo'");

}	    
   
}


?>

<!--formulario-->  

<head>

<meta charset='utf-8'>

        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
  
  			<link type ="text/css" rel="stylesheet" href="css/reset.css">

	<link type ="text/css" rel="stylesheet" href="css/bootstrap.min.css">

<link type="text/css" rel="stylesheet" href="css/pedido.css">




<title>Pedido</title>

</head>

<html>


<body>

<div id=box1>

	<div id="dados-cliente">


	<div id="head">

		<label></label>
			
			</div>
		
		<label>STATUS:</label>

					<select>
						
						<option value="orcamento">Orçamento</option>

					<option value="pedido">Pedido</option>

				</select>

				<label id="data">Emissão:</label>

			<input type="date" name="data">

		<label>Entrega:</label>

		<input type="date" name="dataentr">

		<label>Pedido nº</label><br>

<!--  <form action="./" id="formulario" method="GET">-->
			

<label id="dados-cliente">Dados do cliente:</label>
	  
<div id="formulario">

<table border="1">


<td>CÓD:<p><input type="text" value="<?php echo $cod ?>"  name="cod" maxlength="4" size="4"></td>

<td>CLIENTE:<p><input type="text" value="<?php echo $nome ?>"  name ="cliente" maxlength="50" size="60" required></td>

		<td>&nbsp;FANTASIA:&nbsp;<p><input type="text" value="<?php echo $nomefant ?>"  name ="nomefant" maxlength="50" size="60" required></td>

			<td>&nbsp;CPF/CNPJ:&nbsp;<p><input type="text" value="<?php echo $cpf ?>" name ="cpfcnpj" maxlength="11" size="20"></td>


				<td>ENDEREÇO:<p><input type="text" value="<?php echo $endereco ?> <?php echo $numero ?>"  name="ender" maxlength="50" size="50"></td>

		</table>

    				
    				<table border="1">

						

							<td>RG:<p><input type ="text" name ="rg" maxlength="10" size = "10"></td>
  		
								<td>BAIRRO:<p><input type ="text" value ="<?php echo $bairro ?>" name = "bairro" size = "20"></td>

									<td>CIDADE:<p><input type ="text" value ="<?php echo $cidade ?>" name ="cidade" maxlength="40" size = "20"></td>

										<td>UF:<p><input type ="text" value ="<?php echo $uf ?>"  name ="uf" maxlength="2" size = "1"></td>

											<td>CEP:<p><input type ="text" value="<?php echo $cep ?>" name = "cep" maxlength ="8" size = "8"></td>
		

											<td>TELEFONE:<p><input type = "text" value ="<?php echo $telefone ?>" name = "telef" maxlength="11"  size = "11" required></td>

												<td>TELEFONE2:<p><input type = "text" value="<?php echo $celular ?>" name = "telef2" maxlength="11" size= "11" required><br></td>

														<td>E-MAIL:<p><input type ="text" value="<?php echo $email ?>" name = "email" size = "30"></td><br>

															</table>
    														
    															</div>
																	
																	</div>



																<br>	

											<div id="produtos">

						<label>Busca</label>

<form method="GET" action="pedido_roberto.php">

			<input type="text" name="busca" id="pedido-campos-busca" placeholder="Produto..." maxlength="13" size="13">

    				<a href="lista_produtos_pedido.php"><img src="images/lupa.png" alt="Smiley face" width="30" height="30" align="absbottom"></a>
  

						</form>

							</div>

 <?php 

if($query){

   while($prod = mysqli_fetch_array($query))
 
{ 
  
 		echo '<div id="descricao">';

		echo $prod['descricao'];	
        
 		echo '</div>';
  
$_SESSION['descricao'] = $prod['descricao']; 
 

 //$_SESSION['preco_venda'] = $prod['preco_venda'];
 

  $preco_unit = $prod['preco_venda'];
  
  $codigoproduto = $prod['cod'];
  
  $_SESSION['codproduto'] = $codigoproduto;

}

}



if($preco_unit == ' '){

   $preco_unit = $preco_venda =  number_format($precoproduto3, 2, '.', '');
}

?>

<!--Total -->



<table border="2">
	

		
		
	</table>	
	
</table>
	

</form>

<!--Inclui item -->


<form method="POST" id="quant"  action="grava_pedido.php">

      		<h3 id="quantidade">Qtd:</h3>

    				<div id="input-quantidade">

       						<input type ="text" id="quant" class="pedido-campos" name ="quanti" maxlength="4" size = 4 required>

       								</div>

        <!--<input type="submit" id="btn-quantidade"   value="(F2)Inclui Item">  -->

        								<div id="btn-inserir">

        										<INPUT TYPE='image' SRC='images/inserir.png' width="45" height="15">

        								</div>

        						</div>
              	
 						</form>

				</div>

<div id="valr-unit">

	<label>Vlr.unit:</label>
	
	</div>


<!--<h3 id="desconto">Desc.</h3>	
	
	<input type="text" name="desco" maxlength="3" size="3">-->

	


<?php 


if(isset($preco_unit)){
    
   		echo '<div id="valor-unit">';

   		echo "R$".$preco_unit;  

   		echo '</div>';

$_SESSION['preco_unit'] = $preco_unit;
  
}

?>

<div id="total-unitario">

 <label>Total:</label>     
      	
      	</div>
<?php 
 
 $sql4 = "select sum(total) from itensnota where numeroitensnota = '0'";

 $item = 0;
  
 $query = mysqli_query($conexao,$sql4);
   
while ($exibir = mysqli_fetch_array($query)){
  
     $subtot = $exibir['0'];
          
} 

?>

<?php 
echo '<div id="subtotal">';

if($subtot == TRUE){

    echo $subtotal = number_format($subtot, 2, ',', '.');

}else{

	    echo $subtotal = number_format($precoproduto3, 2, ',', '.');  

}                

echo '</div>';

?>


<!--Grade produtos -->

<br>

<div id="grade-produtos">

		<label>Produt(o)s:</label>
	
	</div>


<?php

    $sql = "SELECT * FROM itensnota where numeroitensnota = 0 order by codprod desc";

    $consulta = mysqli_query($conexao,$sql);
  
    //echo '<table border="1" style="overflow-y:scroll">';

    $consulta = mysqli_query($conexao,$sql);

    $resultado = mysqli_num_rows($consulta);
  
if($resultado == 0 ){
   
     

 }else{  
 	
 
     echo '<div id="lista-produtos">';  

    echo '<table style="display:block;width:auto;max-height:80px;">';  

    echo '<td>#</td>';   

    echo '<div id="coluna-item">';
     
    echo '<td>Item:</td>';

    echo '</div>';

    //echo '<td>#</td>';

    echo '<div id="coluna-codigo">';

    echo '<td>Codigo:</td>';

    echo '</div>';
    
    echo '<div id="coluna-produto">';

    echo '<td>Produto:</td>';

    echo '</div>';

    echo '<div id="coluna-quantidade">';

    echo '<td>Qtd:</td>';

    echo '</div>';
    
    //echo '<td id="tabelas-coluna">un:</td>';

    echo '<div id="coluna-unitario">';
      
    echo '<td>Vlr.unit</td>';

    echo '</div>';
      
    echo '<div id="coluna-total">';

    echo '<td>Total:</td>';

    echo '</div>';

    echo '</tr>';

	  $item = 1;

// Armazena os dados da consulta em um array associativo

while($registro = mysqli_fetch_assoc($consulta)){

    echo '<tr>';

    echo '<td id="campos"><a href="exclui_item_pedido.php?item='.$registro["codprod"].'"#><img src="images/lixeira.png" width="20px" height="20px"></td>';

    echo '<td>';
    
    echo $item ++;echo'<br>';
   	
   	echo '</td>';

	  echo '<td>'.$registro["codprod"].'</td>';
                     
    echo '<td id="tabelas-itens">'.$registro["descr"].'</td>';
  
    echo '<td id="tabelas-quantidade">'.$registro['quantidade'].'</td>';
    
    //echo '<td id="tabelas-quantidade">'.$registro['un'].'</td>';
              
    echo '<td id="tabelas-itens">R$'.$registro["preuni"].'</td>';

    echo '<td id="coluna-total">R$'.number_format($registro["total"], 2, '.', '').'</td>';

	        
    echo '</tr>';
} 


   echo '</table>';

 }	

   echo '</div>';



?>  


<hr>


<form method="POST" action="menu.php">

<!--<p align ="left"><input type="submit" id="btn-sair" value="Sair">-->

</form>
<p>
    <div id="observacoes">

      <h6><b>Observacões:</h6>

        <textarea cols="60" rows="5" name="observ">

          </textarea>  
  
          </div>

            <div id="total-pedido">

            <label>Total:<div id="total"><?php echo "R$" . $subtotal ?></div></label>

    </div>



<script type="text/javascript">
    // <![CDATA[
     function Acao(act){
       frm = document.getElementById('formulario');
       frm.action = act + '.php'; 
       frm.submit();
    // ]]>
    }
</script>

<!--<form method="POST" action="pesquisa_os.php">
<h2>Consulta OS
<input type="text" name = "os" size="2"><!--<input type="submit" value="Pesquisa">-->
<!--<input type='image' src="images/lupa.png" width ="15px" height="14">	-->

</h2>



</form>
</div>

<div id="forma-pagamento">

  <h6><b>Forma de pagamento:</b></h6>

        <select>

        <option selected="">  
          
        <option value="901" name="">901 - CREDIARIO</option>        

         <option value="900" name="">900 - AVISTA</option>

        <option value="991" name="">991 - PAG SEGURO</option>

  </select>

</div>


    <div id="cancela-pedido">

    <img src="images/cancelar.png"> Cancelar pedido[F6]

</div>

<div id="finalizar-pedido">

    <img src="images/cancelar.png"> Finalizar pedido[F8]


</div>

<?php 
$sql4 = "select sum(quantidade) from itensnota where numeroitensnota = '$ultimanota'";
  
      $query = mysql_query($sql4);
   
while ($exibir = mysql_fetch_array($query)){
   
      $totalitens = $exibir['0'];

}

?>
<div id="totalitens">
  
  <label>Qtd.de itens:<?php echo $totalitens ?></label>

</div>

<script src="js/pedido.js"></script>

</body>


</html>









