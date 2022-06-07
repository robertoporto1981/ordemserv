 <?php session_start() ?> 
 
<?php
 
$usuario = $_SESSION['login'];
   
$numeroord = $_SESSION['os'];

//Conexao
require_once 'conexao.php';
// Seleciona o Banco de dados atrav s da conexao acima
      		
$sql = "select * from ordem where numeroord = '$numeroord'";
                                              	     
$consulta = mysqli_query($conexao,$sql);

if(mysqli_error($conexao) == TRUE){
    
    echo '<div class="error-mysql">';
    
    echo("Erro! <br> " . mysqli_error($conexao));
    
    echo '<br>';
    
    echo $sql;
    
    echo '</div>';
 
    mysqli_close($conexao);
    
    die;

}
   
//Pega dados da consulta e transforma em array:
while($dados_os = mysqli_fetch_array($consulta)) {           
           
		$numeroord = $dados_os[0];   
		
		$dataentr = date('d/m/Y',strtotime($dados_os[1]));
		
		$horacheg = $dados_os[2];
        
//Tratamento data:
    $Data = $dados_os[3];
    $dia = substr("$Data", 6, 2);
    $mes = substr("$Data", 4,2 );
    $ano = substr("$Data", 0, 4);
    $previsao_saida = "$dia/$mes/$ano"; 
//             
        		
		$cliente = $dados_os[4];
		
		$endereco = $dados_os[5];
		
		$bairro = $dados_os[6];
		
		$cidade = $dados_os[7];
		
		$uf = $dados_os[8];
		
		$cep = $dados_os[10];
		
		$telefone = $dados_os["telef"];
		
        $telefone2 = $dados_os["telef2"];
		
        $equipamento = $dados_os["equipamento"];
		
		$modelo = $dados_os["modelo"];
		
		$marca = $dados_os["marca"];
		
		$acessorios = $dados_os["acessorios"];
		
        $serie = $dados_os["serial"];
		
		$mensage = $dados_os[20];
		
        $servexec = $dados_os[9];
		
        $status = $dados_os["status"];
		
        $defeito = $dados_os["mensage"];
}
     
   
if($status == FINALIZADO) {
	
    $status2 ='SAIDA';

}else{

	$status2 = 'ENTRADA';

}
   	
?>
<!DOCTYPE html">

