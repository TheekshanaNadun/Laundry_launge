<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "laundry";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Prepare and bind the SQL statement
    $stmt = $conn->prepare("INSERT INTO user (frist_name, last_name, phone_number, email, date_of_brith, username, password) VALUES (?, ?, ?, ?, ?, ?, ?)");

    // Bind parameters
    $stmt->bind_param("sssssss", $frist_name, $last_name, $phone_number, $email, $date_of_brith, $username, $password);

    // Set parameters from POST data
    $frist_name = $_POST["fname"];
    $last_name = $_POST["lname"];
    $phone_number = $_POST["phone"];
    $email = $_POST["email"];
    $date_of_brith = date('Y-m-d', strtotime($_POST['pdate']));
    $username = $_POST["daddress"];
    $password = $_POST["daddress"];  

    // Execute the statement
    if ($stmt->execute()) {
        header("Location: index.html?msg=Data successfully recorded");
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
}

// Close the connection
$conn->close();
?>