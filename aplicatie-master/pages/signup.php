<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign Up - Gestionați-vă eficient bugetul financiar și tranzacțiile valutare</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/styles/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
  <style>
    .signup-container {
      max-width: 900px;
      margin: 80px auto;
      padding: 20px;
      background: #f7f7f7;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .signup-container h2 {
      margin-bottom: 20px;
    }

    .signup-container .form-group {
      margin-bottom: 15px;
    }

    .signup-container .btn {
      width: 100%;
    }

    .signup-container .signup-image {
      max-width: 100%;
      height: auto;
      border-radius: 10px;
    }

    .hero {
      background: linear-gradient(45deg, #007bff, #00a8ff);
      color: white;
    }
  </style>
</head>

<body>
  <?php
  include_once '../assets/componets/navbar.php';
  include_once '../includes/dbh.inc.php';
  ?>
  <main>
    <section class="hero text-center py-5 animate__animated animate__fadeIn">
      <div class="container">
        <h1 class="display-4 animate__animated animate__bounceInDown">Înregistrare</h1>
        <p class="lead animate__animated animate__bounceInUp">Creați un cont nou pentru a gestiona eficient
          bugetul financiar și tranzacțiile valutare.</p>
      </div>
    </section>

    <section class="signup-section py-5">
      <div class="container">
        <div class="signup-container row animate__animated animate__fadeInUp">
          <div class="col-md-6">
            <h2 class="text-center">Sign Up</h2>
            <form action="../includes/signup.inc.php" method="POST">
              <div class="form-group">
                <label for="name">Nume</label>
                <input type="text" class="form-control" id="name" name="name" required>
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
              </div>
              <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="uid" required>
              </div>
              <div class="form-group">
                <label for="password">Parolă</label>
                <input type="password" class="form-control" id="password" name="pwd" required>
              </div>
              <div class="form-group">
                <label for="confirm-password">Confirmă Parola</label>
                <input type="password" class="form-control" id="confirm-password" name="rePwd" required>
              </div>
              <button type="submit" class="btn btn-primary" name="submit">Înregistrare</button>
            </form>
            <p class="text-center mt-3">
              <a href="../pages/login.php">Aveți deja un cont? Autentificați-vă aici</a>
            </p>
            <?php
            if (isset($_GET["error"])) {
              if ($_GET["error"] == "emptyinput") {
                echo "<div class='alert alert-danger' role='alert'>Completeaza toate campurile!</div>";
              } else if ($_GET["error"] == "invaliduid") {
                echo "<div class='alert alert-danger' role='alert'>Username-ul este invalid!</div>";
              } else if ($_GET["error"] == "invalidemail") {
                echo "<div class='alert alert-danger' role='alert'>Email-ul este invalid!</div>";
              } else if ($_GET["error"] == "passwordsdontmatch") {
                echo "<div class='alert alert-danger' role='alert'>Parolele nu se potrivesc!</div>";
              } else if ($_GET["error"] == "usernametaken") {
                echo "<div class='alert alert-danger' role='alert'>Username-ul este deja luat!</div>";
              }
            }
            ?>
          </div>
          <div class="col-md-6 d-none d-md-block">
            <img src="../assets/img/uk.png" alt="Sign Up" class="signup-image">
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