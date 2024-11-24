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
// Check if form is submitted
if (isset($_GET['username']) && isset($_GET['status'])) {
    $user_username = $_GET['username'];
    $new_status = $_GET['status'];

    // Prepare SQL to update the status
    $sql = $conn->prepare("UPDATE vdata SET status = ? WHERE username = ?");
    $sql->bind_param("ss", $new_status, $user_username);
    
    // Execute the query
    if ($sql->execute()) {
        echo "<p>Status updated successfully!</p>";
    } else {
        echo "<p>Error: " . $sql->error . "</p>";
    }

    // Close the statement
    $sql->close();
};

// Fetch all usernames and their current status
$sql = "SELECT username, status FROM vdata";
$result = $conn->query($sql);

// Display usernames and their status with a link to update status
if ($result->num_rows > 0) {
    echo "<h2>All Users</h2><table border='1' cellpadding='5' cellspacing='0'>
            <tr><th>Username</th><th>Status</th><th>Update Status</th></tr>";
    
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row['username'] . "</td>
                <td>" . $row['status'] . "</td>
                <td>
                    <a href='?username=" . $row['username'] . "&status=pending'>Set pending</a> | 
                    <a href='?username=" . $row['username'] . "&status=inactive'>Set Inactive</a>
                </td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "<p>No users found in the database.</p>";
}
echo "<p><a href='admin.html'>Admin</a></p>";
// Close connection
$conn->close();
?>