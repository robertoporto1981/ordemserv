<?php session_start() ?>

<?php require_once 'testa_login.php'; ?>

<?php


$buscacliente = $_GET['busca'];

$codigo_cliente = $_GET['cod'];

// Crio uma session:
$_SESSION['cliente'] = $buscacliente;

$_SESSON['codigo_cliente'] = $codigo_cliente;

$cliente = $_SESSION['cliente'];
 
?>

<html lang='pt-BR'>

  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
      <link rel='stylesheet' href='css/bootstrap-datepicker.min.css'>           
    
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>                 
    
        <link type ="text/css" rel="stylesheet" href="css/reset.css">          
    
        <link type ="text/css" rel="stylesheet" href="css/bootstrap.min.css">             
        
        <link type ="text/css" rel="stylesheet" href="css/bootstrap.css"> 
        
  	     <link type="text/css" rel="stylesheet" href="stylesheet.css">
     
  		 
    <title>Contas a receber</title>

    

</head>
  
<body>
  
<h3><center>CONTAS A RECEBER</center></h3>
  
<!--<p aling ="left"><image src ="images/contasareceber.png" alt=" Smiley face" height="60" width="60"</a>-->
    
<form method="POST" action="contas_receber.php">
         
      <input type="submit" class="btn btn-success btn-sm" value="Incluir">
 
</div><!--Form row-->
<hr>   
  <!--Data do Vencimento:<input type="date" name='datavenc' maxlength="10" size="12" required>-->
  <div class="form-row">
    <div class="form-group col-md-2">
      <label>Data do Vencimento:</label>

          <input type="date" name='datalanc' class="form-control "maxlength="10" size="12" required>
    </div>      
  
  <div class="form-group col-md-4">
      <label>Cliente:</label>
        
        <input type ="text" name="cliente" maxlength="40" size="40" class="form-control" value="<?php //echo $buscacliente ?>"><a href="cons_clientes_receber.php">  <img src="images/lupa.png" alt="Smiley face" width="25" height="20" align="absbottom"></a><?php echo $cliente ?>
        
        <!--<input type="text" name="nome" class="form-control" maxlength="40" size="40" autocomplete="off" required>-->
    </div>

    <div class="form-group col-md-4">
		  <label>Descri��o:</label>
        <input type="text" name='descr' class="form-control" maxlength="30" size="40" autocomplete="off" required>
    </div>
  <!--Valor R$:<input type="text" name='valor' maxlength="10" size="12" required>-->
    
    <div class="form-group col-md-1">
  			<label>Parcela N�:</label>
          <input type="number" name="parcela" class="form-control" maxlength="2" size="2" autocomplete="off" required> 
    </div>

    <div class="form-group col-md-1">
        <label>Total R$:</label>
          <input type="text" name="total" class="form-control" maxlength="12" size="12" autocomplete="off" required>  
    </div>

  </div><!--Fim do form-->
<!-- <label>Status:</label><input type="radio" name='status' value='RECEBER'>Receber
  
         <input type="radio" name='status' value='PAGO'>Pago       -->
 </form>
 
 <h2>&nbsp;</h2>
  
<br>  

<hr>
<div class="form-row">
 <label>Consulta</label>&nbsp;&nbsp;&nbsp;
     
 		<form method="POST" action="consulta_receber.php">
  
 			<input type="radio" name ="busca" value='pago'>Pagos&nbsp;
  
  				<input type="radio" name="busca" value='receber'>Receber
  
  					<input type="submit" class="btn btn-dark btn-sm" value="Pesquisar">

  
  </form>
</div>
<hr>  

		<form method="POST" action="menu.php">

			<input type="submit" class="btn btn-dark btn-sm" value="Voltar">

</form>





  </body>

</html>
 

  
  
  