<?php  
session_start(); 
  
?> 

<!DOCTYPE html>
<html>
<head>

<title>Bir Parça Eşya</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body>

	<div align='center'>
		<form method='POST'>
			<table>
				<tr>
					<td><label>Enter Message</label>
						<input type="text" name="txtMessage" autocomplete="off">
						<input type="submit" name="btnSend" value="Gonder">
						
					</td>
				</tr>
				<?php
					$host = "127.0.0.1";
					$port = 20205;
					
					if(isset($_POST['btnSend']))
					{
						$msg = $_REQUEST['txtMessage'];
						
						if(isset($_SESSION["kullaniciadi"])){
							$kullaniciadi = $_SESSION["kullaniciadi"];
							$msg = $kullaniciadi." : ".$msg;
						}
						
						$sock = socket_create(AF_INET, SOCK_STREAM, 0);
						socket_connect($sock, $host, $port);
						
						socket_write($sock, $msg, strlen($msg));
						
						$reply = socket_read($sock, 1024);
						$reply = trim($reply);
						$reply = "Temsilci: \t".$reply;
					}
				?>
				<tr>
					<td>
						<textarea rows='10' col='30'><?php echo @$reply; ?></textarea>
					</td>
				</tr>
			</table>
		</form>
		<br><a href="index.php"><button style="width:200px; height:100px; font-size:20px; font-weight:bold;">Anasayfa'ya Dön</button></a>
	</div>

</body>
</html>



