<?php
$serverName = "localhost";
$dbUsername = "root";
$bdPassword = "";
$dbName = "wallet";


$conn = mysqli_connect($serverName, $dbUsername, $bdPassword, $dbName);
if (!$conn) {
    die("Connection failed" . mysqli_connect_error());
} else {
    // echo "Merge";
}
