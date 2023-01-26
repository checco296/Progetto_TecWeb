<?php
require('database.php');
function check_username($username){
    include('database.php');
    $query= "SELECT username FROM users WHERE username = '$username' ";
	$result = mysqli_query($con, $query);
	if (false == $result || mysqli_num_rows($result) == 0)
		{return false;}
	else
		{return true;}
}

function check_email($email){
    include('database.php');
    $query= "SELECT email FROM users WHERE email = '$email' ";
	$result = mysqli_query($con, $query);
	if (false == $result || mysqli_num_rows($result) == 0)
		{return false;}
	else
		{return true;}
}

function username_valido($username) {   //può contenere solo caratterri alfanumerici e underscore, lunghezza minima 4, massima 20
    if (!preg_match('/^[a-z\d_]{4,20}$/', $username))
        {return false;}
    else
        {return true;}
}

function email_valida($email){
    if (!preg_match('/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/', $email))
        {return false;}
	else
		{return true;}
}

function password_valida($password){   //almeno un carattere minuscolo, uno maiuscolo, un numero e un carattere speciale, lunghezza minima 8, massima 20
    if (!preg_match('/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{8,20}$/',$password)) 
        {return false;}
	else
		{return true;}
}
?>