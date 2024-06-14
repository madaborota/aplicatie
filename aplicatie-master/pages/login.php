<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Gestionați-vă eficient bugetul financiar și tranzacțiile valutare</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/styles/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <style>
        .login-container {
            max-width: 900px;
            margin: 80px auto;
            padding: 20px;
            background: #f7f7f7;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .login-container h2 {
            margin-bottom: 20px;
        }

        .login-container .form-group {
            margin-bottom: 15px;
        }

        .login-container .btn {
            width: 100%;
        }

        .login-container .login-image {
            max-width: 100%;
            border-radius: 10px;
        }
    </style>
</head>

<body>
    <?php
    include_once '../assets/componets/navbar.php';
    include_once '../includes/dbh.inc.php';

    ?>
    <main>
        <section class="hero bg-primary text-white text-center py-5 animate__animated animate__fadeIn">
            <div class="container">
                <h1 class="display-4 animate__animated animate__bounceInDown">Autentificare</h1>
                <p class="lead animate__animated animate__bounceInUp">Accesați-vă contul pentru a gestiona eficient
                    bugetul financiar și tranzacțiile valutare.</p>
            </div>
        </section>

        <section class="login-section py-5">
            <div class="container">
                <div class="login-container row animate__animated animate__fadeInUp">
                    <div class="col-md-6">
                        <h2 class="text-center">Login</h2>
                        <form action="../includes/login.inc.php" method="POST">
                            <div class="form-group">
                                <label for="username">Your username or your email</label>
                                <input type="text" class="form-control" id="username" name="uid" placeholder="username/email" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Parolă</label>
                                <input type="password" class="form-control" id="password" name="pwd" placeholder="Password" required>
                            </div>
                            <button type="submit" class="btn btn-primary" name="submit">Log In</button>
                        </form>
                        <p class="text-center mt-3">
                            <a href="#">Ați uitat parola?</a> | <a href="../pages/signup.php">Creați un cont nou</a>
                        </p>
                        <?php
                        if (isset($_GET["error"])) {
                            if ($_GET["error"] == "emptyinput") {
                                echo "<div class='alert alert-danger' role='alert'>Completeaza toate campurile!</div>";
                            } else if ($_GET["error"] == "wronglogin") {
                                echo "<div class='alert alert-danger' role='alert'>Parola sau username-ul este gresit</div>";
                            }
                        }
                        ?>
                    </div>
                    <div class="col-md-6 d-none d-md-block">
                        <img src="../assets/img/moneylogin.jpeg" alt="Login" class="login-image">
                    </div>
                </div>
            </div>
        </section>

        <?php
        include_once '../assets/componets/footer.php';
        ?>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>