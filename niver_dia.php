<?php session_start() ?>

<?php include 'testa_login.php' ?>
 
 
 <html lang='pt-BR'>
 
    <head>

 	  <meta charset='utf-8'>	

      <link type="text/css" rel="stylesheet" href="stylesheet.css">

      <link type="text/css" rel="stylesheet" href="css/bootstrap.css">

      <?php echo $sweet = $_SESSION['sweet_alert']; ?> 
 
 </head>
 
 <title>Aniversariantes</title>

		<h3><center>ANIVERSÁRIANTES DO DIA</center></h3>

<?php

date_default_timezone_set("America/Sao_Paulo");	

 
		$usuario = $_SESSION['login'];	

		$data = date("d/m/Y");
	
		$dia = date("d");

		$mes = date("m");


//Conexao

require_once 'conexao.php';

$sql = "SELECT * FROM clientes WHERE MONTH(datanasc) = '$mes' AND DAY(datanasc) = '$dia' order by nome asc";

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

$resultado = mysqli_num_rows($consulta);
  

if($resultado == 0 ){
    
//Java script Sweet alert

echo "<script>
swal('Nenhum aniversáriante hoje!')
.then((value) => {
             window.location.href='menu.php';
});

</script>";
die;    
}

// Armazena os dados da consulta em um array associativo
 echo '<table class="table table-bordered">
    
    <thead class="thead-dark">
    
    <tr>
              
      <th scope="col">CÓDIGO:</th>
      
      <th scope="col">NOME:</th>
    
      <th scope="col">DATA NASCIMENTO:</th>
    
      <th scope="col">TELEFONE:</th>
    
      <th scope="col">CELULAR:</th>
      
      <th scope="col">EMAIL:</th>
      
      <th scope="col">WHATSAPP:</th>    
          
    </tr>
    
    </thead>';    

while($registro = mysqli_fetch_assoc($consulta)){
    
    	echo"<form action='./' id='formulario' method='post'>";
    
  
  		echo'<tr>';   
  
      echo '<td>'.$registro['cod'].'</td>';
 		
  	  echo '<td>'.$registro['nome'].'</td>';
               
      $Data = $registro["datanasc"];

      $dia = substr("$Data",8,9);

	    $mes = substr("$Data",5,2);

	    $ano = substr("$Data",0,4);

      $data_nasc = "$dia/$mes/$ano";

	    echo '<td>'.$data_nasc.'</td>';
  
 		echo '<td>'.$registro['telefone'].'</td>';
  
  		echo '<td>'.$registro['celular'].'</td>';
  
		echo '<td>'.$registro['email'].'</td>';
  
  		echo "<td id='campos-whatsapp'><a href='https://api.whatsapp.com/send?phone=55".$registro['celular']."&text=%20Feliz aniversario'><img src='images/whatsapp.png' alt='Smiley face' height='20' width='30' border='0'/></a></a>";


//echo "<td id='campos'><a href='http://api.whatsapp.com/send?1=pt_BR&phone=55".$registro['celular']."'>WHATSAPP</a>";
  
	  	echo "<br>";
         
		echo'</tr>'; 
 
    
}
 		echo'</table>';	
  	
	
?>

</body>

</html>

  </br>

  <p>
     
     <form action="./" id="formulario" method="post">

    <input type="button" id="btn-sair" value="Sair" onclick="Acao('menu');">
    
<script type="text/javascript">
    // <![CDATA[
     function Acao(act){
       frm = document.getElementById('formulario');
       frm.action = act + '.php'; 
       frm.submit();
    // ]]>
    }
</script>

