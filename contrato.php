<?php session_start () ?>

<?php

//Session
$nome = $_SESSION['nome'];

$rg = $_SESSION['rg'];

$cpf = $_SESSION['cpf'];

$telefone_cliente = $_SESSION['telefone'];

$celular_cliente = $_SESSION['celular'];

//Data:

$dia = date('d');

$mes = date('m');

$ano = date('Y');

//Conexao com banco
require_once 'conexao.php';


if($mes == 01){

	$mes = "janeiro";

}

if($mes == 02){

	$mes = "fevereiro";

}


if($mes == 03){

	$mes = "março";

}

if($mes == 04){

	$mes = "abril";

}

if($mes == 05){

	$mes = "maio";

}

if($mes == 06){

	$mes = "junho";

}

if($mes == 07){

	$mes = "julho";

}

if($mes == '08'){

	$mes = "agosto";

}

if($mes == '09'){

	$mes = "setembro";
}

if($mes == 10){

	$mes = "outubro";

}

if($mes == 11){

	$mes = "novembro";

}

if($mes == 12){

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

		<link type ="text/css" rel="stylesheet" href="css/bootstrap.min.css">

		</head>

<body>



<div id="recibo">

<hr>


<hr>
<h3><b>&nbsp;&nbsp;***EXPLENDOR FESTAS CONTRATO E TERMO DE RESPONSABILIDADE***</h3>

<p style="text-align:center;">CNPJ: <?php echo $cnpj ?>

	<h5>Por gentileza solícitamos que seja <b>DEVOLVIDO</b> as roupas, calçados e acessórios locados
	no <b>PRIMEIRO DIA ÚTIL APÓS O EVENTO</b>, não atendendo cliente pagará uma multa de 10% 
	ao dia sobre o valor da locação, <b>POIS O MESMO PODE ESTAR LOCADO NA SEMANA SEGUINTE
	NECESSITANDO SER LAVADO E AJUSTADO PARA O PRÓXIMO CLIENTE</b>. O cliente <b>RESPONSABILIZA-SE</b>
	pelas roupas, calçados, acessórios, pacotes, cabides e sacolas <b>QUANDO</b> locados <b>ESTANDO
	CIENTE QUE TERÁ QUE INDENIZAR OS DANOS CAUSADOS OU PERCAS</b>. Em caso de <b>DESISTÊNCIA</b> o cliente 
	<b>PERDERÁ O SINAL PAGO</b>. Agradecemos por sua compreensão.<h5><br>

<p><b>EM CASO DE EXECESSO DE SUJEIRA SERÁ COBRADO TAXA DE LAVANDERIA</b>*

<h3><b>ASSINO E CONCORDO COM TERMOS EXIGIDOS:</h3></b><br>

ASS:_______________________________________

CANOAS, <?php echo $dia ?> de <?php echo $mes ?> <?php echo $ano ?><br> 

LOCAÇÃO PARA DIA:_____________________________________________________________________________________________________________________________________<br>

RUA:________________________________________________________________________________________________________________________________________________________<br>

FONE: <?php if($telefone_cliente == 0 OR NULL){ echo $celular_cliente;}if($celular_cliente == 0 OR NULL){ echo $telefone_cliente;} if($celular_cliente AND $telefone_cliente == TRUE){ echo $celular_cliente;} ?><br>

RG: <?php echo $rg ?><br>							CPF: <?php echo $cpf ?><br>

_____________________________________________________________________________________________________________________________________________________________


_____________________________________________________________________________________________________________________________________________________________


_____________________________________________________________________________________________________________________________________________________________


_____________________________________________________________________________________________________________________________________________________________


_____________________________________________________________________________________________________________________________________________________________


_____________________________________________________________________________________________________________________________________________________________


_____________________________________________________________________________________________________________________________________________________________


_____________________________________________________________________________________________________________________________________________________________


_____________________________________________________________________________________________________________________________________________________________


_____________________________________________________________________________________________________________________________________________________________


_____________________________________________________________________________________________________________________________________________________________


_____________________________________________________________________________________________________________________________________________________________


_____________________________________________________________________________________________________________________________________________________________


_____________________________________________________________________________________________________________________________________________________________


_____________________________________________________________________________________________________________________________________________________________


_____________________________________________________________________________________________________________________________________________________________


_____________________________________________________________________________________________________________________________________________________________


_____________________________________________________________________________________________________________________________________________________________


_____________________________________________________________________________________________________________________________________________________________


_____________________________________________________________________________________________________________________________________________________________


_____________________________________________________________________________________________________________________________________________________________


_____________________________________________________________________________________________________________________________________________________________


_____________________________________________________________________________________________________________________________________________________________


_____________________________________________________________________________________________________________________________________________________________


_____________________________________________________________________________________________________________________________________________________________


<!--<form>

		<input type="button" value="Imprimir" onClick="window.print()"/>

			</form>


<form method="POST"	action="menu.php">

	<input type="submit" value="Sair">


</form> -->



	</body>


</html>


