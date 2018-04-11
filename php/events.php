<?php

require_once('../includes/databaseConnection.php'); //Make the connection to the database
require_once('../php/fullCalendarUtil.php'); //Includes the Event class and the datetime utilities (provided by FullCalendar.io)

$action = 'nothing';
/*
if (isset($_GET['action'])) {
  $action = $_GET['action'];
}
echo $action;
*/
if ($action == "add") {

}elseif ($action == "modify") {

}elseif ($action == "remove") {

}else{
  $action = 'nothing';
}

$title = $_POST["title"];
$color = $_POST["color"];
$description = $_POST["description"];
$startDate = $_POST["start"];
$endDate = $_POST["end"];
$textColor = $_POST["textColor"]
$allDay = $_POST["allDay"]; // this is false
$calendarId = 1; // based on the user1 , change this later

if ($allDay) {
  $allDay = 1;
}else {
  $allDay = 0;
}

try {
  $stmt = $pdo->prepare("
  INSERT INTO calendar_events(calendar_id, title, start_date, end_date, all_day, description, color, text_color)
  VALUES(:calendarId, :title, :startDate, :endDate, :allDay, :description, :color, :textColor);");

  $stmt->bindParam(":calendarId", $calendarId);
  $stmt->bindParam(":title", $title);
  $stmt->bindParam(":startDate", $startDate);
  $stmt->bindParam(":endDate", $endDate);
  $stmt->bindParam(":allDay", $allDay);
  $stmt->bindParam(":description", $description);
  $stmt->bindParam(":color", $color);
  $stmt->bindParam(":textColor", $textColor);

  $stmt->execute();
  echo json_encode($stmt);
} catch (PDOException $e) {
  echo "Erro: $e";
}
?>
