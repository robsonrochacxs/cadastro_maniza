<?php 

require('C:/wamp/www/cms/desafios/src/PHPMailer.php');
require('C:/wamp/www/cms/desafios/src/SMTP.php');
require('C:/wamp/www/cms/desafios/src/Exception.php');
require('C:/wamp/www/cms/desafios/src/OAuth.php');
require('C:/wamp/www/cms/desafios/src/POP3.php');

$mail = new \PHPMailer\PHPMailer\PHPMailer(true);
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;

$mail->SMTPSecure = '**tls**';
$mail->Username = 'robson@maniza.com.br';
$mail->Password = '********';
$mail->Port = 587;

$email = $_GET['destinatario'];
$msg = $_GET['mensagem'];

$mail->setFrom('robson@maniza.com.br');
$mail->addReplyTo('robson@maniza.com.br');
$mail->addAddress($email);
$mail->addCC($email, 'Cópia');
$mail->addBCC($email, 'Cópia Oculta');

$mail->isHTML(true);
$mail->Subject = 'teste';
$mail->Body    = $msg;

if(!$mail->send()) {
    echo 'Não foi possível enviar a mensagem.<br>';
    echo 'Erro: ' . $mail->ErrorInfo;
} else {
    echo 'Mensagem enviada.';
}
?>