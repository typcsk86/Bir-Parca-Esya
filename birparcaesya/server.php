<?php
	$host = "127.0.01";
	$port = 20205;
	set_time_limit(0);
	
	$sock = socket_create(AF_INET, SOCK_STREAM, 0) or die ("Could not create.\n");
	$result = socket_bind($sock, $host, $port) or die ("Could not bind to socket.\n");
	
	$result = socket_listen($sock, 3) or die ("Could not set up socket listener\n");
	echo "Listening for connections";
	
	class Chat
	{
		function readLine()
		{
			return rtrim(fgets(STDIN));
		}
	}
	
	do 
	{
		$accept = socket_accept($sock) or die ("Could not accept incoming connection.");
		$msg = socket_read($accept, 1024) or die ("Could not read input\n");
		
		$msg = trim($msg);
		
		echo "\n".$msg."\n\n";
		
		$line = new Chat();
		echo "Temsilci :\t";
		$reply = $line->readLine();
		
		socket_write($accept, $reply, strlen($reply)) or die("Could not write output\n");
		
	} while(true);
	
	socket_close($accept, $sock);
		
?>