<?php
include '../templates/nav.php';
?>

<div class="container-sm">
    <div class="row justify-content-center">
        <div class="col-12 col-md-6">
            <h1 class="mt-4">Update Item</h1>
            <form action="update.php" method="post">
                <!-- update box for item id  -->
                <label for="id">Item Id:</label>
                <input type="text"
                    name="item_id"
                    class="form-control"
                    value="<?php if (isset($_POST['item_id'])) echo $_POST['item_id']; ?>">
                
                <!-- update box for item name  -->
                <label for="name">Item Name:</label>
                <input type="text"
                    name="item_name"
                    class="form-control"
                    value="<?php if (isset($_POST['item_name'])) echo $_POST['item_name']; ?>">

                <!-- update box for item description  -->
                <label for="desc">Description:</label>
                <textarea name="item_desc"
                        class="form-control"><?php if (isset($_POST['item_desc'])) echo $_POST['item_desc']; ?></textarea>

                <!-- update box for item image  -->
                <label for="img">Image:</label>
                <input type="text"
                    name="item_img"
                    class="form-control"
                    value="<?php if (isset($_POST['item_img'])) echo $_POST['item_img']; ?>">

                <!-- update box for item price  -->
                <label for="price">Price:</label>
                <input type="text"
                    name="item_price"
                    class="form-control"
                    value="<?php if (isset($_POST['item_price'])) echo $_POST['item_price']; ?>">

                <!-- submit button -->
                <div class="text-center mt-4">
                    <input type="submit" class="btn btn-dark" value="Submit">
                </div>
            </form>
        </div>
    </div>
</div>    

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Include the database connection
    require '../includes/database.php';

    // Initialize an error array.
    $errors = array();

    // Check for item ID.
    if (empty($_POST['item_id'])) {
        $errors[] = 'Update item ID.';
    } else {
        $id = mysqli_real_escape_string($link, trim($_POST['item_id']));
    }
    
    // Check for item name.
    if (empty($_POST['item_name'])) {
        $errors[] = 'Update item name.';
    } else {
        $n = mysqli_real_escape_string($link, trim($_POST['item_name']));
    }

    // Check for item description.
    if (empty($_POST['item_desc'])) {
        $errors[] = 'Update item description.';
    } else {
        $d = mysqli_real_escape_string($link, trim($_POST['item_desc']));
    }

    // Check for item image.
    if (empty($_POST['item_img'])) {
        $errors[] = 'Update image address.';
    } else {
        $img = mysqli_real_escape_string($link, trim($_POST['item_img']));
    }
    
    // Check for item price.
    if (empty($_POST['item_price'])) {
        $errors[] = 'Update item price.';
    } else {
        $p = mysqli_real_escape_string($link, trim($_POST['item_price']));
    }

    if (empty($errors)) {
        $q = "UPDATE products SET item_name='$n', item_desc='$d', item_img='$img', item_price='$p' WHERE item_id='$id'";
        $r = @mysqli_query($link, $q);
        if ($r) {
            header("Location: read.php");
            exit();
        } else {
            echo "Error updating record: " . mysqli_error($link);
        }
    } else {
        echo '<p>The following error(s) occurred:</p>';
        foreach ($errors as $msg) {
            echo "$msg<br>";
        }
        echo '<p>Please try again.</p>';
    }

    // Close database connection.
    mysqli_close($link);
}
?>

<?php
include '../templates/footer.php';
?>

