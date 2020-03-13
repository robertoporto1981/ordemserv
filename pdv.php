<?php session_start();?>

<?php

//Sessions

$usuario = $_SESSION['login'];

$cliente = $_SESSION['cliente'];

$data=date('d/m/Y');  
 
 
//Faz conexao com banco de dados

require_once 'conexao.php';

error_reporting(E_ALL);


$query = false;     

$preco_unit = false;

$precoproduto3 = false;
 	 
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
  
                                  
//Pego variavel precoproduto e corto                                 
    
$precoproduto = substr($barras,8,4);
                                    
//Substituo os zeros:
    
$precoproduto2 = str_replace(0,0,$precoproduto);

//Calculo o valor do produto:
    
$precoproduto3 = $precoproduto2 / $perce;

//Resultado:
    
$preco_unit = number_format($precoproduto3, 2, '.', '');
          
//Conta quantos caracteres tem a variavel codigo:

  
//Se a variavel produtobalanca for = 000 

if($produtobalanca == 000){
        
    $query = mysqli_query($conexao,"SELECT cod,descricao,quantidade,preco_venda,unidade FROM produto where cod = '$codigoproduto'");


}elseif($resultado == 13){
	
    $query = mysqli_query($conexao,"SELECT cod,codbarras, descricao,quantidade,preco_venda,unidade FROM produto where codbarras = '$codigo'");

	
}else {
			
		$query = mysqli_query($conexao,"SELECT cod,codbarras, descricao,quantidade,preco_venda,unidade FROM produto where codbarras = '$codigo'");
	                          }	    
    
}
     


?> 

<!DOCTYPE>

<html lang='pt-BR'>
  
<head>
   
  <meta charset='utf-8'>

<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>

  <link rel='stylesheet' href='css/bootstrap-datepicker.min.css'>

<link type="text/css" rel="stylesheet" href="css/estilo.css"> 
   
  <title>PDV</title>
  
  </head>
  
  <body>



<div id="logo">
    
     <!--<img src="images/logo_pdv.png">-->

</div>

<div id="titulo-pedido-pdv">

      <h1 id="titulo-pedido">PDV</h1>

</div>

   
<h3 id="titulo">Produto*</h3>

<form method="GET" action="#">

    <input type="text" name="busca" class="pedido-campos-busca" placeholder="Produto..." maxlength="13" size="13">

    <a href="lista_produtos_pdv.php"><img src="images/lupa.png" alt="Smiley face" width="30" height="30" align="absbottom"></a>
  

</form>

<div id="borda-descricao">

 <?php 

//Descricao do produto:

if($query){

   while($prod = mysqli_fetch_array($query))
 
{ 
      echo '<div id="descricao">';
     
       echo  $prod['descricao'];
        
    	 echo '</div>';
  
$_SESSION['descricao'] = $prod['descricao']; 
 

 //$_SESSION['preco_venda'] = $prod['preco_venda'];
 

  $preco_unit = $prod['preco_venda'];
  
  $codigoproduto = $prod['cod'];
  
  $_SESSION['codproduto'] = $codigoproduto;

}

}


//Retorno da busca produto nao cadastrado:

if(!empty($query)){

$retorno_produto = mysqli_num_rows($query);

if($retorno_produto == 0){

    echo '<div id="descricao-nao-cadastrado">';

    echo "PRODUTO NAO CADASTRADO!";

    echo '</div>';

}

}

//Preço unitário:

if($preco_unit == 0){

   $preco_unit = $preco_venda =  number_format($precoproduto3, 2, '.', '');

  }
    


?> 

</div>

<!--Quantidade -->
    
    <form method="POST" id="quant"  action="grava_nota.php">

      <h3 id="titulo">Quantidade:</h3>

      
       <input type ="text" id="quant" class="pedido-campos" name ="quanti" maxlength="4" size = 4 value ="1">

        <input type="submit" id="btn"   value="(F2)Inclui Item">  
              	
 </form>

<!--</div>-->


<div id="canc-nota">

      <form method="POST" action="cancela_nota.php">


    <input type="submit" id="btn" value="(F6)Canc. nota">
        
     </form>

