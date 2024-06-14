<?php
require_once 'dbh.inc.php';

if (isset($_POST["mesaj"])) {
    echo "It works";
    $firstname = $_POST["prenume"];
    $name = $_POST["nume"];
    $email = $_POST["email"];
    $mesaj = $_POST["mesaje"];

    // SQL query to insert form data into the database
    $sql = "INSERT INTO mesaje (prenume_client, nume_client, email, mesaj) VALUES ('$firstname', '$name', '$email', '$mesaj')";

    if ($conn->query($sql) === TRUE) {
        echo "<div class='alert alert-success' role='alert'>Mesajul a fost trimis cu succes!</div>";
        header("location: ../pages/contact.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        // header("location: ../404.php");
    }
    $conn->close();
} else {
    header("location: ../pages/contact.php");
    exit();
}
