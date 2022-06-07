<?php session_start() ?>

<?php
require_once 'conexao.php';

$pagina = $_SESSION['pagina'];

//echo '<br>';

$tabela = $_SESSION['tabela'];

// Selecionar BD:
mysqli_select_db("db01", $conexao);

// Pegar a página atual por GET:
$p = $_GET["p"];

// Verifica se a variável tá declarada, senão deixa na primeira página como padrão:
if(isset($p)) {

$p = $p;

} else {

$p = 1;

}

// Defina aqui a quantidade máxima de registros por página.
$qnt = 50;

// O sistema calcula o início da seleção calculando: 
// (página atual * quantidade por página) - quantidade por página
$inicio = ($p*$qnt) - $qnt;


// Seleciona no banco de dados com o LIMIT indicado pelos números acima
$sql_select = "SELECT * FROM $tabela LIMIT $inicio, $qnt";

// Depois que selecionou todos os nome, pula uma linha para exibir os links(próxima, última...)
echo '<br />';

// Faz uma nova seleção no banco de dados, desta vez sem LIMIT, 
// para pegarmos o número total de registros
$sql_select_all = "SELECT * FROM $tabela";

// Executa o query da seleção acimas
$sql_query_all = mysqli_query($conexao,$sql_select_all);

// Gera uma variável com o número total de registros no banco de dados
$total_registros = mysqli_num_rows($sql_query_all);

// Gera outra variável, desta vez com o número de páginas que será precisa. 
// O comando ceil() arredonda "para cima" o valor
$pags = ceil($total_registros/$qnt -1) ;

// Número máximos de botões de paginação
$max_links = 3;

// Exibe o primeiro link "primeira página", que não entra na contagem acima(3)
echo '<a href="'.$pagina.'?p=1" target="_self"><input type="button" value="&lt;"></a>';

// Cria um for() para exibir os 3 links antes da página atual
for($i = $p-$max_links; $i <= $p-1; $i++) {
// Se o número da página for menor ou igual a zero, não faz nada

// (afinal, não existe página 0, -1, -2..)
if($i <=0) {
//faz nada
// Se estiver tudo OK, cria o link para outra página
} else {
echo '<a href="'.$pagina.'?p='.$i.'" target="_self">'.$i.'</a>';
}
}

// Exibe a página atual, sem link, apenas o número
echo $p." ";

// Cria outro for(), desta vez para exibir 3 links após a página atual
for($i = $p+1; $i <= $p+$max_links; $i++) {

// Verifica se a página atual é maior do que a última página. Se for, não faz nada.
if($i > $pags)
{
//faz nada
}


// Se tiver tudo Ok gera os links.
else
{
echo '<a href="'.$pagina.'?p='.$i.'" target="_self">'.$i.'</a>';
}
}

// Exibe o link "última página"
echo '<a href="'.$pagina.'?p='.$pags.'" target="_self">&nbsp;<input type="button" value="&gt;"></a>';


?>



