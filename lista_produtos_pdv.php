<?php session_start() ?>

<html lang='pt-BR'>
	
	<head>
    
    <meta charset='utf-8'>

    <link type="text/css" rel="stylesheet" href="css/estilo.css"/>
    
    <link type ="text/css" rel="stylesheet" href="css/bootstrap.min.css">

		    <title>Lista</title>
     
<header >
     
       <h3 id="titulo-pedido">PRODUTOS</h3>

</header>
<html>

  <form method="POST" action="pdv.php">

  <p align ="left"><input type="submit" value="voltar">

</form>

<!--  <a title='Imprimir conteúdo' href='javascript:window.print()'><img src="images/imprimir.jpg" alt="Smiley face" height="20" width="30" border="0" /></a>-->

</body>

</html>

<html>
	 

<?php
 
$usuario = $_SESSION['login'];

// Conexão ao banco

  require_once 'conexao.php';



//$sql = "SELECT * FROM produto where usuario = '$usuario' order by cod asc";

$sql = "SELECT * FROM produto where quantidade <> 9999 order by descricao asc";

$consulta = mysqli_query($conexao,$sql);

if(mysqli_error($conexao) == TRUE){
echo '<div class="error-mysql">';

echo("Erro! <br> " . mysqli_error($conexao));

echo '<br>';
    
    echo $sql;

echo '</div>';
 
mysqli_close($conexao);
die;
}

 	    echo '<table border style="width:100%">';

      echo '<tr>';

      echo '<td id="borda"></td>';

		  echo '<td id="borda">CODIGO:</td>';

		  echo '<td id="borda">PRODUTO:</td>';

  		echo '<td id="borda">QUANTIDADE:</td>';
      
      echo '<td id="borda">UNIDADE:</td>';

  		//echo '<td id="borda">PRECO DE CUSTO:</td>';

  		echo '<td id="borda">PRECO DE VENDA:</td>';

      echo '</tr>';

// Armazena os dados da consulta em um array associativo

while($registro = mysqli_fetch_assoc($consulta)){

    echo '<tr>';

    //echo '<td id="campos"><a href="pdv.php?busca='.$registro["cod"].'"#><input type="submit" value="SELECIONAR"</td>';

    echo '<td id="campos"><a href="pdv.php?busca='.$registro["cod"].'"#><img src="images/inserir.png" width="30px" height="20"/></td>';
                     
    echo '<td id="campos">'.$registro["cod"].'</td>';    

    echo '<td id="campos">'.$registro["descricao"].'</td>';                    
         
    echo '<td id="campos">'.$registro['quantidade'].'</td>';  

    echo '<td id="campos">'.$registro["unidade"].'</td>';
  
 	  //echo '<td id="campos">R$'.$registro["preco_compra"].'</td>';

  	echo '<td id="campos">R$'.number_format($registro["preco_venda"],2,',','').'</td>';

    echo '</tr>';

}
    echo '</table>';


?>



