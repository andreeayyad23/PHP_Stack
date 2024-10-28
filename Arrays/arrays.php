<?php
// Creating an indexed array
$fruits = ["Apple", "Banana", "Cherry", "Date", "Elderberry"];
array_push($fruits, "Orange"); // Adding "Orange" to the end of the array

// Displaying the indexed array
echo "Indexed Array:\n";
foreach ($fruits as $index => $fruit) {
    echo "Index $index: $fruit\n";
}

// Creating an associative array
$person = [
    "name" => "John Doe",
    "age" => 30,
    "email" => "john.doe@example.com",
    "city" => "New York"
];

$person["phone"] = 174585969; // Adding a phone number to the associative array

// Displaying the associative array
echo "\nAssociative Array:\n";
foreach ($person as $key => $value) {
    echo "$key: $value\n";
}

// Mixed array of tasks (indexed array containing associative arrays)
$tasks = [
    [
        "description" => "Complete PHP assignment",
        "status" => "pending",
        "priority" => "high"
    ],
    [
        "description" => "Read 50 pages of a book",
        "status" => "completed",
        "priority" => "medium"
    ],
    [
        "description" => "Go grocery shopping",
        "status" => "pending",
        "priority" => "low"
    ]
];

// Using array_slice to get a portion of the tasks array
$slicedTasks = array_slice($tasks, 1, 1); // Get 1 task starting from index 1

// Displaying the sliced array
echo "\nSliced Array of Tasks:\n";
foreach ($slicedTasks as $index => $task) {
    echo "Task $index:\n";
    echo "Description: " . $task["description"] . "\n";
    echo "Status: " . $task["status"] . "\n";
    echo "Priority: " . $task["priority"] . "\n";
    echo "-------------------------\n";
}

// Displaying the full mixed array of tasks
echo "\nMixed Array of Tasks:\n";
foreach ($tasks as $index => $task) {
    echo "Task $index:\n";
    echo "Description: " . $task["description"] . "\n";
    echo "Status: " . $task["status"] . "\n";
    echo "Priority: " . $task["priority"] . "\n";
    echo "-------------------------\n";
}
?>