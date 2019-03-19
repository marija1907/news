<?php
if(isset($_GET['id'])){
	$id = $_GET['id'];
	include 'dbconnect.php';
	$query = "DELETE FROM komentari WHERE id = {$id}";
	mysqli_query($conn, $query);
	header("Location:admin_login.php");
}