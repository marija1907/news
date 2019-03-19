<?php
session_start();
include "dbconnect.php";
echo "welcome user login to news!";
echo "<br>";
if(isset($_POST['submitlogin']) && !empty ($_POST)){
$usernamelogin = trim($_POST['usernamelogin']);
$passwordlogin =trim( $_POST['passwordlogin']);
}
$usernamelogin = str_replace(">","",$usernamelogin); 
$usernamelogin = str_replace("<","",$usernamelogin);
$usernamelogin = str_replace("'","",$usernamelogin);

$passwordlogin = str_replace(">","",$passwordlogin);
$passwordlogin = str_replace("<","",$passwordlogin);
$passwordlogin = str_replace("'","",$passwordlogin);

$res =  mysqli_query($conn,"select username,admin from users where username = '{$usernamelogin}'  ") ;
$adm = mysqli_fetch_object($res);
//print_r($adm);
echo "<br>";
//$row=mysqli_num_rows($res);
//print_r($row);
if($adm){
	if($adm->admin==1){
		session_regenerate_id();
		$_SESSION['user_logged']= true;
		$_SESSION['admin'] = $adm->username;
		header ("location: admin_login.php");
	}elseif(mysqli_num_rows($res)==1){
		
			//ukoliko postoji u bazi
		session_regenerate_id();
		$_SESSION['user_logged']= true;
		$_SESSION['usernamelogin']= $adm->username;
		$_SESSION['firstname'] = $adm->firstname;
		$_SESSION['lastname'] = $adm->lastname;
	
		header ("location: news_login.php");
			}else{
				echo "Ne postoji u bazi";
			}
		
		
		}else{
		header ("location: index.php");
		}
	


/*$result = mysqli_query($conn,"select username, password from users where username = '{$usernamelogin}' and password ='".md5($_POST['passwordlogin'])."'");
$user = mysqli_fetch_object($result);
if($user){
	if(mysqli_num_rows($result)==1){
		//ukoliko postoji u bazi
	session_regenerate_id();
	$_SESSION['user_logged']= true;
	$_SESSION['usernamelogin']= $user->username;
	$_SESSION['firstname'] = $user->firstname;
	$_SESSION['lastname'] = $user->lastname;
	header ("location: news_login.php");
}
	
else{
	header ("location:login.php");
} 	
}else {
	header ("location:index.php");
}

*/