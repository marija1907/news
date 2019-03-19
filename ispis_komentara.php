<?php
include("dbconnect.php");
?>
<a href="news_login.php">Vrati se na prethodnu stranu</a><br><br>
<?php

$sql1 = "select title,description,korisnik,komentar,id_vesti from komentari join news on komentari.id_vesti=news.id";
if(!$q1 = mysqli_query($conn,$sql1)){
	echo "Greska pri upitu za komentare";
}
if(mysqli_num_rows($q1)==0){
	echo "Nema ispisa komentara";
}else{
	$a1=0;
	while($redak1=mysqli_fetch_assoc($q1)){
		$a1=$a1+1;
		$vesti1[$a1]['title'] = $redak1['title'];
		$vesti1[$a1]['description'] = $redak1['description'];	
		$vesti1[$a1]['korisnik'] = $redak1['korisnik'];	
		$vesti1[$a1]['komentar'] = $redak1['komentar'];	
		$vesti1[$a1]['id_vesti'] = $redak1['id_vesti'];	
	}
}
for($i=1;$i<=$a1;$i++){
	echo "<strong>Naslov:</strong>" . $vesti1[$i]['title'] . "<br>" . "<strong>Opis: </strong>" . $vesti1[$i]['description'] . "<br>" . "<strong>Korisnik: </strong>" . $vesti1[$i]['korisnik'] . "<br>" . "<strong>Komentar:</strong>" . $vesti1[$i]['komentar'] . "<br>" . "<strong>ID Vesti:</strong>" . $vesti1[$i]['id_vesti'] . "<br>" ;
	echo "<hr>";
	
}