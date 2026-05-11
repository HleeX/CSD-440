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

$connectionError = "";
if ($conn->connect_error) {
    $connectionError = "Connection failed: " . $conn->connect_error;
}

$filterEngine = isset($_POST['engine_type']) ? $_POST['engine_type'] : 'All';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Inventory Management</title>

    <style>
        :root {
            --bg: #0f172a;    
            --text: #f8fafc;  
            --accent: #38bdf8; 
            --white: #ffffff;
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
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 30px;
            border: 1px solid var(--accent);
        }

        select {
            padding: 10px;
            border-radius: 4px;
            border: 1px solid #334155;
            background: #0f172a;
            color: white;
            width: 250px;
            margin-right: 10px;
        }

        .btn-primary {
            background-color: var(--accent);
            color: var(--bg);
            border: none;
            padding: 10px 20px;
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
            padding: 12px 15px;
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

        <h1>Inventory Management</h1>

        <div class="search-box">
            <form method="POST" action="">
                <label for="engine_type">Filter by Engine Code:</label>
                <select name="engine_type" id="engine_type">
                    <option value="All" <?php echo $filterEngine == 'All' ? 'selected' : ''; ?>>All Engines</option>
                    <option value="2JZ-GTE" <?php echo $filterEngine == '2JZ-GTE' ? 'selected' : ''; ?>>2JZ-GTE (Supra)</option>
                    <option value="RB26DETT" <?php echo $filterEngine == 'RB26DETT' ? 'selected' : ''; ?>>RB26DETT (Skyline)</option>
                    <option value="13B-REW" <?php echo $filterEngine == '13B-REW' ? 'selected' : ''; ?>>13B-REW (RX-7)</option>
                    <option value="SR20DET" <?php echo $filterEngine == 'SR20DET' ? 'selected' : ''; ?>>SR20DET (Silvia)</option>
                    <option value="4G63T" <?php echo $filterEngine == '4G63T' ? 'selected' : ''; ?>>4G63T (Evo)</option>
                    <option value="B16B" <?php echo $filterEngine == 'B16B' ? 'selected' : ''; ?>>B16B (Civic Type R)</option>
                </select>
                <button type="submit" class="btn-primary">Filter Inventory</button>
            </form>
        </div>

        <?php
        if ($filterEngine == 'All') {
            $sql = "SELECT car_id, make, model, release_year, engine_type FROM Cars";
            $stmt = $conn->prepare($sql);
        } else {
            $sql = "SELECT car_id, make, model, release_year, engine_type FROM Cars WHERE engine_type = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $filterEngine);
        }

        $stmt->execute();
        $result = $stmt->get_result();

        if ($result && $result->num_rows > 0) {
            echo "<table>";
            echo "<thead><tr><th>ID</th><th>Make</th><th>Model</th><th>Year</th><th>Engine</th></tr></thead>";
            echo "<tbody>";
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars((string)$row["car_id"]) . "</td>";
                echo "<td>" . htmlspecialchars((string)$row["make"]) . "</td>";
                echo "<td>" . htmlspecialchars((string)$row["model"]) . "</td>";
                echo "<td>" . htmlspecialchars((string)$row["release_year"]) . "</td>";
                echo "<td>" . htmlspecialchars((string)$row["engine_type"]) . "</td>";
                echo "</tr>";
            }
            echo "</tbody></table>";
        } else {
            echo "<p>No vehicles found for the selected engine.</p>";
        }
        
        $stmt->close();
        $conn->close();
        ?>
    </div>

</body>
</html>