<!--
    Hlee Xiong
    Bellevue University
    CSD 440 - Module 6 Assignment
    -->
<?php

class MyInteger {
    private $value;

    public function __construct($int) {
        $this->value = $int;
    }

    public function getValue() {
        return $this->value;
    }

    public function setValue($int) {
        $this->value = $int;
    }

    public static function isEven($int) {
        return $int % 2 === 0;
    }

    public static function isOdd($int) {
        return $int % 2 !== 0;
    }

    public function isPrime() {
        $n = $this->value;
        if ($n < 2) return false;
        for ($i = 2; $i < $n; $i++) {
            if ($n % $i === 0) return false;
        }
        return true;
    }
}

// Instance 1
$num1 = new MyInteger(17);
echo "Value: " . $num1->getValue() . "\n";
echo "Even: " . (MyInteger::isEven($num1->getValue()) ? "Yes" : "No") . "\n";
echo "Odd: " . (MyInteger::isOdd($num1->getValue()) ? "Yes" : "No") . "\n";
echo "Prime: " . ($num1->isPrime() ? "Yes" : "No") . "\n";

// Instance 2
$num2 = new MyInteger(20);
echo "Value: " . $num2->getValue() . "\n";
echo "Even: " . (MyInteger::isEven($num2->getValue()) ? "Yes" : "No") . "\n";
echo "Odd: " . (MyInteger::isOdd($num2->getValue()) ? "Yes" : "No") . "\n";
echo "Prime: " . ($num2->isPrime() ? "Yes" : "No") . "\n";

?>