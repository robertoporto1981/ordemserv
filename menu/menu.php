
<?php
$data=date('d/m/Y');
$hora=date('H');
$minutos=date('i');
$segundos=date('s');

if($hora>=12 && $hora<18)
{
echo("Boa Tarde, hoje é $data - $hora:$minutos:$segundos");
}
if($hora>=18 && $hora<24)
{
echo("Boa Noite, hoje é $data - $hora:$minutos:$segundos");
}
if($hora>=24 && $hora<12)
{
echo("Bom Dia, hoje é $data - $hora:$minutos:$segundos");
}

?>





<html>
	<head>
		<title>Menu</title>
</head>
		<body bgcolor ="#0093FF">

		<nav class="nav-bar">
    <div class="nav-container">
        <body text="white"><font size="20"<a id="nav-menu" class="nav-menu">#0093FF; Menu</a>
        <ul class="nav-list " id="nav">
           <li><a href="form_cadastro_cliente.html" id="tile1"><i class="icon ion-ios7-home-outline"></i> Cadastro de clientes</a></li>
            
			   <li><a href="cadastro.html" id="tile1"><i class="icon ion-ios7-home-outline"></i> Cadastro de usuarios</a></li>
            <li><a href="form_cadastro_produto.html" id="tile2"><i class="icon ion-ios7-person-outline"></i> Cadastro de produtos
							
			</a></li>
                
			<li><a href="form_cadastro_servicos.html" id="tile3"><i class="icon ion-ios7-briefcase-outline"></i>Cadastro de serviços</a></li>
			
			</a></li>
            <li><a href="form_cadastro_os.html" id="tile3"><i class="icon ion-ios7-briefcase-outline"></i>Ordem de servico</a></li>
             </a> </li>
			 
			 </a></li>
            <li><a href="index.html" id="tile3"><i class="icon ion-ios7-briefcase-outline"></i>Sair</a></li>
             </a> </li>
        </ul>
    </div>
</nav>
</body>