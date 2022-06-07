<?php session_start() ?>
<html>    
    <head> 
        <?php echo $sweet = $_SESSION['sweet_alert'];
?>   
    </head>
</html>

<?php require_once 'testa_login.php';

require_once 'conexao.php';

$nome_cliente = strtoupper( $_GET['nome'] );

$codigo_cliente = $_GET['codigo'];

$fantasia_cliente = strtoupper( $_GET['nomefant'] );

$rg_cliente = $_GET['rg'];

$cpf_cliente = $_GET['cpf'];

$cnpj_cliente = strtoupper( $_GET['cnpj'] );

$observacao_cliente = strtoupper( $_GET['observ'] );

$clientes_tipo = $_GET['desativado'];

if ( $nome_cliente == true ) {
				$sql = "select * from clientes where nome like '%$nome_cliente%' and status <> 'D'";
				
				 $consulta_nome_cliente = mysqli_query( $conexao, $sql );
				
				 $resultado = mysqli_num_rows ( $consulta_nome_cliente );
				
				 if ( $resultado > 1 ) {
								header( "Location:lista_clientes.php?nome=$nome_cliente" );
								
								 } 
				
				if ( $resultado == 0 ) {
								echo "<script>
        swal('Nenhum registro encotrado!')
            .then((value) => {
             window.location.href='lista_clientes.php';
});
</script>";
								 } 
				
				} 
if ( $codigo_cliente == true and $clientes_tipo == "D" ) {
				
				$sql = "select * from clientes where cod = '$codigo_cliente' and status = 'D'";
				
				 $consulta_tipo_cliente = mysqli_query( $conexao, $sql );
				
				 $resultado = mysqli_num_rows( $consulta_tipo_cliente );
				 } 

if ( $codigo_cliente == true and $clientes_tipo != "D" ) {
				
				$sql = "select * from clientes where cod = '$codigo_cliente' and status <> 'D'";
				
				 $consulta_codigo_cliente = mysqli_query( $conexao, $sql );
				
				 $resultado = mysqli_num_rows( $consulta_codigo_cliente );
				
				 if ( $resultado == 0 ) {
								echo "<script>
        swal('Nenhum registro encotrado!')
            .then((value) => {
             window.location.href='lista_clientes.php';
});
</script>";
								
								 } 
				
				} 
                

					
	                

// Fantasia cliente:
if ( $fantasia_cliente == true ) {
				
				$sql = "select * from clientes where nomefant like '%$fantasia_cliente%' and status <> 'D'";
				
				 $consulta_fantasia_cliente = mysqli_query( $conexao, $sql );
				
				 $resultado = mysqli_num_rows ( $consulta_fantasia_cliente );
				
				 if ( $resultado == 0 ) {
								echo "<script>
        swal('Nenhum registro encotrado!')
            .then((value) => {
             window.location.href='lista_clientes.php';
});
</script>";
								 } 
				
				if ( $resultado > 1 ) {
								
								header( "Location:lista_clientes.php?nomefant=$fantasia_cliente" );
								 } 
				
				} 
// RG Cliente:
if ( $rg_cliente == true ) {
				
				$sql = "select * from clientes where rg = '$rg_cliente' and status <> 'D'";
				
				 $consulta_rg_cliente = mysqli_query( $conexao, $sql );
				
				 $resultado = mysqli_num_rows ( $consulta_rg_cliente );
				
				 if ( $resultado == 0 ) {
								echo "<script>
        swal('Nenhum registro encotrado!')
            .then((value) => {
             window.location.href='lista_clientes.php';
});
</script>";
								 } 
				} 
// CPF Cliente:
if ( $cpf_cliente == true ) {
				
				$sql = "select * from clientes where cpf = '$cpf_cliente' and status <> 'D'";
				
				 $consulta_cpf_cliente = mysqli_query( $conexao, $sql );
				
				 $resultado = mysqli_num_rows ( $consulta_cpf_cliente );
				
				 if ( $resultado == 0 ) {
								echo "<script>
        swal('Nenhum registro encotrado!')
            .then((value) => {
             window.location.href='lista_clientes.php';
});
</script>";
								 } 
				} 
