<?php
    require('database.php');
    require('check.php');

if (isset($_POST['nome_animale'])) {
    $nome = $_POST['nome_animale'];
    $tipo = $_POST['tipo'];
    $sesso = $_POST['sesso'];
    $data_nascita = $_POST['data_nascita'];
    $img = $_POST['img_animale'];

    if (empty($nome) || empty($data_nascita) || empty($img)) {
         $msg_errore = '<span class="error" id="form-error">Compila tutti i campi.</span>';
         $errore_form = '<span class="error" id="form-aggiungi-error"></span>';
    } elseif (!nome_animale_valido($nome)) {
        $msg_errore = '<span class="error" id="nome-error">Il nome inserito non è valido. Un animale non può contenere numeri e caratteri speciali
        nel suo nome. Lunghezza minina 2 caratteri. Lunghezza massima 20 caratteri.</span>';
        $errore_form = '<span class="error" id="nome-error"></span>';            
    } else {
        if ($tipo == 'cane'){
            $query_cane = "INSERT into `cani` (nome, data_nascita, sesso) 
                  VALUES ('$nome', '$data_nascita', '$sesso')";
            $result_cane = mysqli_query($con, $query_cane);

            $query_foto = "INSERT into `foto_cane` (path) 
                  VALUES ('$img')";
            $result_foto = mysqli_query($con, $query_foto);

            if($result_cane && $result_foto){
                $msg_errore = '<span class="success" id="form-aggiungi-success">Animale aggiunto con successo.</span>';
                $errore_form = '<span class="success" id="form-aggiungi-success"></span>';
            }
        } elseif ($tipo == 'gatto'){
            $query_gatto = "INSERT into `gatti` (nome, data_nascita, sesso) 
            VALUES ('$nome', '$data_nascita', '$sesso')";
            $result_gatto = mysqli_query($con, $query_gatto);

            $query_foto = "INSERT into `foto_gatto` (path) 
                  VALUES ('$img')";
            $result_foto = mysqli_query($con, $query_foto);
            
            if($result_gatto && $result_foto){
                $msg_errore = '<span class="success" id="form-aggiungi-success">Animale aggiunto con successo.</span>';
                $errore_form = '<span class="success" id="form-aggiungi-success"></span>';
            }
        }
    }
   echo str_replace($errore_form, $msg_errore , file_get_contents("../html/admin_area.html"));
}    

?>