<?php
include_once '../assets/componets/navbar.php';
require_once '../includes/dbh.inc.php';
?>
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
                <h1>Aquarium Messages</h1>
            </div>
            <div class="col">
                <img src="imgs/email.png" width="150" height="150">
            </div>
        </div>
    </div>
</div>

<table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col">id</th>
            <th scope="col">Nume</th>
            <th scope="col">Cheltuiala</th>
            <th scope="col">Suma</th>
            <th scope="col">Categorie</th>
            <th scope="col">Data</th>
        </tr>
    </thead>
    <tbody>

        <?php
        $sql = "SELECT id_buget, username, cheltuiala, suma, categorie, reg_date FROM buget; ";
        // $sql = "SELECT * FROM buget ";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr><th scope='row'>" . $row["id_buget"] . "</th>" . "
        <td>" . $row["username"] . "</td>" . "
        <td>" . $row["cheltuiala"] . "</td>" . "
        <td>" . $row["suma"] . "</td>" . "
        <td>" . $row["categorie"] . "</td>" . "
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
