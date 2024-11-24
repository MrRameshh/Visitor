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

// Check if username is provided
if (isset($_GET['username'])) {
    $user_username = $_GET['username'];

    // Prepare SQL to get the status based on username
    $sql = $conn->prepare("SELECT status FROM vdata WHERE username = ?");
    $sql->bind_param("s", $user_username);
    $sql->execute();
    $sql->store_result();
    
    // Check if any result is found
    if ($sql->num_rows > 0) {
        $sql->bind_result($status);
        $sql->fetch();
        echo "<h3>Status of application for user '$user_username':</h3>";
        echo "<p>Status: $status</p>";
    } else {
        echo "<h3>No application found for user '$user_username'.</h3>";
    }

    // Close the statement
    $sql->close();
}
echo "<p><a href='status.html'>Status</a></p>";

// Close connection
$conn->close();
?>