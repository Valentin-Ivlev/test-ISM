<?php

namespace Project\Repository;

use PDO;

class UserRepository {
    private $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    public function getUsersWithTransactions() {
        $sql = "SELECT DISTINCT users.id, users.name
                FROM users
                JOIN user_accounts ON users.id = user_accounts.user_id
                JOIN transactions ON transactions.account_from = user_accounts.id OR transactions.account_to = user_accounts.id";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}