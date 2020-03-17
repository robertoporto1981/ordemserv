<?php session_start(); ?>

<?php include 'testa_login.php' ?>
 
 
 <html lang='pt-BR'>
 
    <head>


 	  <meta charset='utf-8'>	

      <link type="text/css" rel="stylesheet" href="stylesheet.css">
 
 </head>
 
 <title>Aniversariantes</title>

		<h1 id="titulo-programas">Aniversariantes do dia </h1>

<?php



date_default_timezone_set("America/Sao_Paulo");	

 
		$usuario = $_SESSION['login'];	

		$data = date("d/m/Y");
	
		$dia = date("d");

		$mes = date("m");


//Conexao

require_once 'conexao.php';


	

$sql = "SELECT * FROM clientes WHERE MONTH(datanasc) = '$mes' AND DAY(datanasc) = '$dia' order by nome asc";

		$consulta = mysqli_query($conexao,$sql);

     	$resultado = mysqli_num_rows($consulta);
  

if($resultado == 0 ){
    
    echo"<script language='javascript' type='text/javascript'>alert('Nenhum aniversariante hoje!');window.location.href='menu.php';</script>";
    
    }

// Armazena os dados da consulta em um array associativo

echo '<table border style="width:100%">';

echo '<tr>';

		echo '<td id="borda">CÓD:</td>';

		echo '<td id="borda">CLIENTE:</td>';

		echo '<td id="borda">DATA DE NASCIMENTO:</td>';

		echo '<td id="borda">TELEFONE:</td>';

		echo '<td id="borda">CELULAR:</td>';

		echo '<td id="borda">E-MAIL:</td>';

		echo '<td id="borda">WHATSAPP:</td>';


echo '</tr>';

while($registro = mysqli_fetch_assoc($consulta)){
    
    		echo"<form action='./' id='formulario' method='post'>";
    
  
  			echo'<tr>';   
  
 			echo "<td id='campos'><input type='text' name='cod'  maxlength='10' id='formulario' value ='".$registro['cod']."' size='30'></td>";


  			echo "<td id='campos'><input type='text' name='nome'  maxlength='10' id='formulario' value ='".$registro['nome']."' size='30'></td>";
  
  			echo "<td id='campos'><input type='text' name='datanasc'  maxlength='10' id='formulario' value ='".$registro['datanasc']."' size='12'></td>";
  
  			echo "<td id='campos'><input type='text' name='telefone'  maxlength='10' id='formulario' value ='".$registro['telefone']."' size='12'></td>";
  
  			echo "<td id='campos'><input type='text' name='celular'  maxlength='10' id='formulario' value ='".$registro['celular']."' size='12'></td>";
  
			echo "<td id='campos'><input type='text' name='email'  maxlength='10' id='formulario' value ='".$registro['email']."' size='40'></td>";
  
  
  			echo "<td id='campos-whatsapp'><a href='https://api.whatsapp.com/send?phone=55".$registro['celular']."&text=%20Feliz aniversario'><img src='images/whatsapp.png' alt='Smiley face' height='20' width='30' border='0'/></a></a>";


  //echo "<td id='campos'><a href='http://api.whatsapp.com/send?1=pt_BR&phone=55".$registro['celular']."'>WHATSAPP</a>";

  
		  	echo "<br>";
       
  
  			echo'</tr>'; 
  
    
}

 			echo'</table>';

	
  	
	
?>

</body>

</html>

  </br>

  <p>
     
     <form action="./" id="formulario" method="post">

    <input type="button" id="btn-sair" value="Sair" onclick="Acao('menu');">
    
<script type="text/javascript">
    // <![CDATA[
     function Acao(act){
       frm = document.getElementById('formulario');
       frm.action = act + '.php'; 
       frm.submit();
    // ]]>
    }
</script>

