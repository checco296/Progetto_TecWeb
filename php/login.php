<?php
    require('database.php');
    
if (isset($_POST['username'])) {
    $username = $_POST['username'];
    $username = mysqli_real_escape_string($con, $username);
    $password = $_POST['password'];
    $password = mysqli_real_escape_string($con, $password);
    $livello = 'utente';
    
    $query    = "SELECT * FROM `users` WHERE username='$username' AND password='" . md5($password) . "' AND livello='$livello'";
    $result = mysqli_query($con, $query);
    $rows = mysqli_num_rows($result);

    if (empty($username) || empty($password)) {
        $msg_errore = '"form-error">Riempire tutti i campi.';
    } else {
        if ($rows == 1) {
            session_start();
            $_SESSION['session_user'] = $_POST['username'];
            $_SESSION["session_id"] = $_POST['email'];
            header('Location: ../html/user_area.html');
        } else {
            $msg_errore = '"form-error">Username o password non validi.';
        }
    }
    $errore_form = '"form-error">';
    echo str_replace($errore_form, $msg_errore , file_get_contents("../html/login.html"));
}
?>