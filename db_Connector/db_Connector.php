<?php
$servername = "spesaduezero.michelesottocasa.tech";
$username = "spesa2.0";
$password = "Spesa2.0";

// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";