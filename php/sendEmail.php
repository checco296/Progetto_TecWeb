<?php
  require('check.php');

$name = $_POST['name'];
$surname = $_POST['surname'];
$email = $_POST['email'];
$message = $_POST['message'];

if(empty($name) || empty($surname) || empty($email) || empty($message))
{
  $msg_errore = '"form-error">Compila tutti i campi.';
}

elseif(!name_valido($name))
{
  $msg_errore = '"name-error">Il nome inserito non è valido. Sono ammesse solamente lettere minuscole e maiuscole. Lunghezza minima 3 lettere, massima 20 lettere.';
  $errore_form = '"form-error">errore con la compilazione del nome.';
}

elseif(!name_valido($surname))
{
  $msg_errore = '"surname-error">Il cognome inserito non è valido. Sono ammesse solamente lettere minuscole e maiuscole. Lunghezza minima 3 lettere, massima 20 lettere.';
  $errore_form = '"form-error">errore con la compilazione del cognome.';
}

elseif(!email_valida($email))
{
  $msg_errore = '"email-error">L\'email inserita non è valida.';
  $errore_form = '"form-error">errore con la compilazione della email.';
}

elseif(IsInjected($message))
{
  $msg_errore = '"text-error">Il messaggio inserito contiene dei caratteri non accettabili.';
  $errore_form = '"form-error">errore nella compilazione del messaggio.';
}

echo str_replace($errore_form,$msg_errore,file_get_contents("../html/contatti.html"));

$email_from = 'francescovillorba@gmail.com'; /*da modificare eventualmente*/
$email_subject = "Nuova Email Form contatti";
$email_body = "Hai ricevuto un nuovo messaggio da $name $surname.\n Questo è il contenuto :\n
     $message.\n \nRispondi a questo indirizzo e-mail: $email.\n";
    
$to = "francescovillorba@gmail.com"; /*idem*/
$headers = "Da: $email_from \r\n";
$headers .= "Reply-To: $email \r\n";
if (mail($to, $email_subject, $email_body, $headers)) {
  header('Location: ../html/ringraziamenti.html');
} else {
  echo "Errore nell'invio della mail";
}
die();

/*da confrontare con i metodi implementati per le altre form ed eventualmente unifromarli, ATTENZIONE riveder anche il controllo lato sia user che server dei dati inseriti*/
?>