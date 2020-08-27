<?php 
session_start();
if(empty($_SESSION['user_id']) || !isset($_SESSION['user_id'])){
	header("location:index.php");
}
?>