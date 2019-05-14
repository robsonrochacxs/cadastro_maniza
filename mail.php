<?php
 
require_once('class.phpmailer.php');

$mailer = new PHPMailer();
$mailer->IsSMTP();
$mailer->SMTPDebug = 1;
$mailer->Port = 587;
$mailer->Host = 'smtp.hostinger.com.br'; 

$mailer->SMTPAuth = true; //Define se haverá autenticação no SMTP
$mailer->Username = 'robson@maniza.com.br'; //Informe o e-mai o completo
$mailer->Password = '********'; //Senha da caixa postal
$mailer->FromName = 'Contato pelo Site'; //Nome que é exibido
$mailer->From = 'robson@maniza.com.br'; //Utilizar a mesma caixa postal
$mailer->AddAddress('robson@maniza.com.br'); //Destinatários
$mailer->Subject = 'Contato pelo Site: '.date("- H:i ").'-'.date("- d/m/Y");
$mailer->Body = ("Nome: ".$_POST['nome']);
$mailer->Body .= ("\nEmail: ".$_POST['email']);
$mailer->Body .= ("\nTelefone: ".$_POST['telefone']);
$mailer->Body .= ("\nMensagem: ".$_POST['mensagem']);
$header= 'Content-Type: text/html; charset= utf-8';
if(!$mailer->Send()){
echo "Mensagem nao enviada";
echo "Erro: " . $mailer->ErrorInfo; exit; }
echo "E-mail enviado!";
?>