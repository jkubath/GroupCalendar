<?php
	require_once('../includes/databaseConnection.php'); //Make the connection to the database
	require_once('../php/fullCalendarUtil.php'); //Includes the Event class and the datetime utilities (provided by FullCalendar.io)	

	$start_date = $_POST["dateStr"];
	$title = $_POST["title"];
	$allDay = $_POST["allDay"];


	if ($allDay) {
		$end_date = $date;
	}

	if ($allDay) {
		$allDay = 1;
	} else {
		$allDay = 0;
	}

	$stmt = $conn->query("
		INSERT INTO calendar_events(calendar_id, title, start_date, end_date, allDay)
		VALUES(1, $title, $start_date, $end_date, $allDay);
		");
?>