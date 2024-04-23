async function loadUsers() {
    const response = await fetch('api.php?action=getUsers');
    const users = await response.json();
    const select = document.getElementById('userSelect');
    users.forEach(user => {
        const option = document.createElement('option');
        option.value = user.id;
        option.textContent = user.name;
        select.appendChild(option);
    });
}

async function loadMonthlyBalance() {
    const userId = document.getElementById('userSelect').value;
    const response = await fetch(`api.php?action=getBalance&userId=${userId}`);
    const balances = await response.json();
    const tbody = document.getElementById('balanceTable').getElementsByTagName('tbody')[0];
    tbody.innerHTML = '';
    balances.forEach(balance => {
        const date = new Date(balance.year, balance.month - 1);
        const month = date.toLocaleString('ru', { month: 'long' });
        const row = `<tr><td>${month} ${balance.year}</td><td>${balance.income - balance.expense}</td></tr>`;
        tbody.insertAdjacentHTML('beforeend', row);
    });
}