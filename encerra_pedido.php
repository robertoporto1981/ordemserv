<?php session_start ()?>

<?php
    
include 'time_zone.php';

include 'conexao.php';

//Recebe os valores do pedido_pechamento.php
    
//$cliente = $_SESSION['cliente'];

$cliente = $_SESSION['nome'];
    
$operador = $_SESSION['login'];

if(empty($cliente)){

    $cliente = "CONSUMIDOR NAO IDENTIFICADO";

}else{

 //$cliente = $_SESSION['client'];
   
   $cliente = $_SESSION['nome'];

}         
                       
//Recebe as variaveis do pedido fechamento 

$portador = $_POST['porta'];

$totall = $_SESSION['totall'];
    
$data=date('d/m/Y');
    
$troco = $_SESSION['troco'];
    
$pago = $_SESSION['pago'];

$desconto = $_SESSION['desconto'];
	
//SQL   
   
$sql = "INSERT INTO nota VALUES ";
  
$sql .= "(' ','$cliente','$portador', '$totall','$data','$troco','$pago')";
      
$result = mysqli_query($conexao,"SELECT MAX(numeronota) FROM NOTA");

//Pega a ultima nota inserida no banco de dados
  
$row = mysqli_fetch_row($result);
  
$ultimanota = $row[0];  

//Incremento 1 para emparelhar o numero da nota com os itens:
      
$ultimanota++;           

//Executa o sql igualando o numeronota  da ultima nota emitida:
                                         
$sql2 = "update itensnota,nota set numeroitensnota = numeronota, cli = cliente, dataitem = data where numeroitensnota = 0 and numeronota = '$ultimanota'";
 
echo"<script language='javascript' type='text/javascript'>alert('Cupom emitido: $ultimanota')</script>";

mysqli_query($conexao,$sql) or die("Erro ao inserir registro");
    
mysqli_query($conexao,$sql2) or die("Erro ao inserir registro");
 


?>  

<?php

//Impressao do cupom:
  
//Faz consulta no banco com a variavel gravada $ultimanota:

$sql = "select * from nota where numeronota = '$ultimanota'";
                                               	     
$consulta = mysqli_query($conexao,$sql);
	 
$resultado = mysqli_num_rows($conexao,$consulta);
   
//Pega os dados retornados da query e transforma em array
   
while ($row = mysqli_fetch_array($consulta)) {
   
  $numeronota = $row[0];
   
  $cliente = $row[1];
   
  $portador = $row[2];
   
  $total = $row[3];
   
  $dataemissao = $row[4];
      
  $troco = $row[5];
      
  $pago = $row[6];
       
}

//Dados empresa:

$sql2 = "select * from empresa where codigo = 1";
                                                     
$consulta2 = mysqli_query($conexao,$sql2);
   
$resultado2 = mysqli_num_rows($consulta2);
   
//Pega os dados retornados da query e transforma em array
   
while ($dadosempresa = mysqli_fetch_array($consulta2)) {
    
    $descricao = $dadosempresa[1];
    
    $endereco = $dadosempresa[2];

    $numero = $dadosempresa[3];

    $municipio = $dadosempresa[5];

    $uf = $dadosempresa[6];

    $cnpj = $dadosempresa[7];

    $ie = $dadosempresa[8];

    $telefone = $dadosempresa[9];     
        
}


?>

<html>

    <head>

        <meta lang="pt-br">
            
            <meta charset="utf-8">
              
                              
              <link type="text/css" rel="stylesheet" href="css/estilo2.css">

</head>  
         

<body>    
      
<h4 align="center" id="dados-cupom"><?php echo $descricao ?></h4>

    <hr size="1" style="border:1px dashed black;">
 
      <h4 id="dados-cupom2"><?php echo $endereco ?><?php $numero ?></h4>
  
          <h4 id="dados-cupom2">Telefone:<?php echo $telefone ?>   Cidade:<?php echo $municipio ?></h4>

              <h4 id="dados-cupom2">CNPJ:<?php echo $cnpj ?>      UF:<?php echo $uf ?></h4>
              
                   <h4 id="dados-cupom2">IE:<?php echo $ie ?></h4>

              <hr size="1" style="border:1px dashed black;">
  
          <h5 id="dados-cupom">RECIBO</h5>
    
<hr size="1" style="border:1px dashed black;">
    
  

