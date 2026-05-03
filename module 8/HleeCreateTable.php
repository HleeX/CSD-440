<!--
    Hlee Xiong
    Bellevue University
    CSD 440 - Module 8 Assignment
-->
<html>
<body>
<center>
<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);


$servername = "localhost";
$username = "student1"; 
$password = "pass";     
$dbname = "JapaneseDomestic"; 

// Create connection to the existing database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// SQL to create the table
$sql = "CREATE TABLE IF NOT EXISTS Cars (
    car_id INT AUTO_INCREMENT PRIMARY KEY,
    make VARCHAR(50) NOT NULL,
    model VARCHAR(50) NOT NULL,
    release_year INT(4),
    engine_type VARCHAR(30)
)";

if ($conn->query($sql) === TRUE) {
  echo "<h1>Table Created</h1>";
  echo "The 'Cars' table is now ready in the " . $dbname . " database.";
} else {
  echo "Error creating table: " . $conn->error;
}

// Close connection
$conn->close();
?>
</center>
</body>
</html>