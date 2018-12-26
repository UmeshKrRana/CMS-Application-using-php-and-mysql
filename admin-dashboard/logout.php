<?php
error_reporting(0);
session_start();
session_unset();

if(!isset($_SESSION['user'])){
	header('location: login.php');
}

?>