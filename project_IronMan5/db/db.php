<?php
	$host = "localhost";
	$username = "root";
	$password = "root";
	$dbname = "iron_man_5";

	$dbconn = new mysqli($host, $username, $password, $dbname);

	if ($dbconn->connect_error) {
		die("Noooooooooo!<br>" . $dbconn->connect_error . "<br>" . $dbconn->connect_errno);
	}
?>