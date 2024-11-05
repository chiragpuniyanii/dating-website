<?php
// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Database connection details
$servername = "localhost";
$username = "root";
$password = "";  // Default password is empty for XAMPP
$dbname = "date_app";

// Create a connection to MySQL
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// If the form is submitted via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $place = $_POST['location'];

    // Prepare SQL statement to insert data
    $stmt = $conn->prepare("INSERT INTO date_details (name, date, time, place) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $date, $time, $place);

    // Execute the query
    if ($stmt->execute()) {
        echo "Date details saved successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>
