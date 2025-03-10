<?php
include '../templates/nav.php';
?>

<?php
// Include the database connection
require '../includes/database.php';

// Query to select all records from the products table
$query = "SELECT * FROM products";
$result = mysqli_query($link, $query);

if (mysqli_num_rows($result) > 0) {
    echo '<div class="container"><div class="row">';
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        echo '
        <div class="col-md-3 d-flex justify-content-center mt-4">
            <div class="card" style="width: 18rem;">
                <img src="../' . $row['item_img'] . '" class="card-img-top" alt="T-Shirt">
                <div class="card-body">
                    <h5 class="card-title text-center">' . $row['item_name'] . '</h5>
                    <p class="card-text">' . $row['item_desc'] . '</p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><p class="text-center">&pound' . $row['item_price'] . '</p></li>
                    <li class="list-group-item btn btn-dark"><a class="btn btn-dark btn-lg btn-block" href="update.php?id=' . $row['item_id'] . '">Update</a></li>
                    <li class="list-group-item"><a class="btn btn-dark" href="delete.php?item_id=' . $row['item_id'] . '">Delete Item</a></li>
                </ul>
            </div>
        </div>';
    }
    echo '</div></div>';
    // Close database connection.
    mysqli_close($link);
} else {
    echo '<p>There are currently no items in the table to display.</p>';
}
?>

<?php
include '../templates/footer.php';
?>