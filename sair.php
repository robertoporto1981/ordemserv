<?php session_start() ?>

<?php $usuario = ucwords($_SESSION['login']) ?>

<?php session_destroy(); ?>

<?php
//Faz backup do sistema ao sair
shell_exec('backup_ordemserv.bat');

header("Location:index.html");

?>

      



