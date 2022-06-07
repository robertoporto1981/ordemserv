<?php session_start(); ?>

<?php require_once 'testa_login.php'; 

require_once 'conexao.php';

//$codigo_cliente = $_GET['cod'];

$nome_cliente = $_GET['nome'];

$codigo_cliente = $_GET['codigo'];

$fantasia_cliente = $_GET['nomefant'];

$rg_cliente = $_GET['rg'];

$cpf_cliente = $_GET['cpf'];

$cnpj_cliente = $_GET['cnpj'];

$observacao_cliente = $_GET['observ'];


if($nome_cliente == TRUE){

    $sql = "select * from clientes where nome like '%$nome_cliente%'";  

    $consulta_nome_cliente = mysqli_query($conexao,$sql);

    $resultado =  mysqli_num_rows ($consulta_nome_cliente);    

if($resultado > 1){

    header("Location:lista_clientes.php?nome=$nome_cliente");
    
}
if($resultado == 0){

    echo"<script language='javascript' type='text/javascript'>alert('Nenhum registro encontrado!');window.location.href='lista_clientes.php'</script>";

}
    

}

if($codigo_cliente == TRUE){
    
  $sql = "select * from clientes where cod = '$codigo_cliente'";  

}

//Fantasia cliente:
if($fantasia_cliente == TRUE){
    
      $sql = "select * from clientes where nomefant like '%$fantasia_cliente%'";  

      $consulta_fantasia_cliente = mysqli_query($conexao,$sql);

      $resultado =  mysqli_num_rows ($consulta_fantasia_cliente);  

if($resultado == 0){

    echo"<script language='javascript' type='text/javascript'>alert('Nenhum registro encontrado!');window.location.href='lista_clientes.php'</script>";

}

if($resultado > 1){

    header("Location:lista_clientes.php?nomefant=$fantasia_cliente");
}
   

}
//RG Cliente:
if($rg_cliente == TRUE){
    
    $sql = "select * from clientes where rg = '$rg_cliente'"; 
    
    $consulta_rg_cliente = mysqli_query($conexao,$sql);

    echo $resultado =  mysqli_num_rows ($consulta_rg_cliente);  
    
if($resultado == 0){

    echo"<script language='javascript' type='text/javascript'>alert('Nenhum registro encontrado!');window.location.href='lista_clientes.php'</script>";

}

}

//CPF Cliente:
if($cpf_cliente == TRUE){
    
    $sql = "select * from clientes where cpf = '$cpf_cliente'"; 
    
    $consulta_cpf_cliente = mysqli_query($conexao,$sql);

    $resultado =  mysqli_num_rows ($consulta_cpf_cliente);  
    
if($resultado == 0){

    echo"<script language='javascript' type='text/javascript'>alert('Nenhum registro encontrado!');window.location.href='lista_clientes.php'</script>";

}

}

//CNPJ CLiente:
if($cnpj_cliente == TRUE){
    
    $sql = "select * from clientes where cnpj = '$cnpj_cliente'"; 
    
    $consulta_cnpj_cliente = mysqli_query($conexao,$sql);

    $resultado =  mysqli_num_rows ($consulta_cnpj_cliente);  
    
if($resultado == 0){

    echo"<script language='javascript' type='text/javascript'>alert('Nenhum registro encontrado!');window.location.href='lista_clientes.php'</script>";

}

}
//Observacao cliente:
if($observacao_cliente == TRUE){
    
    //$_SESSION['observacao'] = $observacao_cliente;
    
    $Sql = "select * from clientes where observ like ('%$observacao_cliente%')";
    
    $consulta_observ = mysqli_query($conexao,$Sql);

   $resultado =  mysqli_num_rows ($consulta_observ);
       

if($resultado > 1){
 
    
    header("Location:lista_clientes.php?observ={$observacao_cliente}");


    }

if($resultado == 1){

        $sql = "select * from clientes where observ like ('%$observacao_cliente%')";
    }

if($resultado == 0){
    
    echo"<script language='javascript' type='text/javascript'>alert('Nenhum registro encontrado!');window.location.href='lista_clientes.php'</script>";
}

}


$consulta = mysqli_query($conexao,$sql);         

