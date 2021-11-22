<?php
// Connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbName = "student";

// connect to the mysql server and db
$mysqli = new mysqli($servername,$username,$password,$dbName);

if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}

?>