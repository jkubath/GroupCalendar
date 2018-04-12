<?php
	//session_start();
	require_once('../includes/databaseConnection.php'); //Make the connection to the database

	$username = $_SESSION['username'];

	$sql = "SELECT * FROM google_calendar WHERE username = '". $_SESSION['username'] ."'";

	try {

		$result = $pdo->query($sql);

	} catch (PDOException $e) {
		//echo "Erro: $e";
	}

	$returnString = "";
	while($calendar = $result->fetch()) {
		$returnString .= "{ googleCalendarId: '". $calendar['google_calendar'] . "', editable: false },";
	}
	
	echo $returnString;
?>