<!--
    Hlee Xiong
    Bellevue University
    CSD 440 - Module 8 Assignment
    -->


<html>
<body>
<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "localhost";
$username = "student1";
$password = "BayWatch123$";

$conn = new mysqli($servername, $username, $password);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


$sql = "CREATE DATABASE IF NOT EXISTS JapaneseDomestic";

if ($conn->query($sql) === TRUE) {
  // 3. Add a more descriptive message
  echo "<h1>Database Status</h1>";
  echo "The database 'JapaneseDomestic' is ready to use.";
} else {
  echo "Error: " . $conn->error;
}

$conn->close();
?>

</body>
</html>