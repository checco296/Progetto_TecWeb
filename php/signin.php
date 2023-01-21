<?php
    require('database.php');
    require('check.php');

if (isset($_REQUEST['username'])) {
    $username = $_POST['username'];
    $username = mysqli_real_escape_string($con, $username);
    $email = $_POST['email'];
    $email = mysqli_real_escape_string($con, $email);
    $password = $_POST['password'];
    $password = mysqli_real_escape_string($con, $password);

    if (empty($username) || empty($email) || empty($password)) {
         $msg_errore = '"email-error">Compila tutti i campi.';
         $errore_form = '"form-error">';
    } elseif (!username_valido($username)) {
        $msg_errore = '"user-error">Lo username inserito non è valido. Sono ammessi solamente caratteri minuscoli alfanumerici e l\'underscore. 
            Lunghezza minina 4 caratteri. Lunghezza massima 20 caratteri.';
        $errore_form = '"user-error">';            
    } elseif (!email_valida($email)) {
        $msg_errore = '"email-error">L\'email inserita non è valida.';
        $errore_form = '"email-error">';
    } elseif (!password_valida($password)) {
        $msg_errore = '"password-error">La password inserita non è valida. La password deve contenere almeno un carattere minuscolo, almeno un carattere minuscolo,
            almeno un numero e almeno un carattere speciale.';
        $errore_form = '"password-error">';
    } elseif (check_username($username)) {
        $msg_errore = '"user-error">Username già registrato.';
        $errore_form = '"user-error">';
    } elseif (check_email($email)) {
        $msg_errore = '"email-error">Email già registrata.';
        $errore_form = '"email-error">';
    } else {

        $livello = 'utente';

        $query = "INSERT into `users` (username, password, email, livello) 
                  VALUES ('$username', '" . md5($password) . "', '$email', '$livello')";
        $result = mysqli_query($con, $query);
        if ($result) {
            session_start();
            $_SESSION['session_user'] = $_POST['username'];
            $_SESSION["session_id"] = $_POST['email'];
            $msg_errore = '"form-success"><p>Registrazione avvenuta con successo, <a href="../html/login.html">accedi QUI</a>.</p>';
            $errore_form = '"form-success">';
        }
    }    
    echo str_replace($errore_form, $msg_errore , file_get_contents("../html/signin.html"));
}
?>
