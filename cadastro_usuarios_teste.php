<!DOCTYPE html>
<html>
<head>

  <meta lang="pt-br">
     
     <meta charset="utf-8">

        <link type="text/css" rel="stylesheet" href="stylesheet.css">

  <title>Usuários</title>

</head>

<body>


  <h1 id="titulo-programas">Cadastro de usuários</h1>

<form method="POST" action="cadastro.html">

<input type="submit" value="Novo">

<br>

<form method="#" action="menu.php">
<br>

</html>  



<?php

  
include 'conexao.php';


$sql = "SELECT * FROM usuarios order by ID asc";

$consulta = mysqli_query($conexao,$sql);

    echo '<table border style="width:100%">';

    echo '<tr>';

    echo '<td id="borda">#</td>';

    echo '<td id="borda">ID:</td>';
    
    echo '<td id="borda">NOME:</td>';

    echo '<td id="borda">LOGIN:</td>';
   
    echo '</tr>';

// Armazena os dados da consulta em um array associativo

while($registro = mysqli_fetch_assoc($consulta)){

    echo '<tr>';

    echo '<td id="campos"><a href="altera_usuario.php?ID='.$registro["ID"].'"#><img src="images/edit.png"></td>';

    echo '<td id="campos">'.$registro["nome"].'</td>';

    echo '<td id="campos">'.$registro["login"].'</td>';                  
    
    echo '</tr>';

}

    echo '</table>';

}

?>