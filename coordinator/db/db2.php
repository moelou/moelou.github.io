<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "logbook";
// Create connection
$conn = new mysqli($servername, $username, $password,$database);
//$conn = mysqli_select_db($conn,$database);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
//echo "Connected successfully";
?>