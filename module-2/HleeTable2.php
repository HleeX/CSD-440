<!DOCTYPE html>

<!--
    Hlee Xiong
    Bellevue University
    CSD 440 - Module 2 Assignment
    -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Module 2 Assignment</title>
</head>

<table width="400" cellpadding="10" cellspacing="5">

    <thead>
        <tr>
            <td colspan='6'>
                Random Numbers to 100
            </td>  
        </tr>
    </thead>

    <tbody>
        <?php
        for($i = 0; $i < 6; ++$i){

        ?>
        <tr>
        <?php
        for($j = 0; $j < 6; ++$j){
            ?>
            <td>
            <?php
            echo(rand(1,100));
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