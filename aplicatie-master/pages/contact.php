<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contactați-ne - Gestionați-vă eficient bugetul financiar și tranzacțiile valutare</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/styles/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <style>
    .hero {
        background: linear-gradient(45deg, #007bff, #00a8ff);
        color: white;
    }

    .contact,
    .consultants {
        transition: transform 0.3s, opacity 0.3s;
    }

    .contact:hover,
    .consultants:hover {
        transform: translateY(-10px);
        opacity: 0.9;
    }
    </style>
</head>

<body>
    <?php
    include_once '../assets/componets/navbar.php';
    ?>
    <main>
        <section class="hero text-center py-5 animate__animated animate__fadeIn">
            <div class="container">
                <h1 class="display-4 animate__animated animate__bounceInDown">Contactați-ne</h1>
                <p class="lead animate__animated animate__bounceInUp">Suntem aici pentru a vă ajuta cu orice întrebări
                    sau nelămuriri pe care le aveți.</p>
            </div>
        </section>

        <section class="contact bg-light py-5">
            <div class="container">
                <h2 class="text-center mb-4 animate__animated animate__fadeInUp">Detalii Contact</h2>
                <div class="row">
                    <div class="col-md-6 animate__animated animate__fadeInLeft">
                        <p><strong>Adresă:</strong> Str. Exemplului, Nr. 10, București, România</p>
                        <p><strong>Email:</strong> contact@financiar.com</p>
                        <p><strong>Telefon:</strong> +40 123 456 789</p>
                    </div>
                    <div class="col-md-6 animate__animated animate__fadeInRight">
                        <form action="submit_contact_form.php" method="POST">
                            <div class="form-group">
                                <label for="name">Nume</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="form-group">
                                <label for="message">Mesaj</label>
                                <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Trimite</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <section class="consultants py-5">
            <div class="container">
                <h2 class="text-center mb-4 animate__animated animate__fadeInUp">Consultanții Noștri Financiari</h2>
                <div class="row">
                    <div class="col-md-4 text-center animate__animated animate__zoomIn">
                        <img src="../assets/img/man.avif" alt="Consultant 1" class="img-fluid rounded-circle mb-3">
                        <h5>Ion Popescu</h5>
                        <p>Specialist în Managementul Bugetului</p>
                    </div>
                    <div class="col-md-4 text-center animate__animated animate__zoomIn animate__delay-1s">
                        <img src="../assets/img/women.png" alt="Consultant 2" class="img-fluid rounded-circle mb-3">
                        <h5>Maria Ionescu</h5>
                        <p>Expert în Schimb Valutar</p>
                    </div>
                    <div class="col-md-4 text-center animate__animated animate__zoomIn animate__delay-2s">
                        <img src="../assets/img/man2.jpeg" alt="Consultant 3" class="img-fluid rounded-circle mb-3">
                        <h5>Alexandru Georgescu</h5>
                        <p>Consultant în Planificare Financiară</p>
                    </div>
                </div>
            </div>
        </section>

        <?php
        include_once '../assets/componets/footer.php';
        ?>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>