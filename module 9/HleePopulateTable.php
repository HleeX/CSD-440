<?php
/**
 * Hlee Xiong
 * Bellevue University
 * CSD 440 - Module 8 Assignment
 */

error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "localhost";
$username = "student1"; 
$password = "BayWatch123$";     
$dbname = "JapaneseDomestic"; 

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Clear the table first to prevent duplicate entries on refresh
$conn->query("TRUNCATE TABLE Cars");

// SQL to insert 20 JDM records
$sql = "INSERT INTO Cars (make, model, release_year, engine_type)
VALUES 
('Toyota', 'Supra A80', 1993, '2JZ-GTE'),
('Nissan', 'Skyline GT-R R34', 1999, 'RB26DETT'),
('Mazda', 'RX-7 FD', 1992, '13B-REW'),
('Honda', 'NSX', 1990, 'C30A'),
('Subaru', 'Impreza 22B STI', 1998, 'EJ22'),
('Mitsubishi', 'Lancer Evolution VI', 1999, '4G63T'),
('Nissan', 'Silvia S15', 1999, 'SR20DET'),
('Toyota', 'AE86 Sprinter Trueno', 1983, '4A-GE'),
('Honda', 'Civic Type R EK9', 1997, 'B16B'),
('Mazda', 'Eunos Cosmo', 1990, '20B-REW'),
('Nissan', 'Fairlady Z Z32', 1989, 'VG30DETT'),
('Toyota', 'Chaser JZX100', 1996, '1JZ-GTE'),
('Mitsubishi', 'GTO', 1990, '6G72'),
('Honda', 'Integra Type R DC2', 1995, 'B18C'),
('Nissan', 'Pulsar GTI-R', 1990, 'SR20DET'),
('Toyota', 'MR2 SW20', 1989, '3S-GTE'),
('Subaru', 'Forester STI', 2004, 'EJ25'),
('Mazda', 'RX-8', 2003, '13B-MSP'),
('Nissan', 'Skyline GT-R R32', 1989, 'RB26DETT'),
('Toyota', 'Celica GT-Four ST205', 1994, '3S-GTE')";

if ($conn->query($sql) === TRUE) {
  echo "<h1>Database Populated Successfully</h1>";
  echo "Successfully added 20 vehicles to the 'Cars' table in the " . htmlspecialchars($dbname) . " database.";
} else {
  echo "Error inserting data: " . $conn->error;
}

$conn->close();
?>