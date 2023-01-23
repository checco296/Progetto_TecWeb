<?php
	session_start();
	session_unset();
	session_destroy();

	header("location: ../html/login.html");
	exit;
?>