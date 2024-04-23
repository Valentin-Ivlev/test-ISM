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
                SUM(CASE WHEN user_accounts.user_id = :userId THEN amount ELSE 0 END) as income,
                SUM(CASE WHEN user_accounts.user_id = :userId THEN 0 ELSE amount END) as expense
            FROM transactions
            JOIN user_accounts ON transactions.account_to = user_accounts.id
            WHERE user_accounts.user_id = :userId
            GROUP BY YEAR(trdate), MONTH(trdate)
            ORDER BY year, month";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['userId' => $userId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}