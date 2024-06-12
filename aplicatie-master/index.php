<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestionați-vă eficient bugetul financiar și tranzactiile valutare</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/styles/style.css">
</head>

<body>
    <?php
    include_once 'assets/componets/navbar.php'
    ?>
    <main>
        <section class="hero bg-primary text-white text-center py-5">
            <br>
            <br>
            <div class="container">
                <h1 class="display-4">Gestionați-vă eficient bugetul financiar și tranzactiile valutare</h1>
                <p class="lead">Simplificați-vă viața financiară cu serviciile noastre complete de gestionare a
                    bugetului și de schimb valutar.</p>
                <a href="#" class="btn btn-light btn-lg">Incepe</a>
            </div>
        </section>
        <br>
        <!-- Services Section -->
        <section class="services py-5">
            <div class="container">
                <div class="row text-center">
                    <div class="col-md-4">
                        <div class="card mb-4 shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title">Managementul bugetului</h5>
                                <p class="card-text">Urmăriți și gestionați-vă cu ușurință veniturile, cheltuielile și
                                    economiile.</p>
                                <a href="http://localhost/aplicatie/aplicatie-master/managementulbugetului.html?" class="btn btn-primary">Află mai multe</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mb-4 shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title">Schimb valutar</h5>
                                <p class="card-text">Obțineți cele mai bune rate de schimb pentru tranzacțiile dvs.
                                    valutare.</p>
                                <a href="http://localhost/aplicatie/aplicatie-master/tranzatiivalutare.html?#" class="btn btn-primary">Află mai multe</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mb-4 shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title">Planificare financiara</h5>
                                <p class="card-text">Planifică-ți viitorul financiar cu sfaturile și instrumentele
                                    noastre de specialitate.</p>
                                <a href="#" class="btn btn-primary">Află mai multe</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Features Section -->
        <section class="features bg-light py-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h2>De ce să ne alegeți</h2>
                        <p>Oferim o suită cuprinzătoare de instrumente și servicii pentru a vă ajuta să vă gestionați
                            finanțele și să faceți schimb de valute în mod eficient. Platforma noastră este ușor de
                            utilizat și sigură , asigurând că informațiile dvs. financiare sunt întotdeauna în
                            siguranță.</p>
                        <ul>
                            <li>Ușor de folosit</li>
                            <li>Tranzacții sigure</li>
                            <li>Sfaturi financiare de specialitate</li>
                            <li>Rate de schimb competitive</li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <img src="assets/img/1.png" alt="Features" class="img-fluid">
                    </div>
                </div>
            </div>
            <br>
        </section>
        <?php
        include_once 'assets/componets/footer.php'
        ?>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>