<?php

require_once ('conessione.php');
require_once ('card.php');

$pagina=file_get_contents("../html/adotta_cane.html");

$query_info_cane="SELECT cani.id_cani as id,foto_cane.path as foto ,cani.nome,cani.sesso,cani.data_nascita as
 nascita,cani.stato
FROM foto_cane ,cani
where foto_cane.id = cani.id_cani;";
$connessione = new connessione();
if(!$connessione->apriConnessione()){
    //exit
}
$risultato_info_cane=$connessione->interrogaDB($query_info_cane);
$listCard="";
foreach($risultato_info_cane as $ris){
    $card = new Card($ris);
    $listCard.=$card->makeCard();
}
$pagina=str_replace('%listaContenuto%',$listCard,$pagina);
echo $pagina;
?>