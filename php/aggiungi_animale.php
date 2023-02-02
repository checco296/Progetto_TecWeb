<?php
    require('database.php');
    require('check.php');


    $nome = $_POST['nome_animale'];
    $tipo = $_POST['tipo'];
    $sesso = $_POST['sesso'];
    $data_nascita = $_POST['data_nascita'];
    $descrizione = $_POST['descrizione'];

    $img = $_FILES['img_animale']['name'];
    $img_path = "../images/".basename($img);

    if (empty($nome) || empty($data_nascita) || empty($img) || empty($descrizione)) {
         $msg_errore = '<span class="error" id="form-error">Compila tutti i campi.</span>';
         $errore_form = '<span class="error" id="form-aggiungi-error"></span>';
         header("Location: ../php/admin_area.php?messaggio_campi=".$msg_errore);
    } elseif (!nome_animale_valido($nome)) {
        $msg_errore = '<span class="error" id="nome-error">Il nome inserito non è valido. Un animale non può contenere numeri e caratteri speciali nel suo nome. Lunghezza minina 2 caratteri. Lunghezza massima 20 caratteri.</span>';
        $errore_form = '<span class="error" id="nome-error"></span>';    
        header("Location: ../php/admin_area.php?messaggio_nome=".$msg_errore);        
    } else {
        if ($tipo == 'cane'){
            $query_cane = "INSERT into `cani` (nome, data_nascita, sesso, descrizione) 
                  VALUES ('$nome', '$data_nascita', '$sesso','$descrizione')";
            $result_cane = mysqli_query($con, $query_cane);

            $query_foto = "INSERT into `foto_cane` (path) 
                  VALUES ('$img')";
            $result_foto = mysqli_query($con, $query_foto);

            if($result_cane && $result_cane && (move_uploaded_file($_FILES['img_animale']['tmp_name'], $img_path))){
                $successo = '<span class="success" id="form-aggiungi-success">Cane aggiunto con successo.</span>';
                header("Location: ../php/admin_area.php?messaggio_successo=".$successo);            
            }
        } elseif ($tipo == 'gatto'){
            $query_gatto = "INSERT into `gatti` (nome, data_nascita, sesso, descrizione) 
            VALUES ('$nome', '$data_nascita', '$sesso','$descrizione')";
            $result_gatto = mysqli_query($con, $query_gatto);

            $query_foto = "INSERT into `foto_gatto` (path) 
                  VALUES ('$img')";
            $result_foto = mysqli_query($con, $query_foto);
            
            if($result_gatto && $result_foto && (move_uploaded_file($_FILES['img_animale']['tmp_name'], $img_path))){
                $successo = '<span class="success" id="form-aggiungi-success">Gatto aggiunto con successo.</span>';
                header("Location: ../php/admin_area.php?messaggio_successo=".$successo);
            }
        }
    }
?>
