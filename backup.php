<?php session_start() ?>

<!DOCTYPE html>
<html>
		<head>
		
		<link type="text/css" rel="stylesheetcss" href="stylesheet.css"/>
             
        <?php echo $sweet = $_SESSION['sweet_alert'];
?>  
      <link rel="stylesheet" href="css/bootstrap.css">  
</head>

<body>
    
     
<?php

date_default_timezone_set( "America/Sao_Paulo" );

$usuario = $_SESSION['login'];
// Conexao com banco de dados
require_once 'conexao.php';

// Data
$data = date( 'Ymd' );

$dia = date( 'd' );

// Executa script de backup:
// Para executar o backup, deixar o backup.bat e rar.exe na pasta do sistema
// Caminho Xampp
shell_exec( 'backup_ordemserv.bat' );


// Local onde gera BKP do banco de dados:
$caminho_bkp = "C:/Backup/bk$dia.rar";


// Verifico se foi gerado o arquivo na pasta backup:
if ( file_exists( $caminho_bkp ) ) {
				
				// echo '<img src="images/carregando.gif" alt="Smiley face" height="50" width="50">';
				// SQL:
				$sql = "UPDATE BACKUP SET databackup = '$data'";
				
				mysqli_query( $conexao, $sql ) or die ( "Erro ao gerar SQL!" );
				
// Java script Sweet alert:
				echo "<script>
swal('Backup gerado com sucesso!')
.then((value) => {
             window.location.href='menu.php';
});

</script>";
				
				
				// Fecha conexao
				
				mysqli_query( $conexao, $sql ) or die ( "Erro ao gerar SQL!" );			
             
                
				} else {
				
				// Java script Sweet alert
				echo "<script>
swal('Nao foi possivel gerar arquivo de backup')
.then((value) => {
             window.location.href='menu.php';
});

</script>";
				
				} 

mysqli_close( $conexao );

?>

</html>

</body>