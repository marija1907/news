<?php
session_start();
include "dbconnect.php";
?>
<div id="div">
<?php
echo "welcome to news login <br>";

if(isset($_SESSION['user_logged']) && $_SESSION['user_logged'] ){
	echo "hello" . " " . $_SESSION['usernamelogin'];
	
}else{
	echo "You are not authorized";
	?>
	<a href="index.php">Login</a>
	<?php
}
?>
<form method="POST" action="logout.php" name="formlogout">
<input type="submit" name="submitlogout" value = "Logout">
</form>


<form method="GET" action="brisanje_komentara.php" name="brisanje">
<input type="text" name="username" value="<?php echo $_SESSION['usernamelogin']; ?>">
<input type="submit" name="submitbrisanje" value = "Brisanje Komentara">
</form>
<a href="ispis_komentara.php">Komentari</a>
</div>
<?php
?>
<!DOCTYPE html>
<html>
  <head>
    <title>News</title>
	<meta charset="UTF-8">
	<link href="style1.css" type="text/css" rel="stylesheet">
	</head>
	<body>
<a href="ekonomija.php" class="nav" >Eonomija</a>
<a href="svet.php" class="nav">Svet</a>
<a href="it_vesti.php" class="nav">IT Vesti</a>
<br>
<hr>

<?php
$sql = "select id,title,description,text_news from news";
if(!$q = mysqli_query($conn,$sql)){
	echo "Greska pri upitu";
}
if(mysqli_num_rows($q)==0){
	echo "Nema ispisa vesti";
}else{
	$a=0;
	while($redak=mysqli_fetch_assoc($q)){
		$a=$a+1;
		$vesti[$a]['id'] = $redak['id'];
		$vesti[$a]['title'] = $redak['title'];
		$vesti[$a]['description'] = $redak['description'];
		$vesti[$a]['text_news'] = $redak['text_news'];
		
	}
}
for($i=1;$i<=$a;$i++){
	echo " <strong> ID vesti</strong>:" . $vesti[$i]['id'] . "<br>" . "<strong>Naslov vesti :</strong>" . $vesti[$i]['title'] . "<br>" . "<strong>Opis vesti : </strong>" . $vesti[$i]['description'] . "<br>" . "<strong>Ceo tekst vesti : </strong>" . $vesti[$i]['text_news'] . "<br>";
	?>
	<form method="GET" action = "obradaKomentara.php">
	
	Korisnicko ime: <br />
	<input type="text"  name="korisnik" value="<?php echo $_SESSION['usernamelogin'];?>"  /><br />
	Ostavi svoj komentar:<br />
	<textarea name="komentar" id="komentar" cols="24" rows="5" value="<?php if(!empty($_POST)) echo $_POST['komentar'];?>"></textarea><br>
	ID Vesti:<br>
	<input type="text"  name="id_vesti" value="<?php echo $vesti[$i]['id'] ;?>"  /><br />
	<input type="submit" name="submit" value="Posalji" />
	</form>
	
	

	<hr>
	<?php
}




?>
</body>
</html>