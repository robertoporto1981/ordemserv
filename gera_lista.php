<?php session_start ?>

<?php

//criamos o arquivo:
$arquivo = fopen('lista_de_componentes.txt','w');

fwrite($arquivo,'LISTA DE COMPONENTES:'."\n\n");

echo '<td><h3><center>Lista de componentes:</center></h3></td>';
 
foreach(str_replace('%',' ',$_POST["produto"]) as $produto){              
        
        echo "<b>$produto</b>"."&nbsp&nbsp&nbsp"."-"."&nbsp&nbsp&nbsp"."Quantidade:______".'<br>';                      
        
        echo '</table>';
        
        
$lista = $produto. "\n" ;            

fwrite($arquivo,$lista);

//verificamos se foi criado:
if ($arquivo == false) die('Não foi possível criar o arquivo.');

//escrevemos no arquivo 

}

//Fechamos o arquivo após escrever nele
fclose($arquivo); 
 
?>