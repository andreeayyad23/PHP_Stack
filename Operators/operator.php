<?php
// 1. Arithmetic Operators
$a = 10;
$b = 5;

$sum = $a + $b; // Addition
$difference = $a - $b; // Subtraction
$product = $a * $b; // Multiplication
$quotient = $a / $b; // Division
$remainder = $a % $b; // Modulus

echo "Arithmetic Operators:\n";
echo "Sum: $sum\n";
echo "Difference: $difference\n";
echo "Product: $product\n";
echo "Quotient: $quotient\n";
echo "Remainder: $remainder\n\n";

// 2. Assignment Operators
$count = 5;
$count += 2; // Add and assign

echo "Assignment Operators:\n";
echo "Count after addition: $count\n\n";

// 3. Comparison Operators
$x = 10;
$y = 20;

echo "Comparison Operators:\n";
echo ($x < $y) ? "$x is less than $y\n" : "$x is not less than $y\n";
echo ($x == 10) ? "$x is equal to 10\n" : "$x is not equal to 10\n";
echo ($x !== '10') ? "$x is not identical to '10'\n" : "$x is identical to '10'\n\n";

// 4. Logical Operators
$a = true;
$b = false;

echo "Logical Operators:\n";
if ($a && !$b) {
    echo "Both conditions are true\n";
}
if ($a || $b) {
    echo "At least one condition is true\n\n";
}

// 5. Increment/Decrement Operators
$count = 5;

echo "Increment/Decrement Operators:\n";
echo "Initial count: $count\n";
echo "Pre-increment: " . ++$count . "\n"; // Increments before using
echo "Post-increment: " . $count++ . "\n"; // Increments after using
echo "Count after post-increment: $count\n\n";

// 6. String Operators
$firstName = "John";
$lastName = "Doe";

$fullName = $firstName . " " . $lastName; // Concatenation
echo "String Operators:\n";
echo "Full Name: $fullName\n";

$fullName .= " Jr."; // Concatenation assignment
echo "Full Name after assignment: $fullName\n\n";

// 7. Array Operators
$array1 = [1, 2, 3];
$array2 = [3, 4, 5];

$union = $array1 + $array2; // Union
echo "Array Operators:\n";
echo "Union: ";
print_r($union);

if ($array1 == [1, 2, 3]) {
    echo "Array1 is equal to [1, 2, 3]\n\n";
}

// 8. Null Coalescing Operator
$username = null;
$defaultName = "Guest";

echo "Null Coalescing Operator:\n";
echo "Username: " . ($username ?? $defaultName) . "\n\n"; // Outputs "Guest"

// 9. Ternary Operator
$age = 18;
$status = ($age >= 18) ? "Adult" : "Minor";
echo "Ternary Operator:\n";
echo "Status: $status\n\n";

// 10. Spaceship Operator
$a = 5;
$b = 10;

$result = $a <=> $b; // Returns -1, 0, or 1
echo "Spaceship Operator:\n";
if ($result === -1) {
    echo "$a is less than $b\n";
} elseif ($result === 1) {
    echo "$a is greater than $b\n";
} else {
    echo "$a is equal to $b\n\n";
}

// 11. Type Operators
class Animal {}
class Dog extends Animal {}

$dog = new Dog();

echo "Type Operators:\n";
if ($dog instanceof Animal) {
    echo "Dog is an instance of Animal\n\n";
}

// 12. Error Control Operator
echo "Error Control Operator:\n";
$result = @file('non_existent_file.txt'); // Suppresses the warning
if ($result === false) {
    echo "File not found, but no warning was shown.\n\n";
}

// 13. Execution Operator
echo "Execution Operator:\n";
$output = shell_exec('ls'); // Executes a shell command
echo "Output of ls command:\n$output";
?>