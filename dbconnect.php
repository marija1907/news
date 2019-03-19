<?php
//konekcija ka bazi
$conn = mysqli_connect("localhost","root","","aplication_news");
if(!$conn){
	die("Connection failed:" . mysqli_connect_error());
	}