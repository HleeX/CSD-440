<!--
    Hlee Xiong
    Bellevue University
    CSD 440 - Module 4 Assignment
    -->

<?php

function Palindrome($string){  
    if (strrev($string) == $string){  
        return 1;  
    }
    else{
        return 0;
    }
}  


$original = "LEVEL"; 
if(Palindrome($original)){  
    echo $original . " is Palindrome.\n";  
} 
else {  
echo $original . " is not a Palindrome.\n";  
}

$original = "NOON"; 
if(Palindrome($original)){  
    echo $original . " is a Palindrome.\n";  
} 
else {  
echo $original . " is not a Palindrome.\n";    
}

$original = "RACECAR"; 
if(Palindrome($original)){  
    echo $original . " is a Palindrome.\n";  
} 
else {  
echo $original . " is not a Palindrome.\n";  
}

$original = "MOON"; 
if(Palindrome($original)){  
    echo $original . " is a Palindrome.\n";  
} 
else {  
echo $original . " is not a Palindrome.\n";  
}

$original = "HOUSE"; 
if(Palindrome($original)){  
    echo $original . " is Palindrome.\n";  
} 
else {  
echo $original . " is not a Palindrome.\n";  
}

$original = "CAR"; 
if(Palindrome($original)){  
    echo $original . " is a Palindrome.\n";  
} 
else {  
echo $original ." is not a Palindrome.\n";  
}

?>