<?php session_start() ?>

<?php
  require_once 'conexao.php';
  
  

?>
<html>
  <head>
        <meta charset='utf-8'>

    <link rel='stylesheet' href='css/bootstrap-datepicker.min.css'>

    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>

    <link type="text/css" rel="stylesheet" href="css/reset.css">

    <link type="text/css" rel="stylesheet" href="css/stylesheet.css">

    <link rel="stylesheet" href="css/bootstrap.css">

  <title>Categorias</title>

  </head>

  <body>

<h1 id="titulo-programas">CADASTRO DE CATEGORIAS</h1>

    <form method="GET" action="form_categoria.php">

 <input type="submit" class="btn btn-success btn-sm" id="formulario" value="Incluir">

 <button onclick="window.close()" class="btn btn-dark btn-sm">Sair</button>

<hr>
        <div class="form-row">
            <div class="form-group col-md-3">

                  <label for="descr">Categoria *:</label>

                <input type="text" id="descr" name="descricao" autocomplete="off" maxlength="20" size="22" class="form-control">
             </div>


</div>
    </form>

  </body>

</html>
