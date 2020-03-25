<?php  session_start(); ?>

<?php

include 'conexao.php';

date_default_timezone_set("America/Sao_Paulo");  

require_once 'testa_login.php';

//Data e hora: 

$data=date('d/m/Y');

$hora=date('H');
  
$minutos=date('i');
   
$segundos=date('s');   


?>

 
<html lang='pt-BR'>

<head>

  <meta charset="utf-8">

  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>

  <link rel='stylesheet' href='css/bootstrap-datepicker.min.css'>
	
  <link type ="text/css" rel="stylesheet" href="css/menu.css">  
   
  
  <title>Menu</title>

</head>

<body id="corpo">

 <!--<h3 id="saudacao">Olá, <?php echo ucwords($usuario); ?></h3>-->

<div class="menu-container">

    <ul class="menu clearfix">

        <li><a href="agenda.html">Agenda</a>

          <li><a href="backup.php">Backup</a></li> 	

            <li><a href="#">Cadastro</a>
            <!-- Nível 1 -->
            <!-- submenu -->

        <ul class="sub-menu clearfix">

        <li><a target="_blank" href="form_cadastro_empresa.html">Cadastro empresa</a>
                	
        <li><a target="_blank" href="lista_usuarios.php">Usuários</a>
                                      
                    <!-- Nível 3 -->
                          <!-- submenu do submenu do submenu -->
                                                      
        <li><a target="_blank" href="form_cadastro_cliente.html">Clientes</a>

        <li><a target="_blank" href="form_cadastro_produto.html">Produtos</a>
              
        <li><a target="_blank" href="form_cadastro_servicos.html">Servicos</a>	
                    <!-- Nível 2 -->
                    <!-- submenu do submenu -->
        <ul class="sub-menu">
                                                           
        </ul><!-- submenu do submenu -->
      
                      
        </ul><!-- submenu -->
        
        </li>

        <li><a href="#">Financeiro</a>
       
        <ul class="sub-menu">
        
            <li><a href="contas_receber.html">Contas receber</a></li>	
        
             <!--<li><a href="baixa_receber.html">Baixa receber</a></li>-->

             <li><a href="contas_pagar.html">Contas pagar</a></li>	

           <!--  <li><a href="baixa_pagar.html">Baixa pagar</a></li>-->

             <li><a href="pagseguro.php">Pagseguro</a></li>

             <li><a target="_blank" href="form_entrada_saidas.php">Fluxo de caixa</a></li>

             <li><a target="_blank" href="lista_entrada_saida.php">Relatorio caixa</a></li>
      
             </ul>
        
             <li><a href="#">Ordem de serviços</a>
      
            <ul class="sub-menu">
      
             <li><a target="_blank" href="consulta_os.html">Consulta OS</a></li>	
        
              </ul>
     
			     <li><a href="#">Relatorios</a>
      
			         <ul class="sub-menu">
                                                                 
			           <li><a href="lista_clientes.php">Clientes</a></li>
      
			           <li><a href="lista_produtos.php">Produtos</a></li>               

                 <li><a href="produtos_para_comprar.php">Produtos para comprar</a></li>
      
			            <li><a href="pesquisa_servico.php">Servicos</a></li>
      
			            <li><a target="_blank" href="niver_dia.php">Aniversariante do dia</a></li>	
      
                  </ul>
   		     <li><a href="#">VENDAS</a>
      
			          <ul class="sub-menu">
      
                <li><a target="_blank" href="pedido_roberto.php">Pedido vendas</a></l1>

			          <li><a target="_blank" href="pdv.php">Frente de caixa</a></li>
       
                </ul>
              
    <li><a href="sair.php">Sair</a></li>

    </div>  	

</div>
     
<footer>

      <h3 id="saudacao">Olá, <?php echo ucwords($usuario); ?></h3>
      
      <?php echo $_SESSION['banco']; ?>

          <div id="data">

          <label><?php echo date('d/m/Y') ?></label>            
              
              </div>
            
<div id="borda-alertas">     

    <h3 id="avisos-importantes">AVISOS IMPORTANTES!</h3>   
        
<?php 

 // Mostra ordens de serviços em aberto:  

  
$sql = "SELECT * FROM ORDEM WHERE status in('ABERTO','ORCAMENTO','EM ANDAMENTO','AGUARDANDO APROVACAO','AGUARDANDO PECAS','GARANTIA')";

$consulta = mysqli_query($conexao,$sql);

$linhas =  mysqli_num_rows ($consulta); 

   
if($linhas >=1){
       
  		echo "<h4 id='mensagem-os'>$linhas orden(s) de serviço em aberto!</h4>";
}
    
     
?>
      
<?php

// Conta quantas contas tem a receber

      
$sql = "select * from contasareceber where status = 'RECEBER'";
      
$consulta = mysqli_query($conexao,$sql);
  
$linhas =  mysqli_num_rows ($consulta);
      

      
if($linhas >0){
  
  		echo "<h4 id='mensagem-receber'>$linhas contas a receber!</h4>";
    
}
   
