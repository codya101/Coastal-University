<?php
$servername = "coastaldb.ciw7slkfmhqd.us-east-1.rds.amazonaws.com";
$username = "admin";
$password = "seaborn345";
$dbname = "mydb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>