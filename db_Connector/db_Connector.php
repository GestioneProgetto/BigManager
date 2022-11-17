<?php
$db_servername = "";
$db_username = "";
$db_password = "";
$db_table = "";

// Create connection
$conn = mysqli_connect($db_servername, $db_username, $db_password, $db_table);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
