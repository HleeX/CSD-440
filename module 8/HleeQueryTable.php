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

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT car_id, make, model, release_year, engine_type FROM Cars";
$result = $conn->query($sql);

echo "<h1>Japanese Domestic Cars Inventory</h1>";

if ($result->num_rows > 0) {
    echo "<table border='1' cellpadding='10'>";
    echo "<tr><th>ID</th><th>Make</th><th>Model</th><th>Year</th><th>Engine</th></tr>";
    
    // Loop through and display each row
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["car_id"] . "</td>";
        echo "<td>" . $row["make"] . "</td>";
        echo "<td>" . $row["model"] . "</td>";
        echo "<td>" . $row["release_year"] . "</td>";
        echo "<td>" . $row["engine_type"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "The table is currently empty.";
}

$conn->close();
?>
</center>
</body>
</html>