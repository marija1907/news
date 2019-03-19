<!DOCTYPE html>
<html>
  <head>
    <title>Registration</title>
	<meta charset="UTF-8">
	<link href="style1.css" type="text/css" rel="stylesheet">
	<script type="text/javascript">
	
	</script>
  </head>
  
  <body>
  
  <h2>NEWS</h2>
  	<form method="POST" action="welcome.php" name="My_form" id="form" >
		
		<p>Firstname:</p>
		<input type="text" name="firstname" id="firstname" value="<?php if(!empty($_POST)) echo $_POST['firstname']; ?>"><br>
		<span id="spantagf"></span>
		<p>Lastname:</p>
		<input type="text" name="lastname" id="lastname" value="<?php if(!empty($_POST)) echo $_POST['lastname']; ?>"><br>
		<span id="spantagl"></span>
		<p>Username:</p>
		<input type="text" name="username" id="username" value="<?php if(!empty($_POST)) echo $_POST['username']; ?>">
		<span id="spantagu"></span>
		<p>Password:</p>
		<input type="password" name="password" id="password" value="<?php if(!empty($_POST)) echo $_POST['password']; ?>"><br>
		<span id="spantagp"></span>
		<p>E-mail:</p>
		<input type="text" name="email" id="email" value="<?php if(!empty($_POST)) echo $_POST['email']; ?>"><br>
		<span id="spantage"></span>
		<br><br>
		<input type="submit" name="submit" value="Registration" id="submitReg">
		
	<a href="login.php" id="link">Login</a>
	</form>
  <?php
	include "dbconnect.php";
	$sql = "select title,description from news";
if(!$q = mysqli_query($conn,$sql)){
	echo "Greska pri upitu";
}
if(mysqli_num_rows($q)==0){
	echo "Nema ispisa vesti";
}else{
	$a=0;
	while($redak=mysqli_fetch_assoc($q)){
		$a=$a+1;
		$vesti[$a]['title'] = $redak['title'];
		$vesti[$a]['description'] = $redak['description'];
		//$vesti[$a]['text_news'] = $redak['text_news'];
		
	}
}
?>
<div id="form1">
<?php
for($i=1;$i<=$a;$i++){
	echo "<strong>Naslov vesti :</strong>" . $vesti[$i]['title'] . "<br>" . "<strong>Opis vesti : </strong>" . $vesti[$i]['description'] .  "<br>";
	echo "<a href = '#'>Da procitate cele vesti registrujte se ili se prijavite</a> <hr>";

	
}

?>
	
	</div>
	

  </body>
  </html>