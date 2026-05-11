<?php
/**
 * Module 9.2 Assignment
 * Hlee Xiong
 */
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Module 9.2 Assignment</title>

    <style>
        
        :root {
            --bg: #0f172a;    
            --text: #f8fafc;  
            --accent: #38bdf8; 
            --white: #ffffff;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: var(--bg);
            color: var(--text);
            line-height: 1.6;
            margin: 0;
            padding: 40px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        h1 {
            color: var(--text);
            margin-bottom: 30px;
            border-bottom: 3px solid var(--accent);
            padding-bottom: 10px;
        }

        .button-container {
            display: flex;
            gap: 20px;
        }

        button {
            background-color: var(--accent);
            color: var(--white);
            border: none;
            padding: 12px 24px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 4px;
            transition: opacity 0.2s;
        }

        button:hover {
            opacity: 0.9;
        }
    </style>
</head>
<body>

    <h1>Module 9.2 Assignment</h1>

    <div class="button-container">
        <button onclick="document.location='query.php'">Query Page</button>
        <button onclick="document.location='form.php'">Form Page</button>
    </div>

</body>
</html>