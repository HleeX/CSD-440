<?php
/**
 * Module 9.2 Assignment
 * Hlee Xiong
 */

error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "localhost";
$username = "student1"; 
$password = "BayWatch123$";     
$dbname = "JapaneseDomestic"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$searchMake = isset($_POST['search_make']) ? trim($_POST['search_make']) : '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Vehicle Search</title>

    <style>
        :root {
            --bg: #0f172a;    
            --text: #f8fafc;  
            --accent: #38bdf8; 
            --card-bg: #1e293b;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: var(--bg);
            color: var(--text);
            margin: 0;
            padding: 40px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .container {
            width: 100%;
            max-width: 900px;
        }

        .nav-header {
            width: 100%;
            display: flex;
            justify-content: flex-start;
            margin-bottom: 20px;
        }

        .back-link {
            color: var(--accent);
            text-decoration: none;
            font-weight: bold;
        }

        h1 {
            border-bottom: 3px solid var(--accent);
            padding-bottom: 10px;
        }

        .search-box {
            background-color: var(--card-bg);
            padding: 25px;
            border-radius: 8px;
            margin-bottom: 30px;
            border: 1px solid var(--accent);
        }

        input[type="text"] {
            padding: 12px;
            border-radius: 4px;
            border: 1px solid #334155;
            background: #0f172a;
            color: white;
            width: 70%;
        }

        button {
            background-color: var(--accent);
            color: var(--bg);
            border: none;
            padding: 12px 25px;
            font-weight: bold;
            border-radius: 4px;
            cursor: pointer;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: var(--card-bg);
            border-radius: 8px;
            overflow: hidden;
        }

        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid var(--bg);
        }

        th {
            background-color: var(--accent);
            color: var(--bg);
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="nav-header">
            <a href="index.php" class="back-link">← Back to Home</a>
        </div>

        <h1>Vehicle Search</h1>

        <div class="search-box">
            <form method="POST" action="query.php">
                <input type="text" name="search_make" placeholder="Enter Make (e.g. Mazda)" value="<?php echo htmlspecialchars($searchMake); ?>">
                <button type="submit">Search</button>
            </form>
        </div>

        <?php
        if ($searchMake !== '') {
            $sql = "SELECT car_id, make, model, release_year, engine_type FROM Cars WHERE make LIKE ?";
            $stmt = $conn->prepare($sql);
            $searchTerm = "%" . $searchMake . "%";
            $stmt->bind_param("s", $searchTerm);
        } else {
            $sql = "SELECT car_id, make, model, release_year, engine_type FROM Cars";
            $stmt = $conn->prepare($sql);
        }

        $stmt->execute();
        $result = $stmt->get_result();

        if ($result && $result->num_rows > 0) {
            echo "<table>";
            echo "<tr><th>ID</th><th>Make</th><th>Model</th><th>Year</th><th>Engine</th></tr>";
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars((string)$row["car_id"]) . "</td>";
                echo "<td>" . htmlspecialchars((string)$row["make"]) . "</td>";
                echo "<td>" . htmlspecialchars((string)$row["model"]) . "</td>";
                echo "<td>" . htmlspecialchars((string)$row["release_year"]) . "</td>";
                echo "<td>" . htmlspecialchars((string)$row["engine_type"]) . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        }
        $stmt->close();
        $conn->close();
        ?>
    </div>

</body>
</html> 
    