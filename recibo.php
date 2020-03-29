<?php session_start(); ?>

<?php

//Session

$nome = $_SESSION['nome'];

$dia = date('d');

$mes = date('m');

$ano = date('Y');

//Conexao com banco
require_once 'conexao.php';

if($mes == '01'){

	$mes = "janeiro";

}

if ($mes == '02'){

	$mes = "fevereiro";

}


if($mes == '03'){

	$mes = "março";

}

if($mes == '04'){

	$mes = "abril";

}

if($mes == '05'){

	$mes = "maio";

}

if($mes == '06'){

	$mes = "junho";

}

if($mes == '07'){

	$mes = "julho";

}

if($mes == '08'){

	$mes = "agosto";

}

if($mes == '09'){

	$mes = "setembro";
}

if($mes == '10'){

	$mes = "outubro";

}

if($mes == '11'){

	$mes = "novembro";

}

if($mes == '12'){

	$mes = "dezembro";
}

?>

<?php

// Seleciona o Banco de dados através da conexão acima

$sql = "SELECT * FROM empresa";

$consulta = mysqli_query($conexao,$sql);
// Armazena os dados da consulta em um array associativo

while($registro = mysqli_fetch_assoc($consulta)){

		$empresa = $registro['descricao'];

		$cnpj = $registro['cnpj'];

		$ie = $registro['ie'];

		$telefone = $registro['telefone'];

}

?>

<html lang='pt-BR'>

<head>

<meta charset='utf-8'>

	<link type="text/css" rel="stylesheet" href="css/recibo.css"/>

		</head>

<body>


<div id="recibo">
	<h2 id="titulo-recibo">RECIBO</h2>


<hr>


	<h2>Valor R$:<input type="text" name="valor" maxlength="6" size="6"></h2>

<hr>


<p>Recebi(emos) de <b><?php echo $nome ?></b></p>

<p>A importância de R$<input type="text" name="valor" maxlength="6" size="6">,&nbsp;<input type ="text" name ="importancia" maxlength="30" size="30"></p>

<p>Referente a&nbsp;<input type="text" name="ref" maxlength="300" size="100"></p>

<p>Canoas,&nbsp;<?php echo $dia ?>&nbsp;de&nbsp;<?php echo $mes ?>&nbsp;<?php echo $ano ?>. </p>

<p>Assinatura do emitente:__________________________________________________</p>

<p>Nome do emitente:<b><?php echo $empresa ?></b></p>


<p>CNPJ:<b><?php echo $cnpj ?></b></p>	                 <p>Celular:<b><?php echo $telefone ?></b></p>

<p>IE:<b><?php echo $ie ?></b></p>

<hr>



<!--<form>

		<input type="button" value="Imprimir" onClick="window.print()"/>

			</form>


<form method="POST"	action="menu.php">

	<input type="submit" value="Sair">


</form> -->



	</body>


</html>


<?php session_destroy() ?>