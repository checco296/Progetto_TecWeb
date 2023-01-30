<?php
require('database.php');

function cane($animale){
    include('database.php');
    $query= "SELECT nome FROM cani WHERE nome = '$animale' ";
	$result = mysqli_query($con, $query);
	if (false == $result || mysqli_num_rows($result) == 0)
		{return false;}
	else
		{return true;}
}

function gatto($animale){
    include('database.php');
    $query= "SELECT nome FROM gatti WHERE nome = '$animale' ";
	$result = mysqli_query($con, $query);
	if (false == $result || mysqli_num_rows($result) == 0)
		{return false;}
	else
		{return true;}
}

function mostra_cane($animale){
    include('database.php');
    $query = "SELECT * FROM cani JOIN foto_cane ON foto_cane.id=cani.id_cani WHERE nome = '$animale' ";
	$result = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);
    $nome = $row['nome'];
    $nascita = $row['data_nascita'];
    $sesso = $row['sesso'];
    $foto = $row['path'];
    $parte_nome = "class='nome'>{$nome}";
    $parte_nascita = "class='nascita'>{$nascita}";
    $parte_sesso = "class='sesso'>{$sesso}";
    $parte_foto = "<img src='../images/" . $foto . "' />";
	if (false == $result || mysqli_num_rows($result) == 0)
		{return null;}
	else {
        return array($parte_nome,$parte_nascita,$parte_sesso,$parte_foto);
    }
}

function mostra_gatto($animale){
    include('database.php');
    $query = "SELECT * FROM gatti JOIN foto_gatto ON foto_gatto.id=gatti.id_gatti WHERE nome = '$animale' ";
	$result = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);
    $nome = $row['nome'];
    $nascita = $row['data_nascita'];
    $sesso = $row['sesso'];
    $foto = $row['path'];
    $parte_nome = "class='nome'>{$nome}";
    $parte_nascita = "'nascita1'>{$nascita}";
    $parte_sesso = "class='sesso'>{$sesso}";
    $parte_foto = "<img src='../images/" . $foto . "' >";
	if (false == $result || mysqli_num_rows($result) == 0)
		{return null;}
	else {
        return array($parte_nome,$parte_nascita,$parte_sesso,$parte_foto);
    }
}

?>