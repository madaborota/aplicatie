<header class="bg-dark text-white">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center py-3">
            <h2>
                <a href="http://localhost/aplicatie/aplicatie-master/index.php">
                    <img src="/aplicatie/aplicatie-master/assets/img/12.png" class="logo" width="50px"
                        height="50px">Wallet
                </a>
            </h2>
            <nav>
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link text-white"
                            href="http://localhost/aplicatie/aplicatie-master/pages/valuta.php#">Schimb valutar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white"
                            href="http://localhost/aplicatie/aplicatie-master/pages/suma.php#">Cheltuieli Personale</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white"
                            href="http://localhost/aplicatie/aplicatie-master/pages/contact.php#">Contact</a>
                    </li>

                    <?php
                    if (isset($_SESSION["useruid"])) {
                        echo "<li class='nav-item'>
                        <a class='nav-link text-white' href='http://localhost/aplicatie/aplicatie-master/pages/buget.php#'>Calcul buget</a>
                        </li>";
                        echo "<li class='nav-item'>
                        <a class='nav-link text-white' href='http://localhost/aplicatie/aplicatie-master/pages/tabelBuget.php#'>Tabel buget</a>
                        </li>";


                        if ($_SESSION["useruid"] == 'Administrator') {
                            echo "<li class='nav-item'>
                                    <a class='nav-link text-white' href='mesaje.php'>Messages</a>
                                  </li>";
                        }

                        echo "<li class='nav-item'>
                                <a class='nav-link' href='/aplicatie/aplicatie-master/includes/logout.inc.php'>Log out</a>
                              </li>";
                    } else {
                        echo "<li class='nav-item'>
                                <a class='nav-link' href='/aplicatie/aplicatie-master/pages/login.php'>Login</a>
                              </li>
                              <li class='nav-item'>
                                <a class='nav-link' href='/aplicatie/aplicatie-master/pages/signup.php'>Sign in</a>
                              </li>";
                    }
                    ?>
                </ul>
            </nav>
        </div>
    </div>
</header>