<?php session_start() ?>

<?php

// Testa se o usuario fez login no sistema:

// Time zone:
date_default_timezone_set( "America/Sao_Paulo" );

// Sweet alert:

// Endereco do CDN Sweet alert

$sweet_alert = '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>';

$_SESSION['sweet_alert'] = $sweet_alert;


// CSS:

$css = '<link type="text/css" rel="stylesheet" href="css/stylesheet.css">';

$_SESSION['css'] = $css;


// Session usuário:

$usuario = ucfirst( $_SESSION['login'] );
if ( isset( $_SESSION['login'] ) ) {
				
				$usuario = $_SESSION['login'];
				
				 } else {
				
				echo"<script language='javascript' type='text/javascript'>window.location.href='index.html'</script>";
				
				
				 } 

?>