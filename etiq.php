<?php session_start() ?>
<html>
		<head>
		
		<link type="text/css" rel="stylesheetcss" href="stylesheet.css"/>
             
        <?php echo $sweet = $_SESSION['sweet_alert'];
?>  
        
</head>

<body>  

<?php

// Etiqueta para impressora ZPL:
// Recebo as variáveis do pesquisa_produto_cod.php:
$codigo = $_SESSION['codigo'];

$produto = $_SESSION['descr'];

$valor = number_format( $_SESSION['valor'], 2, '.', '' );


// Arquivo:
$arquivo = fopen( "etiq.txt", "a" );    

// Gera arquivo:
fwrite( $arquivo, "^XA
^PRA
^LH000,000
^LL480^FS
^PQ001
^FO090,130^AQN,10,10^FDCod:{$codigo}^FS
^FO070,080^AUN,10,10^FD{$produto}^FS
^FO090,150^AQN,10,10^FDGarantia de 3 meses^FS
^FO050,210^AQN,10,10^FDVP000725 XX13^FS
^FO050,240^BY2,10,10^B2N,070,N,N^FD0177628038021^FS
^FO050,310^ASN,10,10^FD0177628038021^FS
^FO050,420^AUN,10,10^FDA Vista^FS
^FO050,475^AUN,10,10^FDR${$valor}^FS
l
^XZ " );

fclose( $arquivo );


// Manda o arquivo para impressora de etiqueta
// Origem do arquivo
$arquivo = "C:/xampp/htdocs/projects/ordemserv/etiq.txt";

// Caminho da impressão
// Nome da impressora e nome do compartilhamento:
$caminho_impressora = "//impressora_etiqueta/compartilhamento";

 if ( copy( $arquivo, $caminho_impressora ) )
				
				 {
				
// Java script Sweet alert
    echo "<script>
        swal('Etiqueta gerada!')
            .then((value) => {
                 window.location.href='pesquisa_produto.php?codigo={$codigo}';
});

</script>";
				
// Deleta arquivo
unlink( $arquivo );
				
				 } 

else
				
				 {
				
				// Java script Sweet alert:
				echo "<script>
swal('Nao foi possivel gerar etiqueta!')
.then((value) => {
             window.location.href='pesquisa_produto_cod.php?codigo={$codigo}';
});

</script>";
				
				
				} 






?>

</body>

</html>









