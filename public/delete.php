<?php
include '../templates/nav.php';
?>

<h1>Delete Item</h1>

<?php

require '../includes/database.php';

if (isset($_GET['item_id'])) {
    $id = $_GET['item_id'];
} else {
    echo 'No item ID. Please select an item to delete.';
}

$sql = "DELETE FROM products WHERE item_id='$id'";
if ($link->query($sql) === TRUE) {
    header("Location: read.php");
}

?>