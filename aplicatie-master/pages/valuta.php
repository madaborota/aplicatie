<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ro">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schimb Valutar</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <style>
        #currency-calculator .form-group label {
            font-weight: bold;
        }

        #currency-calculator #result {
            font-size: 1.25em;
            font-weight: bold;
        }

        #currency-calculator,
        .exchange-rates-table {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        #currency-calculator button {
            width: 100%;
        }

        #rates-calculator {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        @media (max-width: 768px) {
            #rates-calculator {
                flex-direction: column;
            }
        }

        .flag-icon {
            width: 24px;
            height: auto;
            margin-right: 10px;
        }

        .consulting-tips {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            display: flex;
            align-items: center;
        }

        .consulting-tips h3 {
            margin-bottom: 20px;
        }

        .consulting-tips ul {
            list-style-type: none;
            padding: 0;
        }

        .consulting-tips ul li {
            margin-bottom: 10px;
            padding-left: 20px;
            position: relative;
        }

        .consulting-tips ul li::before {
            content: "✔";
            color: green;
            position: absolute;
            left: 0;
        }

        .consulting-tips img {
            max-width: 100%;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        /* Stilizare pentru sectiunea de transferuri internationale */
        .international-transfers {
            background-color: #f8f9fa;
            padding: 50px 0;
        }

        .international-transfers .container {
            position: relative;
        }

        .international-transfers .description {
            text-align: center;
            margin-bottom: 40px;
        }

        .international-transfers .form-container {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            padding: 30px;
        }

        .international-transfers form {
            max-width: 600px;
            margin: 0 auto;
        }

        .international-transfers form .form-group {
            margin-bottom: 20px;
        }

        .international-transfers form label {
            font-weight: bold;
        }

        .international-transfers form button {
            width: 100%;
        }

        @media (max-width: 768px) {
            .international-transfers .description {
                padding: 0 20px;
            }
        }
    </style>
</head>

<body>
    <?php include_once '../assets/componets/navbar.php'; ?>

    <!-- Hero Section -->
    <header class="hero bg-primary text-white text-center py-5">
        <div class="container">
            <h1 class="display-4">Schimb Valutar Profesional</h1>
            <p class="lead">Cursuri de schimb valutar competitive și servicii de încredere</p>
            <a href="#services" class="btn btn-light btn-lg mt-3">Află mai multe</a>
        </div>
    </header>

    <!-- Services Section -->
    <section id="services" class="py-5">
        <div class="container">
            <div class="row text-center">
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Schimb Valutar</h5>
                            <p class="card-text">Oferim cele mai bune cursuri de schimb pentru toate valutele majore.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Consultanță Financiară</h5>
                            <p class="card-text">Sfaturi și strategii pentru a maximiza beneficiile schimbului valutar.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Transferuri Internaționale</h5>
                            <p class="card-text">Transferuri rapide și sigure către orice destinație din lume.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Exchange Rates and Calculator Section -->
    <section id="rates-calculator" class="py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h2 class="text-center mb-4">Cursuri de Schimb Valutar</h2>
                    <div class="table-responsive exchange-rates-table">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Valută</th>
                                    <th>Curs de Cumpărare</th>
                                    <th>Curs de Vânzare</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><img src="../assets/img/european-union.png" alt="Steagul EU" class="flag-icon">
                                        EUR</td>
                                    <td>4.85</td>
                                    <td>4.87</td>
                                </tr>
                                <tr>
                                    <td><img src="../assets/img/united-states.png" alt="Steagul US" class="flag-icon">
                                        USD</td>
                                    <td>4.10</td>
                                    <td>4.12</td>
                                </tr>
                                <tr>
                                    <td><img src="../assets/img/united-kingdom.png" alt="Steagul UK" class="flag-icon">
                                        GBP</td>
                                    <td>5.60</td>
                                    <td>5.63</td>
                                </tr>
                                <!-- Adăugați mai multe rânduri după necesitate -->
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-lg-6">
                    <h2 class="text-center mb-4">Calculator Valutar</h2>
                    <div id="currency-calculator">
                        <form id="exchange-form">
                            <div class="form-group mb-3">
                                <label for="amount">Suma în RON</label>
                                <input type="number" class="form-control" id="amount" placeholder="Introduceți suma" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="currency">Selectați Valuta</label>
                                <select class="form-control" id="currency" required>
                                    <option value="EUR">EUR</option>
                                    <option value="USD">USD</option>
                                    <option value="GBP">GBP</option>
                                    <!-- Adăugați mai multe opțiuni după necesitate -->
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Calculează</button>
                        </form>
                        <div id="result" class="mt-4 text-center"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- International Transfers Section -->
    <section id="international-transfers" class="international-transfers">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="description">
                        <h2 class="text-center mb-4">Transferuri Internaționale</h2>
                        <p class="lead text-center">Transferuri rapide și sigure către orice
                            destinație din lume.</p>
                    </div>
                    <div class="form-container">
                        <form id="international-transfer-form">
                            <div class="form-group">
                                <label for="full-name">Nume complet</label>
                                <input type="text" class="form-control" id="full-name" placeholder="Introduceți numele complet" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" placeholder="Introduceți email-ul" required>
                            </div>
                            <div class="form-group">
                                <label for="phone">Număr de telefon</label>
                                <input type="tel" class="form-control" id="phone" placeholder="Introduceți numărul de telefon" required>
                            </div>
                            <div class="form-group">
                                <label for="destination">Destinația transferului</label>
                                <input type="text" class="form-control" id="destination" placeholder="Introduceți destinația transferului" required>
                            </div>
                            <div class="form-group">
                                <label for="amount-to-send">Suma de trimis (RON)</label>
                                <input type="number" class="form-control" id="amount-to-send" placeholder="Introduceți suma de trimis" required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Trimite Transferul</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="financial-consulting" class="py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="consulting-tips p-4">
                        <h3 class="mb-4">Consultanță Financiară</h3>
                        <ul class="mb-0">
                            <li>Monitorizați cursurile de schimb valutar și alegeți momentul optim pentru a efectua
                                tranzacții.</li>
                            <li>Diversificați portofoliul valutar pentru a reduce riscurile asociate fluctuațiilor de
                                curs.</li>
                            <li>Utilizați instrumente de hedging pentru a proteja împotriva volatilității cursului de
                                schimb.</li>
                            <li>Consultați-vă cu un expert financiar pentru a primi sfaturi personalizate în funcție de
                                nevoile dvs.</li>
                            <li>Fiți atenți la taxele și comisioanele asociate cu schimbul valutar și transferurile
                                internaționale.</li>
                            <li>Planificați din timp tranzacțiile valutare mari pentru a obține cele mai bune cursuri.
                            </li>
                            <li>Mențineți-vă informat cu privire la știrile economice globale care pot afecta cursurile
                                de schimb.</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="consulting-image">
                        <img src="../assets/img/house-money-key.jpeg" alt="Consultanță Financiară" class="img-fluid rounded shadow">
                    </div>
                </div>
            </div>
        </div>

    </section>

    <!-- Footer -->
    <?php include_once '../assets/componets/footer.php'; ?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        document.getElementById('exchange-form').addEventListener('submit', function(event) {
            event.preventDefault();

            const amount = parseFloat(document.getElementById('amount').value);
            const currency = document.getElementById('currency').value;

            // Cursurile de schimb
            const exchangeRates = {
                EUR: {
                    buy: 4.85,
                    sell: 4.87
                },
                USD: {
                    buy: 4.10,
                    sell: 4.12
                },
                GBP: {
                    buy: 5.60,
                    sell: 5.63
                }
            };

            if (exchangeRates[currency]) {
                const result = amount / exchangeRates[currency].sell;
                document.getElementById('result').innerText = `Suma în ${currency}: ${result.toFixed(2)}`;
            } else {
                document.getElementById('result').innerText = 'Valută necunoscută!';
            }
        });

        document.getElementById('international-transfer-form').addEventListener('submit', function(event) {
            event.preventDefault();

            const fullName = document.getElementById('full-name').value;
            const email = document.getElementById('email').value;
            const phone = document.getElementById('phone').value;
            const destination = document.getElementById('destination').value;
            const amountToSend = parseFloat(document.getElementById('amount-to-send').value);

            // Aici puteți adăuga logica pentru a trimite datele formularului către server sau alte operații necesare

            // Exemplu de afișare a datelor în consolă
            console.log(`Transfer internațional solicitat:
            Nume complet: ${fullName}
            Email: ${email}
            Telefon: ${phone}
            Destinație: ${destination}
            Suma de trimis: ${amountToSend} RON`);

            // Înlocuiți cu acțiunea dorită după trimiterea formularului (de ex. redirecționare, mesaj de succes etc.)
            alert('Formularul a fost trimis cu succes!');
        });
    </script>