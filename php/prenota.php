<?php
require_once ('conessione.php');
$pagina=file_get_contents("../html/prenota.html");

$id=$_GET['id'];

$query_nome_animale="SELECT animali.id_animale as id,animali.nome as nome
FROM animali
where  animali.id_animale = $id;";
$connessione = new connessione();
if(!$connessione->apriConnessione()){
    //exit
}
$risultato_nome_animale=$connessione->interrogaDB($query_nome_animale);
$pagina=str_replace('%nome_animale%',$risultato_nome_animale[0]['nome'],$pagina);
$pagina=str_replace('%id_animale%',$id,$pagina);
echo $pagina;
?>