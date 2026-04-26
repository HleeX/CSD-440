<!--
    Hlee Xiong
    Bellevue University
    CSD 440 - Module 7 Assignment
    -->

<?php
$errors = [];
$success = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $name     = $_POST['u_name'] ?? '';
    $email    = $_POST['u_email'] ?? '';
    $quantity = $_POST['u_qty'] ?? '';
    $arrival  = $_POST['u_date'] ?? '';
    $type     = $_POST['u_type'] ?? '';
    $urgent   = isset($_POST['u_urgent']) ? "Yes" : "No";
    $comments = $_POST['u_text'] ?? '';

    
    if (empty($name))     $errors[] = "Name is missing.";
    if (empty($email))    $errors[] = "Email is missing.";
    if (empty($quantity)) $errors[] = "Quantity is missing.";
    if (empty($arrival))  $errors[] = "Date is missing.";
    if (empty($type))     $errors[] = "Category is missing.";
    if (empty($comments)) $errors[] = "Comments are missing.";

    
    if (empty($errors)) $success = true;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Module 7 Forms</title>
</head>
<body>

    <?php if ($success): ?>
        <h1>Data Received</h1>
        <p><b>Name:</b> <?php echo htmlspecialchars($name); ?></p>
        <p><b>Email:</b> <?php echo htmlspecialchars($email); ?></p>
        <p><b>Quantity:</b> <?php echo htmlspecialchars($quantity); ?></p>
        <p><b>Date:</b> <?php echo htmlspecialchars($arrival); ?></p>
        <p><b>Category:</b> <?php echo htmlspecialchars($type); ?></p>
        <p><b>Urgent:</b> <?php echo $urgent; ?></p>
        <p><b>Comments:</b> <?php echo htmlspecialchars($comments); ?></p>
        <a href="">Back to form</a>

    <?php else: ?>
        <h1>Registration</h1>

        <?php if ($errors): ?>
            <div style="color: red;">
                <b>Errors:</b>
                <ul>
                    <?php foreach ($errors as $e) echo "<li>$e</li>"; ?>
                </ul>
            </div>
        <?php endif; ?>

        <form method="POST">
            Name:<br>
            <input type="text" name="u_name"><br><br>

            Email:<br>
            <input type="email" name="u_email"><br><br>

            Quantity (Number):<br>
            <input type="number" name="u_qty"><br><br>

            Arrival Date:<br>
            <input type="date" name="u_date"><br><br>

            Category:<br>
            <select name="u_type">
                <option value="">-- Select --</option>
                <option value="Personal">Personal</option>
                <option value="Business">Business</option>
            </select><br><br>

            <input type="checkbox" name="u_urgent"> Mark as Urgent<br><br>

            Comments:<br>
            <textarea name="u_text"></textarea><br><br>

            <input type="submit" value="Submit Information">
        </form>
    <?php endif; ?>

</body>
</html>

