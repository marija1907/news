<?php
include "dbconnect.php";
session_start();
if(isset($_SESSION['admin']) && $_SESSION['user_logged'] ){
	echo "hello" . " " . $_SESSION['admin'];
	
}else{
	echo "You are not authorized";
}

echo "<br> welcome admin page";
echo "<br>";

?>
<!DOCTYPE html>
<html>
  <head>
    <title>Admin page</title>
	<meta charset="UTF-8">
	<link href="style1.css" type="text/css" rel="stylesheet">
	</head>
	<body>
<a href="brisanje_vesti.php">Brisanje vesti</a><br>
<a href="brisanje_komentara_admin.php" class="nav" >Brisanje komentara</a><br>
<a href="ekonomija_admin.php" class="nav" >Eonomija</a>
<a href="svet_admin.php" class="nav">Svet</a>
<a href="it_vesti_admin.php" class="nav">IT Vesti</a>
<br>
<hr>
<div>
<form method="POST" action="obradaUnosaVesti.php" name="obradaVesti" id="form" >
		<h3> Unos novih vesti</h3>
		<p>Title:</p>
		<input type="text" name="title" id="title" value="<?php if(!empty($_POST)) echo $_POST['title']; ?>"><br>
		
		<p>Description:</p>
		<input type="text" name="description" id="description" value="<?php if(!empty($_POST)) echo $_POST['description']; ?>"><br>
		
		<p>Tekst vesti:</p>
		<textarea name="sadrzaj" id="sadrzaj" cols="24" rows="5" value="<?php if(!empty($_POST)) echo $_POST['sadrzaj']; ?>"></textarea>
	
		<p>Kategorija (ekonomija(1),svet(2),IT vesti(3)</p>
		<input type="text" name="kategorija" id="kategorija" value="<?php if(!empty($_POST)) echo $_POST['kategorija']; ?>"><br>
		
		<br><br>
		<input type="submit" name="submit" value="Unesi vest" id="unosVesti">
		
	
	</form>

</div>


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
		
		$vesti[$a]['title'] = $redak['title'];
		$vesti[$a]['description'] = $redak['description'];
		$vesti[$a]['text_news'] = $redak['text_news'];
		
	}
}
for($i=1;$i<=$a;$i++){
	echo "<strong>Naslov vesti :</strong>" . $vesti[$i]['title'] . "<br>" . "<strong>Opis vesti : </strong>" . $vesti[$i]['description'] . "<br>" . "<strong>Ceo tekst vesti : </strong>" . $vesti[$i]['text_news'] . "<br><hr>";

	
}

?>






















</body>
</html>