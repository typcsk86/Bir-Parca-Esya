<!DOCTYPE html>
<html>
<head>

<title>Bir Parça Eşya</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" type="text/CSS" href="uyestyles.css">

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
			<a class="button1ustbuttonslink" href="giris.php"><button style="background-color:#DFDFDF;" class="button button1ustbuttonsgiris">Giriş Yap</button></a>
		</div>
	</div>
</div>


<div class="ustmenu">

	<div class="div1">
		<form method="post" action="<?php $_PHP_SELF?>">
		<table style="width:100%">
		  <tr>
			<th colspan="2">Üye Ol</th>
		  </tr>
		  <tr>
			<td><label>Ad Soyad: </label></td>
			<td><input type="text" id="adisoyadi" name="adisoyadi"></td>
		  </tr>
		  <tr>
			<td><label>E-Mail: </label></td>
			<td><input type="text" id="email" name="email"></td>
		  </tr>
		  <tr>
			<td><label>Kullanıcı Adı: </label></td>
			<td><input type="text" id="kullaniciadi" name="kullaniciadi"></td>
		  </tr>
		  <tr>
			<td><label>Şifre: </label></td>
			<td><input type="text" id="sifre" name="sifre"></td>
		  </tr>
		  <tr>
			<td><label>Doğum Tarihi: </label></td>
			<td><input type="text" id="dtarih" name="dtarih"></td>
		  </tr>
		  <tr>
			<td colspan="2"><button class="button buttongiris" id="submit" name="submit">Üye Ol</button></td>
		  </tr>
		  <?php
			$connection=mysqli_connect("localhost","root","","uyekaydi");
			if($connection){
				if(isset($_POST['submit'])){
					$adsoyad=$_POST['adisoyadi'];
					$email=$_POST['email'];
					$kullaniciadi=$_POST['kullaniciadi'];
					$sifre=$_POST['sifre'];
					$dtarih=$_POST['dtarih'];
					
					if(empty($adsoyad) || empty($email) || empty($kullaniciadi) || empty($sifre) || empty($dtarih))
					{
						echo "<tr><td colspan='2'>Boş bırakmayın...</td></td>";
					}
					
					else {
					
						$sql = "INSERT INTO uye VALUES('$adsoyad','$email','$kullaniciadi','$sifre','$dtarih')";
						
						$done=$connection->query($sql);
					}
				}
				
			}
			else
			{
				echo "Connection Failed";
			}
		  ?>
		</table>
		</form>
	</div>

</div>



<div class="footer">
  <div class="circleanimation"></div>
  
  <div class="footertext"><p style="color:black; font-family: monospace;">Bir Parça Eşya Şirketi. Tüm hakları saklıdır.Tüm ticari markalar, Türkiye ve diğer ülkelerde ilgili sahiplerinin mülkiyetindedir.Uygulanabilir yerlerde fiyatlara KDV dahildir.</p></div>
  
  <div class="footertext2">
	<a class="button1footer" href="hakkinda.php"><button class="button11">Hakkında</button></a>
	<a class="button1footer" href="destek.php"><button class="button11">Destek</button></a>
  </div>
  
  <div class="circleanimation2"></div>
</div>



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