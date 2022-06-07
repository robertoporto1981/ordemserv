<?php session_start() ?>

<?php
 
 include 'time_zone';
 
$usuario = strtoupper($_SESSION['login']); 	 

require_once 'testa_login.php';	
  
 // if(isset($_POST['nome']) and trim($_POST['nome']) <> ""){
		
   // $nome = $_POST["nome"];
	
  //}else{ 
  
  //echo"<script language='javascript' type='text/javascript'>alert('O campo nome e obrigatorio!');onclick=history.go(-1)</script>";
//
       	
    //$data=date('d/m/Y');   	
	
//$nome = strtoupper($_POST['nome']);

$nomefant = strtoupper($_POST['nomefant']);

$rg = $_POST['rg'];

$cpf =  $_POST['cpf'];
	
$cnpj = $_POST['cnpj'];
	
$tipo = strtoupper($_POST['tipo']);

$data_nascimento = $_POST['datanasc'];

$dia = substr( "$data_nascimento", 8, 9 );
				
$mes = substr( "$data_nascimento", 5,2  );
				
$ano = substr( "$data_nascimento", 0, 4 );
				
$datanasc = "$ano$mes$dia";    	

//$datanasc = $_POST['datanasc']; //formatar data de nascimento
	
$cep =  $_POST['cep'];
   
//$rua = strtoupper($_POST['rua']);
	
$numero = $_POST['numero'];
		
//$complemento = strtoupper($_POST['complemento']);
		
//$bairro = strtoupper($_POST['bairro']);
		
//$cidade = strtoupper($_POST['cidade']);
		
$uf = strtoupper($_POST['uf']);	
		
$telefone = $_POST['telefone'];

$celular = $_POST['celular'];
   
$email = $_POST['email'];

$site = $_POST['site'];

//$observ = strtoupper($_POST['observ']);

$datacad = date('Ymd');

//Remove caracteres e acentos:
$string = array (utf8_decode(strtoupper($_POST['nome'])),utf8_decode(strtoupper($_POST['rua'])),utf8_decode(strtoupper($_POST['bairro'])),utf8_decode(strtoupper($_POST['cidade'])),utf8_decode(strtoupper($_POST['complemento'])),utf8_decode(strtoupper($_POST['observ'])));

$caracteres_sem_acento = array(

    '�'=>'S', '�'=>'s', '�'=>'Dj','?'=>'Z', '?'=>'z', '�'=>'A', '�'=>'A', '�'=>'A', '�'=>'A', '�'=>'A',

    '�'=>'A', '�'=>'A', '�'=>'C', '�'=>'E', '�'=>'E', '�'=>'E', '�'=>'E', '�'=>'I', '�'=>'I', '�'=>'I',

    '�'=>'I', '�'=>'N', 'N'=>'N', '�'=>'O', '�'=>'O', '�'=>'O', '�'=>'O', '�'=>'O', '�'=>'O', '�'=>'U', '�'=>'U',

    '�'=>'U', '�'=>'U', '�'=>'Y', '�'=>'B', '�'=>'Ss','�'=>'a', '�'=>'a', '�'=>'a', '�'=>'a', '�'=>'a',

    '�'=>'a', '�'=>'a', '�'=>'c', '�'=>'e', '�'=>'e', '�'=>'e', '�'=>'e', '�'=>'i', '�'=>'i', '�'=>'i',

    '�'=>'i', '�'=>'o', '�'=>'n', 'n'=>'n', '�'=>'o', '�'=>'o', '�'=>'o', '�'=>'o', '�'=>'o', '�'=>'o', '�'=>'u',

    '�'=>'u', '�'=>'u', '�'=>'u', '�'=>'y', '�'=>'y', '�'=>'b', '�'=>'y', '�'=>'f',

    'a'=>'a', '�'=>'i', '�'=>'a', '?'=>'s', '?'=>'t', 'A'=>'A', '�'=>'I', '�'=>'A', '?'=>'S', '?'=>'T',

);

//Variaveis tratadas:
$nome = strtoupper(strtr($string[0], $caracteres_sem_acento));

$rua = strtoupper(strtr($string[1], $caracteres_sem_acento));

$bairro = strtoupper(strtr($string[2], $caracteres_sem_acento));

$cidade = strtoupper(strtr($string[3], $caracteres_sem_acento));

$complemento = strtoupper(strtr($string[4], $caracteres_sem_acento));

$observ = strtr($string[5], $caracteres_sem_acento);

//Conexao:
require_once 'conexao.php';

$sql2 = "INSERT INTO clientes VALUES "; 

echo $sql2 .= "(' ','$nome','$nomefant','$rg','$cpf','$cnpj','$tipo','$datanasc','$cep','$rua', '$numero','$complemento', '$bairro' , '$cidade', '$uf' , '$telefone','$celular','$email','$observ','$usuario','$datacad','$site','')";
	  
mysqli_query($conexao,$sql2);

if(mysqli_error($conexao) == TRUE){
	
	echo '<div class="error-mysql">';

	echo("Mysql query Erro! <br> " . mysqli_error($conexao));
    
    echo '<br>';
    
    echo $sql2;

	echo '</div>';
 
	mysqli_close($conexao);
	
	die;
}


mysqli_close($conexao);

echo"<script language='javascript' type='text/javascript'>alert('Cliente cadastrado com sucesso!');window.location.href='form_cadastro_cliente.html'</script>";
	

header('Location:_altera_cliente.php?nome='.$nome);

?>

    