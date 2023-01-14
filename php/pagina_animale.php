<?php

require_once ('conessione.php');

$pagina=file_get_contents("../html/pagina_animale.html");

$id=$_GET['id'];
$query_info_cane="SELECT animali.id_animale as id,foto_animali.path as foto ,animali.nome,animali.sesso,animali.data_nascita as
nascita,animali.stato,animali.descrizione as descrizione
FROM foto_animali ,animali
where foto_animali.id = animali.id_animale and animali.id_animale =$id;";
$connessione = new connessione();
if(!$connessione->apriConnessione()){
    //exit
}
$risultato_info_cane=$connessione->interrogaDB($query_info_cane);
$pagina=str_replace('%nome_animale%',$risultato_info_cane[0]['nome'],$pagina);
$pagina=str_replace('%foto_animale%',$risultato_info_cane[0]['foto'],$pagina);
$pagina=str_replace('%descrizione%',$risultato_info_cane[0]['descrizione'],$pagina);
$pagina=str_replace('%sesso%',$risultato_info_cane[0]['sesso'],$pagina);
$pagina=str_replace('%nascita%',$risultato_info_cane[0]['nascita'],$pagina);
$pagina=str_replace('%stato%',$risultato_info_cane[0]['stato'],$pagina);

echo $pagina;
?>