<?php
$name = $_POST['name'];
$surname = $_POST['surname'];
$email = $_POST['email'];
$message = $_POST['message'];

if(empty($name)) 
{
    echo "Il NOME e' obbligatorio!";
    exit;
}

if(empty($surname))
{
  echo "Il COGNOME e' obbligatorio!";
  exit;
}

if(empty($email))
{
  echo "La E-MAIL e' obbligatoria!";
  exit;
}

if(IsInjected($email))
{
    echo "E-mail non valida!";
    exit;
}

if(empty($message))
{
  echo "scrivere il messaggio da inviare!";
  exit;
}

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


function IsInjected($str)
{
  $injections = array('(\n+)',
              '(\r+)',
              '(\t+)',
              '(%0A+)',
              '(%0D+)',
              '(%08+)',
              '(%09+)'
              );
  $inject = join('|', $injections);
  $inject = "/$inject/i";
  if(preg_match($inject,$str))
    {
    return true;
  }
  else
    {
    return false;
  }
}
?>