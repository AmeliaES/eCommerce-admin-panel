<?php 

# Connect  on 'localhost, username, password, database name'.

$link = mysqli_connect('localhost','root','','MKTIME'); 

if (!$link) { 

# Otherwise fail gracefully and explain the error. 

die('Could not connect to MySQL: ' . mysqli_error()); 

} 

echo 'Connected to the database successfully!';  

?>
