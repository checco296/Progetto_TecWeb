<?php
require('database.php');

$query_utenti = "SELECT * from users WHERE livello = 'utente' AND richiesta = 'avviata'"; 
$result_utenti = mysqli_query($con,$query_utenti);

$query_cani = "SELECT * from cani WHERE richiesta = 'avviata'"; 
$result_cani = mysqli_query($con,$query_cani);

$query_gatti = "SELECT * from gatti WHERE richiesta = 'avviata'"; 
$result_gatti = mysqli_query($con,$query_gatti);

if (mysqli_num_rows($result_utenti) > 0 && (mysqli_num_rows($result_gatti) > 0 || mysqli_num_rows($result_cani))) {
    $utenti = '';
    while ($row = mysqli_fetch_assoc($result_utenti)) {
        $nome_utente = $row['username'];
        $utenti = "{$utenti}<option value='{$nome_utente}'>{$nome_utente}</option>";
    }
    $cani = '';
    while($row = mysqli_fetch_assoc($result_cani)) {
        $nome_cane = $row['nome'];
        $cani = "{$cani}<option value='{$nome_cane}'>{$nome_cane}</option>";
    }
    $gatti = '';
    while($row = mysqli_fetch_assoc($result_gatti)) {
        $nome_gatto = $row['nome'];
        $gatti = "{$gatti}<option value='{$nome_gatto}'>{$nome_gatto}</option>";
    }

    $lista_cani = '<option value="cane"></option>';
    $lista_gatti = '<option value="gatto"></option>';
    $lista_utenti = '<option value="utente"></option>';
    $liste = array($lista_cani, $lista_gatti, $lista_utenti);
    $nomi = array($cani, $gatti, $utenti);
    echo str_replace($liste, $nomi, file_get_contents("../html/admin_area.html"));
} else {
    $messaggio = '<span class="error" id="form-error">Non ci sono nuove richieste di adozione al momento.</span>';
    $no_richieste = '<span class="error" id="form-error"></span>';
    echo str_replace($no_richieste, $messaggio, file_get_contents("../html/admin_area.html"));
}

?>