// CNPJ CLiente:
if ( $cnpj_cliente == true ) {
				
				$sql = "select * from clientes where cnpj = '$cnpj_cliente' and status <> 'D'";
				
				 $consulta_cnpj_cliente = mysqli_query( $conexao, $sql );
				
				 $resultado = mysqli_num_rows ( $consulta_cnpj_cliente );
				
				 if ( $resultado == 0 ) {
								echo "<script>
        swal('Nenhum registro encotrado!')
            .then((value) => {
             window.location.href='lista_clientes.php';
});
</script>";
								 } 
				} 
// Observacao cliente:
if ( $observacao_cliente == true ) {
				
				$Sql = "select * from clientes where observ like ('%$observacao_cliente%') and status <> 'D'";
				
				 $consulta_observ = mysqli_query( $conexao, $Sql );
				
				 $resultado = mysqli_num_rows ( $consulta_observ );
				
				 if ( $resultado > 1 ) {
								
								
								header( "Location:lista_clientes.php?observ={$observacao_cliente}" );
								 } 
				
				if ( $resultado == 1 ) {
								
								$sql = "select * from clientes where observ like ('%$observacao_cliente%') and status <> 'D'";
								 } 
				
				if ( $resultado == 0 ) {
								
								echo "<script>
        swal('Nenhum registro encotrado!')
            .then((value) => {
             window.location.href='lista_clientes.php';
});
</script>";
								 } 
				} 

$consulta = mysqli_query( $conexao, $sql );

if ( mysqli_error( $conexao ) == true ) {
				
				echo '<div class="error-mysql">';
				
				 echo( "Erro! <br> " . mysqli_error( $conexao ) );
				
				 echo '</div>';
				
				 mysqli_close( $conexao );
				 die;
				 } 
