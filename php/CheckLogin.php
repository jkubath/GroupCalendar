<?php
	/*
	 * Summary: takes in the username and password through the $_GET array
	 * these values are then queried in the users database.  If a result is
	 * returned then there was a match and the username is set in the $_SESSION
	 * variable
	 WHERE username = '" . $username . "' AND password = '" . $password . "';";
	*/
	session_start();
	require_once('../includes/databaseConnection.php');

	$username = $_GET["enteredUsername"];
	$password = $_GET["enteredPassword"];
	
	$sql = "SELECT DISTINCT username
			FROM users
			WHERE username = '" . $username . "' AND password = '" . $password . "';";

	//Use the $pdo object from the databaseConnection.php file
	$result = $pdo->query($sql);

	if (!$result->fetch()) {
		echo "fail";
	} else {
		$result = $pdo->query($sql);
		//If there are results, then the username and password were found
		while ($row = $result->fetch()) {
			if ($row["username"] != NULL) {
				$_SESSION["username"] = $username;
				echo "success";
			}
		}
	}
	
	
	
?>