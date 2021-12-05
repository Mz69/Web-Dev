<?php
	$host = "localhost";
	$username = "root";
	$password = "root";
	$dbname = "iron_man_5";

	$dbconn = new mysqli($host, $username, $password, $dbname);

	if ($dbconn->connect_error) {
		die("Noooooooooo!<br>" . $dbconn->connect_error . "<br>" . $dbconn->connect_errno);
	}

	//Function for clearning user input before processing
	function cleanUserInput($field) {
        if(isset($field)) {
            $data = trim($field);
            $data = stripcslashes($data);
            $data = htmlspecialchars($data);
        }
        //Set data to nothing if it is null
        else {
            $data = '';
        }
        return $data;
    }
?>