<?php
session_set_cookie_params(0);
session_start();
require('database.php');
require('funzioni_adozioni.php');
require_once ('card.php');

$pagina=file_get_contents("../html/user_area.html");

if (isset($_SESSION['session_id'])) {

    $successo =''; 
    if(isset($_GET['Message'])){
        $successo = $_GET['Message'];
    }
    $form = '<span class="success" id="form-success"></span>';

    $username = htmlspecialchars($_SESSION['session_id']);

    $query = "SELECT animale1, animale2, animale3, animale4, richiesta FROM `users` WHERE username='$username'";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);

    $animale1 = $row['animale1'];
    $animale2 = $row['animale2'];
    $animale3 = $row['animale3'];
    $animale4 = $row['animale4'];
    $richiesta = $row['richiesta'];

    $query_c1 = "SELECT * FROM cani JOIN foto_cane ON foto_cane.id=cani.id_cani WHERE nome = '$animale1' ";
	$result_c1 = mysqli_query($con, $query_c1);
    $query_c2 = "SELECT * FROM cani JOIN foto_cane ON foto_cane.id=cani.id_cani WHERE nome = '$animale2' ";
	$result_c2 = mysqli_query($con, $query_c2);
    $query_c3 = "SELECT * FROM cani JOIN foto_cane ON foto_cane.id=cani.id_cani WHERE nome = '$animale3' ";
	$result_c3 = mysqli_query($con, $query_c3);
    $query_c4 = "SELECT * FROM cani JOIN foto_cane ON foto_cane.id=cani.id_cani WHERE nome = '$animale4' ";
	$result_c4 = mysqli_query($con, $query_c4);

    $query_g1 = "SELECT * FROM gatti JOIN foto_gatto ON foto_gatto.id=gatti.id_gatti WHERE nome = '$animale1' ";
	$result_g1 = mysqli_query($con, $query_g1);
    $query_g2 = "SELECT * FROM gatti JOIN foto_gatto ON foto_gatto.id=gatti.id_gatti WHERE nome = '$animale2' ";
	$result_g2 = mysqli_query($con, $query_g2);
    $query_g3 = "SELECT * FROM gatti JOIN foto_gatto ON foto_gatto.id=gatti.id_gatti WHERE nome = '$animale3' ";
	$result_g3 = mysqli_query($con, $query_g3);
    $query_g4 = "SELECT * FROM gatti JOIN foto_gatto ON foto_gatto.id=gatti.id_gatti WHERE nome = '$animale4' ";
	$result_g4 = mysqli_query($con, $query_g4);

    $listCard_1 = "";
    $listCard_2 = "";
    $listCard_3 = "";
    $listCard_4 = "";

    $adozione = '<p><a href="../php/adotta.php">Nuova adozione</a></p>';

    if($richiesta=='avviata'){
        $adozione = '<p>La tua richiesta di adozione è stata avviata. Attendi che un amministratore completi la tua richiesta in corso.</p>';
    }

    if ($animale1==null && $animale1==null && $richiesta!='avviata'){
        $listCard_1 = '<p>Inizia il tuo primo processo di adozione <a href="../php/adotta.php">qui</a>.</p>';
    } elseif ($animale1==null && $animale1==null && $richiesta=='avviata'){
        $listCard_1 = '<p>La tua prima richiesta di adozione è in fase di elaborazione.</a>';
    }

    if ($result_c1) {
        foreach ($result_c1 as $ris) {
            $card1 = new Card($ris);
            $listCard_1 .= $card1->makeCard_user();
        }
    }
    if ($result_c2) {
        foreach ($result_c2 as $ris) {
            $card2 = new Card($ris);
            $listCard_2 .= $card2->makeCard_user();
        }
    }
    if ($result_c3) {
        foreach ($result_c3 as $ris) {
            $card3 = new Card($ris);
            $listCard_3 .= $card3->makeCard_user();
        }
    }
    if ($result_c4) {
        foreach ($result_c4 as $ris) {
            $card4 = new Card($ris);
            $listCard_4 .= $card4->makeCard_user();
            $adozione = '<p>Hai raggiunto il limite massimo di adozioni.</p>';
        }
    }
    if ($result_g1) {
        foreach ($result_g1 as $ris) {
            $card1 = new Card($ris);
            $listCard_1 .= $card1->makeCard_user();
        }
    }
    if ($result_g2) {
        foreach ($result_g2 as $ris) {
            $card2 = new Card($ris);
            $listCard_2 .= $card2->makeCard_user();
        }
    }
    if ($result_g3) {
        foreach ($result_g3 as $ris) {
            $card3 = new Card($ris);
            $listCard_3 .= $card3->makeCard_user();
        }
    }
    if ($result_g4) {
        foreach ($result_g4 as $ris) {
            $card4 = new Card($ris);
            $listCard_4 .= $card4->makeCard_user();
            $adozione = '<p>Hai raggiunto il limite massimo di adozioni.</p>';
        }
    }
    $animali = array($successo, $listCard_1, $listCard_2, $listCard_3, $listCard_4,$adozione );
    $liste = array($form,'%animale1%','%animale2%','%animale3%','%animale4%','%adozione%');
    $pagina = str_replace($liste, $animali, $pagina);

    echo $pagina;

