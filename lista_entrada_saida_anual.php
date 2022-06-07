<?php session_start() ?>

<?php date_default_timezone_set("America/Sao_Paulo");?>

<?php include 'conexao.php'; ?>

<html lang='pt-BR'>    
    
    <head>	 	         
    
        <meta charset='utf-8'>	          
    
        <link rel='stylesheet' href='css/bootstrap-datepicker.min.css'>	          
    
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>                 
    
        <link type ="text/css" rel="stylesheet" href="css/reset.css">	         
    
        <link type ="text/css" rel="stylesheet" href="css/bootstrap.min.css">       
        
        <link rel="stylesheet" href="css/bootstrap.css">
        
        <link type="text/css" rel="stylesheet" href="stylesheet.css"> 
               
        <title>Relatorio Mês</title>
        	     
    </head>
             
    <h3><center>RELATÓRIO ANUAL</center></h3>             
    
    <form method="get" action="lista_entrada_saida_anual.php">         
    
        <div class="box-entradas-saidas-mes">      	
            
                <label for="ano">Ano base:</label>
                
                    <input type = "text" name="ano" maxlength="4" size="4" value="<?php echo $ano = $_GET['ano']; ?>" autocomplete="off">         
                       
        <input type="submit"  id="btn-sair"  value="OK"/> <button onclick="window.close()" id="btn">Sair</button> <!--<?php echo $_SESSION['ano'] ?>  -->
        
    
        </div>
        
    </form>    
    <br>
  


<?php

$ano = $_GET['ano'];  

$_SESSION['ano'] = $ano;

    if($_GET['ano'] >2000){
    
    echo '<iframe src="http://localhost/projects/ordemserv/lista_entrada_saida_anual2.php?ano='.$ano.'" style="border: 0" width="1280" height="750" frameborder="0"  scrolling="no"></iframe>';
  
}
?>


