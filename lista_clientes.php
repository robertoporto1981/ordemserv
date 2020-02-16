<?php session_start() ?>

<html lang='pt-BR'>

<head>
	  			
	<link type="text/css" rel="stylesheet" href="stylesheet.css">

</head>
		    
<title>Clientes</title>

<h1 id="titulo-programas">Clientes</h1>  

<div class="busca">

<br>

<hr>

<div id="cliente-codigo">

	<h4>Codigo:</h4>

		<form method="GET" action="pesquisa_cliente_cod.php">	
	
	 			<input type="text" name="busca" placeholder="Buscar..." maxlength="8" size="8">
		
		 		  <INPUT TYPE='image' SRC='images/lupa.png' width="15" height="14">

	</form>
</div>

<div id="nome-clientes">

	<h4>Nome:</h4>
		<form method="GET" action="pesquisa_cliente.php">
<!--<input type="text" name = "busca" size="50"><!--<input type="submit" value="Pesquisa">-->

 			<input type="text" name="busca" placeholder="Buscar..." size="50">

   				<INPUT TYPE='image' SRC='images/lupa.png' width="15" height="14">

	</form>

</div>


<div id="nome-fantasia">

<form method ="POST" action="pesquisa_cliente_fantasia.php">

<h4>Fantasia:</h4>

    <input type="text" name="fantasia" placeholder="buscar" size="60">

    <INPUT TYPE='image' SRC='images/lupa.png' width="15" height="14">

</form>    

</div>


</div>

</form>

<div id="cnpj-clientes">

	<form method="GET" action="pesquisa_cliente_cnpj.php">

		<h4>CNPJ:</h4>

			<input type="text" name="cnpj" placeholder="buscar" size="13">

    			<INPUT TYPE='image' SRC='images/lupa.png' width="15" height="14">

	</form>    

</div>

<div id="lista-clientes_observacao">

<form method="POST" action='pesquisa_cliente_observacao.php'>

	<h4>Observacao:</h4>

    <input type="text" name="observ" placeholder="buscar" size="50">

    <INPUT TYPE='image' SRC='images/lupa.png' width="15" height="14">

</form> 

</div>

<hr>

<div id="novo-cliente">

	<form method="POST"  action="form_cadastro_cliente.html">

		<input type="submit" id="btn-salvar#" value="NOVO">

	</form>

</div>
 

<div id="excel">

	<form method="POST"  action="exporta_clientes_xls.php">


		<input type="submit" id="btn-exportar" value="EXCEL">

	</form>

</div>

<div id="lista-clientes-voltar">

	<form method="POST" action="form_cadastro_cliente.html">

		<p align ="left"><input type="submit" id="btn-sair#" value="VOLTAR">

	</form>

</div>	

<div id="lista-clientes-imprimir">
 
 	<a title='Imprimir conteúdo' href='javascript:window.print()'><img src="images/imprimir.jpg" alt="Smiley face" height="20" width="30" border="0" /></a>

</div>
<?php

// Conexão ao banco

	require_once 'conexao.php';
 
//Sessionn 
 $usuario = $_SESSION['login'];


$sql = "SELECT * FROM clientes WHERE usuario ='ROBERTO' order by nome asc ";


$consulta = mysqli_query($conexao,$sql);
 
echo '<font face="verdana"><table border style="width:100%">';

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

			echo '<td id="borda">SITE:</td>';

		 	echo '<td id="borda">WHATSAPP:</td>';

			echo '</div>';

			echo '</tr>';

// Armazena os dados da consulta em um array associativo

while($registro = mysqli_fetch_assoc($consulta)){

			echo '<tr>';

			echo '<td id="campos"><a href="pesquisa_cliente_cod.php?busca='.$registro["cod"].'"#><img src="images/edit.png"></td>';

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
	
		echo '<td id="campos">'.$registro["site"].'</td>';
        
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

</html>