<?php
session_start(); // Start a session to manage login state
ini_set('display_errors', 1);
error_reporting(E_ALL);
// Retrieve the submitted username and password from the form (POST request)
$input_user = $_POST['username'] ?? '';  // Using the null coalescing operator in case values are missing
$input_pass = $_POST['password'] ?? '';
$valid = false;  // Flag to check if login is valid

// Read all users from the "users.txt" file, ignoring empty lines and line breaks
$lines = file('users.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

// Loop through each line in the file
foreach ($lines as $line) {
    // Split each line into the username and password hash

    if(strpos($line, ":") === false) continue;
    list($stored_user, $stored_hash) = explode(':', trim($line), 2);

    // Check if the input username matches the stored username
    if ($input_user === $stored_user && password_verify($input_pass, $stored_hash)) {
        $valid = true; // If passwords match, set valid to true
        break; // Exit the loop since login is successful
    }
}

// If login is valid, store the username in the session and redirect to the main page
if ($valid) {
    $_SESSION['user'] = $input_user;  // Store the username in the session
    header("Location: index.php");     // Redirect to the main page
    exit();  // Stop further script execution
} else {
    // If login failed, show an error message and a link to try again
    echo "Access denied. <a href='login.php'>Try again</a>";
}
?>
