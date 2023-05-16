<?php

session_start();

if(isset($_SESSION['email']))
{
	unset($_SESSION['email']);

}

if(isset($_COOKIE['email']))
{
	setcookie('email', '', time() + 1, '/');

}

if(isset($_COOKIE['loggedin']))
{
	setcookie('loggedin', '', time() + 1, '/');

}

header("Location: home.php");
die;