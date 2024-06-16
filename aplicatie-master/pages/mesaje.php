<?php
session_start();
include_once '../assets/componets/navbar.php';
require_once '../includes/dbh.inc.php';
?>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Gestionați-vă eficient bugetul financiar și tranzactiile valutare</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/styles/style.css">

<style>
    .mesaj {
        margin-top: 20px;
        margin-bottom: 20px;
        background-color: rgb(249, 249, 249);
        border-radius: 30px;
        padding-top: 40px;
        padding-bottom: 40px;
        padding-left: 220px;
    }
</style>

<div class="container">
    <div class="mesaj">
        <div class="row">
            <div class="col">
                <?php
                if (isset($_SESSION["useruid"])) {
                    echo "<h2>Wellcome : </h2>" . "<h2 style='color:green;'>" . $_SESSION["useruid"] . "</h2>";
                }
                ?>
                <h1>Mesaje aplicatie Wallet</h1>
            </div>
            <div class="col">
                <img src="../assets/img/bani.png" width="150" height="150">
            </div>
        </div>
    </div>
</div>

<table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col">id</th>
            <th scope="col">Nume Client</th>
            <th scope="col">Prenume Client</th>
            <th scope="col">Email</th>
            <th scope="col">Mesaj</th>
            <th scope="col">Data</th>
        </tr>
    </thead>
    <tbody>

        <?php
        $sql = "SELECT id_mesaj, prenume_client, nume_client, email, mesaj, reg_date FROM mesaje ";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr><th scope='row'>" . $row["id_mesaj"] . "</th>" . "
        <td>" . $row["prenume_client"] . "</td>" . "
        <td>" . $row["nume_client"] . "</td>" . "
        <td>" . $row["email"] . "</td>" . "
        <td>" . $row["mesaj"] . "</td>" . "
        <td>" . $row["reg_date"] . "</td></tr>";
            }
        } else {
            echo "0 results";
        }

        ?>
    </tbody>
</table>
</div>
<?php include_once '../assets/componets/footer.php';
