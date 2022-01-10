<?php  
session_start(); 
?>  

<!DOCTYPE html>
<html>
<head>

<title>Bir Parça Eşya</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" type="text/CSS" href="urunsayfasistyles.css">

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

<div class="ustmenuleft">
<button class="button button1urunadi" onclick="myFunction1()">Köşe Takımı</button>
<button class="button button1urunadi" onclick="myFunction2()">Kanepe</button>
<button class="button button1urunadi" onclick="myFunction3()">Çekyat</button>
</div>

<div class="ustmenuright" id="panel1" style="background-color: white;">
	<div class="ustmenurighticerik1">
		<a href="kosetakimi1.php"><img src="koltukImages/kosetakimi1.jpg" class="urunImage"></a>
	</div>

	<div class="ustmenurighticerik2">
		<a href="###"><img src="koltukImages/kosetakimi2.jpg" class="urunImage"></a>
	</div>
</div>

<div class="ustmenuright" id="panel2" style="background-color: white;">
	<div class="ustmenurighticerik1">
		<a href="kanepe1.php"><img src="koltukImages/kanepe1.jpg" class="urunImage"></a>
	</div>
	
	<div class="ustmenurighticerik2">
		<a href="###"><img src="koltukImages/kanepe2.jpg" class="urunImage"></a>
	</div>
</div>

<div class="ustmenuright" id="panel3" style="background-color: white;">
	<div class="ustmenurighticerik1">
		<a href="cekyat1.php"><img src="koltukImages/cekyat1.jpg" class="urunImage"></a>
	</div>

	<div class="ustmenurighticerik2">
		<a href="###"><img src="koltukImages/cekyat2.jpg" class="urunImage"></a>
	</div>
</div>

</div>

<script>
function myFunction1() {
  document.getElementById("panel1").style.visibility = "visible";
  document.getElementById("panel2").style.visibility = "hidden";
  document.getElementById("panel3").style.visibility = "hidden";
}

function myFunction2() {
  document.getElementById("panel1").style.visibility = "hidden";
  document.getElementById("panel2").style.visibility = "visible";
  document.getElementById("panel3").style.visibility = "hidden";
}
function myFunction3() {
  document.getElementById("panel1").style.visibility = "hidden";
  document.getElementById("panel2").style.visibility = "hidden";
  document.getElementById("panel3").style.visibility = "visible";
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