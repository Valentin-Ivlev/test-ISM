<?php

namespace Project\Controller;

use Project\Repository\UserRepository;
use Project\Repository\TransactionRepository;

class UserController {
    private $userRepository;
    private $transactionRepository;

    public function __construct(UserRepository $userRepository, TransactionRepository $transactionRepository) {
        $this->userRepository = $userRepository;
        $this->transactionRepository = $transactionRepository;
    }

    public function getUsers() {
        return $this->userRepository->getUsersWithTransactions();
    }

    public function getMonthlyBalance($userId) {
        return $this->transactionRepository->getMonthlyBalanceByUserId($userId);
    }
}