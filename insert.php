<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "laundry";

// Create connection
$conn = new mysqli("localhost","root","","laundry");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



$f_name = $_POST['fname'];
$l_name =$_POST['lname'];
$phone =$_POST['phone'];
$email = $_POST['email'];
$p_address = $_POST['paddress'];
$p_date =date('Y-m-d', strtotime($_POST['pdate']));
$d_address = $_POST['daddress'];
$d_date = date('Y-m-d', strtotime($_POST['ddate']));
$services = $_POST['services'];

// Attempt insert query execution

$sql = "INSERT INTO orders (cfname,clname,tpnumber,email,paddress,pdate,daddress,ddate,cservices) VALUES ('$f_name','$l_name','$phone','$email', '$p_address','$p_date','$d_address','$d_date','$services')";
if($conn->query($sql) === TRUE){
  header("Location: index.html?msg=Data successfully recorded");
} else{
    echo "ERROR: Could not able to execute $sql." . $conn->error;
}

// Close connection
$conn->close();
?>