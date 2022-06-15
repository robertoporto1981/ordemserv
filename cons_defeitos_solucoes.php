<?php session_start() ?>
<?php $_SESSION['pagina'] = "cons_defeitos_solucoes.php"; ?>
<?php $_SESSION['tabela'] = "ordem"; ?>

<?php require_once 'testa_login.php' ?>

<!DOCTYPE html>
<html lang='pt-BR'>  
    <head>         
        <meta charset='utf-8'>                    
        <link rel='stylesheet' href='css/bootstrap-datepicker.min.css'>                     
        <?php echo $sweet = $_SESSION['sweet_alert'];
?>
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>                
        <link type ="text/css" rel="stylesheet" href="css/reset.css">               
        <link rel="stylesheet" href="css/bootstrap.css">
        <link type="text/css" rel="stylesheet" href="stylesheet.css">
    </head>
    <body>			            
        <title>Solucoes</title>
             
        <h3><center>DEFEITOS / SOLUÇÕES</center></h3>
        <p>
            <input type="button" class="btn btn-dark btn-sm" onclick="window.close()" value="Sair" />
            <a href="javascript:void()" onclick="window.close()">
</html>
</body>	    

<?php

require_once 'conexao.php';
require 'paginacao.php';

$usuario = $_SESSION['login'];

// Query banco de dados:
 $sql = "select * from ordem where status ='FINALIZADO' and servexec <> ' ' order by numeroord asc LIMIT $inicio, $qnt";

 $consulta = mysqli_query( $conexao, $sql );
 $resultado = mysqli_num_rows( $consulta );

// Tabelas:
echo '<table class="table table-bordered">
    
    <thead class="thead-dark">
    
    <tr>
    
      <th scope="col">OS:</th>
    
      <th scope="col">DATA:</th>
    
      <th scope="col">EQUIPAMENTO:</th>
    
      <th scope="col">MARCA:</th>
    
      <th scope="col">MODELO:</th>
    
      <th scope="col">DEFEITO:</th>
    
      <th scope="col">SOLUÇÃO:</th>
    
    </tr>
  	
  	</thead>';


while ( $registro = mysqli_fetch_assoc( $consulta ) ) {
				
// Data:
			$Data = $registro["dataentr"];
							 		
			$data = date('d/m/Y',strtotime($Data));
				 
				
// Dados da tabela:
			echo '<tbody>';
				
			echo '<tr>';
				
			echo '<td>' . $registro["NumeroOrd"] . '</td>';
				
			echo '<td>' . $data . '</td>';
				
			echo '<td>' . $registro["equipamento"] . '</td>';
				
			echo '<td>' . $registro["marca"] . '</td>';
				
			echo '<td>' . $MODELO = $registro["modelo"] . '</td>';
				
			echo '<td>' . $DEFEITO = $registro["mensage"] . '</td>';
				
			echo '<td>' . $SOLUCAO = trim( $registro["servexec"] ) . '</td>';
				
			echo '</tr>';
				
			echo '</tbody>';
				
				
} 

echo '</table>';

?>

<br>
     
