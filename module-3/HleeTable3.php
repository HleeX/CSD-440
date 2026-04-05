<!DOCTYPE html>
<!--
    Hlee Xiong
    Bellevue University
    CSD 440 - Module 3 Assignment
    -->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Module 3 Assignment</title>

    <?php
        require('functions.php');
    ?>
</head>

<body>
<table width="400" cellpadding="10" cellspacing="5">

    <thead>
        <tr>
            <td colspan='8'>
                Random Numbers
            </td>  
        </tr>
    </thead>

    <tbody>
        <?php
        for($i = 0; $i < 8; ++$i){

        ?>
        <tr>
        <?php
        for($j = 0; $j < 8; ++$j){
            ?>
            <td>
            <?php
            $n1 = rand(1, 100);
            $n2= rand(1, 100);

            echo randSum($n1, $n2);
            ?>
            </td>
            <?php
        }
        ?>
        </tr>
        <?php
        }
        ?>
         
    </tbody>
</table>    
</body>

</html>