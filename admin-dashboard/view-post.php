<?php
include_once '../db-config/connection.php';
error_reporting(0);
session_start();
if(!isset($_SESSION['user'])){
	header('location:login.php');
}
include_once 'header.php';
echo $post_id = $_GET['post_id'];
?>

<?php include_once 'footer.php'; ?>