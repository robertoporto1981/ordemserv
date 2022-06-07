<?php
    
    //declaramos uma variavel para monstarmos a tabela
    $dadosXls  = "";
    $dadosXls .= "  <table border='1' >";
    $dadosXls .= "          <tr>";
    $dadosXls .= "          <th>Codigo</th>";
    $dadosXls .= "          <th>Cod.Barras</th>";
    $dadosXls .= "          <th>Produto</th>";
    $dadosXls .= "          <th>Referencia</th>";
    $dadosXls .= "          <th>Tamanho</th>";
    $dadosXls .= "          <th>Cor</th>";
    $dadosXls .= "          <th>Quantidade</th>";
    $dadosXls .= "          <th>UN</th>";
    $dadosXls .= "          <th>P.Custo</th>";
    $dadosXls .= "          <th>P.Venda</th>";
    $dadosXls .= "      </tr>";
    //incluimos nossa conexão
    include_once('Conexao.class.php');
    //instanciamos
    $pdo = new Conexao();
    //mandamos nossa query para nosso método dentro de conexao dando um return $stmt->fetchAll(PDO::FETCH_ASSOC);
    $result = $pdo->select("SELECT cod,codbarras,descricao,referencia,quantidade,unidade,preco_compra,preco_venda FROM produto order by descricao asc");
    //varremos o array com o foreach para pegar os dados
    foreach($result as $res){
        $dadosXls .= "      <tr>";
        $dadosXls .= "          <td>".$res['cod']."</td>";
        $dadosXls .= "          <td>".$res['codbarras']."</td>";
        $dadosXls .= "          <td>".$res['descricao']."</td>";
        $dadosXls .= "          <td>".$res['referencia']."</td>";
        $dadosXls .= "          <td>".$res['tamanho']."</td>";
        $dadosXls .= "          <td>".$res['cor']."</td>";
        $dadosXls .= "          <td>".$res['quantidade']."</td>";
        $dadosXls .= "          <td>".$res['unidade']."</td>";
        $dadosXls .= "          <td>".$res['preco_compra']."</td>";
        $dadosXls .= "          <td>".$res['preco_venda']."</td>";        
        $dadosXls .= "      </tr>";
    }
    $dadosXls .= "  </table>";
 
    // Definimos o nome do arquivo que será exportado  
    $arquivo = "relatorio_produtos.xls";  
    // Configurações header para forçar o download  
    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment;filename="'.$arquivo.'"');
    header('Cache-Control: max-age=0');
    // Se for o IE9, isso talvez seja necessário
    header('Cache-Control: max-age=1');
       
    // Envia o conteúdo do arquivo  
    echo $dadosXls;  
    exit;
?>