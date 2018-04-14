<?php
	require_once('../includes/databaseConnection.php'); //Make the connection to the database
//require_once('../php/userInfo.php');

session_start();

//echo "\nstring\n";
//echo json_encode($userInfo);
echo "->\n";
echo $_SESSION['calendar_id'];
echo "->\n";
echo $_SESSION['username'];
echo "->\n";
//require_once('../php/fullCalendarUtil.php'); //Includes the Event class and the datetime utilities (provided by FullCalendar.io)


$textUser 		= $_POST["userID"];
//echo ((bool) empty($textUser));
//echo ((bool) isset($textUser));
echo "->>>>>>>\n" + var_dump($textUser);
echo json_encode($textUser);

///// GIVE ACCESS TO THE USER GIVEN
/*
$calendarId = $_SESSION['calendar_id'];
$username = $textUser;
$permission = 1;

$a = [$calendarId, $username, $permission];
echo json_encode($textUser);

try {
  $stmt = $pdo->prepare("
    INSERT INTO calendar_rights(calendar_id,username,permission)
    VALUES(:calendarId, :username, :permission;");

  $stmt->bindParam(":calendarId", $calendarId);
  $stmt->bindParam(":username", $username);
  $stmt->bindParam(":permission", $permission);
  $stmt->execute();
} catch (PDOException $e) {
  echo "Error: $e";
}
*/


///// OBTAIN CALENDAR OF TO THE USER GIVEN
$calendarID ;
try {
  $sql = "SELECT calendar_id FROM calendar_rights WHERE username = '" . $textUser. "'";
  $stmt = $pdo->query($sql);
  $calendarID = $stmt->fetch();
} catch (PDOException $e) {
  echo "Error: $e";
}


$calendarId = $calendarID[0];
$username = $_SESSION['username'];
$permission = 1;

echo json_encode([$calendarId,$username,$permission]);

/*
try {
  $stmt = $pdo->prepare("
    INSERT INTO calendar_rights(calendar_id,username,permission)
    VALUES(:calendarId, :username, :permission);");

  $stmt->bindParam(":calendarId", $calendarId);
  $stmt->bindParam(":username", $username);
  $stmt->bindParam(":permission", $permission);
  $stmt->execute();
} catch (PDOException $e) {
    echo "Error: $e";
}
*/




/*
$results = array();
while($singleCalendar = $userCalendars->fetch()){

  $sql = "SELECT * FROM calendar_events WHERE calendar_id = '" . $singleCalendar['calendar_id'] . "'";

  try {
    $allEvents = $pdo->query($sql);
  }
  catch(PDOException $e){
    //echo "Error".$e;
  }

  while ($row = $allEvents->fetch()) {

      $results[] = array(
        "id"	=> $row['event_id'],
        "title"	=> $row['title'],
        "start"	=> $row['start_date'],
        "end"	=> $row['end_date'],
        "allDay"=> $row['all_day']
      );
  }
}

echo json_encode($results);

*/



?>
