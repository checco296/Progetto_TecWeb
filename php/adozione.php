<?php
session_set_cookie_params(0);
session_start();
if (isset($_POST['adotta'])) {
    if (isset($_SESSION['session_id'])) {
        $username = htmlspecialchars($_SESSION['session_id']);
        $nome_animale = $_POST['nome'];

        $pagina = file_get_contents("../html/richiesta.html");

        $username = "{$username}";
        $nome_adozione = "{$nome_animale}";

        $dati_adozione = array($nome_adozione, $username);
        $adozione = array('%animale%', '%username%');
        $pagina = str_replace($adozione, $dati_adozione, $pagina);
        echo $pagina;
    }
}

?>