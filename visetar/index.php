<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "visitor";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get data from the URL (GET request)
$user_username = $_GET['username'];
$user_email = $_GET['email'];
$user_nam = $_GET['nam'];
$user_password = $_GET['password'];
$user_TEX1 = $_GET['TEX1'];
$status = 'pending';

// Prepare SQL statement
$sql = $conn->prepare("INSERT INTO vdata (username, email, mobile, password, p_vist, status) VALUES (?, ?, ?, ?, ?, ?)");

// Bind parameters to the SQL query (s = string, i = integer, etc.)
$sql->bind_param("ssssss", $user_username, $user_email, $user_nam, $user_password, $user_TEX1, $status);

// Execute the query
if ($sql->execute()) {
    echo "Registration successful!";
} else {
    echo "Error: " . $sql->error;
}

// Close the statement and connection
$sql->close();
echo "<br><br><a href='status.html'>Status</a>";
$conn->close();
?>
