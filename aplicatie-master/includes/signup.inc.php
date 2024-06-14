<?php
if (isset($_POST["submit"])) {
    echo "It works";
    $name = $_POST["name"];
    $email = $_POST["email"];
    $username = $_POST["uid"];
    $pwd = $_POST["pwd"];
    $rePwd = $_POST["rePwd"];

    require_once '../includes/dbh.inc.php';
    require_once '../includes/functions.inc.php';

    if (emptyInputSignup($name, $email, $username, $pwd, $rePwd) !== false) {
        header("location: ../pages/signup.php?error=emptyinput");
        exit();
    }

    if (invalidUid($username) !== false) {
        header("location: ../pages/signup.php?error=invaliduid");
        exit();
    }

    if (invalidEmail($email) !== false) {
        header("location: ../pages/signup.php?error=invalidemail");
        exit();
    }

    if (pwdMatch($pwd, $rePwd) !== false) {
        header("location: ../pages/signup.php?error=passwordsdontmatch");
        exit();
    }

    if (uidExists($conn, $username, $email) !== false) {
        header("location: ../pages/signup.php?error=usernametaken");
        exit();
    }

    createUser($conn, $name, $email, $username, $pwd);
} else {
    header("location: ../pages/signup.php");
    exit();
}
