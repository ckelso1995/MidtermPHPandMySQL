

<?php
// not sure if needed to be in index, made this file and so far have the model requiring
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root'); 
define('DB_PASSWORD', ''); 
define('DB_NAME', 'zippyusedautos');

//should be the connection command to connect to the database, I just left things default
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

//should kill the connection if it fails
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
