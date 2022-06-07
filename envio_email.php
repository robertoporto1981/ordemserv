              
<?php
session_start();
$nome = "Roberto";
$email = "roberto.porto@outlook.com";
$mensagem = "Teste de envio de E-mail";

require_once 'vendors/PHPMailer/src/PHPMailer.php';
require_once 'vendors/PHPMailer/src/SMTP.php';
require_once 'vendors/PHPMailer/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

$mail = new PHPMailer(true);
try {

     //Server settings
    $mail->SMTPDebug = 2;               
    $mail->isSMTP();                               
    $mail->Host = 'smtp.office365.com';  
    $mail->SMTPAuth = true;             
    $mail->Username = 'roberto.porto@outlook.com';
    $mail->Password = '200176210ab';     
    $mail->SMTPSecure = 'tls';               
    $mail->Port = 587;                                 

    //Recipients
    $mail->setFrom('roberto.porto@outlook.com', 'Ordem de Servicos');
    $mail->addAddress('roberto.porto@outlook.com', 'Roberto Porto');  

    $mail->Subject = "roberto.porto@outlook.com";
    $mail->msgHTML("<html>De: {$nome}<br/>Email: {$email}<br/>Mensagem: {$mensagem}</html>");
    $mail->AltBody = "De: {$nome}\nemail:{$email}\nmensagem: {$mensagem}";

    if ($mail->send()) {
        $_SESSION["success"] = "Mensagem enviada com sucesso";
        header("Location: index.php");
    } else {
        $_SESSION["danger"] = "Erro ao enviar mensagem " . $mail->ErrorInfo;
        header("Location: contato.php");
    }
} catch (Exception $e) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
}
die();

?>