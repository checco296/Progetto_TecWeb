<?php

require('database.php');
require('funzioni_adozioni.php');
session_set_cookie_params(0);
session_start();

if (isset($_SESSION['session_id'])) {
    $successo =array('');
    
    if(isset($_GET['Message'])){
        $successo = $_GET['Message'];
        $successo =array($successo);
    }
    $form = '<span class="success" id="form-success"></span>';

    $username = htmlspecialchars($_SESSION['session_id']);

    $query = "SELECT animale1, animale2, animale3, animale4 FROM `users` WHERE username='$username'";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);

    $animale1 = $row['animale1'];
    $animale2 = $row['animale2'];
    $animale3 = $row['animale3'];
    $animale4 = $row['animale4'];

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
}

?>