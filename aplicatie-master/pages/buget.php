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

            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Cheltuială</th>
                        <th>Sumă (RON)</th>
                        <th>Categorie</th>
                        <th>Curs Valutar (RON -> EUR)</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody id="expenses-list">
                    <!-- Aici vor fi afișate cheltuielile adăugate -->
                </tbody>
            </table>
            <button class="btn btn-primary btn-add" onclick="addExpense()">Adaugă cheltuială</button>
        </div>

        <!-- Lista cu cheltuieli adăugate -->

        <div class="containesr mt-5">
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
                    <td><input type="text" class="form-control" placeholder="Descriere"></td>
                    <td><input type="number" class="form-control" placeholder="Sumă" oninput="convertToEUR(this)"></td>
                    <td>
                        <select class="form-control">
                            <option value="Mâncare">Mâncare</option>
                            <option value="Chirie">Chirie</option>
                            <option value="Transport">Transport</option>
                            <option value="Distracție">Distracție</option>
                            <option value="Altele">Altele</option>
                        </select>
                    </td>
                    <td id="currencyRate${expenseCount}">-</td>
                    <td><button class="btn btn-danger" onclick="removeExpense(this)">Șterge</button></td>
                </tr>
            `;
        document.getElementById('expenses-list').insertAdjacentHTML('beforeend', expenseRow);
    }

    async function convertToEUR(inputElement) {
        const row = inputElement.closest('tr');
        const amountRON = inputElement.value;
        const currencyCell = row.querySelector('td:nth-child(5)');

        try {
            const response = await fetch(`https://api.exchangeratesapi.io/latest?symbols=EUR&base=RON`, {
                headers: {
                    "apikey": "oQ4S68aJibIX1IdpAc3gN0PSYgD0n39G"
                }
            });
            const data = await response.json();
            console.log(data)

            const exchangeRate = data?.rates?.EUR;
            const amountEUR = (amountRON / exchangeRate).toFixed(2);

            currencyCell.textContent = `${exchangeRate.toFixed(4)} (1 RON = ${amountEUR} EUR)`;
        } catch (error) {
            console.error('Eroare la actualizarea cursului valutar:', error);
            currencyCell.textContent = 'N/A';
        }
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

    function addToList() {
        const addedExpensesList = document.getElementById('added-expenses');
        addedExpensesList.innerHTML = ''; // Clear existing list

        const expenseRows = document.querySelectorAll('#expenses-list tr');
        expenseRows.forEach(row => {
            const description = row.querySelector('td:nth-child(2) input').value;
            const amountRON = row.querySelector('td:nth-child(3) input').value;
            const category = row.querySelector('td:nth-child(4) select').value;
            const amountEUR = row.querySelector('td:nth-child(5)').textContent.split(' ')[
                6]; // Extract EUR amount

            const listItem = document.createElement('li');
            listItem.textContent =
                `Descriere: ${description}, Sumă (RON): ${amountRON}, Categorie: ${category}, Sumă (EUR): ${amountEUR}`;
            addedExpensesList.appendChild(listItem);
        });
    }
    </script>
</body>

</html>