<?php

require_once '../vendor/autoload.php';

use Project\Controller\UserController;
use Project\Repository\UserRepository;
use Project\Repository\TransactionRepository;
use Project\Config\Database;

$pdo = Database::getConnection();

$userRepo = new UserRepository($pdo);
$transactionRepo = new TransactionRepository($pdo);

$userController = new UserController($userRepo, $transactionRepo);

?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Месячный баланс пользователей</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="script.js"></script>
</head>
<body>
<div class="container mt-5">
    <div class="row">
        <div class="col-3">
            <select class="form-select" id="userSelect" onchange="loadMonthlyBalance()">
                <option value="">Выберите пользователя</option>
            </select>
        </div>
        <div class="col-8">
            <table class="table table-hover" id="balanceTable">
                <thead>
                <tr>
                    <th>Месяц</th>
                    <th>Баланс</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        loadUsers();
    });
</script>
</body>
</html>