<?php

$sql3 = "SELECT * FROM itensnota where numeroitensnota = '$ultimanota' order by codprod asc";

$consulta = mysqli_query($conexao,$sql3);          
     
    echo '<td id="dados-cupom">CODIGO:&nbsp;&nbsp;</td>';
     
	  echo '<td id="dados-cupom">ITEM:&nbsp&nbsp</td>';

  	echo '<td id="dados-cupom">QTD:&nbsp &nbsp</td>';
      
    echo '<td id="dados-cupom">VL UNITARIO(R$):&nbsp&nbsp</td>';
      
    echo '<td id="dados-cupom">TOTAL (R$): &nbsp&nbsp</td>';
      
    echo '<br>';                           

// Armazena os dados da consulta em um array associativo:

while($registro = mysqli_fetch_assoc($consulta)){
                              
    echo '<td id="dados-cupom">'.$registro['codprod'].'&nbsp &nbsp</td>';  
      
    echo '<td id="dados-cupom">'.$registro['descr'].'&nbsp &nbsp</td>';
         
    echo '<td id="dados-cupom">'.$registro['quantidade'].'&nbsp;</td>'; 
     
    echo '<td id="dados-cupom">R$'.$registro["preuni"].'&nbsp &nbsp</td>';
  
    echo '<td id="dados-cupom">R$'. $registro["total"].' &nbsp &nbsp</td>';
    	
    echo '<br>';    
    
}


?>

<?php 

//Soma quantidade de itens da tabela itensnota:  

$sql4 = "select sum(quantidade) from itensnota where numeroitensnota = '$ultimanota'";
  
      $query = mysqli_query($conexao,$sql4);
   
while ($exibir = mysqli_fetch_array($query)){
   
      $totalitens = $exibir['0'];

}

?>         

<hr size="1" style="border:1px dashed black;">
   
    <h4 id="dados-cupom-itens">QTD. TOTAL DE ITENS: <?php echo $totalitens ?> </h4>
       
      <h4 id="dados-cupom-itens"><?php echo $portador ?> (R$): <?php echo $pago ?></h4>
     
        <h4 id="dados-cupom-itens">VALOR TOTAL (R$):<?php echo $total ?>.00</h4>
   
<h4 id="dados-cupom-itens">TROCO (R$)<?php echo $troco ?>.00</h4>    


<hr size="1" style="border:1px dashed black;">
    
  <h6 id="dados-cupom2">Numero 000<?php echo $ultimanota ?> Serie ECF Emissao  <?php echo $dataemissao ?> <?php echo date('H:i:s') ?></h6> 
           
        <hr size="1" style="border:1px dashed black;">
    
          <h6 id="dados-cupom"><?php echo $cliente ?></h6>
    
            <hr size="1" style="border:1px dashed black;">   
    
<h6 id="dados-cupom2">Referente ao cupom de venda 000<?php echo $ultimanota ?></h6>
    
<h5 id="dados-cupom2">OBRIGADO PELA PREFERENCIA. VOLTE SEMPRE.</h5>
    
    <h6 id="dados-cupom2"><?php echo $telefone ?></h6>
    
    <hr size="1" style="border:1px dashed black;">
          
    </body>


<label id="dados-cupom">Operador:<?php echo $operador ?></label>

</html>


<!--Insere contas a receber se portador for crediario-->
<?php   


if($portador == CREDIARIO) {
    
    $sql5 = "INSERT INTO contasareceber VALUES (' ','$dataemissao',' ','','$cliente','Ref. a ECF N.: $ultimanota',' $total','01','$total','RECEBER','ROBERTO')";
       
}
     


$query = mysqli_query($conexao,$sql5);
     
//Baixa no estoque:

$sql7 = "SELECT * FROM itensnota where numeroitensnota = '$ultimanota' order by codprod asc";

$consulta_itensnota = mysqli_query($conexao,$sql7);   

while($registro = mysqli_fetch_assoc($consulta_itensnota)){

    $quantidade_produto = $registro['quantidade'];

    $codigo_produto = $registro['codprod'];


$sql8 = "update produto set quantidade = quantidade -$quantidade_produto WHERE cod = $codigo_produto;";


$query = mysqli_query($conexao,$sql8);

}

mysqli_close($conexao);             

?>
          

<?php //session_destroy() ?>