/*
    $sezione1_nome = 'class="nome1">';
    $sezione1_nascita = 'class="nascita1">';
    $sezione1_sesso = 'class="sesso1">';
    $sezione1_foto = '<img src="../images/Luna.jpg" class="img1" />';

    $sezione2_nome = 'class="nome2">';
    $sezione2_nascita = 'class="nascita2">';
    $sezione2_sesso = 'class="sesso2">';
    $sezione2_foto = '<img src="../images/Luna.jpg" class="img2" />';

    $sezione3_nome = 'class="nome3">';
    $sezione3_nascita = 'class="nascita3">';
    $sezione3_sesso = 'class="sesso3">';
    $sezione3_foto = '<img src="../images/Luna.jpg" class="img3" />';

    $sezione4_nome = 'class="nome4">';
    $sezione4_nascita = 'class="nascita4">';
    $sezione4_sesso = 'class="sesso4">';
    $sezione4_foto = '<img src="../images/Luna.jpg" class="img4" />';

    $sezioni = array($form, $sezione1_nome, $sezione1_nascita, $sezione1_sesso, $sezione1_foto,
                     $sezione2_nome, $sezione2_nascita, $sezione2_sesso, $sezione2_foto,
                     $sezione3_nome, $sezione3_nascita, $sezione3_sesso, $sezione3_foto,
                     $sezione4_nome, $sezione4_nascita, $sezione4_sesso, $sezione4_foto,);

    $a1 = array('');
    $a2 = array('');
    $a3 = array('');
    $a4 = array('');

    $nuova_adozione = '<p><a href="../php/adotta.php">Nuova adozione</a><p>';
    $campo_vuoto = '<p>Nessun dato, puoi comunque adottare un nuovo animale cliccando <a href="../php/adotta_cane.php">qui</a>.</p>';

    if (cane($animale1)) {
        $a1 = mostra_cane($animale1);
        if (cane($animale2)) {
            $a2 = mostra_cane($animale2);
                if (cane($animale3)) {
                    $a3 = mostra_cane($animale3); 
                        if (cane($animale4)) {
                            $a4 = mostra_cane($animale4);
                        } elseif (gatto($animale4)) {
                            $a4 = mostra_gatto($animale4);
                        } else {$a4 = array( $nuova_adozione, $campo_vuoto, $campo_vuoto, $campo_vuoto);}
                    } elseif (gatto($animale3)) {
                        $a3 = mostra_gatto($animale3);
                        if (cane($animale4)) {
                            $a4 = mostra_cane($animale4);
                        } elseif (gatto($animale4)) {
                            $a4 = mostra_gatto($animale4);
                        } else {$a4 = array( $nuova_adozione, $campo_vuoto, $campo_vuoto, $campo_vuoto);}
                    } else {
                        $a3 = array( $nuova_adozione, $campo_vuoto, $campo_vuoto, $campo_vuoto);
                        $a4 = array( $nuova_adozione, $campo_vuoto, $campo_vuoto, $campo_vuoto);}
                } elseif (gatto(($animale2))) {
                    $a2 = mostra_gatto($animale2);
                    if (cane($animale3)) {
                        $a3 = mostra_cane($animale3); 
                            if (cane($animale4)) {
                                $a4 = mostra_cane($animale4);
                            } elseif (gatto($animale4)) {
                                $a4 = mostra_gatto($animale4);
                            } else {$a4 = array( $nuova_adozione, $campo_vuoto, $campo_vuoto, $campo_vuoto);}
                        } elseif (gatto($animale3)) {
                            $a3 = mostra_gatto($animale3);
                            if (cane($animale4)) {
                                $a4 = mostra_cane($animale4);
                            } elseif (gatto($animale4)) {
                                $a4 = mostra_gatto($animale4);
                            } else {$a4 = array( $nuova_adozione, $campo_vuoto, $campo_vuoto, $campo_vuoto);}
                        } else {
                            $a3 = array( $nuova_adozione, $campo_vuoto, $campo_vuoto, $campo_vuoto);
                            $a4 = array( $nuova_adozione, $campo_vuoto, $campo_vuoto, $campo_vuoto);}
                } else {
                    $a2 = array( $nuova_adozione, $campo_vuoto, $campo_vuoto, $campo_vuoto);
                    $a3 = array( $nuova_adozione, $campo_vuoto, $campo_vuoto, $campo_vuoto);
                    $a4 = array( $nuova_adozione, $campo_vuoto, $campo_vuoto, $campo_vuoto);}
        } elseif (gatto($animale1)) {
            $a1 = mostra_gatto($animale1);
            if (cane($animale2)) {
                $a2 = mostra_cane($animale2);
                    if (cane($animale3)) {
                        $a3 = mostra_cane($animale3); 
                            if (cane($animale4)) {
                                $a4 = mostra_cane($animale4);
                            } elseif (gatto($animale4)) {
                                $a4 = mostra_gatto($animale4);
                            } else {$a4 = array( $nuova_adozione, $campo_vuoto, $campo_vuoto);}
                        } elseif (gatto($animale3)) {
                            $a3 = mostra_gatto($animale3);
                            if (cane($animale4)) {
                                $a4 = mostra_cane($animale4);
                            } elseif (gatto($animale4)) {
                                $a4 = mostra_gatto($animale4);
                            } else {$a4 = array( $nuova_adozione, $campo_vuoto, $campo_vuoto, $campo_vuoto);}
                        } else {
                            $a3 = array( $nuova_adozione, $campo_vuoto, $campo_vuoto, $campo_vuoto);
                            $a4 = array( $nuova_adozione, $campo_vuoto, $campo_vuoto, $campo_vuoto);}
                    } elseif (gatto(($animale2))) {
                        $a2 = mostra_gatto($animale2);
                        if (cane($animale3)) {
                            $a3 = mostra_cane($animale3); 
                                if (cane($animale4)) {
                                    $a4 = mostra_cane($animale4);
                                } elseif (gatto($animale4)) {
                                    $a4 = mostra_gatto($animale4);
                                } else {$a4 = array( $nuova_adozione, $campo_vuoto, $campo_vuoto, $campo_vuoto);}
                            } elseif (gatto($animale3)) {
                                $a3 = mostra_gatto($animale3);
                                if (cane($animale4)) {
                                    $a4 = mostra_cane($animale4);
                                } elseif (gatto($animale4)) {
                                    $a4 = mostra_gatto($animale4);
                                } else {$a4 = array( $nuova_adozione, $campo_vuoto, $campo_vuoto, $campo_vuoto);}
                            } else {
                                $a3 = array( $nuova_adozione, $campo_vuoto, $campo_vuoto, $campo_vuoto);
                                $a4 = array( $nuova_adozione, $campo_vuoto, $campo_vuoto, $campo_vuoto);}
                    } else {
                        $a2 = array( $nuova_adozione, $campo_vuoto, $campo_vuoto, $campo_vuoto);
                        $a3 = array( $nuova_adozione, $campo_vuoto, $campo_vuoto, $campo_vuoto);
                        $a4 = array( $nuova_adozione, $campo_vuoto, $campo_vuoto, $campo_vuoto);}       
        } else {
            $a1 = array( $nuova_adozione, $campo_vuoto, $campo_vuoto, $campo_vuoto); 
            $a2 = array( $nuova_adozione, $campo_vuoto, $campo_vuoto, $campo_vuoto);
            $a3 = array( $nuova_adozione, $campo_vuoto, $campo_vuoto, $campo_vuoto);
            $a4 = array( $nuova_adozione, $campo_vuoto, $campo_vuoto, $campo_vuoto);}


    $posti = array_merge($successo, $a1, $a2, $a3, $a4);
    echo str_replace($sezioni, $posti, file_get_contents("../html/user_area.html"));
*/
}

?>