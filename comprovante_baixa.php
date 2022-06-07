<?php session_start() ?> 

<?php

$usuario = $_SESSION['login'];

$codoper = $_SESSION['codoper'];

// Conecta com banco de dados:
require_once 'conexao.php';

// Faz consulta no banco com a variavel gravada $os:
$sql = "select * from contasareceber where codoper = '$codoper'";

$consulta = mysqli_query( $conexao, $sql );

if ( mysqli_error( $conexao ) == true ) {
				
				echo '<div class="error-mysql">';
				
				 echo( "Mysql query Erro! <br> " . mysqli_error( $conexao ) );
                 
                 echo '<br>';
                
                 echo $sql;
				
				 echo '</div>';
				
				 mysqli_close( $conexao );
				
				 die;
				
				} 

// Pega dados da consulta e transforma em array
while ( $contasareceber = mysqli_fetch_array( $consulta ) ) {
				
				$codigooperacao = $contasareceber[0];
				
				 $datapagamento = $contasareceber[3];
				
				 $cliente = $contasareceber[4];
				
				 $prestacao = $contasareceber[6];
				
				 $vencimento = $contasareceber[2];
				
				 $valor = $contasareceber[6];
				
				 $parcela = $contasareceber[7];
				
				 $total = $contasareceber[8];
				
				 $n_total_parcelas = $contasareceber[11];
                 
				} 

?> 

<html lang='pt-BR'>          
    <head>                    
        <meta charset="utf-8">               
        <title>Comprovante         
        </title>                 
        <link type="text/css" rel="stylesheet" href="css/stylesheet.css">         
    </head>    
    <body>        
        <h3 id="comprovante-baixa">COMPROVANTE DE PAGAMENTO</h3>          
        <h3 id="comprovante-baixa">                     
            <?php echo $data = date( "d/m/Y" ) ?>  </h3>                          
        <h3 id="comprovante-baixa">Cliente..:                      
            <?php echo $cliente ?></h3>                          
        <h3 id="comprovante-baixa">Documento..nº:                       
            <?php echo $codigooperacao ?></h3>                            
        <h3 id="comprovante-baixa">Prestacao..:                      
            <?php echo $parcela ?>  de                       
            <?php echo $n_total_parcelas ?></h3>                  
        <h3 id="comprovante-baixa">Vencimento..R$: 
<?php
 $Data = $vencimento;
 $dia = substr( "$Data", 0, 2 );
 $mes = substr( "$Data", 2, 2 );
 $ano = substr( "$Data", 4, 6 );
 echo $data_vencimento = "$dia/$mes/$ano";
             ?>  </h3>                     
        <h3 id="comprovante-baixa">Pagamento..R$: 
<?php
 $Data_pag = $datapagamento;
 $dia_pag = substr( "$Data_pag", 0, 2 );
 $mes_pag = substr( "$Data_pag", 2, 2 );
 $ano_pag = substr( "$Data_pag", 4, 6 );
 echo $data_pag = "$dia_pag/$mes_pag/$ano_pag";
             ?></h3>                      
        <h3 id="comprovante-baixa">Valor..R$:             
            <?php echo number_format( $valor, 2, ',', '' ) ?></h3>                     
        <h3 id="comprovante-baixa">Encargos..R$: 0</h3>        
        <h3 id="comprovante-baixa">Desconto..R$: 0</h3>                       
        <h3 id="comprovante-baixa">Total..R$:             
            <?php echo number_format( $total, 2, ',', '' ) ?></h3>    
    </body>
</html>