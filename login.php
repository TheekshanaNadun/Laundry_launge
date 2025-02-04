<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // connecting to database
    $servername = "localhost";
    $db_username = "root";
    $db_password = "";
    $database = "laundry";

    // creating connection
    $conn = mysqli_connect($servername, $db_username, $db_password, $database);

    // die if connection was not successful
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Use prepared statements to prevent SQL injection
    $sql = "SELECT * FROM user WHERE username=? AND Password=?";
    $stmt = mysqli_prepare($conn, $sql);

    // Bind parameters
    mysqli_stmt_bind_param($stmt, "ss", $username, $password);

    // Execute the statement
    mysqli_stmt_execute($stmt);

    // Get the result
    $result = mysqli_stmt_get_result($stmt);

    // Check the number of rows
    $num = mysqli_num_rows($result);

    if ($num == 1) {
        echo "<script>alert('Welcome, You are logged in...!');
        window.location.href = 'index.html';
        </script>";

        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
    } else {
        echo "<script>alert('Sorry, Invalid credentials...!');
        window.location.href = 'login.html';
        </script>";
    }

    // Close the statement and connection
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
} else {
    // Handle the case where the request method is not POST
    echo "Invalid request method.";
}
?>