while ( $dados_cliente = mysqli_fetch_array( $consulta ) ) {
				
				$_SESSION['nome'] = $dados_cliente['nome'];
				
				 $_SESSION['rg'] = $dados_cliente['rg'];
				
				 $_SESSION['cpf'] = $dados_cliente['cpf'];
				
				 $_SESSION['telefone'] = $dados_cliente['telefone'];
				
				 $_SESSION['celular'] = $dados_cliente['celular'];			
				 

// Mostra contas a vencer no dia:
$data = date( "d/m/Y" );

$dia = date( "d" );

$mes = date( "m" );

$ano = date( "Y" );		
			

?>                     
<!DOCTYPE html>
<html>  
    <head>      
        <html lang='pt-BR'>      
            <meta charset='utf-8'>            
            <link rel='stylesheet' href='css/bootstrap-datepicker.min.css'>            
            <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>            
            <link type ="text/css" rel="stylesheet" href="css/reset.css">	        
            <link type ="text/css" rel="stylesheet" href="css/bootstrap.min.css">
            <!--<link type="text/css" rel="stylesheet" href="css/stylesheet.css">-->  
    </head>
    <body>
        <div class="container">
<script type="text/javascript" >
    function limpa_formulario_cep() {
            //Limpa valores do formulario de cep.
            document.getElementById('rua').value=("");
            document.getElementById('bairro').value=("");
            document.getElementById('cidade').value=("");
            document.getElementById('uf').value=("");
            document.getElementById('ibge').value=("");
}
    function meu_callback(conteudo) {
        if (!("erro" in conteudo)) {
            //Atualiza os campos com os valores.
            document.getElementById('rua').value=(conteudo.logradouro);
            document.getElementById('bairro').value=(conteudo.bairro);
            document.getElementById('cidade').value=(conteudo.localidade);
            document.getElementById('uf').value=(conteudo.uf);
            document.getElementById('ibge').value=(conteudo.ibge);
} //end if.
        else {
            //CEP nao Encontrado.
            limpa_formulario_cep();
            alert("CEP nao encontrado.");
    }
}
    function pesquisacep(valor) {
        //Nova variavel "cep" somente com digitos.
        var cep = valor.replace(/\D/g, '');
        //Verifica se campo cep possui valor informado.
        if (cep != "") {
            //Expressao regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;
            //Valida o formato do CEP.
            if(validacep.test(cep)) {
                //Preenche os campos com "..." enquanto consulta webservice.
                document.getElementById('rua').value="...";
                document.getElementById('bairro').value="...";
                document.getElementById('cidade').value="...";
                document.getElementById('uf').value="...";
                //Cria um elemento javascript.
                var script = document.createElement('script');
                //Sincroniza com o callback.
                script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';
                //Insere script no documento e carrega o conteudo.
                document.body.appendChild(script);
            } //end if.
            else {
                //cep é invalido.
                limpa_formulario_cep();
                alert("Formato de CEP invalido.");
            }
        } //end if.
        else {
            //cep sem valor, limpa formulario.
            limpa_formulario_cep();
        }
    };
</script>
           <h3 id="titulo-programas"><center>CADASTRO DE CLIENTES</center></h3><br>

            <form action="./" id='formulario' method="post">
                <!--<input type="button" class="btn btn-success" value="Alterar" onclick="Acao('altera_cliente');">-->                         
                <input type="button" class="btn btn-danger" value="Excluir" onclick="Acao('exclui_cliente');">				
                <input type="button" class="btn btn-info" value="Abrir OS" onclick="Acao('form_cadastroos');">   						 
                <input type="button" class="btn btn-secondary" value="Recibo" onclick="Acao('recibo');">						  						 
                <input type="button" class="btn btn-warning" value="Contrato" onclick="Acao('contrato');">   					
                <input type="button" class="btn btn-secondary" value="Pedido" onclick="Acao('pedido_roberto');">                         
                <input type="button" class="btn btn-dark" value="Sair" onclick="Acao('lista_clientes');">                                                                                                                                                                                
            </form>
<script type="text/javascript">
    // <![CDATA[
     function Acao(act){
       frm = document.getElementById('formulario');
       frm.action = act + '.php'; 
       frm.submit();
    // ]]>
    }
</script>


            <hr>
            <form method="POST"  action="altera_cliente.php">             
                <div class="form-row">        
                    <div class="form-group col-md-1">                 
                        <label for="cod">Cód:
                        </label>            
                        <input type="text" name="cod" class="form-control" maxlength="50" size="50" value="<?php echo $dados_cliente['cod']?>" disabled >        
                    </div>        
                    <div class="form-group col-md-2">               
                        <label for="datacad">Data cadastro:
                        </label>               
                        <input type="text" name="datacad" class="form-control" id="datacad" size="10" value="<?php echo date( 'd/m/Y', strtotime( $dados_cliente['datacad'] ) );
				 ?>" disabled>     
                    </div>    
                    <div class="form-group col-md-3">    
                        <label for="nome">Nome *:
                        </label>    
                        <input type="text" id="nome"  class="form-control" name="nome" maxlength="60" size="60" value="<?php echo $dados_cliente['nome']?>" autocomplete="off">    
                    </div>
                    <div class="form-group col-md-4">    
                        <label for="fantasia">Nome Fantasia:
                        </label>    
                        <input type="text" id="nomefant"  class="form-control" name="nomefant" value="<?php echo $dados_cliente['nomefant'];
				 ?>" maxlength="50" size="60" autocomplete="off">
                        <p>
                    </div>    
                    <div class="form-group col-md-2">    
                        <label for="rg">RG:
                        </label>    
                        <input type="text" id="rg" class="form-control" name="rg" value="<?php echo $dados_cliente['rg'];
				 ?>" maxlength="12" size="12" autocomplete="off">
                    </div>
                </div>
                <!--fim do form-row -->
                <div class="form-row">
                    <div class="form-group col-md-2">  
                        <label for="cpf">CPF:
                        </label>  
                        <input type="text" id="cpf" class="form-control" name="cpf" value="<?php echo $dados_cliente['cpf'];
				 ?>" maxlength="14" size="14" autocomplete="off">
                    </div>
                    <div class="form-group col-md-3">  
                        <label for="cnpj">CNPJ: 
                        </label>  
                        <input type="text" id ="cnpj" class="form-control" name= "cnpj" value="<?php echo $dados_cliente['cnpj'];
				 ?>" maxlength="18" size="18" autocomplete="off">
                    </div>  
                    <!--&nbsp;-->  
                    <div class="form-group col-md-3">    
                        <label>Tipo:
                        </label>        
                        <select name="tipo" class="form-control">            
                            <option selected value="cliente">
                            <?php echo strtoupper($dados_cliente['tipo']) ?>
                            </option>            
                            <option value="Cliente">Cliente
                            </option>            
                            <option value="Cliente e fornecedor">Cliente e Fornecedor
                            </option>            
                            <option value="Fornecedor">Fornecedor
                            </option>       
                        </select>   
                    </div>    
                    <div class="form-group col-md-4">    
                        <label for="datanasc">Data de Nascimento:
                        </label>    
                        <input type="date" name="datanasc" class="form-control" id="datanasc" value="<?php
				 echo $dados_cliente['datanasc'];
				 ?>">    
                    </div>
                </div>
                <!--fim do form-row -->      
                <!--<p>&nbsp;</p>-->
                <div class="form-row">      
                    <div class="form-group col-md-2">        
                        <label for="cep">CEP:
                        </label>        
                        <input type="text" name="cep"  id="cep" class="form-control" size="8" value="<?php echo $dados_cliente['cep'];
				 ?>" maxlength="8" onBlur="pesquisacep(this.value);" />            
                    </div>         
                    <div class="form-group col-md-1">                 
                        <label>&nbsp;
                        </label>                          
                        <a href="https://buscacepinter.correios.com.br/app/endereco/index.php?t/" target="_blank" class="form-control"</a>
                            <img src="images/buscacep.jpg" alt="Smiley face" width="30" height="30" align="absbottom"></a>                
                    </div>
                    <div class="form-group col-md-3">    
                        <label for="rua">Rua:
                        </label>    
                        <input id="rua" class="form-control" name="rua" type="text" value ="<?php echo strtoupper($dados_cliente['rua']) ?>" size="48">         
                    </div>
                    <div class="form-group col-md-1">    
                        <label for="numero">Nº *:
                        </label>    
                        <input type="text" id ="numero" class="form-control" name = "numero"  value="<?php echo $dados_cliente['numero'];
				 ?>" maxlength="4" size="4" autocomplete="off">     
                    </div>    
                    <div class="form-group col-sm-1">                 
                        <label>&nbsp;
                        </label>            
                        <a href="http://maps.google.com/maps?q=<?php echo $dados_cliente['rua'] . "+" . $dados_cliente['numero'] ?> " target="_blank" class="form-control">
                            <img src='images/maps.jpg' alt='Smiley face' height="40" width="40" border="0" /></a></a>    
                    </div>
                    <div class="form-group col-md-4">	
                        <label for="complemento">Complemento:
                        </label>	
                        <input type="text" id="complemento" class="form-control" name="complemento"  value ="<?php echo strtoupper($dados_cliente['complemento']) ?>" maxlength="50" size="50" autocomplet="off">
                    </div>
                </div>     
                <div class="form-row">             
                    <div class="form-group col-md-3">        	
                        <label for="bairro">Bairro:
                        </label>	           
                        <input type="text" id="bairro" class="form-control" name = "bairro" id='bairro' value ="<?php echo strtoupper($dados_cliente['bairro']) ?>" maxlength="20" value ="" size="20">        
                    </div>        
                    <div class="form-group col-md-2">            
                        <label for="cidade">Cidade:
                        </label>	       
                        <input type="text" name="cidade" id='cidade' class="form-control" maxlength="20" value ="<?php echo strtoupper($dados_cliente['cidade']) ?>" size="25">        
                    </div>
                    <!--fim do form-row -->
                    <div class="form-row">        
                        <div class="form-group col-md-2">        
                            <label for="uf">UF:
                            </label>	    
                            <input type="text" name="uf"  maxlength="2" id='uf' class="form-control" value ="<?php echo strtoupper($dados_cliente['uf']) ?>" size="2">    
                        </div>    
                        <div class="form-group col-md-4">        
                            <label for="telefone">Telefone *:
                            </label>	   
                            <input type="telefone" id="telefone" class="form-control" name ="telefone" value ="<?php echo $dados_cliente['telefone'] ?>" maxlength="20" size="20" autocomplete="off">
                            <p>    
                        </div>    
                        <div class="form-group col-md-4">	   
                            <label for="celular">Celular/Whatsapp*:
                            </label>        	       
                            <input type ="text" id="celular" class="form-control" name ="celular" value ="<?php echo $dados_cliente['celular'] ?>" maxlength="20" size="20" autocomplete="off">         
                        </div>    
                        <div class="form-group col-sm-1">              
                            <label>&nbsp;
                            </label>                  
                            <a href='http://api.whatsapp.com/send?phone=55<?php echo $dados_cliente['celular'] ?>'" class="form-control">
                                <img src='images/whatsapp.png' alt='Smiley face' height="40" width="40" border="0"/></a></a>         
                        </div>
                    </div>
                </div>
                <!--Fim do form-row -->
                <div class="form-row">    
                    <div class="form-group col-md-4">   	    
                        <label for="email">E-mail *:
                        </label>        
                        <input type="text" id="email" class="form-control" name ="email"  value ="<?php echo $dados_cliente['email'] ?>"maxlength="100" size="100" autocomplete="off">    
                    </div>       <td>    
                        <div class="form-group col-md-5">        
                            <label>Site:
                            </label>            
                            <input type="text" id="site" class="form-control" name="site" value ="<?php echo $dados_cliente['site'] ?>" maxlength="60" size="60" autocomplete="off">    
                        </div>
 <?php
 
//Contas a receber em aberto:

$cod_cliente = $dados_cliente['cod'];

$sql = "SELECT * FROM `contasareceber` WHERE datavenc < $ano$mes$dia and status = 'RECEBER' and codcliente = '$cod_cliente'";

$consulta = mysqli_query( $conexao, $sql );

if ( mysqli_error( $conexao ) == true ) {
				
				echo '<div class="error-mysql">';
				
				 echo( "Erro! <br> " . mysqli_error( $conexao ) );
				
				 echo '</div>';
				
				 mysqli_close( $conexao );
				 die;
				 } 

while ( $dados = mysqli_fetch_array( $consulta ) ) {
				
				$total_em_aberto = $dados['total'];				
				 
}  
 
 
 ?>               
                
                <div class="form-group col-md-2">
                <label style="color: #FF0000;"><b>Em atraso:</label>
                <input type="text" value="<?php echo "R$" . number_format( $total_em_aberto, 2, ',', '.' ) ?>" class="form-control" disabled>
                </div>
                </div>
                
                
                <!--fim do for-row-->
                <div class="form-row">    
                    <div class="form-group col-md-4">	
                        <table border="1">	<label><b>Observações:</b></label><td>
<textarea name="observ" rows="5" cols="124" maxlenght="300" size="300">
<?php echo trim( $dados_cliente['observ'] ) ?>
	</textarea>	
                        </table>
                        <br>
                        <input type="submit" class="btn btn-success" id="formulario"  value="Salvar">
            </form>
        </div>
        <!--fim do form-row -->
<?php
				 // Sessions dados do formulário
			     $_SESSION['cod'] = $dados_cliente['cod'];
				 $_SESSION['cpf'] = $dados_cliente['cpf'];
				 $_SESSION['cnpj'] = $dados_cliente['cnpj'];
				 $_SESSION['rg'] = $dados_cliente['rg'];
				 $_SESSION['rua'] = $dados_cliente['rua'];
				 $_SESSION['numero'] = $dados_cliente['numero'];
				 $_SESSION['bairro'] = $dados_cliente['bairro'];
				 $_SESSION['cidade'] = $dados_cliente['cidade'];
				 $_SESSION['uf'] = $dados_cliente['uf'];
				 $_SESSION['cep'] = $dados_cliente['cep'];
				 $_SESSION['email'] = $dados_cliente['email'];
				 $_SESSION['site'] = $dados_cliente['site'];
                 $_SESSION['status'] = $dados_cliente['status'];   
                           
                 
				 
                 ?>
        </div>
        <div class="busca">
            <form method="GET" action="pesquisa_cliente.php">
                <hr>
        </div>
        <hr>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>
    <?php } 
?>