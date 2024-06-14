<?php
require_once 'dbh.inc.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = $_POST;
    $maxLength = sizeof($data['descriere']);
    $descrieri  = $data['descriere'];
    $sume  = $data['suma'];
    $categorii  = $data['categorie'];

    for ($i = 0; $i < $maxLength; $i++) {
        $desriere = $descrieri[$i];
        $suma = $sume[$i];
        $categorie = $categorii[$i];
        $username = $_SESSION["username"] ?? 'ale';

        $sql = "INSERT INTO buget(username,cheltuiala,suma,categorie) VALUES ('$username', '$desriere', '$suma', '$categorie')";
        $conn->query($sql);
    }

    header("Location: ../pages/buget.php");
    exit();
} else {
    header("Location: ../pages/buget.php");
    exit();
}
