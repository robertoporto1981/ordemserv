<?php session_start() ?>

<?php

$usuario = ucwords($_SESSION['login']);
 

header("Location:index.html");
      

?>

<?php session_destroy() ?>