<?php
	require_once('../includes/databaseConnection.php'); //Make the connection to the database
	require_once('../php/fullCalendarUtil.php'); //Includes the Event class and the datetime utilities (provided by FullCalendar.io)	

	$startDate = $_POST["dateStr"];
	$title = $_POST["title"];
	$allDay = $_POST["allDay"];
	$calendarId = 1;


	if ($allDay) {
		$endDate = $startDate;
	}

	// if ($allDay) {
	// 	$allDay = 1;
	// } else {
	// 	$allDay = 0;
	// }

	try {
		$stmt = $pdo->prepare("
			INSERT INTO calendar_events(calendar_id, title, start_date, end_date, all_day)
			VALUES(:calendarId, :title, :startDate, :endDate, :allDay);
			");	

		$stmt->bindParam(":calendarId", $calendarId);
		$stmt->bindParam(":title", $title);
		$stmt->bindParam(":startDate", $startDate);
		$stmt->bindParam(":endDate", $endDate);
		$stmt->bindParam(":allDay", $allDay);

		$stmt->execute();
	} catch (PDOException $e) {
		echo "Erro: $e";
	}
	?>