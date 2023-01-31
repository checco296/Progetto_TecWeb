<?php
    require('database.php');

    $nome = $_POST['elimina_animale'];
    $motivazione = $_POST['motivazione'];

    if (empty($motivazione)) {
         $msg_errore = '<span class="error" id="form-elimina-error">Scrivi la motivazione per cui stai eliminando questo animale dal sito.</span>';
         $errore_form = '<span class="error" id="form-elimina-error"></span>';
         header("Location: ../php/admin_area.php?messaggio_campi_elimina=".$msg_errore);      
    } else {

        $query_cani = "SELECT id_cani FROM `cani` WHERE nome='$nome'";
        $result_cani = mysqli_query($con, $query_cani);
        $row_cani = mysqli_fetch_assoc($result_cani);
        $id_cane = $row_cani['id_cani'];

        $query_gatti = "SELECT id_gatti FROM `gatti` WHERE nome='$nome'";        
        $result_gatti = mysqli_query($con, $query_gatti);
        $row_gatti = mysqli_fetch_assoc($result_gatti);
        $id_gatto = $row_gatti['id_gatti'];

        $successo = '';

        if (!empty($row_cani)) {
            $query_elimina_foto_cane = "DELETE FROM foto_cane WHERE id = '$id_cane';";
            $result_foto_cane = mysqli_query($con, $query_elimina_foto_cane);

            $query_elimina_cane = "DELETE FROM cani WHERE id_cani = '$id_cane';";
            $result_cane = mysqli_query($con, $query_elimina_cane);
            
            if ($result_cane && $result_foto_cane) {
                $successo = "<span class='success' id='form-elimina-success'>Hai eliminato {$nome} con successo.</span>";
                header("Location: ../php/admin_area.php?messaggio_elimina=" . $successo);
            }
            
        } elseif(!empty($row_gatti)){
            $query_elimina_foto_gatto = "DELETE FROM foto_gatto WHERE id = '$id_gatto';";
            $result_foto_gatto = mysqli_query($con, $query_elimina_foto_gatto);
            
            $query_elimina_gatto = "DELETE FROM gatti WHERE id_gatti = '$id_gatto';";
            $result_gatto = mysqli_query($con, $query_elimina_gatto);

            $successo = "<span class='success' id='form-elimina-success'>Hai eliminato {$nome} con successo.</span>";
            header("Location: ../php/admin_area.php?messaggio_elimina=".$successo);

        } else {
            header('Location: ../php/admin_area.php');
        }
    }
?>