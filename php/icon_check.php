<?php
session_set_cookie_params(0);
session_start();

if (isset($_SESSION['session_user'])) {
  $session_user = htmlspecialchars($_SESSION['session_user']);

  if($session_user=='utente'){
    header("Content-Type: image/png");
    header("Content-Length: " . filesize("../images/loggato.png"));
    readfile("../images/loggato.png");
  } elseif($session_user=='admin'){
    header("Content-Type: image/png");
    header("Content-Length: " . filesize("../images/loggato_admin.png"));
    readfile("/images/loggato_admin.png");
  }
} else {
  header("Content-Type: image/png");
  header("Content-Length: " . filesize("../images/non_loggato.png"));
  readfile("/images/non_loggato.png");
}
?>

