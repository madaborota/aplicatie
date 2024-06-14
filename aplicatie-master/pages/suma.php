<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestionare Cheltuieli</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .expense-form {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .expense-item {
            padding: 10px 20px;
            border-bottom: 1px solid #ddd;
        }

        .expense-category {
            font-weight: bold;
            padding: 10px 0;
        }

        .total-category {
            font-style: italic;
            padding: 10px 20px;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
    </style>
</head>

<body>
    <?php
    include_once '../assets/componets/navbar.php'
    ?>

    <section class="hero bg-primary text-white text-center py-5">
        <br>
        <br>
        <div class="container">
            <h2 class="display-4">Gestionare Cheltuieli</h2>
            <p class="lead">Gestionează eficient cheltuielile personale cu ajutorul nostru. <br> Monitorizează și
                analizează bugetul tău personal, creează rapoarte detaliate și planifică mai eficient.</p>
        </div>
    </section>
    <section id="expense-management" class="py-5">
        <div class="container">
            <div class="expense-form mb-4">
                <div class="form-group">
                    <label for="expense-category">Categorie:</label>
                    <input type="text" class="form-control" id="expense-category" placeholder="Ex: Mâncare">
                </div>
                <div class="form-group">
                    <label for="expense-amount">Sumă:</label>
                    <input type="number" class="form-control" id="expense-amount" placeholder="Ex: 100">
                </div>
                <button class="btn btn-primary" onclick="addExpense()">Adaugă Cheltuială</button>
            </div>
            <div id="expense-list" class="expense-list">
                <h4>Cheltuieli:</h4>
            </div>
        </div>
    </section>

    <section id="expense-statistics" class="py-5">
        <div class="container">
            <h3 class="mb-4 text-center">Statistici Cheltuieli</h3>
            <canvas id="expenseChart" width="400" height="200"></canvas>
            <div id="expense-summary" class="mt-4">
                <!-- Statistici cheltuieli -->
            </div>
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        let expenses = {};
        let expenseChart;

        function addExpense() {
            const category = document.getElementById('expense-category').value;
            const amount = parseFloat(document.getElementById('expense-amount').value);
            if (!category || isNaN(amount)) {
                alert("Te rugăm să completezi toate câmpurile.");
                return;
            }

            if (!expenses[category]) {
                expenses[category] = [];
            }
            expenses[category].push(amount);
            document.getElementById('expense-category').value = '';
            document.getElementById('expense-amount').value = '';
            displayExpenses();
            updateChart();
            displayStatistics();
        }

        function displayExpenses() {
            const expenseList = document.getElementById('expense-list');
            expenseList.innerHTML = '<h4>Cheltuieli:</h4>';

            for (const category in expenses) {
                const categoryDiv = document.createElement('div');
                categoryDiv.classList.add('expense-category');
                categoryDiv.textContent = category;
                expenseList.appendChild(categoryDiv);

                let categoryTotal = 0;
                expenses[category].forEach(amount => {
                    const expenseItem = document.createElement('div');
                    expenseItem.classList.add('expense-item');
                    expenseItem.textContent = `Sumă: ${amount} RON`;
                    categoryDiv.appendChild(expenseItem);
                    categoryTotal += amount;
                });

                const totalCategory = document.createElement('div');
                totalCategory.classList.add('total-category');
                totalCategory.textContent = `Total pentru ${category}: ${categoryTotal} RON`;
                categoryDiv.appendChild(totalCategory);
            }
        }

        function updateChart() {
            const ctx = document.getElementById('expenseChart').getContext('2d');
            const labels = Object.keys(expenses);
            const data = labels.map(category => {
                return expenses[category].reduce((total, amount) => total + amount, 0);
            });

            if (expenseChart) {
                expenseChart.data.labels = labels;
                expenseChart.data.datasets[0].data = data;
                expenseChart.update();
            } else {
                expenseChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Cheltuieli',
                            data: data,
                            backgroundColor: 'rgba(0, 123, 255, 0.5)',
                            borderColor: 'rgba(0, 123, 255, 1)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            }
        }

        function displayStatistics() {
            const expenseSummary = document.getElementById('expense-summary');
            expenseSummary.innerHTML = '<h4>Rezumat Cheltuieli:</h4>';

            let totalExpenses = 0;
            let maxExpense = 0;
            let maxCategory = '';

            for (const category in expenses) {
                const categoryTotal = expenses[category].reduce((total, amount) => total + amount, 0);
                totalExpenses += categoryTotal;
                if (categoryTotal > maxExpense) {
                    maxExpense = categoryTotal;
                    maxCategory = category;
                }
            }

            const totalDiv = document.createElement('div');
            totalDiv.textContent = `Total cheltuieli: ${totalExpenses} RON`;
            expenseSummary.appendChild(totalDiv);

            const maxDiv = document.createElement('div');
            maxDiv.textContent = `Categoria cu cele mai mari cheltuieli: ${maxCategory} (${maxExpense} RON)`;
            expenseSummary.appendChild(maxDiv);
        }
    </script>
</body>
<?php
include_once '../assets/componets/footer.php'
?>


</html>