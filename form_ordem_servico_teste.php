<?php session_start() ?>
<!DOCTYPE html>
<html lang='pt-BR'>
<?php
include 'time_zone';
include 'testa_login.php';
  
$nome = $_SESSION['nome'];
$endereco = $_SESSION['rua'];
$numero = $_SESSION['numero'];
$bairro =	$_SESSION['bairro'];
$cidade = $_SESSION['cidade'];
$uf =	$_SESSION['uf']; 
$cep = $_SESSION['cep'];
$cpf =	$_SESSION['cpf'];
$rg = $_SESSION['rg'];
$telefone = $_SESSION['telefone'];
$celular = $_SESSION['celular'];
$email = $_SESSION['email'];
  
if(isset($_SESSION['login'])){
  
      $usuario = $_SESSION['login'];     
 
  
}else{
 
    echo"<script language='javascript' type='text/javascript'>window.location.href='index.html'</script>";
 
 
}
$data = date("d/m/Y");
$hora = date("H:i:s");
	   
$mensagem = "Atenção! a não retirada do aparelho no prazo de 30 dias serão acrescido 10% no valor, após 60 dias implicara na venda do mesmo para pagamentos de gast
  . (art. 06. Item 03 do código de defesa do consumidor)"
	
	
    ?>   
    <head>
        <meta charset='utf-8'>      
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>                         
        <link type ="text/css" rel="stylesheet" href="css/reset.css">                        
        <link rel="stylesheet" href="css/bootstrap.css">        
        
        <title>ORDEM DE SERVIÇOS
        </title>
    </head>		 			
    <h1><center>Ordem de serviços</center></h1>
        
    <form method="POST" action="menu.php">           
        
            <input type="submit" class="btn btn-dark btn-sm" value="Sair">
            
    </form>       
    
<hr>        
    
<script type="text/javascript">
    // <![CDATA[
     function Acao(act){
       frm = document.getElementById('formulario');
       frm.action = act + '.php'; 
       frm.submit();
    // ]]>
    }
