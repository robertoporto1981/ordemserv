<?php   session_start() ?>

<?php include 'testa_login.php'; ?>

<html lang='pt-BR'>
	
	<head>

    <meta charset="utf-8">

    

    <link type="text/css" rel="stylesheet" href="stylesheet.css"/>

		    <title>Lista</title>
     
<header >
     
       <h1 id="titulo-programas">Relatorio produtos</h1><p>

</header>

<body>


<form method="GET" action="pesquisa_produto.php">

<div class="busca">

<br>

<hr>  
  <h2>Busca produtos</h2>

 		 <input type="text" name="produto" placeholder="Buscar..." size="50">

 		<!--<input type="text" name = "produto" size="50"-->

 		<input type='image' SRC='images/lupa.png' width="15" height="14">

</div>

</div>

</form>
<form method="POST" action="form_cadastro_produto.html">

  <p align ="left"><input type="submit" id="btn" value="voltar"><a title='Imprimir conteúdo' href='javascript:window.print()'><img src="images/imprimir.jpg" alt="Smiley face" height="20" width="30" border="0" /></a>

</form>

  
	 

<hr>


<?php


// Conexão ao banco
 require_once 'conexao.php';
   
  $usuario = $_SESSION['login'];
  
if(isset($_SESSION['login'])){
  
  		$usuario = $_SESSION['login'];     
        
 }else{
 
 		echo"<script language='javascript' type='text/javascript'>window.location.href='index.html'</script>";
      
}

  


//SQL
$sql = "SELECT * FROM produto order by cod asc";

$consulta = mysqli_query($conexao,$sql);

 	echo '<table border style="width:100%">';

    echo '<tr>';

	echo '<td id="borda"></td>';

	echo '<td id="borda">IMAGEM:</td>';  

    echo '<td id="borda">CODIGO:</td>';

	echo '<td id="borda">PRODUTO:</td>';

    echo '<td id="borda">QUANTIDADE:</td>';
       
    echo '<td id="borda">UNIDADE:</td>';

  	echo '<td id="borda">PRECO DE CUSTO:</td>';

  	echo '<td id="borda">PRECO DE VENDA:</td>';

    echo '</tr>';

// Armazena os dados da consulta em um array associativo

while($registro = mysqli_fetch_assoc($consulta)){

    echo '<tr>';

    echo '<td id="campos"><a href="pesquisa_produto_cod.php?codigo='.$registro["cod"].'"#><img src="images/edit.png"></td>';
    

if($registro['imagem'] == TRUE){
  
    echo '<td id="campos"><img src='.$registro["imagem"].' width="30%" height="30%"></td>';  


}else{

    echo '<td id="campos"><img src="images/sem_imagem.png" alt="Smiley face" height="50%" width="50%" border="0" /></a></td>';

}
    echo '<td id="campos">'.$registro["cod"].'</td>';
                     
    echo '<td id="campos-descricao">'.$registro["descricao"].'</td>';

    echo '<td id="campos">'.$registro["quantidade"].'</td>';
  
    echo '<td id="campos">'.$registro["unidade"].'</td>';
  
    //Alteração Felipe
    if(trim($registro["preco_compra"] != "")){
     
      $valor = number_format($registro["preco_compra"], 2, ',', '');
    
    }
    
    echo '<td id="campos">R$'. $valor .'</td>';

    
    echo '<td id="campos">R$'.number_format($registro["preco_venda"], 2, ',', '').'</td>';

    echo '</tr>';
    

}

    echo '</table>';



?>


  

</body>

</html>

<html>