<?php
if (isset($_POST["submit"])) { //daca a apasat butonul
    echo "It works";
    $username = $_POST["uid"];
    $pwd = $_POST["pwd"];
    require_once '../includes/dbh.inc.php';
    require_once '../includes/functions.inc.php';


    if (emptyInputLogin($username, $pwd) !== false) {
        header("location: ../pages/login.php?error=emptyinput");
        exit();
    }

    loginUser($conn, $username, $pwd);
} else {
    header("location: ../pages/login.php?");
    exit();
}
