<?php
	require_once('../includes/databaseConnection.php'); //Make the connection to the database

	$event_id = $_POST["id"];
	$startDate = $_POST["start"];
	$endDate = $_POST["end"];


	try {
		$stmt = $pdo->prepare("
			UPDATE calendar_events SET 
			start_date = :startDate, end_date = :endDate
			WHERE event_id = (:event_id);
			");	

		$stmt->bindParam(":startDate", $startDate);
		$stmt->bindParam(":endDate", $endDate);
		$stmt->bindParam(":event_id", $event_id);

		$stmt->execute();
	} catch (PDOException $e) {
		echo "Erro: $e";
	}

?>
