<?php session_start(); ?>

<!DOCTYPE html>
<html>
		<head>
		
		<link type="text/css" rel="stylesheetcss" href="stylesheet.css"/>

</head>

<body>    

<?php

date_default_timezone_set("America/Sao_Paulo");  

$usuario = $_SESSION['login'];
//Conexao com banco de dados

require_once 'conexao.php';

//Data
$data = date('d/m/Y');

$dia = date('d');

//Executa script de backup:                               	

//Caminho Xampp
exec("C:/xampp/htdocs/projects/ordemserv/app/backup.bat");

//Local onde gera BKP do banco de dados:
$caminho_bkp = "C:/Backup/bk$dia.rar";


//Verifico se foi gerado o arquivo na pasta backup:
if(file_exists($caminho_bkp)){

//echo '<img src="images/carregando.gif" alt="Smiley face" height="50" width="50">';
	
//SQL:

$sql = "UPDATE BACKUP SET databackup = '$data'"; 

	
echo"<script language='javascript' type='text/javascript'>alert('Backup efetuado com sucesso!');window.location.href='menu.php'</script>";	

//


mysqli_query($conexao,$sql) or die ("Erro ao gerar SQL!");

}else{

	echo "<br>";
	
	echo "Nao foi possivel gerar arquivo de backup!";
}
	
mysqli_close($conexao);
	
?>

</html>

</body>