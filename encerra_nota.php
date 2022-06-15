<?php session_start() ?>

<?php

include 'time_zone.php';

//$data_emissao = date( 'dmY' );
$data_emissao = date( 'Ymd' );

// Conecta com banco de dados:
Include 'conexao.php';

$cliente = $_SESSION['cliente'];

$operador = $_SESSION['login'];


// Recebe variáveis do pedido_fechamento.php:
if ( empty( $cliente ) ) {
				
	
	$cliente = "CONSUMIDOR NAO IDENTIFICADO";
				
	
} else {
				
	
	$cliente = $_SESSION['cliente'];
				
	
} 

// Recebe as variaveis do pedido fechamento:
$portador = $_POST['porta'];

$totall = $_SESSION['totall'];

$data = date( 'd/m/Y' );

$troco = $_SESSION['troco'];

$pago = $_SESSION['pago'];

$desconto = $_SESSION['desconto'];


// Grava capa da nota:
$sql = "INSERT INTO nota VALUES ";

$sql .= "(' ','$cliente','$portador', '$totall','$data','$troco','$pago','')";

$result = mysqli_query( $conexao, "SELECT MAX(numeronota) FROM NOTA" );

// Pega a ultima nota inserida no banco de dados:
$ultima_nota = mysqli_fetch_row( $result );

echo $ultimanota = $ultima_nota[0];

// Incremento 1 para emparelhar o numero da nota com os itens:

$ultimanota++;

// Executa o sql igualando o numeronota  da ultima nota emitida:

$sql2 = "update itensnota,nota set numeroitensnota = numeronota, cli = cliente, dataitem = data where numeroitensnota = 0 and numeronota = '$ultimanota'";

// Mensagem cupom emitido:
echo"<script language='javascript' type='text/javascript'>alert('Cupom emitido: $ultimanota')</script>";

mysqli_query( $conexao, $sql ) or die( "Erro ao inserir registro" );

mysqli_query( $conexao, $sql2 ) or die( "Erro ao inserir registro" );

?>  

<?php

// Impressao do cupom:
// Faz consulta no banco com a variavel gravada $ultimanota:

$sql = "select * from nota where numeronota = '$ultimanota'";

$consulta = mysqli_query( $conexao, $sql );

$resultado = mysqli_num_rows( $consulta );

// Pega os dados retornados da query e transforma em array:
while ( $nota = mysqli_fetch_array( $consulta ) ) {
				
	
	$numeronota = $nota[0];
				
	
	$cliente = $nota[1];
				
	
	$portador = $nota[2];
				
	
	$total = $nota[3];
				
	
	$dataemissao = $nota[4];
				
	
	$troco = $nota[5];
				
	
	$pago = $nota[6];
				
	
} 

// Dados empresa:

$sql2 = "select * from empresa where codigo = 1";

 $consulta2 = mysqli_query( $conexao, $sql2 );

 $resultado2 = mysqli_num_rows( $consulta2 );

// Pega os dados retornados da query e transforma em array:
while ( $dados_empresa = mysqli_fetch_array( $consulta2 ) ) {
				
	
	$descricao = $dados_empresa[1];
				
	
	$endereco = $dados_empresa[2];
				
	
	$numero = $dados_empresa[3];
				
	
	$municipio = $dados_empresa[5];
				
	
	$uf = $dados_empresa[6];
				
	
	$cnpj = $dados_empresa[7];
				
	
	$ie = $dados_empresa[8];
				
	
	$telefone = $dados_empresa[9];
	
} 


?>

<html lang='pt-BR'>

    <head>
         
      <meta charset="utf-8">              
                              
           <link type="text/css" rel="stylesheet" href="css/pdv2.css">

</head>  
         

<body>    
      
<h4 align="center" id="dados-cupom"><?php echo $descricao ?></h4>

    <hr size="1" style="border:1px dashed black;">
 
      <h4 id="dados-cupom2"><?php echo $endereco ?><?php$numero ?></h4>
  
      <h4 id="dados-cupom2">Telefone:<?php echo $telefone ?>   Cidade:<?php echo $municipio ?></h4>

      <h4 id="dados-cupom2">CNPJ:<?php echo $cnpj ?>      UF:<?php echo $uf ?></h4>
              
      <h4 id="dados-cupom2">IE:<?php echo $ie ?></h4>

      <hr size="1" style="border:1px dashed black;">
  
      <!--<h5 id="dados-cupom"><?php ?>RECIBO</h5>-->
      
      <h5 id="dados-cupom"><?php if($portador == 987){ echo "TROCAS"; }else echo "RECIBO"; ?></h5>
    
      <hr size="1" style="border:1px dashed black;">   
  

