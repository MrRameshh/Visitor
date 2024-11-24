<?
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "purch";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate the POST data
    $po_number = $_POST['poNumber'];
    $item_name = $_POST['item'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    $supplier_name = $_POST['supplier'];
    
    // Calculate total price
    $total_price = $quantity * $price;

    // Prepare the SQL query with placeholders
    $sql = "INSERT INTO `pdata` (`po_number`, `item_name`, `quantity`, `price`, `total_price`, `supplier_name`, `purchase_date`) 
            VALUES (?, ?, ?, ?, ?, ?, current_timestamp())";

    // Prepare statement
    if ($stmt = $conn->prepare($sql)) {
        // Bind parameters
        $stmt->bind_param("ssddss", $po_number, $item_name, $quantity, $price, $total_price, $supplier_name);

        // Execute the query
        if ($stmt->execute()) {
            // Optionally redirect after successful insertion
            //header("Location: insert_summary.php");
            //echo "Record inserted successfully.";
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
