<?php
$servername = "localhost";
$username = "root";
$password = "12345";
$dbname = "bd_shop";

// $servername = "localhost";
//$username = "id14770513_root";
//$password = "JqpS6>0YY<b7<|>w";
//$dbname = "id14770513_byketype";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>
