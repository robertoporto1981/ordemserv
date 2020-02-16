<?php

require_once 'testa_login.php';

// Conexão ao banco

require_once 'conexao.php';


$sql = "SELECT nome,endereco,bairro FROM clientes";

$consulta = mysqli_query($conexao,$sql);

	echo '<table>';

	echo '<tr>';

	echo '<td>Nome:</td>';

	echo '<td>Endereco:</td>';

	echo '<td>Bairro:</td>';

	echo '</tr>';

// Armazena os dados da consulta em um array associativo

while($registro = mysqli_fetch_assoc($consulta)){

	echo '<tr>';

	echo '<td>'.$registro["nome"].'</td>';

	echo '<td>'.$registro["endereco"].'</td>';

	echo '<td>'.$registro["bairro"].'</td>';

	echo '</tr>';

}

	echo '</table>';



?>