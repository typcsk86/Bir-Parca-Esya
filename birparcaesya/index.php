<?php  
session_start(); 
?>  

<!DOCTYPE html>
<html>
<head>

<title>Bir Parça Eşya</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" type="text/CSS" href="indexstyles.css">

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

<div class="logoalti">
<a class="buttonlinki" href="beyazesya.php"><button class="button button1logoalti">Beyaz Eşya</button></a>
<a class="buttonlinki" href="koltuk.php"><button class="button button1logoalti">Koltuk</button></a>
<a class="buttonlinki" href="masasandalye.php"><button class="button button1logoalti">Masa-Sandalye</button></a>
<a class="buttonlinki" href="elektronikesya.php"><button class="button button1logoalti">Elektronik Eşya</button></a>
<a class="buttonlinki" href="yatak.php"><button class="button button1logoalti">Yatak</button></a>
<a class="buttonlinki" href="dolap.php"><button class="button button1logoalti">Dolap</button></a>
<a class="buttonlinki" href="digeresyalar.php"><button class="button button1logoalti">Diğer Eşyalar</button></a>
</div>

<div class="ustmenu">

<div class="ustmenuleft">
	<div class="ustmenuleftArrow">
		<img src="arrow/arrowleft.png" class="arrow" onclick="myFunction1()">
	</div>
</div>

<div id="panel1" class="ustmenucenter">
	<a href="beyazesya.php"><img src="merge/mergeBeyazEsya1.jpg" class="mergeImage"></a>
</div>

<div id="panel2" class="ustmenucenter">
	<a href="elektronikesya.php"><img src="merge/mergeElektronikEsya1.jpg" class="mergeImage"></a>
</div>

<div class="ustmenuright">
	<div class="ustmenurightArrow">
		<img src="arrow/arrowright.png" class="arrow" onclick="myFunction2()">
	</div>
</div>

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

</div>
<br><br>
<div class="ortamenu">

<div class="ortamenuleft">
	<div class="ortamenuAllContent">
	<a href="masa1.php"><img src="anasayfaImages/ortamenuMasa.jpg" class="ortamenuImage"></a>
	</div>
</div>

<div class="ortamenucenter">
	<div class="ortamenuAllContent">
	<a href="ciftkisilik1.php"><img src="anasayfaImages/ortamenuYatakCift.jpg" class="ortamenuImage"></a>
	</div>
</div>

<div class="ortamenuright">
	<div class="ortamenuAllContent">
	<a href="kanepe1.php"><img src="anasayfaImages/ortamenuKanepe.jpg" class="ortamenuImage"></a>
	</div>
</div>

</div>
<br><br>
<div class="altmenu">

<div class="altmenuindirim">
<h1 style="color:white;">İNDİRİM ÜRÜNLERİ! </h1>
</div>


<div class="altmenuleft">
	<br>
	<a href="perde1.php">
	<div class="altmenuleftImage">
		<img src="anasayfaImages/altmenuPerde.jpg" class="altmenuImage"></a>
	</div>
	</a>
	
	<br><br>
	
	<div class="altmenuleftText">
		<a class="linkaltCizgi" href="perde1.php">
		<p style="color:black; font-family: monospace; font-weight:bold; font-size: 15px;">
		<span style="text-decoration: underline;">Brillant Güneşlik Perde </span> <br>
		<span style="text-decoration: line-through; color:red;">150 TL</span>
		-> 
		<span style="color:blue;">(%50) </span>
		-> 
		<span style="color:green;">75 TL </span>
		</p>
		</a>
	</div>
</div>

<div class="altmenuright">
	<br>
	
	<a href="komidin1.php">
	<div class="altmenurightImage">
		<img src="anasayfaImages/altmenuKomidin.jpg" class="altmenuImage"></a>
	</div>
	</a>
	
	<br><br>
	
	<div class="altmenurightText">
		<a class="linkaltCizgi" href="komidin1.php">
		<p style="color:black; font-family: monospace; font-weight:bold; font-size: 15px;">
		<span style="text-decoration: underline;">Ratolye Komidin</span> <br>
		<span style="text-decoration: line-through; color:red;">500 TL</span>
		-> 
		<span style="color:blue;"> (%20) </span>
		-> 
		<span style="color:green;"> 400 TL </span>
		</p>
		</a>
	</div>
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






