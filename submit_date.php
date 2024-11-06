<?php
// Database credentials
$servername = "localhost";
$username = "root";
$password = "chirag";  // Your MySQL root password
$dbname = "date_website";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the form data
$name = $_POST['name'];
$date = $_POST['date'];
$time = $_POST['time'];
$location = $_POST['location'];

// SQL query to insert data into the table
$sql = "INSERT INTO dates (name, date, time, location) VALUES ('$name', '$date', '$time', '$location')";

if ($conn->query($sql) === TRUE) {
    // Format the date and time for a friendly output
    $formattedDate = date("F j, Y", strtotime($date)); // e.g., October 20, 2024
    $formattedTime = date("g:i A", strtotime($time));  // e.g., 6:00 PM

    // Display a romantic confirmation page with personalized message
    echo "
    <!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Date Confirmed!</title>
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Dancing+Script:wght@500&display=swap');
            body {
                font-family: 'Dancing Script', cursive;
                background-color: #fff0f5;
                color: #5f4b8b;
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                height: 100vh;
                margin: 0;
                background: url('https://example.com/flower_background.jpg') no-repeat center center fixed; /* Add a subtle floral background */
                background-size: cover;
            }
            h1 {
                font-size: 3.5rem;
                margin-bottom: 20px;
                color: #e75480;
                animation: fadeInDown 1s ease-out;
            }
            .confirmation-box {
                background-color: rgba(255, 255, 255, 0.9); /* Soft white with transparency */
                padding: 40px;
                border-radius: 30px;
                box-shadow: 0 0 30px rgba(0, 0, 0, 0.15);
                text-align: center;
                max-width: 550px;
                width: 100%;
                animation: slideUp 0.8s ease-in-out;
                backdrop-filter: blur(10px);
            }
            .message {
                font-size: 1.7rem;
                margin: 25px 0;
                line-height: 2;
                animation: fadeIn 2s ease-out;
            }
            .heart {
                font-size: 70px;
                color: #ff69b4;
                margin-top: 30px;
                animation: pulse 1.2s infinite;
            }
            /* Custom animations */
            @keyframes fadeIn {
                from { opacity: 0; }
                to { opacity: 1; }
            }
            @keyframes slideUp {
                from { transform: translateY(30px); opacity: 0; }
                to { transform: translateY(0); opacity: 1; }
            }
            @keyframes fadeInDown {
                from { opacity: 0; transform: translateY(-20px); }
                to { opacity: 1; transform: translateY(0); }
            }
            @keyframes pulse {
                0% { transform: scale(1); }
                50% { transform: scale(1.15); }
                100% { transform: scale(1); }
            }
            /* Responsive design */
            @media (max-width: 600px) {
                h1 { font-size: 2.5rem; }
                .confirmation-box { padding: 20px; }
                .message { font-size: 1.3rem; }
            }
        </style>
    </head>
    <body>
        <div class='confirmation-box'>
            <h1>Our Magical Date is Set! 💖</h1>
            <div class='message'>
                <p>Hey <strong>$name</strong>, it's official! 🌸</p>
                <p>We'll meet on <strong>$formattedDate</strong> at <strong>$formattedTime</strong> at <strong>$location</strong>.</p>
                <p>I can't wait to share this beautiful day with you! 💞</p>
            </div>
            <div class='heart'>💖</div>
        </div>
    </body>
    </html>
    ";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close connection
$conn->close();
?>

