<?php   		

//Testa se o usuario fez login no sistema

date_default_timezone_set("America/Sao_Paulo");  

$usuario = ucwords($_SESSION['login']);
       
if(isset($_SESSION['login'])){
  
  		$usuario = $_SESSION['login'];          
   
 }else{
 
 echo"<script language='javascript' type='text/javascript'>window.location.href='index.html'</script>";
 
 
 }

?>