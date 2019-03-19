<?php
include "dbconnect.php";
echo "Welcome user registered to registration<br>";
if(isset($_POST['submit']) && !empty ($_POST)){//ako parametar postoji i ako nije prazan
if($_POST['firstname'] == "" || $_POST['lastname'] == "" || $_POST['username'] == ""  || $_POST['password'] == "" || $_POST['email'] == ""){
	echo "Field can't be empty!";
}
//regularan izraz za pravilno unosenje e-mail adrese	
$email_pattern = "/^[a-zA-Z0-9]+\@[a-zA-Z0-9]+\.[a-zA-Z0-9]{2,3}$/";

$firstname = trim($_POST['firstname']);
$lastname = trim($_POST['lastname']);
$username = trim($_POST['username']);
$password = trim($_POST['password']);
if(preg_match($email_pattern,trim($_POST['email'])) == 1 ){//da li je email pravilno unet
$email = filter_var(trim($_POST['email']));
}else{
	echo "E-mail is not correct! <br>";
	?>
	<a href="index.php">Registration</a>
	<?php
	die();
}
}else{
	?>
		<a href="index.php">Registration</a>
	<?php
	die();
}
$admin = 2;

//provera da li su uneti nedozvoljeni karakteri
$firstname = str_replace(">","",$firstname); 
$firstname = str_replace("<","",$firstname);
$firstname = str_replace("'","",$firstname);

$lastname = str_replace(">","",$lastname);
$lastname = str_replace("<","",$lastname);
$lastname = str_replace("'","",$lastname);

$username = str_replace(">","",$username);
$username = str_replace("<","",$username);
$username = str_replace("'","",$username);

echo $firstname ." ". $lastname . " " . $username . $admin;
echo "<br>";


//kod za proveru zauzetosti korinickog  imena-username
$check_username = $_POST['username'];
$query = "select username from users where username = '$check_username'";
$result = mysqli_query($conn,$query);
$num_results = mysqli_num_rows($result);

if(mysqli_num_rows($result) > 0){
	echo "Username" . " " . $_POST['username'] . " " .  "je zauzet.<br>" ;
	?>
	<a href="index.php">Registration</a>
	<?php
	die();
}
$firstname = addslashes($firstname);
$lastname = addslashes($lastname);
$username = addslashes($username);

$insert_user = "insert into users  value (null,'{$firstname}','{$lastname}','{$username}',md5('{$password}'),'{$email}','{$admin}')"; 
$add_user = mysqli_query($conn,$insert_user);
mysqli_real_escape_string($conn, $firstname);
mysqli_real_escape_string($conn, $lastname);
mysqli_real_escape_string($conn, $username);
mysqli_real_escape_string($conn, $password);
mysqli_real_escape_string($conn, $email);



if(!$add_user){
	echo "<br> Registration rejected <br>";
	?>
	<a href="index.php">Registration</a>
	<?php
	die();
	
}else{
	header ("location: login.php");
}





	

