<?php session_start() ?>

<?php
require_once 'conexao.php';

$pagina = $_SESSION['pagina'];

//echo '<br>';

$tabela = $_SESSION['tabela'];

// Selecionar BD:
mysqli_select_db("db01", $conexao);

// Pegar a pagina atual por GET:
$p = $_GET["p"];

// Verifica se a variavel esta declarada, senao deixa na primeira pagina como padrao:
if(isset($p)) {

$p = $p;

} else {

$p = 1;

}

// Defina aqui a quantidade maxima de registros por pagina.
$qnt = 50;

// O sistema calcula o inicio da selecao calculando: 
// (pagina atual * quantidade por pagina) - quantidade por pagina
$inicio = ($p*$qnt) - $qnt;


// Seleciona no banco de dados com o LIMIT indicado pelos numeros acima
$sql_select = "SELECT * FROM $tabela LIMIT $inicio, $qnt";

// Depois que selecionou todos os nome, pula uma linha para exibir os links(proxima, ultima...)
echo '<br />';

// Faz uma nova selecao no banco de dados, desta vez sem LIMIT, 
// para pegarmos o numero total de registros
$sql_select_all = "SELECT * FROM $tabela";

// Executa o query da selecao acimas
$sql_query_all = mysqli_query($conexao,$sql_select_all);

// Gera uma variavel com o numero total de registros no banco de dados
$total_registros = mysqli_num_rows($sql_query_all);

// Gera outra variavel, desta vez com o numero de paginas que sera precisa. 
// O comando ceil() arredonda "para cima" o valor
$pags = ceil($total_registros/$qnt -1) ;

// Numero maximos de botoes de paginacao
$max_links = 3;

// Exibe o primeiro link "primeira pagina", que nao entra na contagem acima(3)
echo '<a href="'.$pagina.'?p=1" target="_self"><input type="button" value="&lt;"></a>';

// Cria um for() para exibir os 3 links antes da p�gina atual
for($i = $p-$max_links; $i <= $p-1; $i++) {
// Se o numero da pagina for menor ou igual a zero, nao faz nada

// (afinal, nao existe pagina 0, -1, -2..)
if($i <=0) {
//faz nada
// Se estiver tudo OK, cria o link para outra pagina
} else {
echo '<a href="'.$pagina.'?p='.$i.'" target="_self">'.$i.'</a>';
}
}

// Exibe a pagina atual, sem link, apenas o numero
echo $p." ";

// Cria outro for(), desta vez para exibir 3 links apos a pagina atual
for($i = $p+1; $i <= $p+$max_links; $i++) {

// Verifica se a pagina atual e maior do que a ultima pagina. Se for, nao faz nada.
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

// Exibe o link "ultima pagina"
echo '<a href="'.$pagina.'?p='.$pags.'" target="_self">&nbsp;<input type="button" value="&gt;"></a>';


?>



