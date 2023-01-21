<?php

require_once ('conessione.php');
require_once ('card.php');

$pagina=file_get_contents("../html/adotta.html");

$query_info_cane="SELECT animali.id_animale as id,foto_animali.path as foto ,animali.nome,animali.sesso,animali.data_nascita as
 nascita,animali.stato
FROM foto_animali ,animali
where foto_animali.id = animali.id_animale;";
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