<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">

<html>
	<head>
	
	<meta charset="utf-8">
	
	<link type="text/css" rel="stylesheet" href="stylesheet.css">
		
	
  	 <title>Serviços</title>
<!--<h1><p align="center">Tabela de serviços</h1><p>-->
		 
<h1 id="titulo-programas">Serviços</h1>


<?php
    session_start(); 
    
	$usuario = $_SESSION['login'];
  
if(isset($_SESSION['login'])){
  
  $usuario = $_SESSION['login'];     
  
   
}else{
 
 echo"<script language='javascript' type='text/javascript'>window.location.href='index.html'</script>";
 
 
 }
	
$serv = $_POST['serv'];
	


if(empty($serv)){
   
   $serv = "%%";
   
}else{
   
   $serv = $_POST['serv'];
   
}     
		
//conexao com banco 

	require_once 'conexao.php';


		
$sql = "select * from servicos where descricao like ('%$serv%') and usuario = '$usuario' ORDER BY descricao asc";


		$consulta = mysqli_query($conexao,$sql);
 		
	    $resultado = mysqli_num_rows($consulta);
  
if($resultado == 0 ){
    
    echo"<script language='javascript' type='text/javascript'>alert('Servico nao encontrado!');window.location.href='form_cadastro_servicos.html';</script>";
    
    }


echo '<table border style="width:100%">';

		echo '<tr>';

		echo '<td id="borda">COD:</td>';

		echo '<td id="borda">DESCRICAO:</td>';

		echo '<td id="borda">PRECO:</td>';

		echo '<td id="borda">OBSERVACAO:</td>';


// Armazena os dados da consulta em um array associativo

while($registro = mysqli_fetch_assoc($consulta)){


		echo '<tr>';

		echo '<td id="campos">'.$registro["cod"].'</td>';

		echo '<td id="campos">'.$registro["descricao"].'</td>';

		echo '<td id="campos">'."R$".$registro["preco"].",00".'</td>';

		echo '<td id="campos">'.$registro["observacoes"].'</td>';

		echo '</tr>';

}

echo '</table>';



	
	
?>
  

<form method="POST" action="form_cadastro_servicos.html">

<p align ="left"> <input type="submit" id="btn-sair" value="Sair">

</form>
 <a title='Imprimir conteúdo' href='javascript:window.print()'><img src="images/imprimir.jpg" alt="Smiley face" height="20" width="30" border="0" /></a>




