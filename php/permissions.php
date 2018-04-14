<?php
  session_start();
    require_once('../includes/databaseConnection.php'); //Make the connection to the database


$textUser = $_POST["userID"];



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
