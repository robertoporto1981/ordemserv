<?php

$bdServidor = 'localhost';

$bdUsuario = "root";

$bdSenha = "";

$bdBanco = "db01";

//Conecta com o banco de dados:

$conexao = mysqli_connect($bdServidor,$bdUsuario,$bdSenha,$bdBanco) or die(mysqli_error());








?>
