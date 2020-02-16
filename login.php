<?php session_start() ?>  

<html>

<head>
  
</head>

</html>

<?php 
  
include 'conexao.php';
   
  $login = STRTOUPPER($_POST['login']);

  $entrar = $_POST['entrar'];

  $senha = md5($_POST['senha']);
  
  $_SESSION['login'] = "$login";  
  
    
if (isset($entrar)) {
             
      $verifica = mysqli_query($conexao,"SELECT * FROM usuarios WHERE login = '$login' AND senha = '$senha'") or die("erro ao selecionar");
     
	  
if (mysqli_num_rows($verifica)<=0){ //mostra o numero de linhas de uma consulta ===>($verifica)
 //se a consulta for = 0 exibe a mensagem "Login e/ou senha incorretos"         
//se a consulta for = 1 abre menu.html
	 echo"<script language='javascript' type='text/javascript'>alert('Login e/ou senha incorretos');window.location.href='index.html';</script>";

       
        die();

        }else{
          
          setcookie("login",$login);
          
          header("Location:menu.php");
		  
        
		}
    
    }

?>
