<?php

//Reset fabrica impressora EPL e ZPL


//Arquivo
$arquivo = fopen("etiq.txt","a");


//Gera arquivo reset para impressoras ZPL

fwrite($arquivo,"^XA
^XA
^JUF
^JUS
^XZ ");

fclose($arquivo);


//Gera arquivo reset impressoras EPL modelos GC420t, GK420t, GX420t e GX430t, Zebra TLP 2722, TLP 2824, TLP 2844, TLP 3742  

//fwrite($arquivo,"^default");

//fclose($arquivo);


//Manda o arquivo para impressora de etiqueta

//Origem do arquivo
$arquivo = "C:\Program Files (x86)\EasyPHP-DevServer-14.1VC9\data\localweb\projects\ordemserv\etiq.txt";

//Caminho da impressão

$caminho_impressora = "//192.168.25.75/zd";

 if (copy($arquivo, $caminho_impressora))

 {
  
  	echo"<script language='javascript' type='text/javascript'>alert('Impressora resetada!');window.location.href='pesquisa_produto_cod.php?codigo={$codigo}'</script>";

//Deleta arquivo
	unlink($arquivo);

 }

 else
 
 {
 
  echo "Erro ao gerar etiqueta";
 
 }


//by Roberto
?>











