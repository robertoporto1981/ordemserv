<?php session_start() ?>
<html>
    <head>

        <?php echo $sweet = $_SESSION['sweet_alert'];
?>

</head>

<body>

<?php

$usuario = $_SESSION['login'];

// Pega as variaveis metodo post
// $codigo = $_POST['cod'];
$codigo = $_SESSION['cod'];

// $nome = $_POST['nome'];
$nomefant = $_POST['nomefant'];

$datanasc = $_POST['datanasc'];

$rg = $_POST['rg'];

$cpf = $_POST['cpf'];

$cnpj = $_POST['cnpj'];

$tipo = $_POST['tipo'];

$cep = $_POST['cep'];

$rua = $_POST['rua'];

$numero = $_POST['numero'];

// $complemento = $_POST['complemento'];
// $bairro = $_POST['bairro'];
// $cidade = $_POST['cidade'];
$uf = $_POST['uf'];

$telefone = $_POST['telefone'];

$celular = $_POST['celular'];

$email = $_POST['email'];



if ( $_POST['site'] == null or true ) {
				
	$site = $_POST['site'];
				
} else {
				
	$site = $_SESSION['site'];
} 

$observ = ltrim( $_POST['observ'] );

// Remove caracteres e acentos:
$string = array ( utf8_decode( strtoupper( $_POST['nome'] ) ), utf8_decode( strtoupper( $_POST['rua'] ) ), utf8_decode( strtoupper( $_POST['bairro'] ) ), utf8_decode( strtoupper( $_POST['cidade'] ) ), utf8_decode( strtoupper( $_POST['complemento'] ) ), utf8_decode( strtoupper( $_POST['observ'] ) ) );

$caracteres_sem_acento = array( 
				
				'�' => 'S', '�' => 's', '�' => 'Dj', '?' => 'Z', '?' => 'z', '�' => 'A', '�' => 'A', '�' => 'A', '�' => 'A', '�' => 'A',
				
				 '�' => 'A', '�' => 'A', '�' => 'C', '�' => 'E', '�' => 'E', '�' => 'E', '�' => 'E', '�' => 'I', '�' => 'I', '�' => 'I',
				
				 '�' => 'I', '�' => 'N', 'N' => 'N', '�' => 'O', '�' => 'O', '�' => 'O', '�' => 'O', '�' => 'O', '�' => 'O', '�' => 'U', '�' => 'U',
				
				 '�' => 'U', '�' => 'U', '�' => 'Y', '�' => 'B', '�' => 'Ss', '�' => 'a', '�' => 'a', '�' => 'a', '�' => 'a', '�' => 'a',
				
				 '�' => 'a', '�' => 'a', '�' => 'c', '�' => 'e', '�' => 'e', '�' => 'e', '�' => 'e', '�' => 'i', '�' => 'i', '�' => 'i',
				
				 '�' => 'i', '�' => 'o', '�' => 'n', 'n' => 'n', '�' => 'o', '�' => 'o', '�' => 'o', '�' => 'o', '�' => 'o', '�' => 'o', '�' => 'u',
				
				 '�' => 'u', '�' => 'u', '�' => 'u', '�' => 'y', '�' => 'y', '�' => 'b', '�' => 'y', '�' => 'f',
				
				 'a' => 'a', '�' => 'i', '�' => 'a', '?' => 's', '?' => 't', 'A' => 'A', '�' => 'I', '�' => 'A', '?' => 'S', '?' => 'T',
				
				 );

// Variaveis tratadas:
$nome = strtoupper( strtr( $string[0], $caracteres_sem_acento ) );

$rua = strtoupper( strtr( $string[1], $caracteres_sem_acento ) );

$bairro = strtoupper( strtr( $string[2], $caracteres_sem_acento ) );

$cidade = strtoupper( strtr( $string[3], $caracteres_sem_acento ) );

$complemento = strtoupper( strtr( $string[4], $caracteres_sem_acento ) );

$observ = strtr( $string[5], $caracteres_sem_acento );


// Conecta com banco de dados
require_once 'conexao.php';

// Atualiza dos dados na tabela clientes
// echo $sql = ("UPDATE clientes SET nome = '$nome',nomefant = '$nomefant', datanasc = '$datanasc',rg='$rg', cpf = '$cpf',cnpj = '$cnpj',tipo = '$tipo', cep ='$cep',rua = '$rua', numero = '$numero',complemento = '$complemento', bairro = '$bairro' ,cidade = '$cidade',uf = '$uf' ,telefone = '$telefone',celular ='$celular', email ='$email',site ='$site',observ = '$observ' WHERE cod ='{$codigo}'");
$sql = ( "UPDATE clientes SET nome = '$nome',nomefant = '$nomefant', datanasc = '$datanasc',rg='$rg', cpf = '$cpf',cnpj = '$cnpj',tipo = '$tipo', cep ='$cep',rua = '$rua', numero = '$numero',complemento = '$complemento', bairro = '$bairro' ,cidade = '$cidade',uf = '$uf' ,telefone = '$telefone',celular ='$celular', email ='$email',site ='$site',observ = '$observ', status ='' WHERE cod = '$codigo'" );

mysqli_query( $conexao, $sql );

if ( mysqli_error( $conexao ) == true ) {
				
	echo '<div class="error-mysql">';
				
	echo( "Mysql query Erro! <br> " . mysqli_error( $conexao ) );
				
	echo '<br>';
				
	echo $sql;
				
	echo '</div>';
				
	mysqli_close( $conexao );
				
				
	die;
				
} 

mysqli_close( $conexao );


// echo"<script language='javascript' type='text/javascript'>alert('Cliente alterado com sucesso!');window.location.href='_altera_cliente.php?nome={$nome}'</script>";
// Java script Sweet alert
echo "<script>
swal('Cliente alterado com sucesso!')
.then((value) => {
             window.location.href='_altera_cliente.php?codigo={$codigo}';
});

</script>";



?>

</body>
    
    </html>