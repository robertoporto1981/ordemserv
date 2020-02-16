<?php session_start() ?>
<?php
include'conexao.php';

?>


<html lang='pt-BR'>

	<head>
		<title>Impressao</title>

<link type="text/css" rel="stylesheet" href="css/impressao.css">	

</head>

<body>

	<div id="logo">

		<img src="images/logo.jpg" widht="30px" height="50px">

		<h1 id="cabecalho">PEDIDO</h1> 

	</div>

	<div id="numero-ped">

		<label>Pedido n.:</label>

	</div>
				
	<div id="data">

		<label>Data Emissao:</label>

	</div>

	<div id="cnpj">
		<label>CNPJ:</label>
	</div>

	<div id="nome-empresa"><label>Nome empresa</label></div>

	<div id="emissao"><label>Emissao:</label>

	</div>

	<div id="usuario"><label>Usuario</label>

	</div>

	<div id="loja"><label>Loja</label>

	</div>

	<div id="end"><label>End:</label>

	</div>

	<div id="fone-empresa"><label>Fone:</label>

	</div>

	<div id="borda-cliente">

	<div id="cliente"><label>Cliente:</label>


	</div>

	<div id="cnpj-cpf"><label>CNPJ/CPF:</label>

	</div>

	<div id="inc-rg"><label>Insc.Est/RG:</label></div>

	<div id="vendedor"><label>Vendedor:</label></div>

	<div id="portador"><label>Portador:</label></div>

	<div id="end-cobranca"><label>End.Cobranca:</label></div>

	<div id="transportador"><label>Transportador:</label></div>


	</div>

<div id="produtos">

<table border="2">

	<td>Item</td>

	<td>Codigo</td>

	<td>Produto</td>

	<td>Descricao do Produto</td>

	<td>Qtde.</td>

	<td>UN</td>

	<td>Vl.Unitario</td>

	<td>Vl.Desconto</td>

	<td>Vl.Total</td>


</table>
	
</div>

<div id="itens">

<div id="total-itens"><label>Total de Itens:</label></div>

<div id="vl-pecas"><label>Vl. de Pecas:</label></div>

<div id="total-pedido"><label>Total do Pedido:</label></div>

<div id="total-desconto"><label>Total Desconto:</label></div>

</div>

</div>

</body>

</html>