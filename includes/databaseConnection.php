<?php

function dbConnection() {
	$servername = "localhost";
	$username = "root";
	$password = "";
	$database = "group_calendar";

  try {
    return new PDO("mysql:host=$servername;dbname=$database", $username, $password);
  } catch(PDOException $e) {
    // handle exceptions accordingly
    echo "Error".$e;
  }
}

?>