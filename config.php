<?php 

// Define database connection constants
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'MKTIME');

// Attempt to connect  to MySQL database
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection, otherwise exit and display error message
if (!$link) { 
    die('Could not connect to MySQL: ' . mysqli_error()); 
} 

?>
