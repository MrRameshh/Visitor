<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "visitor";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
    $username = $_GET['username'];
    $position = $_GET['position'];
    if (empty($username) || empty($position)) {
        echo "Username and position are required.";
    } else {
        // SQL query to update the position of the specified user
        $sql = "UPDATE vdata SET position = '$position' WHERE username = '$username'";

        // Execute the query
    if (mysqli_query($conn, $sql)) {
            echo "Position assigned successfully!";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
$sql = "SELECT * FROM vdata";
$result = $conn->query($sql);

// Check if there are records and display them
if ($result->num_rows > 0) {
    echo "<h2>All User Data:</h2>";
    echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Position</th>
            </tr>";

    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row['id'] . "</td>
                <td>" . $row['username'] . "</td>
                <td>" . $row['position'] . "</td>
              </tr>";
    }

    echo "</table>";
} else {
    echo "No records found.";
}
echo "<br><br><a href='assing.html'>Assing</a>";
mysqli_close($conn);
?>
