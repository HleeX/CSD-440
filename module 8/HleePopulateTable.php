<!--
    Hlee Xiong
    Bellevue University
    CSD 440 - Module 8 Assignment
-->
<html>
<body>
<center>
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "localhost";
$username = "student1"; 
$password = "pass";     
$dbname = "JapaneseDomestic"; 

// Create connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// SQL to insert multiple records
$sql = "INSERT INTO Cars (make, model, release_year, engine_type)
VALUES 
('Subaru', 'WRX STI', 2004, 'EJ25'),
('Nissan', 'Skyline GT-R', 1999, 'RB26DETT'),
('Toyota', 'Supra', 1994, '2JZ-GTE')";

if ($conn->query($sql) === TRUE) {
  echo "<h1>Data Inserted</h1>";
  echo "Successfully added 3 vehicles to the 'Cars' table.";
} else {
  echo "Error inserting data: " . $conn->error;
}

$conn->close();
?>
</center>
</body>
</html>