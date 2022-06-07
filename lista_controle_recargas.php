<?php session_start() ?>

<html lang='pt-BR'>
    <head>
        <link rel='stylesheet' href='css/bootstrap-datepicker.min.css'>
        <link type ="text/css" rel="stylesheet" href="css/reset.css">	  			 	
        <link rel="stylesheet" href="css/bootstrap.css">  
        <link type="text/css" rel="stylesheet" href="stylesheet.css"> 	 
    </head>		     
    <title>Lista recargas</title>
    <body>
        <div id="container">
            <!--<h3><center>Controle Recargas</center></h3>-->   
            <div class="box">
                <!--Inicio -->
                <div class="form-row">  
                    <div class="form-group col-md-1">       
                        <label>Nº de Série:</label>
                        <form method="GET" action="lista_controle_recargas.php">	  
                            
                            <input type="text" class="form-control" name="serie"maxlength="8" size="8" autocomplete="off">	           
                            
                            <INPUT TYPE='image' SRC='images/lupa.png' width="15" height="14">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                        </form>  
                    </div>	
                               
                    
                </div>
            </div>
        </div>
        
        <!--fim do box--">  
        <!-- botoes -->
        <div class="form-group row">  
            <div class="col-xs-2">       
                <form method="POST"  action="form_controle_recargas.html">
                    <input type="submit" class="btn btn-success btn-sm" value="NOVO">&nbsp; 
                </form>  
            </div>             
            <div class="col-xs-4">  
                <form method="POST" action="menu.php">
                    <p align ="left">
                        <input type="submit" class="btn btn-dark btn-sm" value="VOLTAR">
                </form>  
            </div>
        </div>  
        <hr>
        <!-- <a title='Imprimir conteúdo' href='javascript:window.print()'><img src="images/imprimir.jpg" alt="Smiley face" height="20" width="30" border="0" /></a>-->
        <!-- -->
<?php
// Conexão ao banco:
require_once 'conexao.php';

// Session:
$usuario = $_SESSION['login'];

$sql = "SELECT * FROM recargas";

$consulta = mysqli_query($conexao,$sql);

if ( mysqli_error( $conexao ) == true ) {
				
				echo '<div class="error-mysql">';
				
				 echo( "Mysql query Erro! <br> " . mysqli_error( $conexao ) );
                 
                 echo '<br>';
    
                echo $sql;
				
				 echo '</div>';
				
				 mysqli_close( $conexao );
				
				 die;
				 } 
                 
echo '<table border style="width:100%">';
 echo '<tr>';
 echo '<td id="borda">#</td>';
 echo '<td id="borda">DESCRICAO:</td>';
 echo '<td id="borda">MARCA:</td>';
 echo '<td id="borda">COR:</td>';
 echo '<td id="borda">Nº SÉRIE:</td>';
 echo '<td id="borda">Nº DE RECARGAS:</td>';
 echo '<td id="borda">DATA ÚLTIMA RECARGA:</td>';
 echo '</div>';
 echo '</tr>';


 
// Armazena os dados da consulta em um array associativo:
while ( $registro = mysqli_fetch_assoc( $consulta ) ) {
	
    
    echo '<tr>';                           
	    echo '<td id="campos">'.$registro["cod"].'</td>';
        echo '<td id="campos">'.$registro["descricao"].'</td>';
        echo '<td id="campos">'.$registro["marca"].'</td>';
        echo '<td id="campos">'.$registro["cor"].'</td>';
        echo '<td id="campos">'.$registro["serie"].'</td>';
        echo '<td id="campos">'.$registro["nrecargas"].'</td>';
        echo '<td id="campos">'.$registro["dataultimarecarga"].'</td>';
             
 
				
	echo '</tr>';
				
}				 

echo '</table>';

?>
    </body>
    
</html>