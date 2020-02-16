 <?php session_start(); ?>

 <?php include 'testa_login.php'; ?>

<html lang='pt-BR'>

	<head>

		<meta charset='utf-8'>

			<link type ="text/css" rel="stylesheet" href="stylesheet.css">

	</head>
    
	<title>Clientes</title>

<h1 id="titulo-programas">Cadastro de clientes</h1><p>
	   
<?php
	 
	
		$cnpj = ($_GET['cnpj']);


	//$_SESSION['cnpj'] = $cnpj;
	
		$usuario = strtoupper($_SESSION['login']); 	

//conexao com banco

		require_once 'conexao.php';


//Testa se a variavel e vazia:

if(empty($cnpj)){
  
  
  header("Location:lista_clientes.php");
 
}

     		
$sql = "select * from clientes where cnpj = '$cnpj'";
	
  	     
	$consulta = mysqli_query($conexao,$sql);
   
         
    $resultado = mysqli_num_rows($consulta);

//echo "$num_rows Rows\n";
          
if($resultado == 0){
                 
  
 echo"<script language='javascript' type='text/javascript'>alert('Cliente nao cadastrado no banco de dados!');window.location.href='form_cadastro_cliente.html';</script>";


} 


while($registro = mysqli_fetch_assoc($consulta)){
       
     echo"<form action='./' id='formulario' method='post'>";          
    
     echo '<font face="verdana"><table border style="width:100%">';
  	
 	 echo '<tr>';
  
 	 echo"Codigo:<input type='text' name ='cod' maxlength='20' id='formulario' value ='".$registro['cod']."' size='2'>";
 	 
 	 echo "Nome:<input type='text' name ='nome' maxlength='50' id='formulario' value ='".$registro['nome']."' size='50'>";

 	 echo "Fantasia:<input type='text' name ='nome' maxlength='50' id='formulario' value ='".$registro['nomefant']."' size='50'><br><br>";
   
     echo "Data Nasc*:<input type='text' name ='datanasc' maxlength='50' id='formulario' value ='".$registro['datanasc']."' size='50'>";
   


  	echo "CPF: <input type='text' name='cpf' maxlength='11' id='formulario' value = '".$registro['cpf']."' size='11'>";
	
	echo "CNPJ: <input type='text' name= 'cnpj' maxlength='14' id='formulario' value ='".$registro['cnpj']."' size='10'><br><br>";
  
   echo "Tipo de cadastro: <input type='text' name= 'cnpj' maxlength='20' id='formulario' value ='".$registro['tipo']."' size='20'>";

 	echo "CEP:<input name='cep' type='text' value='".$registro['cep']."' id='formulario' size='8' maxlength='8' />";	
   
   echo"<br>";
   
   echo"<br>";

	echo "Rua:<input type='text' name='rua' maxlength='30' id='formulario' value ='".$registro['rua']. "' size='40'>";
	
	echo "Numero:<input type='text' name = 'numero' maxlength='4' id='formulario' value ='".$registro['numero']."' size='4'>"; 
    
	echo "Complemento:<input type='text' name='complemento' maxlength='15' id='formulario' id='formulario' value = '".$registro['complemento']."' size='15'>";
	
	echo "Bairro:<input type='text' name = 'bairro' maxlength='20'  id='formulario' value = '".$registro['bairro']."' size='20'>";
	
	echo "Cidade:<input type='text' name = 'cidade' maxlength='20' id='formulario' value = '".$registro['cidade']."' size='25'>";
	
	echo "UF:<input type ='text' name = 'uf' maxlength='2' value='".$registro['uf']."' id='formulario' size='2'><br><br>";
	
	echo "Telefone:<input type='text' name ='telefone' maxlength='11' id='formulario' value ='".$registro['telefone']."' size='12'><p>";
  
  	echo "Celular:<input type='text' name ='celular' maxlength='11' id='formulario' value ='".$registro['celular']."' size='11'>";
  
  	echo "Email:<input type='text' name ='email' maxlength='40' id='formulario' value ='".$registro['email']."' size='40'>";  


	echo "Observacao:<input type='text' name ='observ' maxlength='40' id='formulario' value ='".$registro['observ']."' size='40'>"; 
   

echo '</td>';
 	
 	$_SESSION['nome'] = $registro['nome'];

 	$_SESSION['nomefant'] = $registro['nomefant'];
  
  	$_SESSION['datanasc'] = $registro['datanasc'];
 	
 	$_SESSION['rua'] = $registro['rua'];
 	
 	$_SESSION['numero'] = $registro['numero'];
 	
 	$_SESSION['bairro'] = $registro['bairro'];
 	
 	$_SESSION['cidade'] = $registro['cidade'];
 	
 	$_SESSION['uf'] = $registro['uf'];
 	
 	$_SESSION['cep'] = $registro['cep'];
 	
 	$_SESSION['cpf'] = $registro['cpf'];
  
  $_SESSION['tipo'] = $registro['tipo'];     
  
 	
 	$_SESSION['telefone'] = $registro['telefone'];
 	
 	$_SESSION['celular'] = $registro['celular'];
 	
 	$_SESSION['email'] = $registro['email'];

 	$_SESSION['observ'] = $registro['observ'];

 	$cel = $registro['celular'];


}    

  echo'</table>';
}
  

  
   	
?>
        
	   
     
    <!--<form action="./" id='formulario' method="post">-->  
    <input type="button" id="btn-salvar" value="Alterar" onclick="Acao('altera_cliente');">
    
	<input type="button" id="btn-limpar" value="Excluir" onclick="Acao('exclui_cliente');">

	<input type="button" id="btn-reimprimeos" value="Abrir OS" onclick="Acao('form_cadastroos');">

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
      <form method="POST" action="form_cadastro_cliente.html">

<p align ="left"> <input type="submit" id="btn-sair" value="Sair">

</form>
