<?php session_start() ?>      
   	
<?php

$usuario = $_SESSION['login'];

// conexao com banco
require_once 'conexao.php';


// Pega o ultimo registro gravado no banco e grava na variavel $os
 $result = mysqli_query( $conexao, "SELECT MAX(numeroord) FROM ordem" );

 $row = mysqli_fetch_row( $result );

 $os = $row[0];

// Faz consulta no banco com a variavel gravada $os
$sql = "select * from ordem where numeroord = '$os'";

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

// Pega os dados retornados da query e transforma em array
while ( $row = mysqli_fetch_array( $consulta ) ) {
				
	$numeroord = $row[0];
				
	$dataentr = $row[1];
				
	$horacheg = $row[2];
				
	$nome = $row[4];
				
	$endereco = $row[5];
				
	$bairro = $row[6];
				
	$cidade = $row[7];
				
	$uf = $row[8];
				
	$cep = $row[9];
				
	$telef = $row[12];
			
	$modelo = $row[15];
				
	$marca = $row[16];
				
	$acessorios = $row[18];
				
	$mensage = $row[20];
				
} 


?>
<!DOCTYPE html>
 
<html>
	
			<meta charset="utf-8">
    
			<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
		
			<link rel='stylesheet' href='css/bootstrap-datepicker.min.css'>
    
			<link type ="text/css" rel="stylesheet" href="css/menu.css">
    
			<link type="text/css" rel="stylesheet" href="stylesheet.css">
    


	<title>Via cliente</title>


<body>
   
   
  <div id="comprovante"> 
   
	<h1>COMPROVANTE DE ENTRADA - OS NUMERO: <?php echo $numeroord ?> Hora:<?php echo $horacheg ?> Data:<?php echo $dataentr ?>
	
  </h1>
_________________________________________________________________________________________________________________________________________________________________	
  
  <h3>Cliente: <?php echo $nome ?>     Tel:<?php echo $telef ?></h3>

	<h3>Endereco:<?php echo $endereco ?></h3>     

	<h3>CPF/CNPJ: <?php $cpjcnpj ?> Bairro:<?php echo $bairro ?> Cidade: <?php echo $cidade ?> UF: <?php echo $uf ?> CEP:<?php echo $cep ?></h3>

	<h3>Equipamento:</h3>
	
	<h3>Acessorios:<?php echo $acessorios ?></h3>

	<h3>Problema informado:<?php echo $mensage ?></h3>

	 <label for="problema_const">Problema constado: </label>
  
  <input type="text" id ="problema_const" name= "problema_const"  maxlength="80" size="80"><br>

  <label for="serv_executado">Serviço executado:</label>

 <input type="text" id="serv_executado" name="serv_executado" maxlength="80" size="80">


	_________________________________________________________________________________________________________________________________________________________________  
  

	<h2>SOBRE A GARANTIA DOS SERVIÇOS:</h2>
	
	<p>1 - GARANTIA DE 3 MESES
	   2 - GARANTIA COBRE APENAS O SERVIÇO FEITO E TROCA DE PEÇAS
	   3 - Não remova o lacre da garantia do equipamento.
	   4 - Guarde esta nota, ela é o comprovante da sua garantia, e será necessária em caso de problemas
	   com o aparelho.		
		

_________________________________________________________________________________________________________________________________________________________________ 

	<h2>ESTE RECEBIBO VALE COMO NOTA FISCAL DO SERVIÇO
_________________________________________________________________________________________________________________________________________________________________ 

<h3>Responsável:<?php echo $usuario ?></h3>			

<h3>Situação:<?php $status ?></h3>                  

<h3>Data Saída:<?php $datasaida ?></h3>

<h3>Hora Sáida:>? $horasaida ?></h3>    

  <label for="produtos">VALOR PRODUTOS:</label>

 <input type="text" id="produtos" name="produtos" maxlength="6" size="6">

  
  </div>
  
</body>

</html>

<html>

     

