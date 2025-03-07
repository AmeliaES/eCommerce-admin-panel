<?php 

# Connect  on 'localhost, root, password, MKTIME database'.

$link = mysqli_connect('localhost','root','','MKTIME'); 

if (!$link) { 

# Otherwise fail gracefully and explain the error. 

die('Could not connect to MySQL: ' . mysqli_error()); 

} 

// echo 'Connected to the database successfully!';  # would we change this so it outputs to JS console.log?

?>
