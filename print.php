<?php
    include('conncet.php');  
    $datas = "SELECT * FROM `gdata`";
    $result = $conn->query($datas); 
    echo '<table border="1" cellpadding="5" cellspacing="0">'; 
echo '<thead>';
echo '<tr>';
echo '<th>PSale</th>';
echo '<th>PNo</th>';
echo '<th>Date</th>';
echo '<th>Delivery Address</th>';
echo '</tr>';
echo '</thead>';
echo '<tbody>';
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) { 
            echo "<tr>";
            echo "<td>".($row['psale']) . "</td>"; 
            echo "<td>".($row['daddr']) . "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='4'>No data found</td></tr>";
    }
    echo '</tbody>'; 
echo '</table>';
    //$conn->close();
    ?>
