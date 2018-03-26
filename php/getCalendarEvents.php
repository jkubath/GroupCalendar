<?php
	/*
	 * Documentation for getCalendarEvents.php
	 * Summary: getCalendarEvents will query the database for all the events (dates) that should be
	 * 	displayed on the calendar for the user.
	 * 
	 * 	Step 1: Initialize the connection to the database: group_calendar
	 *	Step 2: Set local variables to start and end date ranges
	 *	Step 3: Select the data from the database
	 *	Step 4: Format the data as specified with key : value attributes in https://fullcalendar.io/docs/event-object
	 *	Step 5: Convert the data into Event objects to be returned to the client
	 *	Step 6:  Send JSON to the client

	//This can be used to add events to the calendar_events table for testing
	INSERT INTO `calendar_events`(`calendar_id`, `name`, `start_date`, `end_date`) VALUES ("1","4430 Assignment","2018-03-29 08:20:20", "2018-03-30 08:20:20")


	*/

	include('../includes/databaseConnection.php'); //Make the connection to the database
	include('../php/fullCalendarUtil.php'); //Includes the Event class and the datetime utilities (provided by FullCalendar.io)

	/* Step 1: Initialize the connection to the database */
	$conn = dbConnection();
	
	/* Step 2: Set variables for start and end date ranges */
	//Short-circuit if the client did not give us a date range.
	if (!isset($_GET['start']) || !isset($_GET['end'])) {
		die("Please provide a date range.");
	}

	// Parse the start/end parameters.
	// These are assumed to be ISO8601 strings with no time nor timezone, like "2013-12-29".
	// Since no timezone will be present, they will parsed as UTC.
	$range_start = parseDateTime($_GET['start']);
	$range_end = parseDateTime($_GET['end']);

	/* Test start and end ranges */
	// $range_start = parseDateTime("2018-03-01");
	// $range_end = parseDateTime("2018-03-30");

	// Parse the timezone parameter if it is present.
	$timezone = null;
	if (isset($_GET['timezone'])) {
		$timezone = new DateTimeZone($_GET['timezone']);
	}


	/* Step 3: Select the data from the database */
	$sql = "SELECT * FROM calendar_events";

	try {
		$stmt = $conn->query($sql);
	}
	catch(PDOException $e){
		//echo "Error".$e;
	}

	/* Step 4: Format the data as specified with key : value attributes in https://fullcalendar.io/docs/event-object */
	$results = array();
	while ($row = $stmt->fetch()) {
			// echo $row['name'];
			// echo $row['calendar_id'];
			$results[] = array(
				"id"=>$row['event_id'], 
				"title"=>$row['name'], 
				"start"=>$row['start_date'], 
				"end"=>$row['end_date']);
	}

	/* Step 5: Convert the data into Event objects to be returned to the client */
	// Accumulate an output array of event data arrays.
	$output_arrays = array();
	foreach ($results as $array) {
	  	//Convert the input array into a useful Event object
		$event = new Event($array, $timezone);

	  	//If the event is in-bounds, add it to the output
	  	if ($event->isWithinDayRange($range_start, $range_end)) {
	  	  $output_arrays[] = $event->toArray();
	  	}

	}

	/* Step 6:  Send JSON to the client */
	echo json_encode($output_arrays);



?>