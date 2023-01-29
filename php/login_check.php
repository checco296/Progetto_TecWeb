<?php
session_set_cookie_params(0);
session_start();

if (isset($_SESSION['session_user'])) {
  $session_user = htmlspecialchars($_SESSION['session_user']);

  if($session_user=='utente'){
    header('Location: ../html/user_area.html');
  } elseif($session_user=='admin'){
    header('Location: ../php/admin_area.php');
  }
} else {
  header('Location: ../html/login.html');
}
?>