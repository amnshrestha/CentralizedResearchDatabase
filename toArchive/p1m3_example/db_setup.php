<?php
$servername = "localhost";
$username = "ashrest2";
$password = "";//put Password Here

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
//echo "Connected successfully";

?>


