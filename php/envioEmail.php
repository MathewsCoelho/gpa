<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;	
require "PHPMailer/src/PHPMailer.php";
require "PHPMailer/src/Exception.php";
require "PHPMailer/src/SMTP.php";
$email = 'matheusbarcelos.c@gmail.com';
$mensagem = $descricao;
$email_resposta = $emailConvidado;
$mail = new PHPMailer();  
$mail->SetLanguage("br"); 
$mail->IsSMTP(); 
$mail->IsHTML(true); 
$mail->SMTPDebug = 0;  
$mail->SMTPAuth = true;  	
$mail->SMTPSecure = 'tls'; 
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->Username = 'matheusbarcelos.c@gmail.com';
$mail->Password = '915764081997';
$mail->CharSet = "utf-8";
$mail->SetFrom('matheusbarcelos.c@gmail.com');
$mail->AddAddress($email); 
$mail->addReplyTo($email_resposta);
$mail->Subject = "Convite Participar Grupo";
$mail->Body = $mensagem . "<br> Enviado por: " $_SESSION['nome'] ;
if(!$mail->Send())
    $message = "PhpMailer Gmail status: " . $mail->ErrorInfo;
else 
    $message = "E-mail SMTP enviado com sucesso para " . $email . " Enviado por: ".$email_resposta ;
echo $message;

?>