</script>    	 			
    <!--<FORM action ="form_cadastro_os.php" method="post">-->       

    <form action="./" id="formulario" method="post">	 	 	   
        <table border="2">	
            <!--	<td>Ordem Nº:<input type="text" name ="numeroord" size="10"></td> -->	
        </table>    	         
        <div class="form-row">		                     
            <div class="form-group col-md-2">                         <td>
                    <label>Data Entrada:
                    </label>                     
                    <input type="text" id="formulario" maxlength="8" class="form-control" name ="dataentr" disabled value =<?php echo $data; ?> size="8"></td>        
            </div>                 
            <div class="form-group col-md-2">		             
                <label>Hora Entrada:
                </label>                         
                <input type="text" id="formulario" maxlength="8"  class="form-control" name ="horacheg"  disabled value =<?php echo $hora; ?> size="8">                       
            </div>                      
            <div class="form-group col-md-2">             		
                <label>Previsao Saida:
                </label>                                 
                <input type="text" id="formulario" maxlength="8" class="form-control" name ="prevsaid"  disabled size="8">    	   
            </div>                 
            <div class="form-group col-md-4">    	               
                <label>Cliente:
                </label>                                 
                <input type="text" value="<?php echo $nome; ?>" id="formulario" class="form-control" name ="cliente" maxlength="50" size="60" required>         
            </div>    
            <!--fim do form-row -->
        </div>     
        <div class="form-row">        
            <div class="form-group col-md-4">		             
                <label>Endereço:
                </label>                         
                <input type ="text" value ="<?php echo $endereco ?> <?php echo $numero ?> " id="formulario" class="form-control" name = "ender" maxlength="50" size = "50">         
            </div>  	 		  
            <div class="form-group col-md-3">           		      
                <label>Bairro:
                </label>                                   
                <input type ="text" value ="<?php echo $bairro ?>" id="formulario" class="form-control" name = "bairro" size = "20">                                 
            </div>
            <div class="form-group col-md-2">		
                <label>Cidade:
                </label>                         
                <input type ="text" value ="<?php echo $cidade ?>" id="formulario" class="form-control" name ="cidade" maxlength="40" size = "20">
            </div>   
            <div class="form-group col-md-1">                     
                <label>UF:
                </label>                         
                <input type ="text" value ="<?php echo $uf ?>" id="formulario" class="form-control" name ="uf" maxlength="2" size = "1">
            </div>           
        </div>
        <!--fim do form-row -->
        <div class="form-row">
            <div class="form-group col-md-1">		
                <label>CEP:
                </label>                                 
                <input type ="text" value="<?php echo $cep ?>" id="formulario" class="form-control" name = "cep" maxlength ="8" size = "8"></td>
            </div>
            <div class="form-group col-md-2">		
                <label>CPF/CNPJ:
                </label>                     
                <input type ="text" value ="<?php echo $cpf ?>" id="formulario" class="form-control" name ="cpfcnpj" maxlength ="11" size = "20">
            </div>
            <div class="form-row">
                <div class="form-group col-md-2">		
                    <label>RG:
                    </label>                     
                    <input type ="text" value="<?php echo $rg ?>" id="formulario" class="form-control" name ="rg" maxlength="10 size = "10">
                </div>
                <div class="form-group col-md-2">		
                    <label>Telefone:
                    </label>                                 
                    <input type = "text" value ="<?php echo $telefone ?>" id="formulario" class="form-control" name = "telef" maxlength="11"  size = "11" required>
                </div>   
                <div class="form-group col-md-2">                   
                    <label>Telefone2:
                    </label>                                         
                    <input type = "text" value="<?php echo $celular ?>" id="formulario" class="form-control" name = "telef2" maxlength="11" size = "11" required>        
                </div>
                <div class="form-group col-md-4">                 
                    <label>E-mail:
                    </label>                         
                    <input type ="text" value="<?php echo $email ?>" id="formulario" class="form-control" name = "email">
                </div>
            </div>
            <!--Fim do form-row -->     	
            </table>
            <div class="form-row">	
                <table border="2">      
                    <div class="form-group col-md-4">		         
                        <label>Equipamento:
                        </label>          
                        <input type="text" id="formulario" name="equipamento" class="form-control" size="20" maxlength="20" required>      
                    </div>               
                    <div class="form-group col-md-3">         
                        <label>Modelo:
                        </label>        
                        <input type ="text" id="formulario" name = "modelo" class="form-control" maxlength="20" size = "20"  required>
                    </div>  
                    <div class="form-group col-md-3">		
                        <label>Marca:
                        </label>      
                        <input type ="text" id="formulario" class="form-control" name ="marca" maxlength="15" size = "15" required>	 
                    </div>
            </div>
            <!--Fim do form-row -->
            <div class="form-row">    
                <div class="form-group col-md-3">		     
                    <label>Serial ou Imei:
                    </label>        
                    <input type ="text" id="formulario" name ="serial" class="form-control" maxlength="25" required>    
                </div>    
                <div class="form-group col-md-3">		    
                    <label>Acessorios:
                    </label>                     
                    <input type ="text" id="formulario" class="form-control" name ="acessorios" maxlength="25">        
                </div>
            		
            <div class="form-group col-md-4">
                
                <label>Detalhes e observações:</label>
                    
                    <input type ="text" id="formulario" class="form-control" name ="detalhes" size = "99" required></td>
            </div>                
                	
            </div><!--Fim do form-row-->
<div class="form-row">
    <label>Itens:</label>

</div><!--fim do form-row-->            
            </table>
            
<div class="form-row">
            	 	 	
            <table class="table">
            
<div class="form-group col-md-11">            	
            <label>Defeito / Reclamação:</label>

<textarea class="form-control" name="mensage" rows="5" cols="10000" size = "80">

	</textarea>
</div>
	
            </table>	
</div><!--Fim do form-row -->            

<div class="form-row">  

    <div class="form-group col-md-13">
            <table border="1">  	 		 	
            
                <td>CONDIÇÕES DE EXECUÇÃO:
                    <?php echo $mensagem; ?></td>
            </table>	 
            </div>
</div><!--fim do form-row -->

    </form>

    </body>

</html>

<html>

    <html>
        <input type="button" class="btn btn-success btn-sm" value="Salvar" onclick="Acao('form_cadastro_os');">     
    
    </form>
        </form>
    </html>