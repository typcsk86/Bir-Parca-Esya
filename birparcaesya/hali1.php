<?php  
session_start(); 
  
?> 

<!DOCTYPE html>
<html>
<head>

<title>Bir Parça Eşya</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" type="text/CSS" href="urunler.css">

</head>
<body>

<div class="logomenu">
<a class="buttonlogolink" href="index.php"><button class="button button1logo">Bir Parça Eşya</button></a>

	<form method="post" action="<?php $_PHP_SELF?>">
	<div class="logomenusearchtext">
		<input style="height: 75%;" type="text" id="searchtext" name="searchtext">
		
		
	</div>
	<div class="logomenusearchbutton">
		<button class="searchbutton" style="border-radius:50%; padding: 5px 10px;" name="ara">Ara</button>
	</div>
	</form>
	
	
	<div class="logomenubuttons">
		<a class="button1ustbuttonslink" href="index.php"><button class="button button1ustbuttons">Anasayfa</button></a>
		<div class="logomenubuttonslogin">
			<?php  
			if(isset($_SESSION["kullaniciadi"]))
			{
				echo '<a class="button1ustbuttonslink" href="hesap.php"><button style="background-color:#DFDFDF;" class="button button1ustbuttonsgiris">';
				echo $_SESSION["kullaniciadi"];
				echo '</button></a>';
				echo '<a class="button1ustbuttonslink" href="cikis.php"><button style="background-color:#DFDFDF;" class="button button1ustbuttonsgiris" name="cikis">Çıkış Yap</button></a>';
				
			}
			else {
				echo '<a class="button1ustbuttonslink" href="giris.php"><button style="background-color:#DFDFDF;" class="button button1ustbuttonsgiris">Giriş Yap</button></a>';
			}	
			?>
		</div>
	</div>
</div>

<form method="post" action="<?php $_PHP_SELF?>">
<div class="urungenel">
	<div class="urunImage">
		<div class="urunImageIcerik">
			<img src="digeresyalarImages/hali1.jpg" class="urunImagee">
		</div>
	</div>
	
	<div class="urunAciklama">
		<p style="color:black; font-family: monospace; font-weight:bold; font-size: 20px; text-align:center;">
			<input style="width:75%; text-align:center; font-size:17.5px;" type="text" name="urunadi" id="urunadi" value="Halıforum Modern Desen İnce Halı Hs-189" READONLY> <br><br>
			<input style="width:25%; text-align:center; font-size:17.5px;" type="text" name="urunfiyati" id="urunfiyati" value="16" READONLY> TL <br><br><br>
			Anti ALERJİK özellikli doku ve gözenekler sayesinde bakterilerden uzak bir ortam sağlar.
			Anti alerjik özelliği sayesinde alerjenlerden uzak bir ortam sağlar.
			ÇAMAŞIR MAKİNESİNDE YIKANABİLİR HALI
		</p>
	</div>
	
	<div class="urunButtons">
		<button class="button1ustbuttonsUrun" name="sepet">Sepete Ekle</button>
		<?php
			$connection=mysqli_connect("localhost","root","","uyekaydi");
			
			if($connection){
				if(isset($_POST["sepet"])){
					if(isset($_SESSION["kullaniciadi"])){
						$urunadi = $_POST['urunadi'];
						$urunfiyati = $_POST['urunfiyati'];
						$kullaniciadi = $_SESSION["kullaniciadi"];
						$sql2 = "select * from sepet where Kullanici_Adi='$kullaniciadi' and Urun_Adi='$urunadi'";
						$result = $connection->query($sql2);
						if ($result->num_rows > 0) {
							echo "Bu ürün zaten sepetinizde..";
						}
						else {
							
							$sql = "INSERT INTO sepet VALUES('$kullaniciadi','$urunadi','$urunfiyati')";
						
							$done=$connection->query($sql);
							
							if($done){
								echo "Sepetinize Eklenmiştir";
							}
						}
						
					}
					else {
						if(isset($_POST["sepet"])){
							echo "<script>window.open('giris.php','_self')</script>";
						}
					}
				}
			}
			else 
			{
				echo 'Connection Failed..';
			}
			
			
		?>
		<a class="button1ustbuttonsUrunLink" href="sikayetMesaj.php"><button class="button1ustbuttonsUrun" name="sikayet" id="sikayet">Ürünü Şikayet Et</button></a>
		
		<?php
			if(isset($_POST['sikayet'])){
				if(isset($_SESSION['kullaniciadi'])){
					echo "<script>window.open('mesaj.php','_self')</script>";
				}
				else {
					echo "<script>window.open('giris.php','_self')</script>";
				}
			}
		?>
	</div>
</div>
</form>


<div class="footer">
  <div class="circleanimation"></div>
  
  <div class="footertext"><p style="color:black; font-family: monospace;">Bir Parça Eşya Şirketi. Tüm hakları saklıdır.Tüm ticari markalar, Türkiye ve diğer ülkelerde ilgili sahiplerinin mülkiyetindedir.Uygulanabilir yerlerde fiyatlara KDV dahildir.</p></div>
  
  <div class="footertext2">
	<a class="button1footer" href="hakkinda.php"><button class="button11">Hakkında</button></a>
	<a class="button1footer" href="destek.php"><button class="button11">Destek</button></a>
  </div>
  
  <div class="circleanimation2"></div>
</div>

<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

</body>
</html>

<?php
	if(isset($_POST['ara'])){
		
		$searchValue=$_POST["searchtext"];
		
		
		
		if($searchValue == "beyaz" || $searchValue == "beyaz eşya" || $searchValue == "buzdolabı" || $searchValue == "buzdolabi" || $searchValue == "çamaşır" || $searchValue == "çamaşır makinesi" || $searchValue == "bulaşık" || $searchValue == "bulaşık makinesi"){
			
			echo "<script>window.open('beyazesya.php','_self')</script>";
		}
		else if($searchValue == "koltuk" || $searchValue == "köşe" || $searchValue == "köşe takımı" || $searchValue == "kanepe" || $searchValue == "çekyat"){
			
			echo "<script>window.open('koltuk.php','_self')</script>";
		}
		else if($searchValue == "masa" || $searchValue == "sandalye"){
			
			echo "<script>window.open('masasandalye.php','_self')</script>";
		}
		else if($searchValue == "elektronik" || $searchValue == "elektronik eşya" || $searchValue == "tv" || $searchValue == "tele" || $searchValue == "televizyon" || $searchValue == "pc" || $searchValue == "bilgisayar"){
			
			echo "<script>window.open('elektronikesya.php','_self')</script>";
		}
		else if($searchValue == "yatak" || $searchValue == "tek" || $searchValue == "tek kişilik yatak" || $searchValue == "çift" || $searchValue == "çift kişilik yatak"){
			
			echo "<script>window.open('yatak.php','_self')</script>";
		}
		
		else if($searchValue == "dolap" || $searchValue == "gardırop"){
			
			echo "<script>window.open('dolap.php','_self')</script>";
		}
		else if($searchValue == "diğer" || $searchValue == "diğer eşyalar" || $searchValue == "halı" || $searchValue == "perde" || $searchValue == "komidin"){
			
			echo "<script>window.open('digeresyalar.php','_self')</script>";
		}
		
		
	}
	
?>


