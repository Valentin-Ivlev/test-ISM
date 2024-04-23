<?php

namespace Project\Repository;

use PDO;

class TransactionRepository {
    private $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    public function getMonthlyBalanceByUserId($userId) {
        $sql = "SELECT YEAR(trdate) as year, MONTH(trdate) as month,
            SUM(CASE WHEN transactions.account_to IN (SELECT id FROM user_accounts WHERE user_id = :userId) THEN amount ELSE 0 END) as income,
            SUM(CASE WHEN transactions.account_from IN (SELECT id FROM user_accounts WHERE user_id = :userId) THEN amount ELSE 0 END) as expense
            FROM transactions
            GROUP BY YEAR(trdate), MONTH(trdate)
            ORDER BY year, month";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['userId' => $userId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}