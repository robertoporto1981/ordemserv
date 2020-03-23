<?php   session_start() ?>

<?php include 'testa_login.php'; ?>

<html lang='pt-BR'>
	
	<head>

    <meta charset="utf-8">

    

    <link type="text/css" rel="stylesheet" href="stylesheet.css"/>

		    <title>Lista</title>
     
<header >
     
       <h1 id="titulo-programas">Produtos para comprar</h1><p>

</header>


<?php
// Conexão ao banco
   require_once 'conexao.php';
   
  $usuario = $_SESSION['login'];
  
if(isset($_SESSION['login'])){
  
  $usuario = $_SESSION['login'];     
        
 }else{
 
 echo"<script language='javascript' type='text/javascript'>window.location.href='index.html'</script>";
      
}

  
$sql = "SELECT * FROM produto WHERE QUANTIDADE <= 0 and QUANTIDADE <> 999999 order by cod asc";

   

$consulta = mysqli_query($conexao,$sql);

    echo '<table border style="width:100%">';

    echo '<tr>';

	   echo '<td id="borda"></td>';

    echo '<td id="borda">CODIGO:</td>';

	  echo '<td id="borda">PRODUTO:</td>';

    echo '<td id="borda">QUANTIDADE:</td>';
       
    echo '<td id="borda">UNIDADE:</td>';

  	echo '<td id="borda">PRECO DE CUSTO:</td>';

  	echo '<td id="borda">PRECO DE VENDA:</td>';

    echo '<td id="borda">TOTAL QT. VENDIDO:</td>';

    echo '</tr>';

// Armazena os dados da consulta em um array associativo

while($registro = mysqli_fetch_assoc($consulta)){


    echo '<tr>';

    echo '<td id="campos"><a href="pesquisa_produto_cod.php?codigo='.$registro["cod"].'"#><img src="images/edit.png"></td>';

    echo '<td id="campos">'.$registro["cod"].'</td>';
                     
    echo '<td id="campos-descricao">'.$registro["descricao"].'</td>';

    echo '<td id="campos">'.$registro["quantidade"].'</td>';
  
    echo '<td id="campos">'.$registro["unidade"].'</td>';
  
    echo '<td id="campos">R$'.number_format($registro["preco_compra"],2,',','').'</td>';

  	echo '<td id="campos">R$'.number_format($registro["preco_venda"],2,',','').'</td>';

    
//Consulto a quantidade total vendido de cada produto no laço
$sql2 = "SELECT SUM(quantidade) FROM itensnota WHERE codprod ='".$registro["cod"]."'";


$consulta_quantidade_produto = mysqli_query($conexao,$sql2);


    while($quantidade_total_vendido = mysqli_fetch_array($consulta_quantidade_produto)){

       $total =  $quantidade_total_vendido['0'];

  echo '<td id="campos">'.$total.'</td>';     


}

echo '</tr>';

    
}

    echo '</table>';



?>



<html>

  <form method="POST" action="form_cadastro_produto.html">

  <p align ="left"><input type="submit" id="btn" value="voltar">

</form>

  <a title='Imprimir conteúdo' href='javascript:window.print()'><img src="images/imprimir.jpg" alt="Smiley face" height="20" width="30" border="0" /></a>

  <hr>
</body>

</html>

<html>