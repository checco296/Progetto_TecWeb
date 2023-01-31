<?php
require('database.php');
$username = $_POST['nome_utente']; //nome dell'utente selezionato
$nome = $_POST['animale'];  //nome dell'animale selezionato

$query = "SELECT animale1, animale2, animale3, animale4 FROM `users` WHERE username='$username'";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);

$animale1 = $row['animale1'];
$animale2 = $row['animale2'];
$animale3 = $row['animale3'];
$animale4 = $row['animale4'];

$query_cani = "SELECT * FROM `cani` WHERE nome='$nome'";
$query_gatti = "SELECT * FROM `gatti` WHERE nome='$nome'";

$result_cani = mysqli_query($con, $query_cani);
$result_gatti = mysqli_query($con, $query_gatti);
$row_cani = mysqli_fetch_assoc($result_cani);
$row_gatti = mysqli_fetch_assoc($result_gatti);

$messaggio_successo = '<span class="success" id="form-success">Adozione completata con successo.</span>';
$successo_form = '<span class="success" id="form-success"></span>';

if (!empty($row_cani)) {
    $query_cane = "UPDATE cani SET richiesta = 'conclusa' WHERE nome = '$nome'";
    $result_cane = mysqli_query($con, $query_cane);

    if (!empty($animale1)) {
        if (!empty($animale2)) {
            if (!empty($animale3)) {
                $query_utente = "UPDATE users SET animale4 = '$nome', richiesta = 'conclusa' WHERE username = '$username'";
                $result = mysqli_query($con, $query_utente);
            } else {
                $query_utente = "UPDATE users SET animale3 = '$nome', richiesta = 'conclusa' WHERE username = '$username'";
                $result = mysqli_query($con, $query_utente);
            }
        } else {
            $query_utente = "UPDATE users SET animale2 = '$nome', richiesta = 'conclusa' WHERE username = '$username'";
            $result = mysqli_query($con, $query_utente);
        }
    } else {
        $query_utente = "UPDATE users SET animale1 = '$nome', richiesta = 'conclusa' WHERE username = '$username'";
        $result = mysqli_query($con, $query_utente);
    }
    echo str_replace($successo_form, $messaggio_successo , file_get_contents("../html/admin_area.html"));

} elseif(!empty($row_gatti)){
    $query_gatto = "UPDATE gatti SET richiesta = 'conclusa' WHERE nome = '$nome'";
    $result_gatto = mysqli_query($con, $query_gatto);

    if (!empty($animale1)) {
        if (!empty($animale2)) {
            if (!empty($animale3)) {
                $query_utente = "UPDATE users SET animale4 = '$nome', richiesta = 'conclusa' WHERE username = '$username'";
                $result = mysqli_query($con, $query_utente);
            } else {
                $query_utente = "UPDATE users SET animale3 = '$nome', richiesta = 'conclusa' WHERE username = '$username'";
                $result = mysqli_query($con, $query_utente);
            }
        } else {
            $query_utente = "UPDATE users SET animale2 = '$nome', richiesta = 'conclusa' WHERE username = '$username'";
            $result = mysqli_query($con, $query_utente);
        }
    } else {
        $query_utente = "UPDATE users SET animale1 = '$nome', richiesta = 'conclusa' WHERE username = '$username'";
        $result = mysqli_query($con, $query_utente);
    }
    echo str_replace($successo_form, $messaggio_successo , file_get_contents("../html/admin_area.html"));

} else {
    header('Location: ../php/admin_area.php');
}
 
?>