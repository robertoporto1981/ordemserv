<?php session_start() ?>

<?php //Session da Paginação: ?>
<?php $_SESSION['pagina']= "lista_clientes.php"; ?>
<?php $_SESSION['tabela'] = "clientes"; ?>

<html lang='pt-BR'>
    <head>
        <link rel='stylesheet' href='css/bootstrap-datepicker.min.css'>
        <link type ="text/css" rel="stylesheet" href="css/reset.css">	  			 	
        <link rel="stylesheet" href="css/bootstrap.css">  
        <link type="text/css" rel="stylesheet" href="stylesheet.css"> 	 
    </head>		     
    <title>Clientes</title>
    <body>
        <div id="container">
            <!--<h3><center>CLIENTES</center></h3>-->   
            <div class="box">
                <!--Inicio -->
                <div class="form-row">  
                    <div class="form-group col-md-1">       
                        <label>Código:</label>
                        <form method="GET" action="_altera_cliente.php">	  
                            <input type="text" class="form-control" name="codigo"maxlength="8" size="8" autocomplete="off">	           
                            <!--<INPUT TYPE='image' SRC='images/lupa.png' width="15" height="14">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;--> 
                        </form>  
                    </div>	
                    <div class="form-group col-md-3">     
                        <label>Nome:</label>
                        <form method="GET" action="_altera_cliente.php">
                            <!--<input type="text" name = "busca" size="50"><!--<input type="submit" value="Pesquisa">-->	 
                            <input type="text" class="form-control" name="nome" size="30" autocomplete="off">   
                            <!--<INPUT TYPE='image' SRC='images/lupa.png' width="15" height="14">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-->
                        </form>  
                    </div>  
                    <div class="form-group col-md-3">     
                        <form method ="GET" action="_altera_cliente.php">
                            <label>Fantasia:</label>                                
                            <input type="text" class="form-control" name="nomefant" size="60" autocomplete="off">    
                            <!--<INPUT TYPE='image' SRC='images/lupa.png' width="15" height="14">-->
                        </form>    
                    </div>  
                    <div class="form-group col-md-2">         
                        <form method="GET" action="_altera_cliente.php">            
                            <label>CNPJ:</label>	       
                            <input type="text" class="form-control" name="cnpj" size="13" autocomplete="off">		  
                            
                        </form>  
                    </div>     
                    <div class="form-group col-md-2">     	
                        <form method="GET" action="_altera_cliente.php">
                            <label>CPF:</label>	
                            <input type="text" class="form-control" name="cpf" size="13" autocomplete="off">		
                            <!--<INPUT TYPE='image' SRC='images/lupa.png' width="15" height="14">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-->
                        </form>    
                    </div>  
                    <div class="form-group col-md-2">      
                        <form method="GET" action="_altera_cliente.php">
                            <label>RG:</label>	
                            <input type="text" class="form-control" name="rg" size="13" autocomplete="off" required>	
                            <!--	<INPUT TYPE='image' SRC='images/lupa.png' width="15" height="14">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-->
                        </form>  
                    </div>       
                    </form>
                    <div class="form-group col-md-3">
                        <form method="GET" action='_altera_cliente.php'>	
                            <label>Observação:</label>    
                            <input type="text" class="form-control" name="observ" size="50" required>    
                            <!--<INPUT TYPE='image' SRC='images/lupa.png' width="15" height="14" autocomplet="off">-->
                        </form>  
                        
                                                
                        <div class="clientes-inativos">
                            <form method="GET" action='lista_clientes.php'>
                        
                                <label>Inativos</label>&nbsp;            
                        
                                <input type="checkbox" id="desativado" name="desativado" value="D">                                                          
                                                
                                <INPUT TYPE='image' SRC='images/lupa.png' width="15" height="14" autocomplete="off">
                         </div>
                         
                        
                        </form>
                    </div> 
                    <!--Fim do box clientes-inativos-->
                </div>
            </div>
        </div>
        </div>
        <!--fim do box--">  
        <!-- botoes -->
        <div class="form-group row">  
            <div class="col-xs-2">       
                <form method="POST"  action="form_cadastro_cliente.html">
                    <input type="submit" class="btn btn-success btn-sm" value="NOVO">&nbsp; 
                </form>  
            </div>  
            <div class="col-xs-3">  
                <form method="POST"  action="exporta_clientes_xls.php">
                    <input type="submit" class="btn btn-secondary btn-sm" value="EXCEL">&nbsp; 
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
//Páginação:
require 'paginacao.php';

// Session:
$usuario = $_SESSION['login'];

 $observacao_cliente = ( $_GET['observ'] );

 $nome_cliente = $_GET['nome'];

 $fantasia_cliente = $_GET['nomefant'];

 $cliente_status = $_GET['desativado'];

// Busca cliente destativado status = D:
if ( $cliente_status == "D" ) {
				
				 $sql = "select * from clientes where status = 'D' LIMIT $inicio, $qnt";
				
				 $consulta = mysqli_query( $conexao, $sql );
				
				 } 
