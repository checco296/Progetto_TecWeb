<?php
require('database.php');

$successo = ''; 
$form = '';
$cani_eliminabili = '';
$gatti_eliminabili = '';

//successi
if(isset($_GET['messaggio_adozione'])){
    $successo = $_GET['messaggio_adozione'];    
    $form = '<span class="success" id="form-success"></span>';
}

if(isset($_GET['messaggio_successo'])){
    $successo = $_GET['messaggio_successo'];    
    $form = '<span class="success" id="form-aggiungi-success"></span>';
}

if(isset($_GET['messaggio_elimina'])){
    $successo = $_GET['messaggio_elimina'];    
    $form = '<span class="success" id="form-elimina-success"></span>';
}

//errori
if(isset($_GET['messaggio_nome'])){
    $successo = $_GET['messaggio_nome'];    
    $form = '<span class="error" id="nome-error"></span>';
}

if(isset($_GET['messaggio_campi'])){
    $successo = $_GET['messaggio_campi'];    
    $form = '<span class="error" id="form-aggiungi-error"></span>';
}

if(isset($_GET['messaggio_campi_elimina'])){
    $successo = $_GET['messaggio_campi_elimina'];    
    $form = '<span class="error" id="form-elimina-error"></span>';
}

$query_utenti = "SELECT * from users WHERE livello = 'utente' AND richiesta = 'avviata'"; 
$result_utenti = mysqli_query($con,$query_utenti);

$query_cani = "SELECT * from cani WHERE richiesta = 'avviata'"; 
$result_cani = mysqli_query($con,$query_cani);

$query_gatti = "SELECT * from gatti WHERE richiesta = 'avviata'"; 
$result_gatti = mysqli_query($con,$query_gatti);

$messaggio_elimina = '';

if (mysqli_num_rows($result_utenti) > 0 && (mysqli_num_rows($result_gatti) > 0 || mysqli_num_rows($result_cani) > 0)) {
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

    $query_cani_eliminabili = "SELECT * from cani WHERE richiesta is NULL"; 
    $result_cani_eliminabili = mysqli_query($con,$query_cani_eliminabili);

    $query_gatti_eliminabili = "SELECT * from gatti WHERE richiesta is NULL"; 
    $result_gatti_eliminabili = mysqli_query($con,$query_gatti_eliminabili);

    if (mysqli_num_rows($result_gatti_eliminabili) > 0 || mysqli_num_rows($result_cani_eliminabili) > 0) {

        $cani_eliminabili = '';
        while ($row = mysqli_fetch_assoc($result_cani_eliminabili)) {
            $nome_cane_eliminabile = $row['nome'];
            $cani_eliminabili = "{$cani_eliminabili}<option value='{$nome_cane_eliminabile}'>{$nome_cane_eliminabile}</option>";
        }
        $gatti_eliminabili = '';
        while ($row = mysqli_fetch_assoc($result_gatti_eliminabili)) {
            $nome_gatto_eliminable = $row['nome'];
            $gatti_eliminabili = "{$gatti_eliminabili}<option value='{$nome_gatto_eliminable}'>{$nome_gatto_eliminable}</option>";
        }
    } else {
        $messaggio_elimina = '<span class="error" id="form-elimina-error">Non ci sono animali che possono essere eliminati dal sito al momento.</span>';
    }
    $lista_cani = '<option value="cane"></option>';
    $lista_gatti = '<option value="gatto"></option>';
    $lista_utenti = '<option value="utente"></option>';
    $lista_cani_eliminabili = '<option value="elimina_cane"></option>';
    $lista_gatti_eliminabili = '<option value="elimina_gatto"></option>';
    $no_elimina = '<span class="error" id="form-elimina-error"></span>';
    $liste = array($form, $no_elimina, $lista_cani, $lista_gatti, $lista_utenti, $lista_cani_eliminabili, $lista_gatti_eliminabili);
    $nomi = array($successo, $messaggio_elimina, $cani, $gatti, $utenti, $cani_eliminabili, $gatti_eliminabili);
    echo str_replace($liste, $nomi, file_get_contents("../html/admin_area.html"));
} else {
    $query_cani_eliminabili = "SELECT * from cani WHERE richiesta is NULL"; 
    $result_cani_eliminabili = mysqli_query($con,$query_cani_eliminabili);

    $query_gatti_eliminabili = "SELECT * from gatti WHERE richiesta is NULL"; 
    $result_gatti_eliminabili = mysqli_query($con,$query_gatti_eliminabili);

    if (mysqli_num_rows($result_gatti_eliminabili) > 0 || mysqli_num_rows($result_cani_eliminabili) > 0) {

        while ($row = mysqli_fetch_assoc($result_cani_eliminabili)) {
            $nome_cane_eliminabile = $row['nome'];
            $cani_eliminabili = "{$cani_eliminabili}<option value='{$nome_cane_eliminabile}'>{$nome_cane_eliminabile}</option>";
        }

        while ($row = mysqli_fetch_assoc($result_gatti_eliminabili)) {
            $nome_gatto_eliminable = $row['nome'];
            $gatti_eliminabili = "{$gatti_eliminabili}<option value='{$nome_gatto_eliminable}'>{$nome_gatto_eliminable}</option>";
        }
    } else {
        $messaggio_elimina = '<span class="error" id="form-elimina-error">Non ci sono animali che possono essere eliminati dal sito al momento.</span>';
    }

    $lista_cani_eliminabili = '<option value="elimina_cane"></option>';
    $lista_gatti_eliminabili = '<option value="elimina_gatto"></option>';
    $no_richieste = '<span class="error" id="form-error"></span>';
    $no_elimina = '<span class="error" id="form-elimina-error"></span>';
    $messaggio = '<span class="error" id="form-error">Non ci sono nuove richieste di adozione al momento.</span>';
    $liste = array($form, $no_richieste, $no_elimina, $lista_cani_eliminabili, $lista_gatti_eliminabili);
    $nomi = array($successo, $messaggio, $messaggio_elimina, $cani_eliminabili, $gatti_eliminabili);
    echo str_replace($liste, $nomi, file_get_contents("../html/admin_area.html"));
}

?>