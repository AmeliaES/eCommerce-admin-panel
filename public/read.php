<?php
 include '../templates/nav.php';
?>

<?php
// Include the database connection
require '../includes/database.php';

// Query to select all records from the products table
$query = "SELECT * FROM products";
$result = mysqli_query($link, $query);

if ($result) {
    echo '<h1>Products Table</h1>';
    echo '<table class="table table-bordered">';
    echo '<thead>';
    echo '<tr>';
    echo '<th>ID</th>';
    echo '<th>Item Name</th>';
    echo '<th>Description</th>';
    echo '<th>Image</th>';
    echo '<th>Price</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';
    
    // Fetch and display each row of the result set
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr>';
        echo '<td>' . $row['item_id'] . '</td>';
        echo '<td>' . $row['item_name'] . '</td>';
        echo '<td>' . $row['item_desc'] . '</td>';
        echo '<td>' . $row['item_img'] . '</td>';
        echo '<td>' . $row['item_price'] . '</td>';
        echo '</tr>';
    }
    
    echo '</tbody>';
    echo '</table>';
} else {
    echo 'Error: ' . mysqli_error($link);
}

// Close the database connection
mysqli_close($link);
?>

<?php
include '../templates/footer.php';
?>