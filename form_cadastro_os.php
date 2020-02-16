<?php session_start() ?>

<?php

date_default_timezone_set("America/Sao_Paulo");
  
    $usuario = $_SESSION['login'];
   
    //$numeroord = $_POST['numeroord'];
	
    $dataentrada = $_POST['dataentr'];

    $dataentrada = date('dmY');
	
    $horachegada = $_POST['horacheg'];
	
    $prevsaid = $_POST['prevsaid'];

    $prevsaid = date('dmY');
  
    $cliente = strtoupper($_POST['cliente']);
	
    $ender = strtoupper($_POST['ender']);
	
    $bairro = strtoupper($_POST['bairro']);
	
    $cidade = strtoupper($_POST['cidade']);   
	
    $uf = strtoupper($_POST['uf']);
	
    $cep = $_POST['cep'];
	
    $cpfcnpj = $_POST['cpfcnpj'];
	
    $rg = $_POST['rg'];
	
    $telef = $_POST['telef'];
	
    $telef2 = $_POST['telef2'];
	
    $email = $_POST['email'];

    $equipamento = strtoupper($_POST['equipamento']);
	
    $modelo = strtoupper($_POST['modelo']);
	
    $marca = strtoupper($_POST['marca']);
	
    $serial = strtoupper($_POST['serial']);
	
    $acessorios = strtoupper($_POST['acessorios']);
	
    $detalhes = strtoupper($_POST['detalhes']);
	
    $mensage = $_POST['mensage'];
  
    $status = strtoupper("aberto");
     
	
//Conexao

require_once 'conexao.php';

	
  $sql = "INSERT INTO ordem VALUES ";
	
  $sql .= "(' ','$dataentrada','$horachegada', '$prevsaid','$cliente', '$ender', '$bairro' , '$cidade', '$uf','', '$cep', '$cpfcnpj', '$rg', '$telef', '$telef2','$email', '$modelo', '$marca', '$serial', '$acessorios', '$detalhes','$mensage','$status','$usuario','$equipamento')"; 
	  

mysqli_query($conexao,$sql) or die("Erro ao tentar cadastrar registro");

     
      
$result = mysqli_query($conexao,"SELECT MAX(numeroord) FROM ordem");
  
$row = mysqli_fetch_row($result);
  
$highest_id = $row[0];
//    
  echo"<script language='javascript' type='text/javascript'>alert('OS numero: $highest_id')</script>"; 
  
  echo"<script language='javascript' type='text/javascript'>;window.location.href='comprovante_os.php'</script>";

mysqli_close($conexao);

?>
