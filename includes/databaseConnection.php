<?php

function dbConnection() {
	$servername = "localhost";
	$username = "root";
	$password = "root";
	$database = "group_calendar";

  try {
    return new PDO("mysql:host=$servername;dbname=$database", $username, $password);
  } catch(PDOException $e) {
    // handle exceptions accordingly
    echo "<h1>Database Error</h1>";
  }

}

$pdo = dbConnection();
?>