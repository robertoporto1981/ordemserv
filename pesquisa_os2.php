<?php session_start() ?>

          

<html lang='pt-BR'>
	
  <head>
  
    <meta charset="utf-8">
    
        
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
    
    <link rel='stylesheet' href='css/bootstrap-datepicker.min.css'>
    
    <link type="text/css" rel="stylesheet" href="stylesheet.css"/> 
		
   </head>
    
     <title>Ordem de servicos</title>

<h1 id="titulo-programas">Relatorio ordem de servicos</h1><p>
	   
<?php

$usuario = $_SESSION['login'];

//Variavel cliente recebe dados do POST

    $cliente = $_POST['nome'];
    

//conexao com banco

	   require_once 'conexao.php';

if(empty($cliente)){

  $cliente = "%%";

}else{
 
  
  $cliente = strtoupper($_POST['nome']); 
  
}
	
	
//Query banco de dados 


	$sql = "select * from ordem where cliente like('%$cliente%') order by numeroord asc";
  
	     
	   $consulta = mysqli_query($conexao,$sql);
	 
       $resultado = mysqli_num_rows($consulta);

if($resultado == 0){
   
   echo"<script language='javascript' type='text/javascript'>alert('OS nao encontrado!');window.location.href='consulta_os.html';</script>";
   
}

//Mostra tabelas na tela 

echo '<font face="verdana"><table border style="width:100%">'; 


echo '<tr>';

    echo '<td id="borda"></td>';
  
    echo '<td id="borda">NUMERO OS:</td>';

    echo '<td id="borda">DATA ENTRADA:</td>';

    echo '<td id="borda">CLIENTE:</td>';

    echo '<td id="borda">MARCA:</td>';

    echo '<td id="borda">DEFEITO:</td>';

    echo '<td id="borda-status">STATUS:</td>';

echo '</tr>';

	
       
     echo"<form action='./' id='formulario' method='post'>";          
    
//Dados da tabela   
     
while($registro = mysqli_fetch_assoc($consulta)){   

$_SESSION['os'] = $registro['NumeroOrd'];

 echo '<tr>'; 


     echo '<td id="campos"><a href="edita_os2.php?os='.$registro["NumeroOrd"].'"#><img src="images/edit.png"></td>';

    echo '<td id="campos">'.$registro["NumeroOrd"].'</td>';
    
    //echo '<td id="campos">'.$registro["dataentr"].'</td>'; 

$dataentr = $registro["dataentr"];

    $dia = substr("$dataentr",0,2);

    $mes = substr("$dataentr",2,2);

    $ano = substr("$dataentr",4,8);

    $dataentrada = "$dia/$mes/$ano";

  echo '<td id="campos">'.$dataentrada.'</td>'; 
    
   
    echo '<td id="campos">'.$registro["cliente"].'</td>';
    
    echo '<td id="campos">'.$registro["marca"].'</td>';
    
    echo '<td id="campos">'.$registro["mensage"].'</td>';
 
if($registro['status'] == 'ABERTO'){
  
    echo '<td id="status-aberto">'.$registro["status"].'</td>';
 
 } 

if($registro['status'] == 'FINALIZADO'){ 
 
    echo '<td id="status-fechado">'.$registro["status"].'</td>';

} 

if($registro['status'] == 'Em andamento'){

       echo '<td>'.$registro["status"].'</td>';

}

if($registro['status'] == 'ORCAMENTO'){

    echo '<td>'.$registro["status"].'</td>';
       
} 

if($registro['status'] == 'APROVADO'){
    
    echo '<td id="status-fechado">'.$registro["status"].'</td>';

}

if($registro['status'] == 'NAO APROVADO'){

  echo '<td id="status-aberto">'.$registro["status"].'</td>';

} 

if($registro['status'] == 'GARANTIA'){

  echo '<td id="status-garantia">'.$registro["status"].'</td>';
  
} 

if($registro['status'] == 'AGUARDANDO APROVACAO'){

echo '<td id="status-garantia">'.$registro["status"].'</td>';
 
} 

if($registro['status'] == 'AGUARDANDO PECAS'){

echo '<td id="status-garantia">'.$registro["status"].'</td>';

}
 
if($registro['status'] == 'SEM CONSERTO'){

  echo '<td id="status-aberto">'.$registro["status"].'</td>';

}

if($registro['status'] == 'CANCELADO'){

  echo '<td id="status-aberto">'.$registro["status"].'</td>';

}

 echo '</tr>';
   
  
}
  
  echo '</table>';
  
}


   	
?>

<form action="menu.php">

		<p align ="left"> <input type="submit" id="btn-sair" value="Sair">

			</form>

</html>