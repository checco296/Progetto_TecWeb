<?php
    require('database.php');
    require('check.php');
    require('funzioni_adozioni.php');
    session_set_cookie_params(0);
    session_start();

if (isset($_POST['invia'])) {
    if (isset($_SESSION['session_id'])) {
        $nome_animale = $_POST['nome_animale'];
        $username = $_POST['username'];
        $cognome = $_POST['cognome'];
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $messagge = $_POST['message'];

        $livello = 'utente';

        $query = "SELECT animale4,richiesta FROM `users` WHERE username='$username' AND  livello='$livello'";
        $result = mysqli_query($con, $query);
        $rows = mysqli_num_rows($result);

        $row = mysqli_fetch_assoc($result);
        $animale4 = $row['animale4'];
        $richiesta = $row['richiesta'];

        if ($richiesta == 'avviata') {
            $msg_errore = '<span class="error" id="form-error">Attendi che un amministratore completi la tua richiesta in corso. Non puoi adottare un animale se la tua richiesta in corso non è stata conclusa.</span>';
            $errore_form = '<span class="error" id="form-error"></span>';
        } else {
            if (empty($cognome) || empty($nome) || empty($email) || empty($messagge)) {
                $msg_errore = '<span class="error" id="form-error">Compila tutti i campi.</span>';
                $errore_form = '<span class="error" id="form-error"></span>';
            } elseif (!email_valida($email)) {
                $msg_errore = '<span class="error" id="email-error">L\'email inserita non è valida.</span><br />';
                $errore_form = '<span class="error" id="email-error"></span><br />';
            } else {
                if ($animale4 != null) {
                    $msg_errore = '<span class="error" id="form-error">Hai raggiunto il limite massimo di adozioni.</span>';
                    $errore_form = '<span class="error" id="form-error"></span>';
                } else {
                    $query_utente = "UPDATE users SET richiesta = 'avviata' WHERE username = '$username'";
                    $result = mysqli_query($con, $query_utente);
                    if (cane($nome_animale)) {
                        $query_animale = "UPDATE cani SET richiesta = 'avviata' WHERE nome = '$nome_animale'";
                        $result_animale = mysqli_query($con, $query_animale);
                        if ($result && $result_animale) {
                            $successo = '<span class="success" id="form-success">Congralutazioni, hai avviato la richiesta di adozione del cane. Attendi che un amministratore confermi l\'adozione.</span>';
                            header("Location: ../php/user_area.php?Message=".$successo);
                        }
                    } elseif (gatto($nome_animale)) {
                        $query_animale = "UPDATE gatti SET richiesta = 'avviata' WHERE nome = '$nome_animale'";
                        $result_animale = mysqli_query($con, $query_animale);
                        if ($result && $result_animale) {
                            $successo = '<span class="success" id="form-success">Congralutazioni, hai avviato la richiesta di adozione del gatto. Attendi che un amministratore confermi l\'adozione.</span>';
                            header("Location: ../php/user_area.php?Message=".$successo);
                        }
                    }
                }
            }
        }
        $campi = array($nome_animale, $username, $msg_errore);
        $form = array('%animale%', '%username%', $errore_form);
        echo str_replace($form, $campi, file_get_contents("../html/richiesta.html"));
    }
} 

?>