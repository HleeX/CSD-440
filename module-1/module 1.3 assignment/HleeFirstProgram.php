<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Module 1.3 Programming Assignment</title>
</head>

<body>
    <?php
    //This is a simple php code snippet.
    echo "Hello World!";
    ?>
</body>

<body>
    //Using a form.
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    Enter your name: <input type="text" name="name />
    <input type="submit" />
    </form>
</body>

</html>


