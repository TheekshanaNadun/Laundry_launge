<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "laundry";

// Create connection
$conn = new mysqli('localhost','root','', 'laundry');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the 'daddress' and 'password' keys exist in $_POST
    if (isset($_POST["daddress"]) && isset($_POST["password"])) {
        // Set parameters from POST data  
        $username = $_POST["daddress"];
        $password = $_POST["password"];  // Note: Replace with the actual password input field

        // Check if the username and password are not empty
        if (!empty($username) && !empty($password)) {
            // Prepare and bind the SQL statement
            $stmt = $conn->prepare("INSERT INTO user (username, password) VALUES (?, ?)");

            // Bind parameters
            $stmt->bind_param("ss", $username, $password);

            // Execute the statement
            if ($stmt->execute()) {
                echo "New record created successfully";
            } else {
                // Check for duplicate entry error
                if ($conn->errno == 1062) {
                    echo "Error: Duplicate entry. This record already exists.";
                } else {
                    echo "Error: " . $stmt->error;
                }
            }

            // Close the statement
            $stmt->close();
        } else {
            echo "Error: Username and password cannot be empty.";
        }
    } else {
        echo "Error: Missing 'daddress' or 'password' key in the form submission.";
    }
}

// Close the connection
$conn->close();
?>
