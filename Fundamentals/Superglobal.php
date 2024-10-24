<?php
    echo $_SERVER["DOCUMENT_ROOT"] . "<br>";
    echo $_SERVER["SERVER_NAME"] . "<br>";
    echo $_SERVER["REMOTE_ADDR"] . "<br>";
    echo $_SERVER["REQUEST_METHOD"] . "<br>";
    echo $_SERVER["PHP_SELF"] . "<br>";
?>

<?php
    // Directly accessing superglobals
    echo $_GET["name"] . "<br>";
    echo $_POST["eyecolor"] . "<br>";
    echo $_FILES["name"]["name"] . "<br>"; // Accessing the name of the uploaded file
    echo $_COOKIE["name"] . "<br>";
    session_start(); // Start the session before accessing session variables
    echo $_SESSION["name"] . "<br>";
?>