?> 
 
  
</footer>
  
<?php

//Mostra aniversariantes do dia na tela
                                     
$data = date("d/m/Y");
	
$dia = date("d");
	
$mes = date("m");   	


// Seleciona o Banco de dados através da conexão acima
      
$sql = "select * from contasapagar where status = 'pagar'";
      
$consulta = mysqli_query($conexao,$sql);
 
$linhas =  mysqli_num_rows ($consulta);
      
      
if($linhas >1){
  
    echo "<h4 id='mensagem-pagar'>$linhas contas a pagar!</h4>";

}


?>
    
<?php

//Mostra contas a vencer no dia:

$data = date("d/m/Y");
	
$dia = date("d");
	
$mes = date("m");
  
$ano = date("Y");         
  
//Mostra contas a receber                                    		

$sql = "SELECT * FROM `contasareceber` WHERE datavenc = $dia$mes$ano and status = 'RECEBER'";
 
$consulta = mysqli_query($conexao,$sql);
		
// Armazena os dados da consulta em um array associativo:
	
$linhas3 =  mysqli_num_rows ($consulta);

if($linhas3 >0 ){
      
    echo "<div id='campo-contas-receber'>";


	echo "<h3 id='alerta2'>Cliente(s) com parcelas vencidas!</h3>";	

	    //echo "<h3 id='alerta2'>Cliente(s) com vencimento hoje:</h3>";

while($registro = mysqli_fetch_assoc($consulta)){
     
    echo "CLIENTE:"."&nbsp" . $registro['nome'] . "&nbsp";

    echo '&nbsp';
        
    echo "R$"."&nbsp" . number_format($registro['valor'],2,',','.');
    
    echo '&nbsp';
    
    echo "PARCELA Nº:" . $registro['parcela'];
            
    echo '&nbsp'; 
   		            
    echo "Venceu dia:" . $registro['datavenc'];

    echo '<hr>';

    echo '<br>';   

  //  echo '</div>';
     
  
    }

  }

echo '</div>';


//Aviso backup:

$dataatual = date('d/m/Y');
                                       

$Sql = "SELECT * FROM backup";
  
$consulta = mysqli_query($conexao,$Sql);


while($registro = mysqli_fetch_assoc($consulta)){

    $databackup = $registro["databackup"];

}



//Data atual:    
$dia_atual = substr("$dataatual",0,2);

$mes_atual = substr("$dataatual",2,2);

$ano_atual = substr("$dataatual",6,8);

  
      
//Data do backup:
    
$dia_bkp = substr("$databackup",0,2);
    
$mes_bkp = substr("$databackup",2,2);

$ano_bkp = substr("$databackup",6,8);


//Calculo do ano:
    
$calculo_ano = $ano_bkp - $ano_atual;


//Calculo dias:

$calculo_dia = $dia_bkp - $dia_atual;


if($calculo_dia == 0){


}

if($calculo_dia == -5  ){

  
  echo "<div id='campo-contas-receber'>";
  
  echo "<h3 id='alerta2'>BACKUP DO SITEMA!</h3>";

  echo "Seu ultimo backup foi: " . $databackup;

  echo '</div>';


}

if($calculo_dia > 1){

  
 echo "<div id='campo-contas-receber'>";

  
  echo "<h3 id='alerta2'>BACKUP DO SITEMA!</h3>";

  echo "Seu ultimo backup foi: " . $databackup;

  echo '</div>';

}

        
if($calculo_ano == 0){ 
  

}elseif($calculo_ano == 0 and $calculo_dia >1){

  echo "<div id='campo-contas-receber'>";

  
  echo "<h3 id='alerta2'>BACKUP DO SITEMA!</h3>";

  echo "Seu ultimo backup foi dia: " . $databackup;

  echo '</div>';

}

     
if($databackup == $dataatual){
    
    //Backup em dia

}

//Aniversariante do dia
                                     		

$sql = "SELECT * FROM clientes WHERE MONTH(datanasc) = '$mes' AND DAY(datanasc) = '$dia'";


  
$consulta = mysqli_query($conexao,$sql);
		
// Armazena os dados da consulta em um array associativo
	
$linhas3 =  mysqli_num_rows ($consulta);

if($linhas3 >0 ){

     echo "<div id='aniversariante-do-dia'>";
     
      echo "<h3 id='alerta2'>ANIVERSÁRIANTES DO DIA:</h3>";

while($registro = mysqli_fetch_assoc($consulta)){
     
    echo $registro['nome'];

    echo '&nbsp';
    
    echo '&nbsp';
    
    echo '&nbsp';

    echo $registro['celular'];

    echo "<td id='campos-whatsapp'><a href='https://api.whatsapp.com/send?phone=55".$registro['celular']."&text=%20Feliz aniversario'><img src='images/whatsapp.png' alt='Smiley face' height='20' width='30' border='0'/></a></a>";


    echo '<br>';
    
    echo '</div>';
  
    }

  }



?>



</body>

</html>