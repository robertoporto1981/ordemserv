<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=windows-1250">
  <meta name="generator" content="PSPad editor, www.pspad.com">
  <title>Alteracao</title>
</head>
<body>

<?php

require_once 'testa_login.php';

include( "conexao_mysql.php" );

echo '<font face="verdana"><table border style="width:100%">';

echo '<tr>';

echo '<td>NOME:</td>';

echo '<td>CPF:</td>';

echo '<td>CNPJ:</td>';

echo '<td>ENDERECO:</td>';

echo '<td>N.:</td>';

echo '<td>COMPLEMENTO:</td>';

echo '<td>BAIRRO:</td>';

echo '<td>CIDADE:</td>';

echo '<td>ESTADO:</td>';

echo '<td>TELEFONE:</td>';


// Armazena os dados da consulta em um array associativo:

echo '<tr>';

echo '<td>' . $registro["nome"] . '</td>';

echo '<td>' . $registro["cpf"] . '</td>';

echo '<td>' . $registro["cnpj"] . '</td>';

echo '<td>' . $registro["endereco"] . '</td>';

echo '<td>' . $registro["numero"] . '</td>';

echo '<td>' . $registro["complemento"] . '</td>';

echo '<td>' . $registro["bairro"] . '</td>';

echo '<td>' . $registro["cidade"] . '</td>';

echo '<td>' . $registro["estado"] . '</td>';

echo '<td>' . $registro["telefone"] . '</td>';

echo '</tr>';

echo '</table>';

?>  

	</body>
	
</html>
