'<?php session_start(); ?>

<html lang='pt-BR'>

<head>

<link rel='stylesheet' href='css/bootstrap-datepicker.min.css'>

<link type ="text/css" rel="stylesheet" href="css/reset.css">	  			
<link type="text/css" rel="stylesheet" href="stylesheet.css"> 
	<link rel="stylesheet" href="css/bootstrap.css"> 
	
</head>
		    
<title>Clientes</title>

<body>
<div id="container">

<h1 id="titulo-programas">Clientes</h1>  

<!--Inicio -->
<div class="form-group row">
  <div class="col-xs-2">    

  <h4>Codigo:</h4>

<form method="GET" action="_altera_cliente.php">	

 <input type="text" name="codigo" placeholder="Buscar..." maxlength="8" size="8" autocomplete="off">
	   <INPUT TYPE='image' SRC='images/lupa.png' width="15" height="14">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;


</form>
  </div>

	<div class="col-xs-3">
  
  <h4>Nome:</h4>

<form method="GET" action="_altera_cliente.php">
<!--<input type="text" name = "busca" size="50"><!--<input type="submit" value="Pesquisa">-->

	 <input type="text" name="nome" placeholder="Buscar..." size="30" autocomplete="off">
   <INPUT TYPE='image' SRC='images/lupa.png' width="15" height="14">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;


</form>

  </div>
  <div class="col-xs-4">
  <form method ="GET" action="_altera_cliente.php">

<h4>Fantasia:</h4>

    <input type="text" name="nomefant" placeholder="buscar" size="60" autocomplete="off">

    <INPUT TYPE='image' SRC='images/lupa.png' width="15" height="14">

</form> 


  </div>
</div> 


  <div class="form-group row">
  <div class="col-xs-2">
  <form method="GET" action="_altera_cliente.php">

<h4>CNPJ:</h4>

	<input type="text" name="cnpj" placeholder="buscar" size="13" autocomplete="off">

		<INPUT TYPE='image' SRC='images/lupa.png' width="15" height="14" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

</form>

  </div>
  <div class="col-xs-3">
    
	<form method="GET" action="_altera_cliente.php">

<h4>CPF:</h4>

	<input type="text" name="cpf" placeholder="buscar" size="13" autocomplete="off">

		<INPUT TYPE='image' SRC='images/lupa.png' width="15" height="14">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

</form> 



  </div>
  <div class="col-xs-4">
     
<form method="GET" action="_altera_cliente.php">

<h4>RG:</h4>

	<input type="text" name="rg" placeholder="buscar" size="13" autocomplete="off" required>

		<INPUT TYPE='image' SRC='images/lupa.png' width="15" height="14">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

</form>
  </div>   
  


</form>

<form method="GET" action='_altera_cliente.php'>

	<h4>Observacao:</h4>

    <input type="text" name="observ" placeholder="buscar" size="50" required>

    <INPUT TYPE='image' SRC='images/lupa.png' width="15" height="14" autocomplet="off">

</form> 
</div>
<hr>

<!-- botoes -->

<div class="form-group row">
  <div class="col-xs-2">
    
  <form method="POST"  action="form_cadastro_cliente.html">

<input type="submit" class="btn btn-success btn-sm" value="NOVO">
&nbsp;
</form>

  </div>
  <div class="col-xs-3">
  <form method="POST"  action="exporta_clientes_xls.php">

<input type="submit" class="btn btn-secondary btn-sm" value="EXCEL">
&nbsp;
</form>
  </div>
  <div class="col-xs-4">
  <form method="POST" action="menu.php">

<p align ="left"><input type="submit" class="btn btn-dark btn-sm" value="VOLTAR">

</form>
  </div>
</div> 

</div>	
<!-- <a title='Imprimir conteúdo' href='javascript:window.print()'><img src="images/imprimir.jpg" alt="Smiley face" height="20" width="30" border="0" /></a>-->

<!-- -->

<?php

// Conexão ao banco

	require_once 'conexao.php';
 
