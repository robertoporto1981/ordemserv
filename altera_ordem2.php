<?php session_start() ?>

<?php
     
   $OS = $_SESSION['os'];

   $cliente = strtoupper($_POST['cliente']);

//$previsaosaida = $_POST["prevsaid"];

 //Teste data saida: 
    
    $datasaida=date('d/m/Y');

    $dia = substr("$datasaida",0,2);

    $mes = substr("$datasaida",2,2);

    $ano = substr("$datasaida",4,8);

    $previsaosaida = "$dia$mes$ano";
  
    $endereco = strtoupper($_POST["endereco"]);

    //*$numero = $_POST["numero"];

    $bairro = strtoupper($_POST["bairro"]);

    $cidade = strtoupper($_POST["cidade"]);

    $uf = strtoupper($_POST["uf"]);

    $cep = $_POST["cep"];

    $cpfcnpj = $_POST["cpfcnpj"];

    $rg = $_POST["rg"];

    $telef = $_POST["telef"];

    $telef2 = $_POST["telef2"];
    
    $marca = $_POST["marca"];

    $email = $_POST["email"];

    $equipamento = strtoupper($_POST["equipamento"]);

    $modelo = $_POST["modelo"];

    $marca = strtoupper($_POST["marca"]);

    $serial = $_POST["serial"];

    $acessorios = $_POST["acessorios"];

    $detalhes1 = strtoupper($_POST["detalhes"]);

    $detalhes2 = preg_replace('/\t||\r/','',$detalhes1);
    
    $defeito = strtoupper($_POST["mensage"]);

    $servexec1 = strtoupper($_POST["servexec"]);

    $servexec = preg_replace('/\t||\r/','',$servexec1);

    $status = $_POST["status"];


if($status == "FINALIZADO"){

        $data=date('d/m/Y');

 }else{

        $data = " ";
 }    


 //Conecta com o bando de dados:
    
require_once 'conexao.php';
	       

$sql = ("UPDATE ordem SET previsaosaida ='$previsaosaida', cliente = '$cliente',endereco = '$endereco',bairro = '$bairro',cidade = '$cidade',telef ='$telef', telef2 ='$telef2',marca ='$marca',serial = '$serial', acessorios = '$acessorios',equipamento = '$equipamento', modelo ='$modelo',detalhes = '$detalhes2', mensage = '$defeito',servexec = '$servexec',status = '$status' WHERE NumeroOrd = '$OS'"); 

//Encerra conexao com banco:	 
	
mysqli_query($conexao,$sql) or die ("Erro ao tentar cadastrar registro");

mysqli_close($conexao);


echo"<script language='javascript' type='text/javascript'>alert('OS Alterada!');window.location.href='menu.php'</script>";

?>