<?php

$sql3 = "SELECT * FROM itensnota where numeroitensnota = '$ultimanota' order by codprod asc";

$consulta = mysqli_query( $conexao, $sql3 );

echo '<td id="dados-cupom">COD:&nbsp;&nbsp;</td>';

echo '<td id="dados-cupom">ITEM:&nbsp&nbsp</td>';

echo '<td id="dados-cupom">QTD:&nbsp &nbsp</td>';

echo '<td id="dados-cupom">VL UNITARIO(R$):&nbsp&nbsp</td>';

echo '<td id="dados-cupom">TOTAL (R$): &nbsp&nbsp</td>';

echo '<br>';
    
// Armazena os dados da consulta em um array associativo:
while ( $dados_cupom_impressao = mysqli_fetch_assoc( $consulta ) ) {
				
    echo '<td id="dados-cupom">' . $dados_cupom_impressao["codprod"] . '&nbsp &nbsp</td>';
				
	echo '<td id="dados-cupom">' . $dados_cupom_impressao["descr"] . '&nbsp &nbsp</td>';
				
    echo '<td id="dados-cupom">' . $dados_cupom_impressao["quantidade"] . '&nbsp;</td>';
				
	echo '<td id="dados-cupom">R$' . $dados_cupom_impressao["preuni"] . '&nbsp &nbsp</td>';
				
	echo '<td id="dados-cupom">R$' . $dados_cupom_impressao["total"] . ' &nbsp &nbsp</td>';
				
	echo '<br>';
				
} 


?>

<?php

// Soma quantidade de itens da tabela itensnota:
$sql4 = "select sum(quantidade) from itensnota where numeroitensnota = '$ultimanota'";

 $query = mysqli_query( $conexao, $sql4 );

while ( $quantidade_total_itens_nota = mysqli_fetch_array( $query ) ) {
				
		
	$totalitens = $quantidade_total_itens_nota['0'];
				
	
} 

?>         

<hr size="1" style="border:1px dashed black;">
   
    <h4 id="dados-cupom-itens">QTD. TOTAL DE ITENS: <?php echo $totalitens ?> </h4>
          
     <h4 id="dados-cupom-itens">PORTADOR: <?php if($portador == 900){ echo "DINHEIRO";}if($portador == 987){echo "TROCAS";}if($portador == 901){echo "CREDIARIO";} if($portador == 1000){echo "PIX";}if($portador == 201){echo "DEBITO";}if($portador == 991){echo "PAG SEGURO";}if($portador != 900 and $portador != 901 and $portador != 1000 and $portador != 201 and $portador != 991){echo "CARTAO DE CREDITO";} ?> PAGO(R$): <?php echo number_format( $pago, 2, ',', '.' ) ?></h4>
     
     <h4 id="dados-cupom-itens">VALOR TOTAL (R$):<?php echo number_format( $total, 2, ',', '.' ) ?></h4>
     
	<h4 id="dados-cupom-itens">TROCO (R$):<?php echo number_format( $troco, 2, ',', '.' ) ?></h4>    

	<h4 id="dados-cupom-itens">TOTAL DESCONTO: (R$):<?php echo number_format( $desconto, 2, ',', '.' )?></h4>

<hr size="1" style="border:1px dashed black;">
    
  <h6 id="dados-cupom2">Numero 000<?php echo $ultimanota ?> Serie ECF Emissao  <?php echo $dataemissao ?> <?php echo date( 'H:i:s' ) ?></h6> 
           
 <hr size="1" style="border:1px dashed black;">
    
  <h6 id="dados-cupom"><?php echo $cliente ?></h6>
    
  <hr size="1" style="border:1px dashed black;">   
    
<h6 id="dados-cupom2">Referente ao cupom de venda <?php echo $ultimanota ?></h6>
    
