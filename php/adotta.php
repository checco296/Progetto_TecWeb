<?php
session_set_cookie_params(0);
session_start();
require_once ('connessione.php');
require_once ('card.php');

$pagina=file_get_contents("../html/adotta.html");

$cani = '<p>In questo momento non ci sono cani pronti per essere adottati. Riprova a controllare se ci sono nuovi cani più tardi.</p>';
$gatti = '<p>In questo momento non ci sono gatti pronti per essere adottati. Riprova a controllare se ci sono nuovi gatti più tardi.</p>';

if (isset($_SESSION['session_user'])) {
    $session_user = htmlspecialchars($_SESSION['session_user']);
    if($session_user=='utente'){
        $query_info_cane = "SELECT * FROM cani JOIN foto_cane ON foto_cane.id=cani.id_cani WHERE richiesta is NULL;";
        $query_info_gatto = "SELECT * FROM gatti JOIN foto_gatto ON foto_gatto.id=gatti.id_gatti WHERE richiesta is NULL;";
        $connessione = new connessione();
    
        if (!$connessione->apriConnessione()) {
            exit();
        }
        $risultato_info_cane = $connessione->interrogaDB($query_info_cane);
        $risultato_info_gatto = $connessione->interrogaDB($query_info_gatto);
        $listCard_cani = '';
        $listCard_gatti = '';
        if ($risultato_info_cane) {
            foreach ($risultato_info_cane as $ris) {
                $card = new Card($ris);
                $listCard_cani .= $card->makeCard();
            }
        } else {
            $listCard_cani = $cani;
        }
        if ($risultato_info_gatto) {
            foreach ($risultato_info_gatto as $ris) {
                $card = new Card($ris);
                $listCard_gatti .= $card->makeCard();
            }
        } else {
            $listCard_gatti = $gatti;
        }
        $animali = array($listCard_cani, $listCard_gatti);
        $liste = array('%listaCani%','%listaGatti%');
        $pagina = str_replace($liste, $animali, $pagina);
    
        echo $pagina;

    } elseif ($session_user == 'admin') {

        $query_info_cane = "SELECT * FROM cani JOIN foto_cane ON foto_cane.id=cani.id_cani WHERE richiesta is NULL OR richiesta = 'avviata';";
        $query_info_gatto = "SELECT * FROM gatti JOIN foto_gatto ON foto_gatto.id=gatti.id_gatti WHERE richiesta is NULL OR richiesta = 'avviata';";
        $connessione = new connessione();

        if (!$connessione->apriConnessione()) {
            exit();
        }
        $risultato_info_cane = $connessione->interrogaDB($query_info_cane);
        $risultato_info_gatto = $connessione->interrogaDB($query_info_gatto);
        $listCard_cani = "";
        $listCard_gatti = "";
        if ($risultato_info_cane) {
            foreach ($risultato_info_cane as $ris) {
                $card = new Card($ris);
                $listCard_cani .= $card->makeCard_admin();
            }
        }
        else {
            $listCard_cani = $cani;
        }
        if ($risultato_info_gatto) {
            foreach ($risultato_info_gatto as $ris) {
                $card = new Card($ris);
                $listCard_gatti .= $card->makeCard_admin();
            }
        } else {
            $listCard_gatti = $gatti;
        }
        $animali = array($listCard_cani, $listCard_gatti);
        $liste = array('%listaCani%','%listaGatti%');
        $pagina = str_replace($liste, $animali, $pagina);

        echo $pagina;
    }

} else {

    $query_info_cane = "SELECT * FROM cani JOIN foto_cane ON foto_cane.id=cani.id_cani WHERE richiesta is NULL;";
    $query_info_gatto = "SELECT * FROM gatti JOIN foto_gatto ON foto_gatto.id=gatti.id_gatti WHERE richiesta is NULL;";
    $connessione = new connessione();

    if (!$connessione->apriConnessione()) {
        exit();
    }
    $risultato_info_cane = $connessione->interrogaDB($query_info_cane);
    $risultato_info_gatto = $connessione->interrogaDB($query_info_gatto);
    $listCard_cani = "";
    $listCard_gatti = "";
    if ($risultato_info_cane) {
        foreach ($risultato_info_cane as $ris) {
            $card = new Card($ris);
            $listCard_cani .= $card->makeCard_register();
        }
    }
    else {
        $listCard_cani = $cani;
    }
    if ($risultato_info_gatto) {
        foreach ($risultato_info_gatto as $ris) {
            $card = new Card($ris);
            $listCard_gatti .= $card->makeCard_register();
        }
    }  else {
        $listCard_gatti = $gatti;
    }
    $animali = array($listCard_cani, $listCard_gatti);
    $liste = array('%listaCani%','%listaGatti%');
    $pagina = str_replace($liste, $animali, $pagina);

    echo $pagina;
}
?>