<?php
	require_once('../includes/databaseConnection.php'); //Make the connection to the database

	$calendarID = $_POST['calendarID'];
	$username = $_SESSION['username'];

	try {
		// $stmt->beginTransaction();
		$stmt = $pdo->prepare("
			INSERT google_calendar(username, google_calendar)
			VALUES(:username, :calendarID)");	

		$stmt->bindParam(":username", $username);
		$stmt->bindParam(":calendarID", $calendarID);

		$stmt->execute();
	} catch (PDOException $e) {
		echo "Erro: $e";
	}




?>