<h5 id="dados-cupom2">OBRIGADO PELA PREFERENCIA. VOLTE SEMPRE!.</h5>
    
    <h6 id="dados-cupom2"><?php echo $telefone ?></h6>
    
    <hr size="1" style="border:1px dashed black;">
          
    </body>


<label id="dados-cupom">Operador:<?php echo ucfirst($operador) ?></label>

</html>



<?php


// Diferente de devolução e trocas:
if($portador != "987"){

//Baixa estoque:
$sql7 = "SELECT * FROM itensnota where numeroitensnota = '$ultimanota' order by codprod asc";

$consulta_itensnota = mysqli_query( $conexao, $sql7 );


while ( $registro = mysqli_fetch_assoc( $consulta_itensnota ) ) {
				
				
		
	$quantidade_produto = $registro['quantidade'];
				
	
	$codigo_produto = $registro['codprod'];
				
	
	$sql8 = "UPDATE PRODUTO SET quantidade = quantidade -$quantidade_produto WHERE cod = $codigo_produto";
				
	
	$query = mysqli_query( $conexao, $sql8 );
}
} 

//Insere contas a receber se portador for crediario:
// Portador 901 - Crediário:

if ( $portador == 901 ) {
				
	
	$sql5 = "INSERT INTO contasareceber VALUES (' ','$data_emissao','','','$cliente','Ref. a ECF N.: $ultimanota',' $total','01','$total','RECEBER','ROBERTO')";
				
	
	$query = mysqli_query( $conexao, $sql5 );
	
}  

// Portador 900 - a vista:
if ( $portador == "900" ) {
				
	
	$sql6 = "INSERT INTO entradasaidas VALUES('','$data_emissao','ENTRADA','Ref. a ECF N.:$ultimanota','$total','$usuario','','A VISTA','VENDA BALCAO','')";
				
	
	$query = mysqli_query( $conexao, $sql6 );
	
} 

// Portador 1000 - PIX:
if ( $portador == "1000" ) {
				
	
	$sql = "INSERT INTO entradasaidas VALUES('','$data_emissao','ENTRADA','Ref. a ECF N.:$ultimanota','$total','$usuario','','A VISTA','VENDA BALCAO','')";
				
	
	$query = mysqli_query( $conexao, $sql );
	
} 

// Portador 200 - Cartao crédito:
if ( $portador == 200 ) {
				
	
	$sql9 = "INSERT INTO entradasaidas VALUES('','$data_emissao','ENTRADA','Ref. a ECF N.:$ultimanota','$total','$usuario','','CARTAO DE CREDITO','VENDA BALCAO','')";
				
	
	$query = mysqli_query( $conexao, $sql9 );
	
} 

// Portador 201 - Cartao débito:
if ( $portador == 201 ) {
				
	
	$sql10 = "INSERT INTO entradasaidas VALUES('','$data_emissao','ENTRADA','Ref. a ECF N.:$ultimanota','$total','$usuario','','DEBITO','VENDA BALCAO','')";
				
	
	$query = mysqli_query( $conexao, $sql10 );
	
} 


// Portador 987 - Devolução:
if($portador == "987" ){

$sql11 = "SELECT * FROM itensnota where numeroitensnota = '$ultimanota' order by codprod asc";

$consulta_itensnota = mysqli_query( $conexao, $sql11 );


while ( $registro = mysqli_fetch_assoc( $consulta_itensnota ) ) {				
				
	
	$quantidade_produto = $registro['quantidade'];	
	
	
	$codigo_produto = $registro['codprod'];
				
	
	$sql12 = "UPDATE PRODUTO SET quantidade = quantidade +'$quantidade_produto' WHERE cod = $codigo_produto";
				
	
	$query = mysqli_query( $conexao, $sql12 );
				
	
}                 
}


//Insere fluxo de caixa:

if ( $portador == "987" ) {
				
	
	$sql13 = "INSERT INTO entradasaidas VALUES('','$data_emissao','SAIDA','Ref. a ECF N.:$ultimanota','$total','$usuario','','DEVOLUCAO/TROCAS','DEVOLUCAO/TROCAS BALCAO','')";
				
	
	$query = mysqli_query( $conexao, $sql13 );
				 
    
} 



mysqli_close( $conexao );

?>
          

<?php //session_destroy() ?>
