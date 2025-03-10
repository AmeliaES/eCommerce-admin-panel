<?php
include '../templates/nav.php';
?>


<div class="container-sm">
    <div class="row justify-content-center">
        <div class="col-12 col-md-6">
            <h1 class="mt-4">Create Item</h1>
            <form action="create.php" method="post" enctype="multipart/form-data">
                <!-- input box for item name -->
                <div class="mb-3">
                    <label for="name" class="form-label">Item Name:</label>
                    <input type="text" 
                        id="item_name" 
                        class="form-control" 
                        name="item_name" 
                        required 
                        value="<?php if (isset($_POST['item_name'])) echo $_POST['item_name']; ?>">
                </div>

                <!-- input box for item description -->  
                <div class="mb-3">
                    <label for="description" class="form-label">Description:</label>
                    <textarea id="item_desc" 
                            class="form-control" 
                            name="item_desc" 
                            required><?php if (isset($_POST['item_desc'])) echo $_POST['item_desc']; ?></textarea>
                </div>

                <!-- input box for image path -->
                <div class="mb-3">
                    <label for="image" class="form-label">Image:</label>
                    <input type="text" 
                        id="item_img" 
                        class="form-control" 
                        name="item_img" 
                        required 
                        placeholder="public/assets/images/your-image.png"
                        value="<?php if (isset($_POST['item_img'])) echo $_POST['item_img']; ?>">
                </div>

                <!-- input box for item price -->
                <div class="mb-3">
                    <label for="price" class="form-label">Price:</label>
                    <input type="number" 
                        id="item_price" 
                        class="form-control" 
                        name="item_price" 
                        min="0" step="0.01" 
                        required 
                        value="<?php if (isset($_POST['item_price'])) echo $_POST['item_price']; ?>">
                </div>

                <!-- submit button -->
                <div class="text-center">
                    <input type="submit" class="btn btn-dark" value="Submit">
                </div>
            </form>
        </div>
    </div>
</div>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Connect to the database.
    require '../includes/database.php';

    // Initialize an error array.
    $errors = array();

    // Check for item name.
    if (empty($_POST['item_name'])) {
        $errors[] = 'Enter the item name.';
    } else {
        $n = mysqli_real_escape_string($link, trim($_POST['item_name']));
    }

    // Check for item description.
    if (empty($_POST['item_desc'])) {
        $errors[] = 'Enter the item description.';
    } else {
        $d = mysqli_real_escape_string($link, trim($_POST['item_desc']));
    }

    // Check for item image.
    if (empty($_POST['item_img'])) {
        $errors[] = 'Enter the item image.';
    } else {
        $img = mysqli_real_escape_string($link, trim($_POST['item_img']));
    }

    // Check for item price.
    if (empty($_POST['item_price'])) {
        $errors[] = 'Enter the item price.';
    } else {
        $p = mysqli_real_escape_string($link, trim($_POST['item_price']));
    }

    // On success, insert data into the products table.
    if (empty($errors)) {
        $q = "INSERT INTO products (item_name, item_desc, item_img, item_price) 
              VALUES ('$n', '$d', '$img', '$p')";
        $r = @mysqli_query($link, $q);
        if ($r) {
            echo '<p>New record created successfully</p>';
        }

        // Close database connection.
        mysqli_close($link);
        exit();
    } else {
        // Report errors.
        echo '<p>The following error(s) occurred:</p>';
        foreach ($errors as $msg) {
            echo "$msg<br>";
        }
        echo '<p>Please try again.</p>';
        // Close database connection.
        mysqli_close($link);
    }
}
?>

<?php
include '../templates/footer.php';
?>