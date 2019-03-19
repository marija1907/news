<?php
include("dbconnect.php");

if(isset($_GET['submit']) && !empty ($_GET)){//ako parametar postoji i ako nije prazan
if($_GET['korisnik'] == "" || $_GET['komentar'] == "" || $_GET['id_vesti'] == "" ){
	echo "Field can't be empty!";
}
}
$korisnik = trim($_GET['korisnik']);
$komentar = trim($_GET['komentar']);
$id_vesti = trim($_GET['id_vesti']);

$korisnik = str_replace(">","",$korisnik); 
$komentar = str_replace("<","",$komentar);
$id_vesti = str_replace("<","",$id_vesti);


$insert_komentar = "insert into komentari value (null,'{$korisnik}','{$komentar}','{$id_vesti}')"; 
$add_komentar = mysqli_query($conn,$insert_komentar);
mysqli_real_escape_string($conn, $korisnik);
mysqli_real_escape_string($conn, $komentar);
mysqli_real_escape_string($conn, $id_vesti);


if(!$add_komentar){
	echo "<br> Kommentar odbijen <br>";
	?>
	<a href="login.php">Login</a>
	<?php
	die();
	
}else{
	header ("location: ispis_komentara.php");
}





?>