while($dados_cliente = mysqli_fetch_array($consulta)){

    $_SESSION['nome'] = $dados_cliente['nome'];

    $_SESSION['rg'] = $dados_cliente['rg'];

    $_SESSION['cpf'] = $dados_cliente['cpf'];

    $_SESSION['telefone'] = $dados_cliente['telefone'];

    $_SESSION['celular'] = $dados_cliente['celular'];
       
       
?>
    


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

<h1 id="titulo-programas"><center>Cadastro de clientes</center></h1><br>

<form action="./" id='formulario' method="post">


<!--<input type="button" class="btn btn-success" value="Alterar" onclick="Acao('altera_cliente');">-->
            
            <input type="button" class="btn btn-danger" value="Excluir" onclick="Acao('exclui_cliente');">

				<input type="button" class="btn btn-info" value="Abrir OS" onclick="Acao('form_cadastroos');">
  
						 <input type="button" class="btn btn-secondary" value="Recibo" onclick="Acao('recibo');">
						 
						 <input type="button" class="btn btn-warning" value="Contrato" onclick="Acao('contrato');">

   					<input type="button" class="btn btn-secondary" value="Pedido" onclick="Acao('pedido_roberto');">
  
                       <input type="button" class="btn btn-dark" value="Sair" onclick="Acao('menu');">

				<a href="http://api.whatsapp.com/send?1=pt_BR&phone=55<?php echo $cel ?>"><img src='images/whatsapp.png' alt='Smiley face' height="20" width="30" border="0"/></a></a>
                
                
            
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
    
 
    
    <div class="form-group">
    
    <label for="cod">Cód:</label><br>

    <input type="text" id="cod"  name="cod" maxlength="50" size="50" value="<?php echo $dados_cliente['cod']?>" disabled >

</div>

<div class="form-group">

<label for="datacad">Data cadastro:</label><br>

<input type="text" name="datacad" id="datacad" size="8" value="<?php echo $dados_cliente['datacad']; ?>" disabled>

</div>
    <div class="form-group">

    <label for="nome">Nome *:</label><br>

    <input type="text" id="nome"  name="nome" maxlength="50" size="50" value="<?php echo $dados_cliente['nome']?>" autocomplete="off">
</div>

<div class="form-group">

    <label for="fantasia">Nome Fantasia:</label><br>

<input type="text" id="nomefant"  name="nomefant" value="<?php echo $dados_cliente['nomefant']; ?>" maxlength="50" size="60" autocomplete="off"><br><p>

</div>

<div class="form-group">

    <label for="rg">RG:</label><br>

<input type="text" id="rg" name="rg" value="<?php echo $dados_cliente['rg']; ?>" maxlength="10" size="10" autocomplete="off">


</div>
<div class="form-group">

  <label for="cpf">CPF:</label> <br>

  <input type="text" id="cpf" name="cpf" value="<?php echo $dados_cliente['cpf']; ?>" maxlength="12" size="12" autocomplete="off">

</div>

<div class="form-group">

  <label for="cnpj">CNPJ: </label><br>

  <input type="text" id ="cnpj" name= "cnpj" value="<?php echo $dados_cliente['cnpj']; ?>" maxlength="14" size="10" autocomplete="off">

</div>
  <!--&nbsp;-->

  <div class="form-group">

    <label>Tipo:</label><br>

<select name="tipo">

<option value="Cliente">Cliente</option>

<option value="Cliente e fornecedor">Cliente e Fornecedor</option>

<option value="Fornecedor">Fornecedor</option>

</select>

</div>

<div class="form-group">

<label for="datanasc">Data de Nascimento:</label><br>

<input type="date" name="datanasc" id="datanasc" value="<?php echo $dados_cliente['datanasc']; ?>">
</div>

      <!--<p>&nbsp;</p>-->
<div class="form-group">
      <label for="cep">CEP:</label><br>

    <input type="text" name="cep"  id="cep" size="8" value="<?php echo $dados_cliente['cep']; ?>" maxlength="8" onBlur="pesquisacep(this.value);" />  

    <a href="http://www.buscacep.correios.com.br/sistemas/buscacep/" target="_blank"</a><img src="images/buscacep.jpg" alt="Smiley face" width="30" height="30" align="absbottom"></a><br>

<v class="form-group">

    <label for="rua">Rua:</label><br>

    <input id="rua"name="rua" type="text" value ="<?php echo $dados_cliente['rua'] ?>" size="48">
</div>
<div class="form-group">

    <label for="numero">Nº *:</label><br>

    <input type="text" id ="numero" name = "numero"  value="<?php echo $dados_cliente['numero']; ?>" maxlength="4" size="4" autocomplete="off"> <br>
</div>

<div class="form-group">

	<label for="complemento">Complemento:</label><br>

	<input type="text" id="complemento" name="complemento"  value ="<?php echo $dados_cliente['complemento'] ?>" maxlength="15" size="15" autocomplet="off">
</div>

<div class="form-group">

	<label for="bairro">Bairro:</label><br>

	<input type="text" id="bairro" name = "bairro" id='bairro' value ="<?php echo $dados_cliente['bairro'] ?>" maxlength="20" value ="" size="20">
</div>

<div class="form-group">

    <label for="cidade"><br>Cidade:</label><br>

	<input type="text" name = "cidade" id='cidade' maxlength="20" value ="<?php echo $dados_cliente['cidade'] ?>" size="25">

</div>
<div class="form-group">

<label for="uf">UF:</label><br>

	<input type="text" name = "uf"  maxlength="2" id='uf' value ="<?php echo $dados_cliente['uf'] ?>" size="2">
</div>
<div class="form-group">

<label for="telefone">Telefone *:</label>

	<input type="telefone" id="telefone" name ="telefone" value ="<?php echo $dados_cliente['telefone'] ?>" maxlength="12" size="11" autocomplete="off"><br><p>
</div>
<div class="form-group">

	<label for="celular">Celular/Whatsapp*:</label><br>

	<input type ="text" id="celular" name ="celular" value ="<?php echo $dados_cliente['celular'] ?>" maxlength="11 size="10" autocomplete="off">
</div>
<div class="form-group">

   	<label for="email">E-mail *:</label><br>

    <input type="text" id="email" name ="email"  value ="<?php echo $dados_cliente['email'] ?>"maxlength="40" size="40" autocomplete="off">
</div>
       <td>
<div class="form-group">

    <label>Site:</label><br>

    <input type="text" id="site" name="site" value ="<?php echo $dados_cliente['site'] ?>" maxlength="40" size="40" autocomplete="off">
</div>


<br>

	<table border="1">

	<br><b>Observacoes:</b><td><textarea name="observ" rows="5" cols="60" maxlenght="300" size  = "300">
    <?php echo $dados_cliente['observ'] ?>
	</textarea>

	</table>

	<br>

<input type="submit" class="btn btn-success" id="formulario"  value="Salvar">

</form>


<?php
//Sessions
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



?>


</div>
<div class="busca">

<form method="GET" action="pesquisa_cliente.php">

<br>

<hr>



</div>



<hr>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

<?php } ?>