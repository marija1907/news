<a href="ekonomija.php" class="nav" >Eonomija</a>
<a href="news_login.php" class="nav">Nazad</a>
<a href="it_vesti.php" class="nav">IT Vesti</a>
<br>
<hr>




<?php
echo "welcome to svet VESTI";
include "dbconnect.php";
$sql = "select title,description,text_news,category_news from news where category_news=2";
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
	echo "<br><strong>Naslov vesti :</strong>" . $vesti[$i]['title'] . "<br>" . "<strong>Opis vesti : </strong>" . $vesti[$i]['description'] . "<br>" . "<strong>Ceo tekst vesti : </strong>" . $vesti[$i]['text_news'] . "<br><hr>";

	
}

?>