<?php
include("dbconnect.php");
session_start();
?>
<a href="news_login.php">Vrati se na prethodnu stranu</a><br><br>
<?php



 $query = "SELECT * from komentari ";
		 $result= mysqli_query($conn, $query);
		 $row = mysqli_fetch_assoc($result);
		 //print_r($row);
		 if(mysqli_num_rows($result) > 0){
			 while($row=mysqli_fetch_assoc($result)){
				 ?>
				<div id="result">
				 <a href="removeCom_admin.php?id=<?php echo $row['id']; ?>">Obrisi komentar</a>
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


