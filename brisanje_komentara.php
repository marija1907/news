<?php
include("dbconnect.php");
session_start();
?>
<a href="news_login.php">Vrati se na prethodnu stranu</a><br><br>
<?php


$username=$_GET['username'];
 $query = "SELECT * FROM komentari where korisnik = '{$username }' ";
		 $result= mysqli_query($conn, $query);
		 $row = mysqli_fetch_assoc($result);
		 //print_r($row);
		 if(mysqli_num_rows($result) > 0){
			 while($row=mysqli_fetch_assoc($result)){
				 ?>
				<div id="result">
				 <a href="removeCom.php?id=<?php echo $row['id']; ?>">Obrisi komentar</a>
				<p><b>Korisnik: </b><?php echo $row['korisnik']; ?></p>
				<p><b>Komentar: </b><?php echo $row['komentar']; ?></p>
				<p><b>ID Vesti: </b><?php echo $row['id_vesti']; ?></p>
				<hr>
				 </div>
				 
				 <?php
				 
			 }
			 
		 }else{
			 echo "No comment.";
		 }







/*$sql1 = "select title,description,korisnik,komentar,id_vesti from komentari join news on komentari.id_vesti=news.id";
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

*/