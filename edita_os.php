<?php session_start() ?>

<?php

require_once 'time_zone.php';

require_once 'testa_login.php';


$usuario = $_SESSION['login'];

$os = $_SESSION['os'];

// conexao com banco de dados:
require_once 'conexao.php';


$sql = "select * from ordem where numeroord like('%$os%') order by numeroord asc";

$consulta = mysqli_query( $conexao, $sql );

if ( mysqli_error( $conexao ) == true ) {
				
	echo '<div class="error-mysql">';
				
	
	echo( "Erro! <br> " . mysqli_error( $conexao ) );
                 
    
	echo '<br>';
                
    
	echo $sql;
				
	
	echo '</div>';
				
	
	mysqli_close( $conexao );
				
	
	die;
	
} 

$resultado = mysqli_num_rows( $consulta );

if ( $resultado == 0 ) {
				
	
	echo"<script language='javascript' type='text/javascript'>alert('OS nao encontrado!');window.location.href='consulta_os.html';</script>";
				
	
} 


// Dados da tabela
while ( $registro = mysqli_fetch_assoc( $consulta ) ) {
				
	
	$numeroord = $registro["NumeroOrd"];
				
	
	$data = $registro["dataentr"];
				
	
	$hora = $registro["horacheg"];
				
	
	$cliente = $registro["cliente"];
				
	
	$endereco = $registro["endereco"];
				
	
	// $numero = $registro["numero"];
				
	$bairro = $registro["bairro"];
	
				
	
	$cidade = $registro["cidade"];
				
	
	$uf = $registro["uf"];
				
	
	$cep = $registro["cep"];
				
	
	$cpfcnpj = $registro["cpfcnpj"];
				
	
	$rg = $registro["rg"];
				
	
	$telef = $registro["telef"];
				
	
	$telef2 = $registro["telef2"];
				
	
	$marca = $registro["marca"];
				
	
	$email = $registro["email"];
				
	
	$equipamento = $registro["equipamento"];
				
	
	$modelo = $registro["modelo"];
				
	
	$marca = $registro["marca"];
				
	
	$serial = $registro["serial"];
				
	 $acessorios = $registro["acessorios"];
				
	
	$detalhes = $registro["detalhes"];
				
	$defeito = $registro["mensage"];
				
	
	$servexec = $registro["servexec"];
				
	
	$status = $registro["status"];
				
				
	
} 


?>
  <!DOCTYPE html">

<html lang='pt-BR'>

	<head>
  
<meta charset="utf-8">

<link type="text/css" rel="stylesheet" href="stylesheet.css">

<title>ORDEM DE SERVIÇOS</title>
		
</head>
			<h1 id="titulo-programas">Ordem de serviços</h1>
			
<form method="POST" action="altera_ordem2.php">	
	
  <table border="2">

	<td><b>Ordem Nº:</b></td><td><?php echo $numeroord ?></td></td>

	</table>

	<table border="2">
  
		<td><b>Data Entrada:</b><input type="text" id="formulario" maxlength="8" name ="dataentr" value =<?php echo $data;
?> size="8"></td>

		<td><b>Hora Entrada:</b><input type="text" id="formulario" maxlength="8"  name ="horacheg" value ="<?php echo $hora;
?>" size="8"></td>

		<td><b>Previsao Saida:</b><input type="text" id="formulario" maxlength="8" name ="prevsaid" size="8"></td>
   
		<td><b>Cliente:</b><input type="text" value="<?php echo $cliente;
?>" id="formulario" name ="cliente" maxlength="40" size="40"></td>

		<td><b>Endereço:</b><input type="text" value="<?php echo $endereco ?> <?php echo $numero ?>" <id="formulario" name = "endereco" maxlength="80" size = "80"></td>

	</table>

	<table border="2">
		
		<td><b>Bairro:</b><input type ="text" value ="<?php echo $bairro ?>" id="formulario" name = "bairro" size = "20"></td>

		<td><b>Cidade:</b><input type ="text" value ="<?php echo $cidade ?>" id="formulario" name ="cidade" maxlength="40" size = "20"></td>

		<td><b>UF:</b><input type ="text" value ="<?php echo $uf ?>" id="formulario" name ="uf" maxlength="2" size = "1"></td>

		<td><b>CEP:</b><input type ="text" value="<?php echo $cep ?>" id="formulario" name = "cep" maxlength ="8" size = "8"></td>

		<td><b>CPF/CNPJ:</b><input type ="text" value ="<?php echo $cpf ?>" id="formulario" name ="cpfcnpj" maxlength ="11" size = "20"></td>

		<td><b>RG:</b><input type ="text" id="formulario" name ="rg" maxlength="10 size = "10"></td><p>

		<td><b>Telefone:</b><input type = "text" value ="<?php echo $telefone ?>" id="formulario" name = "telef" maxlength="11"  size = "11" ></td>

		<td><b>Telefone2:</b><input type = "text" value="<?php echo $telef2 ?>" id="formulario" name = "telef2" maxlength="11" size = "11" ></td>

		<td><b>E-mail:</b><input type ="text" value="<?php echo $email ?>" id="formulario" name = "email" size = "30"></td>

	</table>

	<table border="2">

		<td><b>Equipamento:<input type ="text" id="formulario" name = "equipamento" value="<?php echo $equipamento ?>" maxlength="20" size = "20"></td>

		<td><b>Modelo:</b><input type ="text" id="formulario" name = "modelo" value="<?php echo $modelo ?>" maxlength="20" size = "20"></td>

		<td><b>Marca:</b><input type ="text" id="formulario" name ="marca" value="<?php echo $marca ?>" maxlength="15" size = "15"></td>	

		<td><b>Serial ou Imei:</b><input type ="text" id="formulario" name ="serial" value="<?php echo $serial ?>" maxlength="25" size = "25"></td><p>

		<td><b>Acessorios:</b><input type ="text" id="formulario" name ="acessorios" value="<?php echo $acessorios ?>" maxlength="25" size = "25"></td><p>

		<td><b>Detalhes e observações:</b><input type ="text" id="formulario" name ="detalhes" value="<?php echo $detalhes ?>" size = "99"></td>

	</table>	
	
	<table border="1">

	<br><b>Defeito / Reclamação:<b><td><textarea id="formulario" name="mensage" rows="10" cols="160"  size  = "99">

	<?php echo $defeito ?>
	
	</textarea>

	</table>

	<table border="1">

		<br><b>Serviços/Executados:<b><td><textarea id="formulario" name="servexec" rows="10" cols="160" size="99">

	<?php echo $servexec ?>		

		</textarea>

			</table>

		</td>

<select name="status">
    
    <option value="ABERTO">Reabrir OS</option>
    
    <option value="FINALIZADO">Encerrar OS</option>
    
    <option value="ORCAMENTO">Orcamento</option>
    
    <option value="EM ANDAMENTO">Em andamento</option>
    
    <option value="AGUARDANDO APROVACAO">Aguardando aprovacao</option>
    
    <option value="AGUARDANDO PECAS">Aguardando pecas</option>
    
    <option value="APROVADO">Aprovado</option>
    
    <option value="NAO APROVADO">Nao aprovado</option>
           
    <option value="GARANTIA">Garantia</option>
    
    <option value="SEM CONSERTO">Sem conserto</option>

    <option value="CANCELADO">Cancelado</option>

    
</select> 

    <input type="submit" id="btn-salvar" value="Salvar">
    

</form>

      <form method="POST" action="menu.php">

<p align ="left"> <input type="submit" id="btn-sair" value="Sair">

</form>


</body>

</html>

      












