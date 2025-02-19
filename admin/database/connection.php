<?php
$host = "localhost"; // XAMPP default host
$user = "root"; // Default XAMPP MySQL user
$password = ""; // Default is empty
$dbname = "CS_ELECT_04"; // Your database name

$conn = new mysqli($host, $user, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}else{
     echo "Connected successfully";
}

// Uncomment this line to confirm connection works
// echo "Connected successfully";

?>
