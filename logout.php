<?php 
	/*
	Mengyuan Huang 
	cse154 AJ
	#HW5
	this page will log the user out and returns them to the start.php page.
	*/
	session_start();
	session_destroy();
	header("Location: start.php");	
	die();
?>