//Sessionn 
 $usuario = $_SESSION['login'];

 $observacao_cliente = ($_GET['observ']); 

 $nome_cliente = $_GET['nome'];

 $fantasia_cliente = $_GET['nomefant'];

 //Busca nome cliente:
 if($nome_cliente == TRUE){

	$sql = "select * from clientes where nome like ('%$nome_cliente%') order by nome asc";
	
	$consulta = mysqli_query($conexao,$sql);
 }

 //Busca observacao cliente:
 if($observacao_cliente == TRUE){

	$sql = "select * from clientes where observ like ('%$observacao_cliente%') order by nome asc";
	
	$consulta = mysqli_query($conexao,$sql);
	
	
}

//Busca observacao cliente:
 if($fantasia_cliente == TRUE){

	$sql = "select * from clientes where nomefant like ('%$fantasia_cliente%') order by nome asc";
	
	$consulta = mysqli_query($conexao,$sql);
	
	
}



if($observacao_cliente == FALSE AND $nome_cliente == FALSE AND $fantasia_cliente == FALSE ){

$sql = "SELECT * FROM clientes WHERE usuario ='ROBERTO' order by nome asc ";


$consulta = mysqli_query($conexao,$sql);
}

echo '<table border style="width:100%">';
			echo '<tr>';

			echo '<td id="borda"></td>';

			echo '<td id="borda">CODIGO:</td>';

			echo '<td id="borda">CLIENTE:</td>';

			echo '<td id="borda">FANTASIA:</td>';

			echo '<td id="borda">DATA CADASTRO:</td>';

			echo '<td id="borda">ENDERECO:</td>';

			echo '<td id="borda">NUMERO:</td>';

			echo '<td id="borda">BAIRRO:</td>';

			echo '<td id="borda">CIDADE:</td>';

			echo '<td id="borda">UF:</td>';

			echo '<td id="borda">TELEFONE:</td>';

			echo '<td id="borda">CELULAR:</td>';

			echo '<td id="borda">E-MAIL:</td>';

			//echo '<td id="borda">SITE:</td>';

		 	echo '<td id="borda">WHATSAPP:</td>';             

			echo '</div>';

			echo '</tr>';

// Armazena os dados da consulta em um array associativo

while($registro = mysqli_fetch_assoc($consulta)){

			echo '<tr>';

			echo '<td id="campos"><a href="_altera_cliente.php?nome='.$registro["nome"].'"#><img src="images/edit.png"></td>';

			echo '<td id="campos">'.$registro["cod"].'</td>';

			echo '<td id="campos">'.$registro["nome"].'</td>';

			echo '<td id="campos">'.$registro["nomefant"].'</td>';

			echo '<td id="campos">'.$registro["datacad"].'</td>';

			echo '<td id="campos">'.$registro["rua"].'</td>';

			echo '<td id="campos">'.$registro["numero"].'</td>';

			echo '<td id="campos">'.$registro["bairro"].'</td>';

			echo '<td id="campos">'.$registro["cidade"].'</td>';

			echo '<td id="campos">'.$registro["uf"].'</td>';

			echo '<td id="campos">'.$registro["telefone"].'</td>';

			echo '<td id="campos">'.$registro["celular"].'</td>';

	if($registro["email"] == TRUE){

		echo '<td id="campos"><a href="mailto:'.$registro["email"].'?Subject=Ola%20" target="_top">'.$registro["email"].'</a></td>';

	}else{
		
		echo '<td id="campos-naocadastrado">--------------</td>';

	}
	
		//echo '<td id="campos">'.$registro["site"].'</td>';
        
    	//echo "<td id='campos-whatsapp'><a href='http://api.whatsapp.com/send?1=pt_BR&phone=55".$registro['celular']."'><img src='images/whatsapp.png' alt='Smiley face' height='20' width='30' border='0'/></a></a>";

		if($registro["celular"] == TRUE){

echo "<td id='campos'><a href='http://api.whatsapp.com/send?1=pt_BR&phone=55".$registro['celular']."'><img src='images/whatsapp.png' alt='Smiley face' height='20' width='30' border='0'/></a></a>";

}else{

	echo '<td id="campos-naocadastrado">--------------</td>';
}
      
	echo '</tr>';
		
}

echo '</table>';



?>


<hr>

</body>

</html>'