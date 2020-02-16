<?php session_start() ?>

          <!DOCTYPE html>

<html lang='pt-BR'>
	
  <head>
  
      <meta charset='utf-8'>
    
          <link type="text/css" rel="stylesheet" href="stylesheet.css">
		  
            <title>Ordem de servi�os</title>

   </head>
    
   

<h1 id="titulo-programas">Relatorio ordem de servicos</h1><p>


	 <select name="status">
    
  		<option value="ABERTO">Reabrir OS</option>
    
    	<option value="FINALIZADO">Encerrar OS</option>
    
    	<option value="ORCAMENTO">Orcamento</option>
    
    	<option value="EM ANDAMENTO">Em andamento</option>
    
    	<option value="AGUARDANDO APROVACAO">Aguardando aprovacao</option>
    
    	<option value="AGUARDANDO PECAS">Aguardando pecas</option>
    
       <option value="APROVADO">Aprovado</option>
     
       <option value="NAO APROVADO">Nao aprovado</option>
           
       <option value="GARANTIA">Garantia</option>
    
       <option value="SEM CONSERTO">Sem conserto</option>

      <option value="CANCELADO">Cancelado</option>
    
    
</select>     
	            
    <input type="button" id="btn-salvar" value="Alterar" onclick="Acao('fecha_os');">
    
    		<input type="button" id="btn-limpar" value="Excluir" onclick="Acao('exclui_ordem');">
    
    			<input type="button" id="btn-reimprimeos" value="Reimpressao OS" onclick="Acao('reimpressao_os');">

    				<input type="button" id="btn-reimprimeos" value="Edita OS" onclick="Acao('edita_os');">

    
</form>

<script type="text/javascript">
    // <![CDATA[
     function Acao(act){
       frm = document.getElementById('formulario');
       frm.action = act + '.php'; 
       frm.submit();
    // ]]>



    }
</script>



<input type="button" id="btn-sair" onclick="window.close()" value="Sair" />


<a href="javascript:void()" onclick="window.close()">



</html>
	   
<?php

      $usuario = $_SESSION['login'];
  
      $os = $_POST['os'];

      $status = $_POST['status'];

      
//Cria uma session para passar a variavel para o script reimpressao_os.php
  
     $numeroord = $_SESSION['os'] = $os;
  		
//conexao com banco

	   require_once 'conexao.php';


if(empty($os)){

  $os = "%%";

}else{

  
  
  $os = $_POST['os']; 
  
}
	
	
//Query banco de dados 


$sql = "select * from ordem where numeroord like('%$os%') and status like('$status') order by numeroord asc";
  
	     
	     $consulta = mysqli_query($conexao,$sql);
	 
       $resultado = mysqli_num_rows($consulta);

if($resultado == 0){
   
   echo"<script language='javascript' type='text/javascript'>alert('OS nao encontrado!');window.location.href='consulta_os.html';</script>";
   
}

//Tabelas

echo '<font face="verdana"><table border style="width:100%">'; 


echo '<tr>';

    echo '<td id="borda"></td>';

    echo '<td id="borda">NUMERO OS:</td>';

    echo '<td id="borda">DATA ENTRADA:</td>';

    echo '<td id="borda">DATA SAIDA:</td>';

    echo '<td id="borda">CLIENTE:</td>';

    echo '<td id="borda">EQUIPAMENTO:</td>';

    echo '<td id="borda">MARCA:</td>';

    echo '<td id="borda">DEFEITO:</td>';

    echo '<td id="borda">STATUS:</td>';

echo '</tr>';

	
       
     echo"<form action='./' id='formulario' method='post'>";          
    
//Dados da tabela   
     
while($registro = mysqli_fetch_assoc($consulta)){   
 
 echo '<tr>'; 

    echo '<td id="campos"><a href="edita_os2.php?os='.$registro["NumeroOrd"].'"#><img src="images/edit.png"></td>';

    echo '<td id="campos">'.$registro["NumeroOrd"].'</td>';
    
    //echo '<td id="campos">'.$registro["dataentr"].'</td>'; 

//Data entrada:

    $data = $registro["dataentr"];

    $dia = substr("$data",0,2);

    $mes = substr("$data",2,2);

    $ano = substr("$data",4,8);

    $dataentrada = "$dia/$mes/$ano";

    echo '<td id="campos">'.$dataentrada.'</td>';
    
//Data Saida:

  //  echo '<td id="campos">'.$registro["previsaosaida"].'</td>';

   $datasaid = $registro["previsaosaida"];

    $Dia = substr("$datasaid",0,2);

    $Mes = substr("$datasaid",2,2);

    $Ano = substr("$datasaid",4,8);

    $datasaida = "$Dia$Mes$Ano";

    echo '<td id="campos">'.$datasaida.'</td>';
    

//    
    echo '<td id="campos">'.$registro["cliente"].'</td>';

    echo '<td id="campos">'.$registro["equipamento"].'</td>';
    
    echo '<td id="campos">'.$registro["marca"].'</td>';
    
    echo '<td id="campos">'.substr($registro["mensage"],0,20).'</td>';

     $ordem = $_SESSION['os'] = $os;

     
if($registro['status'] == 'ABERTO'){
  
    echo '<td id="status-aberto">'.$registro["status"].'</td>';
 
 } 

if($registro['status'] == 'FINALIZADO'){ 
 
    echo '<td id="status-fechado">'.$registro["status"].'</td>';

} 

if($registro['status'] == 'FECHADO'){ 

} 

if($registro['status'] == 'EM ANDAMENTO'){

       echo '<td>'.$registro["status"].'</td>';

}

if($registro['status'] == 'ORCAMENTO'){

    echo '<td>'.$registro["status"].'</td>';
       
} 

if($registro['status'] == 'APROVADO'){
    
    echo '<td id="status-fechado">'.$registro["status"].'</td>';

}

if($registro['status'] == 'NAO APROVADO'){

  echo '<td id="status-aberto">'.$registro["status"].'</td>';

} 

if($registro['status'] == 'GARANTIA'){

  echo '<td id="status-garantia">'.$registro["status"].'</td>';
  
} 

if($registro['status'] == 'AGUARDANDO APROVACAO'){

echo '<td id="status-garantia">'.$registro["status"].'</td>';
 
} 

if($registro['status'] == 'AGUARDANDO PECAS'){

echo '<td id="status-garantia">'.$registro["status"].'</td>';

}
 
if($registro['status'] == 'SEM CONSERTO'){

  echo '<td id="status-aberto">'.$registro["status"].'</td>';

}

if($registro['status'] == 'CANCELADO'){

  echo '<td id="status-aberto">'.$registro["status"].'</td>';

}

 echo '</tr>';
   
  
}
  
  echo '</table>';
 


 

   	
?>
       
