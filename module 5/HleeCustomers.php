    <!--
    Hlee Xiong
    Bellevue University
    CSD 440 - Module 5 Assignment
    -->
    <?php
    class Customer {
        public $firstName;
        public $lastName;
        public $age;
        public $phone;

        public function __construct($first, $last, $age, $phone) {
            $this->firstName = $first;
            $this->lastName = $last;
            $this->age = $age;
            $this->phone = $phone;
        }

        public function display() {
        echo "Name: {$this->firstName} {$this->lastName} | Age: {$this->age} | Phone: {$this->phone}\n";
    }
}

// Create array
$customers = [
    new Customer("John", "Doe", 28, "555-0101"),
    new Customer("Jane", "Smith", 34, "555-0102"),
    new Customer("Alice", "Johnson", 22, "555-0103"),
    new Customer("Bob", "Brown", 45, "555-0104"),
    new Customer("Charlie", "Davis", 31, "555-0105"),
    new Customer("Diana", "Evans", 29, "555-0106"),
    new Customer("Edward", "Frank", 52, "555-0107"),
    new Customer("Fiona", "García", 24, "555-0108"),
    new Customer("George", "Harris", 38, "555-0109"),
    new Customer("Hannah", "Ives", 41, "555-0110")
];

echo "ALL CUSTOMERS:\n\n";
foreach ($customers as $c) { $c->display(); }

// Finding a customer by Last Name using array_filter
$searchName = "Smith";
$results = array_filter($customers, function($c) use ($searchName) {
    return $c->lastName === $searchName;
});

echo "Search by Last Name ('$searchName'):\n";
foreach ($results as $res) { $res->display(); }

// Finding all customers over the age of 40
$seniors = array_filter($customers, function($c) {
    return $c->age > 40;
});

echo "\nSearch for Customers over 40:\n";
foreach ($seniors as $s) { $s->display(); }

?>