// Busca nome cliente:
if ( $nome_cliente == TRUE) {
				
				 $sql = "select * from clientes where nome like ('%$nome_cliente%') order by nome asc LIMIT $inicio, $qnt";
				
				 $consulta = mysqli_query( $conexao, $sql );
				 } 
// Busca observacao cliente:
if ( $observacao_cliente == true ) {
				
				$sql = "select * from clientes where observ like ('%$observacao_cliente%') order by nome asc LIMIT $inicio, $qnt";
				
				 $consulta = mysqli_query( $conexao, $sql );
				
				 } 

// Busca observacao cliente:
if ( $fantasia_cliente == true ) {
				
				$sql = "select * from clientes where nomefant like ('%$fantasia_cliente%') and status <> 'D' order by nome asc LIMIT $inicio, $qnt";
				
				 $consulta = mysqli_query( $conexao, $sql );
				
				 } 

if ( $observacao_cliente == false AND $nome_cliente == false AND $fantasia_cliente == false AND $cliente_status != "D" ) {
				
				 $sql = "SELECT * FROM clientes WHERE status <> 'D' ORDER BY nome ASC LIMIT $inicio,$qnt";
				
				 $consulta = mysqli_query( $conexao, $sql );
				
				 } 

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
               echo '<td id="borda">CÓDIGO:</td>';
               echo '<td id="borda">NOME:</td>';
               echo '<td id="borda">FANTASIA:</td>';
               echo '<td id="borda">DATA CADASTRO:</td>';
               echo '<td id="borda">ENDEREÇO:</td>';
               echo '<td id="borda">NUMERO:</td>';
               echo '<td id="borda">BAIRRO:</td>';
               echo '<td id="borda">CIDADE:</td>';
               echo '<td id="borda">UF:</td>';
               echo '<td id="borda">TELEFONE:</td>';
               echo '<td id="borda">CELULAR:</td>';
 // echo '<td id="borda">E-MAIL:</td>';
               //echo '<td id="borda">SITE:</td>';
                echo '<td id="borda">WHATSAPP:</td>';
    echo '</div>';
echo '</tr>';
// Armazena os dados da consulta em um array associativo:
while ( $registro = mysqli_fetch_assoc( $consulta ) ) {
				echo '<tr>';
				 echo '<td id="campos"><a href="_altera_cliente.php?codigo=' . $registro["cod"] . '&desativado=' . $cliente_status . '"#"x><img src="images/edit.png"></td>';
				 echo '<td id="campos">' . $registro["cod"] . '</td>';
				 echo '<td id="campos">' . trim( $registro["nome"] ) . '</td>';
				 echo '<td id="campos">' . trim( $registro["nomefant"] ) . '</td>';
				 echo '<td id="campos">' . date('d/m/Y',strtotime($registro['datacad'])) . '</td>';
				 echo '<td id="campos">' . strtoupper( $registro["rua"] ) . '</td>';
				 echo '<td id="campos">' . $registro["numero"] . '</td>';
				 echo '<td id="campos">' . strtoupper( $registro["bairro"] ) . '</td>';
				 echo '<td id="campos">' . strtoupper( $registro["cidade"] ) . '</td>';
				 echo '<td id="campos">' . strtoupper( $registro["uf"] ) . '</td>';
                                              
				
				 // Telefone Residencial/comercial:
				$tel_residencial = $registro["telefone"];
				
				 $pre_res = substr( $tel_residencial, 0, 2 );
				
				 $numero_residencial = substr( $tel_residencial, 2, 13 );
				
				 $fone_residencial = "($pre_res)" . $numero_residencial;
                 
                 if($fone_residencial == "()" or $fone_residencial == "(0)"){
                 
                        $fone_residencial = "";
                 }
				
				 echo '<td id="campos">' . "$fone_residencial" . '</td>';
				
				
				 // Telefone Celular:
				$tel_celular = $registro["celular"];
				
				 $pre_res = substr( $tel_celular, 0, 2 );
				
				 $numero_celular = substr( $tel_celular, 2, 16 );
				
				 $fone_celular = "($pre_res)" . $numero_celular;
                 
                 if($fone_celular == "()" or $fone_celular == "(0)"){
                 
                        $fone_celular = "";
                 }			
                
                echo '<td id="campos">' . "$fone_celular" . '</td>';                
                
                
				 // echo "<td id='campos-whatsapp'><a href='http://api.whatsapp.com/send?1=pt_BR&phone=55".$registro['celular']."'><img src='images/whatsapp.png' alt='Smiley face' height='20' width='30' border='0'/></a></a>";
				if ( $registro["celular"] == true ) {
								
								echo "<td id='campos'><a href='https://api.whatsapp.com/send?phone=55" . $registro['celular'] . "'><img src='images/whatsapp.png' alt='Smiley face' height='20' width='30' border='0'/></a></a>";
								
								 } else {
								
								echo '<td id="campos-naocadastrado">-----------------</td>';
								
								 } 
				
				echo '</tr>';
				
				 } 

echo '</table>';

?>


    </body>
    
</html>