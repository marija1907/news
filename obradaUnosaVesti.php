<?php
include "dbconnect.php";
echo "Welcome to obrada unosa<br>";
if(isset($_POST['submit']) && !empty ($_POST)){//ako parametar postoji i ako nije prazan
if($_POST['title'] == "" || $_POST['description'] == "" || $_POST['sadrzaj'] == "" || $_POST['kategorija'] == ""  ){
	echo "Field can't be empty!";
}
$title = mysqli_real_escape_string($conn,$_POST['title']);
$description = mysqli_real_escape_string($conn,$_POST['description']);
$sadrzaj = mysqli_real_escape_string($conn,$_POST['sadrzaj']);
$kategorija = mysqli_real_escape_string($conn,$_POST['kategorija']);
}
$insert_news = "insert into news  value (null,'{$title}','{$description}','{$sadrzaj}','{$kategorija}')"; 
$add_news = mysqli_query($conn,$insert_news);


if(!$add_news){
	echo "<br> Unos odbijen <br>";
	?>
	<a href="admin_login.php">Unos vesti</a>
	<?php
	die();
	
}else{
	echo "Unos izvrsen";
	?>
	<a href="admin_login.php">Unos vesti</a>
	<?php
}

$sql = "select * from news";
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
	echo "<br><br><strong>Naslov vesti :</strong>" . $vesti[$i]['title'] . "<br>" . "<strong>Opis vesti : </strong>" . $vesti[$i]['description'] . "<br>" . "<strong>Ceo tekst vesti : </strong>" . $vesti[$i]['text_news'] . "<br><hr>";

	
}