  <?php  session_start(); ?>

<?php
   

$usuario = $_SESSION['login']; 

//conexao com banco

require_once 'conexao.php';

//Pega o ultimo registro gravado no banco e grava na variavel $os

$result = mysqli_query($conexao,"SELECT MAX(numeroord) FROM ordem");
  
$row = mysqli_fetch_row($result);
  
$os = $row[0]; 
  
//Faz consulta no banco com a variavel gravada $os

$sql = "select * from ordem where numeroord = '$os'";
                                              	     
$consulta = mysqli_query($conexao,$sql);
	 
$resultado = mysqli_num_rows($consulta);
   
//Pega os dados retornados da query e transforma em array
   
while ($ordem = mysqli_fetch_array($consulta)) {
           
           
		$numeroord = $ordem[0]; 

		$dataentr = $ordem[1];

		$horacheg = $ordem[2];
		
		$nome = $ordem[4];
		
		$endereco = $ordem[5];
		
		$bairro = $ordem[6];
		
		$cidade = $ordem[7];
		
		$uf = $ordem[8];
		
		$cep = $ordem[9];
		
		$telef = $ordem[12];

		$equipamento = $ordem["ordem"];
		
		$modelo = $ordem[15];
		
		$marca = $ordem[16];
		
		$acessorios = $ordem[18];

		$detalhes = $ordem["detalhes"];

		$defeito = $ordem["mensage"];
		
		$mensage = $ordem[20];
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
   
	<h1>COMPROVANTE DE ENTRADA</h1>

	 <h2>ORDEM DE SERIVÇO Nº <?php echo $numeroord ?> <h2>

	<h3>Hora:<?php echo $horacheg ?></h3>

	<h3> Data:<?php echo $dataentr = date('d/m/Y') ?></h3>
	
  
_________________________________________________________________________________________________________________________________________________________________	
  
  <h3>Cliente: <?php echo $nome ?>     Tel:<?php echo $telef ?></h3>

	<h3>Endereco:<?php echo $endereco ?></h3>     

	<h3>CPF/CNPJ: <?php $cpjcnpj ?> Bairro:<?php echo $bairro ?> Cidade: <?php echo $cidade ?> UF: <?php echo $uf ?> CEP:<?php echo $cep ?></h3>

	<h3>Equipamento:<?php echo $equipamento ?></h3>
	
	<h3>Acessorios:<?php echo $acessorios ?></h3>

	<h3>Detalhes:<?php echo $detalhes ?></h3>

	<h3>Problema informado:<?php echo $defeito ?></h3>

	_________________________________________________________________________________________________________________________________________________________________  
  

	<h2>CONDICOES DE SERVICOS:</h2>
	
	<p>O(s) equipamento(s) nao retirados apos 90 dias da comunicacao ao cliente, sera(ao) considerados(s)
	abandonados(s), em consequencia serao incorporados como propriedade da empresa e vendidos para ressarcimento das 
	despesas do servico.</p>

_________________________________________________________________________________________________________________________________________________________________ 
  

<h3>Data Entrega/Entrada:<?php echo $dataentr ?> Hora:<?php echo $horacheg ?>  </h3>

Visto Eletronica:__________________________________________________

<h3>Tecnico Responsavel:<?php echo $usuario ?>_______________________________________	</h3>


Visto:   <?php echo $nome ?> __________________________________________________________<br>



____________________________     ________________________________________________________________
	(X)Via do cliente   	     ( )Via da Empresa		

     

  
  </div>
  
</body>

</html>

<html>

     

<body>
   
    <br>
    <br>
    <br>
    <br>
     
    
  <div id="comprovante"> 
   
	<h1>COMPROVANTE DE ENTRADA - OS NUMERO: <?php echo $numeroord ?> Hora:<?php echo $horacheg ?> Data:<?php echo $dataentr ?>
	
  </h1>
_________________________________________________________________________________________________________________________________________________________________	
  
  <h3>Cliente:<?php echo $nome ?>     Tel:<?php echo $telef ?></h3>

	<h3>Endereco:<?php echo $endereco ?></h3>     

	<h3>CPF/CNPJ: <?php $cpjcnpj ?> Bairro:<?php echo $bairro ?> Cidade: <?php echo $cidade ?> UF: <?php echo $uf ?> CEP:<?php echo $cep ?></h3>

	<h3>Equipamento:<?php echo $equipamento ?></h3>
	
	<h3>Acessorios:<?php echo $acessorios ?></h3>
	
	<h3>Detalhes:<?php echo $detalhes ?></h3>

	<h3>Problema informado:<?php echo $defeito ?></h3>
	_________________________________________________________________________________________________________________________________________________________________  
  

	<h2>CONDICOES DE SERVICOS:</h2>
	
	<p>O(s) equipamento(s) nao retirados apos 90 dias da comunicacao ao cliente, sera(ao) considerados(s)
	abandonados(s), em consequencia serao incorporados como propriedade da empresa e vendidos para ressarcimento das 
	despesas do servico.</p>

_________________________________________________________________________________________________________________________________________________________________ 
  



<h3>Tecnico Responsavel:<?php echo $usuario ?>_______________________________________	</h3>

Visto Eletronica:____________________________________________________________________


Visto:   <?php echo $nome ?> __________________________________________________________<br>



____________________________    ________________________________________________________________
	( )Via do cliente   	     (X)Via da Empresa

   
      

  
  </div>
  
</body>

</html>
