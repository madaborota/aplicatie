<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calcul Buget Personal</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <?php include_once '../assets/componets/navbar.php'; ?>
    <section class="hero bg-primary text-white text-center py-5">
        <br>
        <br>
        <div class="container">
            <h1 class="display-4">Calcul Buget Personal</h1>
            <p class="lead">Simplificați-vă viața financiară cu serviciile noastre complete de gestionare a
                bugetului și de schimb valutar.</p>
        </div>
    </section>
    <section id="budget-calculator" class="py-5">
        <div class="container">
            <form action="../includes/buget.inc.php" method="POST" id="expenses-form">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Cheltuială</th>
                            <th>Sumă (RON)</th>
                            <th>Categorie</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody id="expenses-list">
                        <!-- Aici vor fi afișate cheltuielile adăugate -->
                    </tbody>
                </table>
                <button type="button" class="btn btn-primary btn-add" onclick="addExpense()">Adaugă cheltuială</button>
                <button type="submit" class="btn btn-success">Trimite cheltuielile</button>
            </form>
        </div>

        <!-- Lista cu cheltuieli adăugate -->

        <div class="container mt-5">
            <h2>Lista cheltuielilor adăugate</h2>
            <ul id="added-expenses"></ul>
        </div>
    </section>

    <?php include_once '../assets/componets/footer.php'; ?>

    <script>
        let expenseCount = 0;

        function addExpense() {
            expenseCount++;
            const expenseRow = `
                <tr>
                    <td>${expenseCount}</td>
                    <td><input type="text" class="form-control" name="descriere[]" placeholder="Descriere"></td>
                    <td><input type="number" class="form-control" name="suma[]" placeholder="Sumă"></td>
                    <td>
                        <select class="form-control" name="categorie[]">
                            <option value="Mâncare">Mâncare</option>
                            <option value="Chirie">Chirie</option>
                            <option value="Transport">Transport</option>
                            <option value="Distracție">Distracție</option>
                            <option value="Altele">Altele</option>
                        </select>
                    </td>
                    <td>
                        <button type="button" class="btn btn-primary" onclick="addToList(this)">Adaugă la listă</button>
                        <button type="button" class="btn btn-danger" onclick="removeExpense(this)">Șterge</button>
                    </td>
                </tr>
            `;
            document.getElementById('expenses-list').insertAdjacentHTML('beforeend', expenseRow);
        }

        function removeExpense(button) {
            button.closest('tr').remove();
            expenseCount--;
            updateExpenseNumbers();
        }

        function updateExpenseNumbers() {
            const expenseRows = document.querySelectorAll('#expenses-list tr');
            let count = 1;
            expenseRows.forEach(row => {
                row.cells[0].textContent = count;
                count++;
            });
        }

        function addToList(button) {
            const row = button.closest('tr');
            const description = row.querySelector('td:nth-child(2) input').value;
            const amountRON = row.querySelector('td:nth-child(3) input').value;
            const category = row.querySelector('td:nth-child(4) select').value;

            const addedExpensesList = document.getElementById('added-expenses');
            const listItem = document.createElement('li');
            listItem.textContent =
                `Descriere: ${description}, Sumă (RON): ${amountRON}, Categorie: ${category}`;
            addedExpensesList.appendChild(listItem);
        }
    </script>
</body>

</html>