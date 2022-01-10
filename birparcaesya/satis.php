<?php  
session_start(); 
  
?> 

<!DOCTYPE html>
<html>
<head>

<title>Bir Parça Eşya</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" type="text/CSS" href="satisstyles.css">

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
<div class="ustmenu">

	<div class="div1">
	<table style="width:100%">
	  <tr>
		<th colspan="2">Kart ve Adres Bilgileri</th>
	  </tr>
	  <tr>
		<td><label>Kart Sahibinin Adı Soyadı: </label></td>
		<td><input type="text" id="adsoyad" name="adsoyad" maxlength="30"></td>
	  </tr>
	  <tr>
		<td><label>Kart Numarası : </label></td>
		<td><input type="text" id="numara" name="numara" maxlength="16"></td>
	  </tr>
	  <tr>
		<td><label>Son Kullanma Tarihi : </label></td>
		<td><input style="width:25px;" type="text" id="ay" name="ay" maxlength="2"> / <input style="width:40px;" type="text" id="yil" name="yil" maxlength="4"></td>
	  </tr>
	  <tr>
		<td><label>CVC2 : </label></td>
		<td><input type="text" id="cvc" name="cvc" maxlength="3"></td>
	  </tr>
	  <tr>
		<td><label>Adres: </label></td>
		<td><input type="text" id="adres" name="adres" maxlength="100"></td>
	  </tr>
	</table>
	</div>
	
	<div class="div2">
		<?php  
			$connection=mysqli_connect("localhost","root","","uyekaydi");
			
			if($connection){
				$search = $_SESSION["kullaniciadi"];
				$sql2 = "select * from sepet where Kullanici_Adi like '%$search%'";
				$result = $connection->query($sql2);
				$toplam = 0;
				if ($result->num_rows > 0) {
					
					while($row = $result->fetch_assoc()) {
						$toplam += $row["Urun_Fiyati"];
					}
					echo '<p style="font-size: 17px; font-weight: bold;">Toplam Ücret:';
					echo $toplam;
					echo '</p>';
				}
			}
			
			else {
				echo "Connection Failed...";
			}
			?>
	</div>
	
	<div class="div3">
		<button  class="buttonSatis" name="satinalmak">Satın Al</button>
	</div>
	
	<div class="div4">
		<img src="banka/cc-amex.png">
		<img src="banka/cc-cirrus.png">
		<img src="banka/cc-discover.png">
		<img src="banka/cc-google.png">
		<img src="banka/cc-maestro.png">
		<img src="banka/cc-mastercard.png">
		<img src="banka/cc-paypal.png">
		<img src="banka/cc-visa.png">
	</div>

<?php
	if(isset($_POST['satinalmak'])){
		$adsoyad=$_POST['adsoyad'];
		$numara=$_POST['numara'];
		$ay=$_POST['ay'];
		$yil=$_POST['yil'];
		$cvc=$_POST['cvc'];
		$adres=$_POST['adres'];
		
		if(empty($adsoyad) || empty($numara) || empty($ay) || empty($yil) || empty($cvc) || empty($adres))
		{
			echo "<br><br><center><table><tr><td colspan='2'>Boş bırakmayın...</td></tr></table></center>";
		}
		
		else {
			echo "<script>window.open('banka.php','_self')</script>";
		}
	}
?>
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


