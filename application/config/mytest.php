<?php
$dbServerName = "64.202.185.75";
$dbUsername = "root";
$dbPassword = "newindiaindianewlive";
$dbName = "marketresearch_new";

// create connection
$conn = new mysqli($dbServerName, $dbUsername, $dbPassword, $dbName);

// check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?>