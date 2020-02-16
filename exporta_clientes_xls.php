<?php
    
    //declaramos uma variavel para monstarmos a tabela
    $dadosXls  = "";
    $dadosXls .= "  <table border='1' >";
    $dadosXls .= "          <tr>";
    $dadosXls .= "          <th>Codigo</th>";
    $dadosXls .= "          <th>Nome</th>";
    $dadosXls .= "          <th>Nome Fantasia</th>";
    $dadosXls .= "          <th>CPF</th>";
    $dadosXls .= "          <th>CNPJ</th>";
    $dadosXls .= "          <th>TIPO</th>";
    $dadosXls .= "          <th>Data nasc.</th>";
    $dadosXls .= "          <th>CEP</th>";
    $dadosXls .= "          <th>Rua</th>";
    $dadosXls .= "          <th>N.</th>";
    $dadosXls .= "          <th>Complemento</th>";
    $dadosXls .= "          <th>Bairro</th>";
    $dadosXls .= "          <th>Cidade</th>";
    $dadosXls .= "          <th>UF</th>";
    $dadosXls .= "          <th>Telefone</th>";
    $dadosXls .= "          <th>Celular</th>";
    $dadosXls .= "          <th>E-mail</th>";
    $dadosXls .= "          <th>Observacao</th>";
    $dadosXls .= "          <th>Data Cadastro</th>";
    $dadosXls .= "          <th>Site</th>";
    $dadosXls .= "      </tr>";
    //incluimos nossa conexão
    include_once('Conexao.class.php');
    //instanciamos
    $pdo = new Conexao();
    //mandamos nossa query para nosso método dentro de conexao dando um return $stmt->fetchAll(PDO::FETCH_ASSOC);
    $result = $pdo->select("SELECT cod,nome,nomefant,cpf,cnpj,tipo,datanasc,
        cep,rua,numero,complemento,bairro,cidade,uf,telefone,celular,email,observ,datacad FROM clientes");
    //varremos o array com o foreach para pegar os dados
    foreach($result as $res){
        $dadosXls .= "      <tr>";
        $dadosXls .= "          <td>".$res['cod']."</td>";
        $dadosXls .= "          <td>".$res['nome']."</td>";
        $dadosXls .= "          <td>".$res['nomefant']."</td>";
        $dadosXls .= "          <td>".$res['cpf']."</td>";
        $dadosXls .= "          <td>".$res['cnpj']."</td>";
        $dadosXls .= "          <td>".$res['tipo']."</td>";
        $dadosXls .= "          <td>".$res['datanasc']."</td>";
        $dadosXls .= "          <td>".$res['cep']."</td>";
        $dadosXls .= "          <td>".$res['rua']."</td>";
        $dadosXls .= "          <td>".$res['numero']."</td>";
        $dadosXls .= "          <td>".$res['complemento']."</td>";
        $dadosXls .= "          <td>".$res['bairro']."</td>";
        $dadosXls .= "          <td>".$res['cidade']."</td>";
        $dadosXls .= "          <td>".$res['uf']."</td>";
        $dadosXls .= "          <td>".$res['telefone']."</td>";
        $dadosXls .= "          <td>".$res['celular']."</td>";
        $dadosXls .= "          <td>".$res['email']."</td>";
        $dadosXls .= "          <td>".$res['observ']."</td>";
        $dadosXls .= "          <td>".$res['datacad']."</td>";
        $dadosXls .= "      </tr>";
    }
    $dadosXls .= "  </table>";
 
    // Definimos o nome do arquivo que será exportado  
    $arquivo = "clientes.xls";  
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