<?php session_start() ?>

<?php 
    unset( $_SESSION['pagina'] );
    
    unset( $_SESSION['tabela'] );

?>

<?php

require_once 'conexao.php';

require_once 'testa_login.php';

// Data e hora:
$data = date( 'd/m/Y' );

$hora = date( 'H' );

$minutos = date( 'i' );

$segundos = date( 's' );

?>

<?php $Sql = "SELECT * FROM empresa";

$consulta = mysqli_query( $conexao, $Sql );


while ( $registro = mysqli_fetch_assoc( $consulta ) ) {
				
				 $empresa = $registro["descricao"];
				
				 } 
?>
 
<html lang='pt-BR'>

<head>

  <meta charset="utf-8">

  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>

  <link rel='stylesheet' href='css/bootstrap-datepicker.min.css'>
  
  <link type ="text/css" rel="stylesheet" href="css/booststrap.css">  
      	        
  <link type ="text/css" rel="stylesheet" href="css/menu.css">   
  
  <title>Menu</title>

</head>

<body id="corpo"> 
  <div class="box-menu">
    
  <div class="menu-container">

    <ul class="menu clearfix">

        <li><a href="agenda.html">Agenda</a>

          <li><a href="backup.php">Backup</a></li> 	
             <li><a href="">Cadastro</a>
            <!-- Nível 1 -->
            <!-- submenu --> 
                
        <ul class="sub-menu clearfix">

            <li><a target="_blank" href="form_cadastro_empresa.html">Empresa</a>
                	
            <li><a>Usuários</a>
        
            <ul class="sub-menu">
        
            <li><a target="_blank" href="lista_usuarios.php">Usuários</a>
            </ul>
        </li>
                                      
                    <!-- Nível 3 -->
                          <!-- submenu do submenu do submenu -->
                                                      
        <li><a>Clientes</a>
        
        <ul class="sub-menu">
            
            <li><a target="_blank" href="lista_clientes.php">Clientes</a>
                 
        </ul>
        </li>
           
            
        <li><a>Produtos</a>
         
         <ul class="sub-menu">
         
            <li><a target="_blank" href="lista_produtos.php">Produtos</a>
                  
                  <li><a target="_blank" href="lista_grupos.php">Categorias</a>
                  
                             <li><a target="_blank" href="lista_subgrupos.php">Subcategorias</a> 
         </ul>
             
         </li>
            
                 
            
                
        
        <li><a target="_blank" href="form_cadastro_servicos.html">Serviços</a>	
                    <!-- Nível 2 -->
                    <!-- submenu do submenu -->
        <ul class="sub-menu">
                                                           
        </ul><!-- submenu do submenu -->
      
                      
        </ul><!-- submenu -->
        
        </li>

        <li><a href="">Financeiro</a>
       
        <ul class="sub-menu">
        
            <li><a href="form_contas_receber.php">Contas receber</a></li>	
        
             <!--<li><a href="baixa_receber.html">Baixa receber</a></li>-->

             <li><a href="contas_pagar.html">Contas pagar</a></li>	

           <!--  <li><a href="baixa_pagar.html">Baixa pagar</a></li>-->

             <li><a href="pagseguro.php">Pagseguro</a></li>

             <li><a target="_blank" href="form_entrada_saidas.php">Fluxo de caixa</a></li>

             <li><a target="_blank" href="lista_entrada_saida.php">Relatorio caixa</a></li>
             
             <li><a target="_blank" href="lista_entrada_saida_anual.php">Relatorio anual</a></li>
      
             </ul>
        
             <li><a href="">Ordem de serviços</a>
      
            <ul class="sub-menu">
      
             <li><a target="_blank" href="consulta_os.html">Consulta OS</a></li>
             <li><a target="_blank" href="cons_defeitos_solucoes.php">Defeitos/solucoes</a></li>	
        
              </ul>
     
			     <li><a href="">Relatorios</a>
      
			         <ul class="sub-menu">
                                                                
			                 
			           <li><a href="">Produtos</a>
                       
                       <ul class="sub-menu">
                                                                                    
                            <li><a href="produtos_para_comprar.php">Produtos para comprar</a>
                            
                            <li><a href="produtos_mais_vendidos.php">Mais vendidos</a>     
                       
                       </ul>
                       </li>
                                                         
                        </li>            
			            <li><a href="pesquisa_servico.php">Servicos</a></li>
      
			            <li><a target="_blank" href="niver_dia.php">Aniversariante do dia</a></li>	
      
                  </ul>
   		     <!--<li><a href="#">VENDAS</a>
      
			          <ul class="sub-menu">
      
                <li><a target="_blank" href="pedido_roberto.php">Pedido vendas</a></l1>

			          <li><a target="_blank" href="pdv.php">Frente de caixa</a></li>
       
                </ul>-->
                      
    <li><a href="sair.php">Sair</a></li>

    </div>  	

								
