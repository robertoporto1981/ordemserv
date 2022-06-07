<?php session_start(); ?>

<?php

$bdServidor = 'localhost';

$bdUsuario = "root";

$bdSenha = "";

$_SESSION['banco'] = $bdBanco = "db02";

//Conecta com o banco de dados:

$conexao = mysqli_connect($bdServidor,$bdUsuario,$bdSenha,$bdBanco) or die(mysqli_error());