<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Calcul Buget Personal</title>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

<?php include_once '../assets/componets/navbar.php'; ?>
<section id="budget-calculator" class="py-5">
    <div class="container">
        <h1 class="text-center mb-4">Calcul Buget Personal</h1>
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
        <button class="btn btn-primary btn-add" onclick="addExpense()">Adaugă cheltuială</button>
    </div>
</section>


<script>
    let expenseCount = 0;

    function addExpense() {
        expenseCount++;
        const expenseRow = `
            <tr>
                <td>${expenseCount}</td>
                <td><input type="text" class="form-control" placeholder="Descriere"></td>
                <td><input type="number" class="form-control" placeholder="Sumă"></td>
                <td>
                    <select class="form-control">
                        <option value="Mâncare">Mâncare</option>
                        <option value="Chirie">Chirie</option>
                        <option value="Transport">Transport</option>
                        <option value="Distracție">Distracție</option>
                        <option value="Altele">Altele</option>
                    </select>
                </td>
                <td><button class="btn btn-danger" onclick="removeExpense(this)">Șterge</button></td>
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
</script>