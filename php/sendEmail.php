<?php
require('check.php');

$msg_errore = "";
$errore_form = "";
if (isset($_REQUEST['name'])) {
  $name = $_POST['name'];
  $surname = $_POST['surname'];
  $email = $_POST['email'];
  $message = $_POST['message'];
  
  if (empty($name) || empty($surname) || empty($email) || empty($message)) {
       $msg_errore = '"email-error">Compila tutti i campi.';
       $errore_form = '"form-error">';
  } elseif (!name_valido($name)) {
      $msg_errore = '"name-error">Il nome inserito non è valido. Sono ammessi solamente caratteri minuscoli e Maiuscoli. 
          Lunghezza minina 3 caratteri. Lunghezza massima 20 caratteri.';
      $errore_form = '"name-error">';
  } elseif (!name_valido($surname)) {
    $msg_errore = '"surname-error">Il cognome inserito non è valido. Sono ammessi solamente caratteri minuscoli e Maiuscoli. 
        Lunghezza minina 3 caratteri. Lunghezza massima 20 caratteri.';
    $errore_form = '"surname-error">';            
  } elseif (!email_valida($email)) {
      $msg_errore = '"email-error">L\'email inserita non è valida.';
      $errore_form = '"email-error">';
  } elseif (!IsInjected($message)) {
      $msg_errore = '"text-error">Il testo inserito non è valido.Rimuovere caratteri strani dall\' interno.';
      $errore_form = '"text-error">';
  }
  if ($msg_errore == "") {
    $email_from = 'francescovillorba@gmail.com';
    $email_subject = "Nuova Email Form contatti";
    $email_body = "Hai ricevuto un nuovo messaggio da $name $surname.\n Questo è il contenuto :\n
    $message.\n \nRispondi a questo indirizzo e-mail: $email.\n";
    $to = "francescovillorba@gmail.com";
    $headers = "Da: $email_from \r\n";
    $headers .= "Reply-To: $email \r\n";
    if (mail($to, $email_subject, $email_body, $headers)) {
      header('Location: ../html/ringraziamenti.html');
    }
  }else{
    echo str_replace($errore_form, $msg_errore , file_get_contents("../html/contatti.html"));
  }    
}
?>