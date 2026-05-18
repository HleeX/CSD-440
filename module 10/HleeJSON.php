<?php
/**
 * Module 10.2 Assignment
 * Hlee Xiong
 */

$displayForm = true;
$errorMsg = "";
$jsonOutput = "";

// Check if the form has been submitted via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Collect data from the form
    $formData = [
        "First Name"     => $_POST['fname'] ?? '',
        "Last Name"      => $_POST['lname'] ?? '',
        "Age"            => $_POST['age'] ?? '',
        "Favorite Drink" => $_POST['drink'] ?? '',
        "Favorite Color" => $_POST['color'] ?? '',
        "Favorite Song"  => $_POST['song'] ?? '',
        "Favorite Book"  => $_POST['book'] ?? '',
        "Favorite Movie" => $_POST['movie'] ?? ''
    ];

    
    $isValid = true;
    foreach ($formData as $key => $value) {
        if (empty(trim($value))) {
            $isValid = false;
            break;
        }
    }

    if ($isValid) {
        
        $displayForm = false;
        $jsonOutput = json_encode($formData, JSON_PRETTY_PRINT);
    } else {
        
        $errorMsg = "Error: All fields are required. Please fill out the form entirely.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PHP & JSON</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; background-color: #f8f9fa; }
        .container { max-width: 500px; background: white; padding: 25px; border-radius: 8px; box-shadow: 0 4px 12px rgba(0,0,0,0.1); margin: 0 auto; }
        
        
        form { display: flex; flex-direction: column; gap: 10px; }
        label { font-weight: bold; margin-top: 5px; }
        input { padding: 8px; border: 1px solid #ccc; border-radius: 4px; font-size: 14px; }
        button { padding: 10px; background-color: #007BFF; color: white; border: none; border-radius: 4px; cursor: pointer; font-size: 16px; margin-top: 15px; }
        button:hover { background-color: #0056b3; }
        
        
        .error-box { background-color: #fff5f5; border-left: 5px solid #dc3545; color: #dc3545; padding: 15px; margin-bottom: 20px; border-radius: 4px; }
        .success-box { border-top: 5px solid #28a745; }
        h2 { margin-top: 0; color: #333; }
        .success-box h2 { color: #28a745; }
        pre { background: #272822; color: #f8f8f2; padding: 15px; border-radius: 4px; overflow-x: auto; font-size: 14px; text-align: left; }
        .btn-back { display: inline-block; margin-top: 15px; color: #007BFF; text-decoration: none; }
    </style>
</head>
<body>

    <div class="container">
        
        <?php if ($displayForm): ?>
        
            <h2>Module 10.2 Assignment</h2>
            
            <?php if (!empty($errorMsg)): ?>
                <div class="error-box">
                    <strong>Submission Problem:</strong> <?php echo htmlspecialchars($errorMsg); ?>
                </div>
            <?php endif; ?>

            
            <form action="" method="POST">
                <label for="fname">First name:</label>
                <input type="text" id="fname" name="fname" value="<?php echo htmlspecialchars($_POST['fname'] ?? ''); ?>" required>

                <label for="lname">Last name:</label>
                <input type="text" id="lname" name="lname" value="<?php echo htmlspecialchars($_POST['lname'] ?? ''); ?>" required>

                <label for="age">Age:</label>
                <input type="number" id="age" name="age" value="<?php echo htmlspecialchars($_POST['age'] ?? ''); ?>" required>

                <label for="drink">Favorite Drink:</label>
                <input type="text" id="drink" name="drink" value="<?php echo htmlspecialchars($_POST['drink'] ?? ''); ?>" required>

                <label for="color">Favorite Color:</label>
                <input type="text" id="color" name="color" value="<?php echo htmlspecialchars($_POST['color'] ?? ''); ?>" required>

                <label for="song">Favorite Song:</label>
                <input type="text" id="song" name="song" value="<?php echo htmlspecialchars($_POST['song'] ?? ''); ?>" required>

                <label for="book">Favorite Book:</label>
                <input type="text" id="book" name="book" value="<?php echo htmlspecialchars($_POST['book'] ?? ''); ?>" required>

                <label for="movie">Favorite Movie:</label>
                <input type="text" id="movie" name="movie" value="<?php echo htmlspecialchars($_POST['movie'] ?? ''); ?>" required>

                <button type="submit">Submit Data</button>
            </form>

        <?php else: ?>
            
            <div class="success-box">
                <h2>Data Encoded Successfully!</h2>
                <p>Below is your data formatted in JSON:</p>
                <pre><?php echo htmlspecialchars($jsonOutput); ?></pre>
                <a href="" class="btn-back">← Reset and Go Back</a>
            </div>
        <?php endif; ?>

    </div>

</body>
</html>
    