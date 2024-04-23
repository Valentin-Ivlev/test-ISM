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

$action = $_GET['action'] ?? '';

switch ($action) {
    case 'getUsers':
        $users = $userController->getUsers();
        echo json_encode($users);
        break;
    case 'getBalance':
        $userId = $_GET['userId'] ?? 0;
        $balances = $userController->getMonthlyBalance($userId);
        echo json_encode($balances);
        break;
    default:
        echo json_encode(['error' => 'Unknown action']);
}