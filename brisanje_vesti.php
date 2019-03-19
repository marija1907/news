<?php
include("dbconnect.php");
session_start();
?>
<a href="news_login.php">Vrati se na prethodnu stranu</a><br><br>
<?php



 $query = "SELECT * from news ";
		 $result= mysqli_query($conn, $query);
		 $row = mysqli_fetch_assoc($result);
		 //print_r($row);
		 if(mysqli_num_rows($result) > 0){
			 while($row=mysqli_fetch_assoc($result)){
				 ?>
				<div id="result">
				 <a href="removeNews_admin.php?id=<?php echo $row['id']; ?>">Obrisi Vest</a>
				 <p><b>Id: </b><?php echo $row['id']; ?></p>
				<p><b>Naslov: </b><?php echo $row['title']; ?></p>
				<p><b>Opis: </b><?php echo $row['description']; ?></p>
				<p><b>ID Ceo tekst vesti: </b><?php echo $row['text_news']; ?></p>
				<p><b>Id kategorije: </b><?php echo $row['category_news']; ?></p>
				<hr>
				 </div>
				 
				 <?php
				 
			 }
			 
		 }else{
			 echo "No comment.";
		 }