</div>
     
<footer>

<!--Saudacoes usuario -->

<h3 id="saudacao">Olá, <?php echo ucwords( $usuario ) . "!" ?></h3>

<!-- Mostra em qual banco de dados esta -->

<?php if ( $usuario == "ROBERTO" or $usuario == "ADMIN" or $usuario == "MASTER") {
				
				echo "Banco:" . "[" . $_SESSION['banco'] ."]"; 

 } 

?> 

 <div id="data">

          <label><?php echo date( 'd/m/Y' ) ?></label>            
              
</div>
            
<div id="borda-alertas">     

    <h3 id="avisos-importantes">AVISOS IMPORTANTES!</h3>   
        
<?php

// Mostra total ordens de serviços em aberto:
$sql = "SELECT * FROM ORDEM WHERE status in('ABERTO','APROVADO','ORCAMENTO','EM ANDAMENTO','AGUARDANDO APROVACAO','AGUARDANDO PECAS','GARANTIA')";

$consulta = mysqli_query( $conexao, $sql );

$os_em_aberto = mysqli_num_rows ( $consulta );


if ( $os_em_aberto >= 1 ) {
				
				echo "<h4 id='mensagem-os'>$os_em_aberto orden(s) de serviço em aberto!</h4>";
				 } 


?>
      
<?php

// Conta quantas contas tem a receber:
$sql = "select * from contasareceber where status = 'RECEBER'";

$consulta = mysqli_query( $conexao, $sql );

$contas_a_receber = mysqli_num_rows ( $consulta );



if ( $contas_a_receber > 0 ) {
				
				echo "<h4 id='mensagem-receber'>$contas_a_receber contas a receber!</h4>";
				
				 } 

?> 
  
<?php

// Mostra aniversariantes do dia na tela:

$data = date( "d/m/Y" );

$dia = date( "d" );

$mes = date( "m" );


// Seleciona o Banco de dados através da conexão acima:

$sql = "select * from contasapagar where status = 'pagar'";

$consulta = mysqli_query( $conexao, $sql );

$contas_a_pagar = mysqli_num_rows ( $consulta );


if ( $contas_a_pagar > 1 ) {
				
				echo "<h4 id='mensagem-pagar'>$contas_a_pagar contas a pagar!</h4>";
				
               
                                        
				 } 


?>
    
<?php

// Mostra contas a vencer no dia:

$data = date( "d/m/Y" );

$dia = date( "d" );

$mes = date( "m" );

$ano = date( "Y" );

// Mostra contas a receber:

$sql = "SELECT * FROM `contasareceber` WHERE datavenc < $ano$mes$dia and status = 'RECEBER'";

$consulta = mysqli_query( $conexao, $sql );

// Armazena os dados da consulta em um array associativo:

$linhas3 = mysqli_num_rows ( $consulta );

if ( $linhas3 > 0 ) {
				
				echo "<div id='campo-contas-receber'>";
				
				 echo "<h3 id='alerta2'>Cliente(s) com parcelas vencidas!</h3>";
				
				 // echo "<h3 id='alerta2'>Cliente(s) com vencimento hoje:</h3>";
				while ( $registro = mysqli_fetch_assoc( $consulta ) ) {
								
								echo "CLIENTE:" . "&nbsp" . $registro['nome'] . "&nbsp";
								
								 echo "-";
								
								 echo '&nbsp';
								
								 echo "R$" . "&nbsp" . number_format( $registro['valor'], 2, ',', '.' );
								
								 echo "-";
								
								 echo '&nbsp';
								
								 echo "PARCELA Nº:" . $registro['parcela'];
								
								 echo '&nbsp';
								
								 echo "-";
								
								 $datavenc = $registro["datavenc"];								 
								
								 								
								 $datavencimento = date('d/m/Y',strtotime($datavenc));
								
								 echo "VENCIMENTO:" . '&nbsp' . $datavencimento;
								
								 echo '<hr>';
								
								 echo '<br>';
								
								 // echo '</div>';
				} 
				
				echo '<form method="POST" action="aviso_cobranca.php">';
				
				 echo '<input type="submit" value="ENVIAR COBRANÇA">';
				 echo '</form>';
				 } 





