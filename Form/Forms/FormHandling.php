<?php
// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Retrieve form data using GET method
    $firstName = htmlspecialchars($_GET['first-name']);
    $lastName = htmlspecialchars($_GET['last-name']);
    $email = htmlspecialchars($_GET['email']);
    $country = htmlspecialchars($_GET['country']);

    // Validate data (You can add more validation as needed)
    if (empty($firstName) || empty($lastName) || empty($email) || empty($country)) {
        echo "All fields are required.";
        exit;
    }

    // Display the submitted information
    echo "<h2>Submitted Information</h2>";
    echo "<p><strong>First Name:</strong> " . $firstName . "</p>";
    echo "<p><strong>Last Name:</strong> " . $lastName . "</p>";
    echo "<p><strong>Email Address:</strong> " . $email . "</p>";
    echo "<p><strong>Country:</strong> " . $country . "</p>";
} else {
    echo "Invalid request.";
}
?>