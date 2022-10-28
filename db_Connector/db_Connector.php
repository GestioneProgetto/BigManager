<?php
$db_servername = "spesaduezero.michelesottocasa.tech";
$db_username = "spesa2.0";
$db_password = "Spesa2.0";
$db_table = "spesa2.0";

// Create connection
$conn = mysqli_connect($db_servername, $db_username, $db_password, $db_table);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";