<?php  
session_start(); 
  
?> 

<!DOCTYPE html>
<html>
<head>

<title>Bir Parça Eşya</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" type="text/CSS" href="bankastyles.css">

</head>
<body>

<form method="post" action="<?php $_PHP_SELF?>">
<div class="ustmenu">

	<div class="div1">
		<p style="font-size: 25px;">BANKA İŞLEMLERİ<br><br>
		Telenonunuza Gelen Şifreyi Girin<br><br>
		<input style="width: 200px; height:20px;" type="text" id="sifre" name="sifre" maxlength="10">
		</p>
	</div>
	
	<div class="div2">
		<button  class="buttonSatis" name="satinalmak">Satın Al</button>
	</div>
	
</div>
</form>

<?php
	if(isset($_POST['satinalmak'])){
		$sifre=$_POST['sifre'];
		
		if(empty($sifre))
		{
			echo "<br><br><center><table><tr><td colspan='2'>Boş bıraktınız veya Yanlış şifre girdiniz...</td></tr></table></center>";
		}
		
		else {
			$connection=mysqli_connect("localhost","root","","uyekaydi");
			
			if($connection){
				$search = $_SESSION["kullaniciadi"];
				$sql2 = "DELETE FROM sepet WHERE Kullanici_Adi='$search'";
				if(mysqli_query($connection, $sql2)){
					echo "Succesfully";
					echo "<script>window.open('ara.php','_self')</script>";
				}
			}
			else {
				echo "Connection Failed...";
			}
		}
	}
?>

</body>
</html>


