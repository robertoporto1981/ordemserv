<?php session_start(); ?>

<!DOCTYPE html>

<html lang='pt-BR'>

<?php

include 'time_zone';

include 'testa_login.php';
  
$nome = $_SESSION['nome'];

$endereco = $_SESSION['rua'];

$numero = $_SESSION['numero'];

$bairro =	$_SESSION['bairro'];

$cidade = $_SESSION['cidade'];

$uf =	$_SESSION['uf']; 

$cep = $_SESSION['cep'];

$cpf =	$_SESSION['cpf'];

$telefone = $_SESSION['telefone'];

$celular = $_SESSION['celular'];

$email = $_SESSION['email'];

  

if(isset($_SESSION['login'])){
  
  $usuario = $_SESSION['login'];     
 
  
}else{
 
 echo"<script language='javascript' type='text/javascript'>window.location.href='index.html'</script>";
 
 
}

	$data = date("d/m/Y");

	$hora = date("H:i:s");
	   
  $mensagem = "Atenção! a não retirada do aparelho no prazo de 30 dias serão acrescido 10% no valor, após 60 dias implicara na venda do mesmo para pagamentos de gast
  . (art. 06. Item 03 do código de defesa do consumidor)"
	

	
?>

  

<head>

<meta charset='utf-8'>

<link type="text/css" rel="stylesheet" href="stylesheet.css">

<title>ORDEM DE SERVIÇOS</title>

</head>
		

			<h1 id="titulo-programas">Ordem de serviços</h1>
		
			<!--<FORM action ="form_cadastro_os.php" method="post">-->
      <form action="./" id="formulario" method="post">
	
	
	
  <table border="2">

	<!--	<td>Ordem Nº:<input type="text" name ="numeroord" size="10"></td> -->

	</table>

	<table border="2">
  
		<td>Data Entrada:<input type="text" id="formulario" maxlength="8" name ="dataentr" value =<?php echo $data; ?> size="8"></td>

		<td>Hora Entrada:<input type="text" id="formulario" maxlength="8"  name ="horacheg" value =<?php echo $hora; ?> size="8"></td>

		<td>Previsao Saida: <input type="text" id="formulario" maxlength="8" name ="prevsaid" size="8"></td>
   
		<td>Cliente:<input type="text" value="<?php echo $nome; ?>" id="formulario" name ="cliente" maxlength="50" size="60" required></td>

		<td>Endereço:<input type ="text" value ="<?php echo $endereco ?> <?php echo $numero ?> " id="formulario" name = "ender" maxlength="50" size = "50"></td>

	</table>

	<table border="2">
		
		<td>Bairro:<input type ="text" value ="<?php echo $bairro ?>" id="formulario" name = "bairro" size = "20"></td>

		<td>Cidade:<input type ="text" value ="<?php echo $cidade ?>" id="formulario" name ="cidade" maxlength="40" size = "20"></td>

		<td>UF:<input type ="text" value ="<?php echo $uf ?>" id="formulario" name ="uf" maxlength="2" size = "1"></td>

		<td>CEP:<input type ="text" value="<?php echo $cep ?>" id="formulario" name = "cep" maxlength ="8" size = "8"></td>

		<td>CPF/CNPJ:<input type ="text" value ="<?php echo $cpf ?>" id="formulario" name ="cpfcnpj" maxlength ="11" size = "20"></td>

		<td>RG:<input type ="text" id="formulario" name ="rg" maxlength="10 size = "10"></td><p>

		<td>Telefone:<input type = "text" value ="<?php echo $telefone ?>" id="formulario" name = "telef" maxlength="11"  size = "11" required></td>

		<td>Telefone2:<input type = "text" value="<?php echo $celular ?>" id="formulario" name = "telef2" maxlength="11" size = "11" required></td>

		<td>E-mail:<input type ="text" value="<?php echo $email ?>" id="formulario" name = "email" size = "30"></td>

	</table>

	<table border="2">

		<td>Equipamento:<input type="text" id="formulario" name="equipamento" size="20" maxlength="20" required></td>

		<td>Modelo:<input type ="text" id="formulario" name = "modelo" maxlength="20" size = "20"  required></td>

		<td>Marca:<input type ="text" id="formulario" name ="marca" maxlength="15" size = "15" required></td>	

		<td>Serial ou Imei:<input type ="text" id="formulario" name ="serial" maxlength="25" size = "25" required></td><p>

		<td>Acessorios:<input type ="text" id="formulario" name ="acessorios" maxlength="25" size = "25" required></td>

		<td>Detalhes e observações:<input type ="text" id="formulario" name ="detalhes" size = "99" required></td>

	</table>	
	
	<table border="1">


	<br><b>Defeito / Reclamação:</b><td><textarea class="formulario" name="mensage" rows="10" cols="1000" size = "80">

	</textarea>

	</table>

	<table border="1">
	
		
	<br><td>CONDIÇÕES DE EXECUÇÃO:<?php echo $mensagem; ?></td>

</table>
	

</form>


</body>

</html>

<html>

<form method="POST" action="menu.php">

<p align ="left"><input type="submit" id="btn-sair" value="Sair">

</form>


       
    <input type="button" id="btn-salvar" value="Salvar" onclick="Acao('form_cadastro_os');">
    
</form>
<script type="text/javascript">
    // <![CDATA[
     function Acao(act){
       frm = document.getElementById('formulario');
       frm.action = act + '.php'; 
       frm.submit();
    // ]]>
    }
</script>
<html>
<!--<form method="POST" action="pesquisa_os.php">
<h2>Consulta OS
<input type="text" name = "os" size="2"><!--<input type="submit" value="Pesquisa">-->
<!--<input type='image' src="images/lupa.png" width ="15px" height="14">	-->

</h2>



</form>
</html>









