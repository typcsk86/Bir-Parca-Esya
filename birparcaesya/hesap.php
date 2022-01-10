<?php  
session_start(); 
  
?> 

<!DOCTYPE html>
<html>
<head>

<title>Bir Parça Eşya</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" type="text/CSS" href="hesapstyles.css">

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


<div class="ustmenu">
	<div class="hesapButtons">
		<button class="buttonhesap" onclick="myFunction1()">Hesap Bilgileri</button></a>
		<button class="buttonhesap" onclick="myFunction2()">Sepetim</button></a>
	</div>
	
	<div class="hesapMenu" id="panel1" style="height:30%;">
		<?php
			$connection=mysqli_connect("localhost","root","","uyekaydi");
			
			if($connection){
				$search = $_SESSION["kullaniciadi"];
				
				$sql2 = "select * from uye where Kullanici_Adi like '%$search%'";
				$result = $connection->query($sql2);

				if ($result->num_rows > 0) {
					while($row = $result->fetch_assoc()) {
						echo '<br><br><center><table style="border-color:green;border-width:5px;"><tr><td colspan="2" style="font-weight:bold;">Üyelik Bilgileriniz</td></tr>';
						echo '<tr><td>Ad Soyad: </td><td>';
						echo $row["Ad_Soyad"];
						echo '</td></tr><tr><td>E-Mail : </td><td>';
						echo $row["E_Mail"];
						echo '</td></tr><tr><td>Kullanıcı adı: </td><td>';
						echo $row["Kullanici_Adi"];
						echo '</td></tr><tr><td>Şifre : </td><td>';
						echo $row["Sifre"];
						echo '</td></tr><tr><td>Doğum Tarihi: </td><td>';
						echo $row["Dogum_Tarihi"];
						echo '</td></tr></table></center>';
					}
				}
			}
			
			else {
				echo "Connection Failed...";
			}
		?>
	</div>
	
	<div class="hesapMenu" id="panel2">
		<?php
			$connection=mysqli_connect("localhost","root","","uyekaydi");
			
			if($connection){
				$search = $_SESSION["kullaniciadi"];
				
				$sql2 = "select * from sepet where Kullanici_Adi like '%$search%'";
				$result = $connection->query($sql2);

				if ($result->num_rows > 0) {
					echo '<br><br><center><table style="border-color:green;border-width:5px;"><tr><td colspan="3" style="font-weight:bold;">Sepetiniz</td></tr>';
					echo '<tr><td>Kullanıcı Adı</td><td>Ürün Adı</td><td>Ürün Fiyatı</td></tr>';
					while($row = $result->fetch_assoc()) {
						echo '<tr><td>';
						echo $row["Kullanici_Adi"];
						echo '</td><td>';
						echo $row["Urun_Adi"];
						echo '</td><td>';
						echo $row["Urun_Fiyati"];
						echo ' TL</td>';
					}
					echo '</tr></table></center>';
					echo '<br><a href="satis.php"><button class="buttonhesap" style="width:10%; height:5%;">Satın Al</button></a>';
				}
			}
			else {
				echo "Connection Failed...";
			}
		?>
		<br>
		<form method="POST">
		<button class="buttonhesap" style="width:10%; height:5%;" name="sepetTemizle">Sepeti Temizle</button>
		</form>
	</div>

</div>
<?php
	if(isset($_POST['sepetTemizle']))
	{
		$conn=mysqli_connect("localhost","root","","uyekaydi");
		if($conn){
			$search = $_SESSION["kullaniciadi"];
			$sql3 = "DELETE FROM sepet WHERE Kullanici_Adi='$search'";
			mysqli_query($conn, $sql3);
		}
		else {
			echo "Connection Failed...";
		}
	}
?>

<script>
function myFunction1() {
  document.getElementById("panel1").style.visibility = "visible";
  document.getElementById("panel2").style.visibility = "hidden";
}

function myFunction2() {
  document.getElementById("panel1").style.visibility = "hidden";
  document.getElementById("panel2").style.visibility = "visible";
}
</script>

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