echo '</form>';

echo '</div>';


// Aviso backup:

$dataatual = date( 'd/m/Y' );


$Sql = "SELECT * FROM backup";

$consulta = mysqli_query( $conexao, $Sql );


while ( $registro = mysqli_fetch_assoc( $consulta ) ) {
				
				$databackup = $registro["databackup"];
                
                				
				 }

// Data atual:

$dia_atual = substr( "$dataatual", 0, 2 );

$mes_atual = substr( "$dataatual", 2, 2 );

$ano_atual = substr( "$dataatual", 6, 8 );


// Data do backup:

$dia_bkp = substr( "$databackup", 6, 2 );

$mes_bkp = substr( "$databackup", 4,2 );

$ano_bkp = substr( "$databackup", 0, 4 );

// Ultimo backup:

$dia_ultimo_bkp = substr("$databackup",6,7);

$mes_ultimo_bkp = substr("$databackup",4,2);

$ano_ultimo_bkp = substr("$databackup",0,4);

$ultimo_backup = $dia_ultimo_bkp ."/". $mes_ultimo_bkp ."/" .$ano_ultimo_bkp;


// Calculo do ano:

$calculo_ano = $ano_bkp - $ano_atual;


// Calculo dias:

$calculo_dia = $dia_atual - $dia_bkp;

if ( $calculo_dia == 0 ) {
	
        die;			
				} 

if ( $calculo_dia == -5 ) {
				
				echo "<div id='campo-contas-receber'>";
				
				 echo "<h3 id='alerta2'>BACKUP DO SITEMA!</h3>";
				
				 echo "Seu ultimo backup foi: " . $ultimo_backup;
                 
                  echo '<form method="post" action="backup.php">';
                 
                 echo '<input type="submit" class="btn" value="Fazer backup agora">';
				
                 echo '</form>';
                 			 	      
            	
				 echo '</div>';
				
				 } 

if ( $calculo_dia > 1 ) {
				
				
				echo "<div id='campo-contas-receber'>";
				
				 echo "<h3 id='alerta2'>BACKUP DO SITEMA!</h3>";
				
				 echo "Seu ultimo backup foi: " . $ultimo_backup;
                 
                 echo '<form method="post" action="backup.php">';
                 
                 echo '<input type="submit" class="btn" value="Fazer backup agora">';
				
                 echo '</form>';
                 
				 echo '</div>';
				
				 } 


if ( $calculo_ano == 0 ) {
				
				
				} elseif ( $calculo_ano == 0 and $calculo_dia > 1 ) {
				
				echo "<div id='campo-contas-receber'>";
				
				
				 echo "<h3 id='alerta2'>BACKUP DO SITEMA!</h3>";
				
				 echo "Seu ultimo backup foi dia: " . $ultimo_backup;
                 
                      
                  echo '<form method="post" action="backup.php">';
                 
                 echo '<input type="submit" class="btn" value="Fazer backup agora">';
				
                 echo '</form>';
				
				 echo '</div>';
				
				 } 


if ( $databackup == $dataatual ) {
				
// Backup em dia

} 

// Aniversariante do dia:

$sql = "SELECT * FROM clientes WHERE MONTH(datanasc) = '$mes' AND DAY(datanasc) = '$dia' AND STATUS <> 'D' ";

$consulta = mysqli_query( $conexao, $sql );

// Armazena os dados da consulta em um array associativo:

$linhas3 = mysqli_num_rows ( $consulta );

if ( $linhas3 > 0 ) {
				
				echo "<div id='aniversariante-do-dia'>";
				
				 echo "<h3 id='alerta2'>ANIVERSÁRIANTES DO DIA:</h3>";
				
				 while ( $registro = mysqli_fetch_assoc( $consulta ) ) {
								
								echo $registro['nome'];
								
								 echo "&nbsp" . "-";
								
								 echo '&nbsp';
								
								 echo '&nbsp';
								
								
								 echo $registro['celular'];
								
								 echo "<td id='campos-whatsapp'><a href='https://api.whatsapp.com/send?phone=55" . $registro['celular'] . "&text=%20Feliz aniversario'><img src='images/whatsapp.png' alt='Smiley face' height='20' width='30' border='0'/></a></a>";
								
								 echo '<br>';
								
								 echo '<hr>';
								
								
								
								 } 
				
				} 



?>


</footer>

</body>

</html>