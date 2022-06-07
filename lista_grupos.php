<?php session_start() ?>
<!DOCTYPE html>
<html>

    <html lang='pt-BR'>

<head>
        
    <meta charset='utf-8'>

    <link rel='stylesheet' href='css/bootstrap-datepicker.min.css'>

    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>

    <link type="text/css" rel="stylesheet" href="css/reset.css">

    <link rel="stylesheet" href="css/bootstrap.css">
     <!--<link type="text/css" rel="stylesheet" href="stylesheet.css">-->

</head>
<body>
        <h1><center>CATEGORIAS</center></h1>
<form method="post" action="form_categorias.php">
      <input type="submit" class="btn btn-success btn-sm" id="formulario" value="Novo">         
        
        <button onclick="window.close()" class="btn btn-dark btn-sm">Sair</button>       
</form>


<hr>
<div class="container">

<?php

require_once 'conexao.php';


$sql = "SELECT * FROM categoriaproduto order by id asc";


$consulta = mysqli_query($conexao,$sql);
if(mysqli_error($conexao) == TRUE){
echo '<div class="error-mysql">';

echo("Mysql query Erro! <br> " . mysqli_error($conexao));

echo '<br>';
    
    echo $sql;

echo '</div>';
 
mysqli_close($conexao);
die;
}
       

 echo '<table class="table table-bordered">
    
    <thead class="thead-dark">
    
    <tr>
              
      <th scope="col">#</th>
                    
      <th scope="col">CÓDIGO:</th>
      
      <th scope="col">CATEGORIA:</th>
           
          
    </tr>
    
    </thead>';             

// Armazena os dados da consulta em um array associativo

while($registro = mysqli_fetch_assoc($consulta)){

			echo '<tr>';
            
            echo '<td id="campos"><a href="edita_grupos.php?ID='.$registro["id"].'"#><img src="images/edit.png"></td>';
            
			echo '<td id="campos">'.$registro["id"].'</td>';
            
            echo '<td id="campos">'.$registro["grupo"].'</td>'; 

	        echo '</tr>';
		
}

echo '</table>';

?>
</div>
</body>
</html>
