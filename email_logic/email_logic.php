

<?php
session_start();
// definisco mittente e destinatario della mail

$_SESSION['errors'] = '';
$mail_mittente = $_POST['email_contact'];
$mail_destinatario = "cristofer.russo94@gmail.com";
$nome_mittente  = $_POST['name_contact'];
// definisco il subject ed il body della mail
$mail_oggetto = $_POST['subject_contact'];
$mail_corpo = $_POST['message_contact'];
 
// aggiusto delle intestazioni della mail
// In questa sezione che deve essere definito il mittente (From)
// ed altri eventuali valori come Cc, Bcc, ReplyTo e X-Mailer
$mail_headers = "From: " .  $nome_mittente . " <" . $mail_mittente . ">\r\n";
$mail_headers .= "Reply-To: " .  $mail_mittente . "\r\n";
$mail_headers .= "X-Mailer: PHP/" . phpversion();
 
if (mail($mail_destinatario, $mail_oggetto, $mail_corpo, $mail_headers)) {
  header('Location: /index.php ');
  $_SESSION['sended'] = "Messaggio inviato";
  exit();
}else{
  header('Location: index.php ');
  $_SESSION['errors'] = "Errore invio";
  exit();
}
?>