</div>                    


 <!--</div>-->

 <h3 id="titulo">Vlr. Unit:</h3>

    <div class="pedido-campos">

<?php 


if(isset($preco_unit)){
    
  		echo '<div id=valor-unit>';

   		echo "R$" . number_format($preco_unit, 2, ',', '.'); 

   		echo '</div>';

      $_SESSION['preco_unit'] = $preco_unit;
  
}

    
?>

</div>

<h3 id="titulo">Total:</h3>

    <div class="pedido-campos">        
      
<?php 
 
 $sql4 = "select sum(total) from itensnota where numeroitensnota = '0'";

 $item = 1;
  
 $query = mysqli_query($conexao,$sql4);
   
while ($exibir = mysqli_fetch_array($query)){
  
    $subtot = $exibir['0'];
          
} 

echo '<div id="subtotal">';

//echo $subtotal = number_format($subtot, 2, ',', '.');
//teste

if($subtot == TRUE){


    echo $subtotal = number_format($subtot, 2, ',', '.');

}else{
  
    echo $subtotal = number_format($precoproduto3, 2, ',', '.');  

}                

echo '</div>';


   ?>

</div>


</tr>

</table>

<div id="fix">

  <div id="fechamento">

	<form method="POST" action="pedido_fechamento.php">


		<input type="submit"  id="btn" value="(F4)Fechamento">

	</form>

  </div>

  <div id="canc-item">

	<form method="get" action="exclui_item.php">
		
	  <label for="item">Canc. Item</label>
		
	     <input type ="text" id="item" name ="item" maxlength="8" size = 8 value =" ">
	  
	</form>
  
  </div>

</div>

  
<!--<div id="lista-produtos">-->

<?php
    
$sql = "SELECT * FROM itensnota where numeroitensnota = 0 order by codprod desc";

$consulta = mysqli_query($conexao,$sql);
  
    //echo '<table border="1" style="overflow-y:scroll">';

$consulta = mysqli_query($conexao,$sql);

$resultado = mysqli_num_rows($consulta);
  
if($resultado == 0){
   
    echo '<div class="esper">';
   
   //echo $livre = "Esperando venda";
    echo $livre = "CAIXA LIVRE";
   

    echo '</div>';

 }else{  
 	
 
 	  echo '<div id="lista-produtos">';

//  echo '<table style="display:block;width:auto;max-height:auto;">';  

   	echo '<table>';  


   	echo '<td id="tabelas-coluna">#</td>'; 

    echo '<td>Item</td>';

    echo '<td>Codigo:</td>';
    
    echo '<td id="tabelas-coluna">Produto:</td>';

    echo '<td id="tabelas-coluna">Qtd:</td>';
    
    //echo '<td id="tabelas-coluna">UN:</td>';
      
    echo '<td id="tabelas-coluna">Vlr.unit</td>';
      
    echo '<td id="tabelas-coluna">Total:</td>';


    echo '</tr>';


// Armazena os dados da consulta em um array associativo

while($registro = mysqli_fetch_assoc($consulta)){

    echo '<tr>';

    echo '<td id="campos"><a href="exclui_item.php?item='.$registro["codprod"].'"#><img src="images/lixeira.png" width="15px" height="15px"></td>';

    echo '<td>';
    
    echo $item ++;echo'<br>';
    
    echo '</td>';

    echo '<td>'.$registro["codprod"].'</td>';
                     
    echo '<td id="tabelas-itens">'.$registro["descr"].'</td>';
  
    echo '<td id="tabelas-quantidade">'.$registro['quantidade'].'</td>';
    
    //echo '<td id="tabelas-quantidade">'.$registro['un'].'</td>';
              
    echo '<td id="tabelas-itens">R$'. number_format($registro["preuni"], 2, ',', '').'</td>';

    echo '<td id="tabelas-itens">R$'. number_format($registro["total"], 2, ',', '').'</td>';

        
    echo '</tr>';
} 

   echo '</table>';

   }


?>  




</div>

		</div>

			<script src="js/pdv.js"></script>

</body>


</html>

