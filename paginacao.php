<?php session_start() ?>

<?php
require_once 'conexao.php';

$pagina = $_SESSION['pagina'];

//echo '<br>';

$tabela = $_SESSION['tabela'];

// Selecionar BD:
mysqli_select_db("db01", $conexao);

// Pegar a p�gina atual por GET:
$p = $_GET["p"];

// Verifica se a vari�vel t� declarada, sen�o deixa na primeira p�gina como padr�o:
if(isset($p)) {

$p = $p;

} else {

$p = 1;

}

// Defina aqui a quantidade m�xima de registros por p�gina.
$qnt = 50;

// O sistema calcula o in�cio da sele��o calculando: 
// (p�gina atual * quantidade por p�gina) - quantidade por p�gina
$inicio = ($p*$qnt) - $qnt;


// Seleciona no banco de dados com o LIMIT indicado pelos n�meros acima
$sql_select = "SELECT * FROM $tabela LIMIT $inicio, $qnt";

// Depois que selecionou todos os nome, pula uma linha para exibir os links(pr�xima, �ltima...)
echo '<br />';

// Faz uma nova sele��o no banco de dados, desta vez sem LIMIT, 
// para pegarmos o n�mero total de registros
$sql_select_all = "SELECT * FROM $tabela";

// Executa o query da sele��o acimas
$sql_query_all = mysqli_query($conexao,$sql_select_all);

// Gera uma vari�vel com o n�mero total de registros no banco de dados
$total_registros = mysqli_num_rows($sql_query_all);

// Gera outra vari�vel, desta vez com o n�mero de p�ginas que ser� precisa. 
// O comando ceil() arredonda "para cima" o valor
$pags = ceil($total_registros/$qnt -1) ;

// N�mero m�ximos de bot�es de pagina��o
$max_links = 3;

// Exibe o primeiro link "primeira p�gina", que n�o entra na contagem acima(3)
echo '<a href="'.$pagina.'?p=1" target="_self"><input type="button" value="&lt;"></a>';

// Cria um for() para exibir os 3 links antes da p�gina atual
for($i = $p-$max_links; $i <= $p-1; $i++) {
// Se o n�mero da p�gina for menor ou igual a zero, n�o faz nada

// (afinal, n�o existe p�gina 0, -1, -2..)
if($i <=0) {
//faz nada
// Se estiver tudo OK, cria o link para outra p�gina
} else {
echo '<a href="'.$pagina.'?p='.$i.'" target="_self">'.$i.'</a>';
}
}

// Exibe a p�gina atual, sem link, apenas o n�mero
echo $p." ";

// Cria outro for(), desta vez para exibir 3 links ap�s a p�gina atual
for($i = $p+1; $i <= $p+$max_links; $i++) {

// Verifica se a p�gina atual � maior do que a �ltima p�gina. Se for, n�o faz nada.
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

// Exibe o link "�ltima p�gina"
echo '<a href="'.$pagina.'?p='.$pags.'" target="_self">&nbsp;<input type="button" value="&gt;"></a>';


?>



