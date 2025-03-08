<?php
include '../templates/nav.php';
?>

<h1>Add Item</h1>
<form action="create.php" method="post" enctype="multipart/form-data">
    <!-- input box for item name  -->
    <label for="name">Item Name:</label>
    <input type="text" 
           id="item_name" 
           class="form-control" 
           name="item_name" 
           required 
           value="<?php if (isset($_POST['item_name'])) echo $_POST['item_name']; ?>">

    <!-- input box for item description -->  
    <label for="description">Description:</label>
    <textarea id="item_desc" 
              class="form-control" 
              name="item_desc" 
              required><?php if (isset($_POST['item_desc'])) echo $_POST['item_desc']; ?></textarea>

    <!-- file input for image -->
    <label for="image">Image:</label>
    <input type="file" 
           id="item_img" 
           class="form-control" 
           name="item_img" 
           required>

    <!-- input box for item price -->
    <label for="price">Price:</label>
    <input type="number" 
           id="item_price" 
           class="form-control" 
           name="item_price" 
           min="0" step="0.01" 
           required 
           value="<?php if (isset($_POST['item_price'])) echo $_POST['item_price']; ?>"><br>
    <!-- submit button -->
    <input type="submit" class="btn btn-dark" value="Submit">
</form>

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

    // Check for item price.
    if (empty($_POST['item_price'])) {
        $errors[] = 'Enter the item price.';
    } else {
        $p = mysqli_real_escape_string($link, trim($_POST['item_price']));
    }

    // Check for file upload.
    if (isset($_FILES['item_img']) && $_FILES['item_img']['error'] == 0) {
        $target_dir = "../uploads/";
        $target_file = $target_dir . basename($_FILES["item_img"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if file is an image.
        $check = getimagesize($_FILES["item_img"]["tmp_name"]);
        if ($check !== false) {
            // Move the uploaded file to the target directory.
            if (move_uploaded_file($_FILES["item_img"]["tmp_name"], $target_file)) {
                $img = $target_file;
            } else {
                $errors[] = 'Failed to upload image.';
            }
        } else {
            $errors[] = 'File is not an image.';
        }
    } else {
        $errors[] = 'Enter the item image.';
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