<html lang='pt-BR'>	

    <head>   
        <meta charset="utf-8">
        
        <link type="text/css" rel="stylesheet" href="stylesheet.css">
        
        <title>ORDEM DE SERVIÇOS</title>		 
    
    </head>
    
    <div id="corpo-os"><h1>ORDEM DE SERVIÇOS</h1>			 
        <form method="POST" action="altera_ordem2.php">	  
            <table border="2">
                <div id="cabecalho">      	<td>
                        <img src="images/logo.jpg" width="100px" height="60px" />
                    </td>
                    	
                      <td><b>Ordem Nº:</b></td>
                        
                        <td>                                  
                            
                            <?php echo $numeroord ?></td>
            </div> 
                                               
                	
            </table>	
            <table border="2">
                <td><b>Data Entrada:</b>
                        <input type="text" id="formulario" maxlength="8" name ="dataentr" value =<?php echo $dataentr; ?> size="8">
                    
                    </td>
                <td>
                    <b>Hora Entrada:</b>
                    <input type="text" id="formulario" maxlength="8"  name ="horacheg" value ="<?php echo $horacheg; ?>" size="8">
                </td>
                <td><b>Previsao Saida:</b>
                    <input type="text" id="formulario" maxlength="8" name ="prevsaid" value="<?php echo $previsao_saida; ?>" size="8">
                </td>
                <td><b>Cliente:</b>
                    <input type="text" value="<?php echo $cliente; ?>" id="formulario" name ="cliente" maxlength="40" size="40">
                </td>
                <td><b>Endereço:</b>
                    <input type="text" value="<?php echo $endereco ?> <?php echo $numero ?>"id="formulario" name = "endereco" maxlength="80" size = "80"></td>	
            </table>	
            <table border="2">
             		<td><b>Bairro:</b>
                    
                        <input type ="text" value ="<?php echo $bairro ?>" id="formulario" name = "bairro" size = "20">
                    
                    </td>
                    <td><b>Cidade:</b>
                                        
                        <input type ="text" value ="<?php echo $cidade ?>" id="formulario" name ="cidade" maxlength="40" size = "20"></td>
                    
                    <td><b>UF:</b>
                    
                        <input type ="text" value ="<?php echo $uf ?>" id="formulario" name ="uf" maxlength="2" size = "1"></td>
                    
                    <td><b>CEP:</b>                    
                        <input type ="text" value="<?php echo $cep ?>" id="formulario" name = "cep" maxlength ="8" size = "8"></td>
                    
                    <td><b>CPF/CNPJ:</b>
                    
                        <input type ="text" value ="<?php echo $cpf ?>" id="formulario" name ="cpfcnpj" maxlength ="11" size = "20"></td>
                    
                  	<td><b>RG:</b>
                    
                           <input type ="text" id="formulario" name ="rg" maxlength="10 size = "10"></td>
                <p>
                    <td><b>Telefone:</b>
                            <input type = "text" value ="<?php echo $telefone ?>" id="formulario" name = "telef" maxlength="11"  size = "11" >
                        
                    </td>
                    
                    <td><b>Telefone2:</b>
                        
                        <input type = "text" value="<?php echo $telefone2 ?>" id="formulario" name = "telef2" maxlength="11" size = "11">
                        
                    </td>
                    <td><b>E-mail:</b>
                      
                        <input type ="text" value="<?php echo $email ?>" id="formulario" name = "email" size = "30">
                    </td>	
            </table>	
            <table border="2">
           		<td><b>Equipamento:</b>
                    
                        <input type ="text" id="formulario" name = "equipamento" value="<?php echo $equipamento ?>" maxlength="20" size = "20">
                    
                    </td>
                   	<td><b>Modelo:</b>
                                                             
                        <input type ="text" id="formulario" name = "modelo" value="<?php echo $modelo ?>" maxlength="20" size = "20"></td>
                    <td><b>Marca:</b>
                   
                            <input type ="text" id="formulario" name ="marca" value="<?php echo $marca ?>" maxlength="15" size = "15"></td>
                    
                    <td><b>Serial ou Imei:</b>
                    
                        <input type ="text" id="formulario" name ="serial" value="<?php echo $serial ?>" maxlength="25" size = "25">
                    
                    </td>
                <p>		
                <td><b>Acessorios:</b>
                
                    <input type ="text" id="formulario" name ="acessorios" value="<?php echo $acessorios ?>" maxlength="25" size = "25">
                
                </td>
                    <p>
                <td><b>Detalhes e observações:</b>
                
                            <input type ="text" id="formulario" name ="detalhes" value="<?php echo $detalhes ?>" size = "80">
                </td>
                	
            </table>	 	 	
            
            <table border="1">	
            
                <br><b>Defeito / Reclamação:<b><td>
                
<textarea id="formulario" name="mensage" rows="10" cols="160"  size  = "99">
	<?php echo $defeito ?>
	
	</textarea>	
            </table>	
            
            <table border="1">		
            
                <br><b>Serviços/Executados:<b><td>
                
<textarea id="formulario" name="servexec" rows="10" cols="160" size="99">

	<?php echo $servexec ?>		

		</textarea>			

            </table>		</td><h2>CONDICOES DE SERVICOS:</h2>	 	

                <p>O(s) equipamento(s) nao retirados apos 90 dias da comunicacao ao cliente, sera(ao) considerados(s) 	abandonados(s), em consequencia serao incorporados como propriedade da empresa e vendidos para ressarcimento das  	despesas do servico.

            </p>

            <hr>   <h3>Visto: Eletronica _______________________________________________________________</h3><h3>Tecnico Responsavel:
                <?php echo $usuario ?>__________________________________________________</h3><h3>Visto:
                <?php echo ucfirst($nome) ?>_____________________________________________________</h3>	(X)Via do cliente   	( )Via da Empresa		 
            <hr>           
            <!--<a title='Imprimir conte�do' href='javascript:window.print()'><img src="imprimir.jpg" alt="Smiley face" height="20" width="30" border="0" /></a>-->      
    </div>   
    </div>   
    </body>
</html>