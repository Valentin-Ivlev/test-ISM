<?php

namespace Project\Config;

use PDO;

class Database {
    public static function getConnection() {
        $host = 'localhost';
        $port = '3306';
        $dbname = 'finance-db';
        $username = 'root';
        $password = 'root';

        try {
            $pdo = new PDO("mysql:host=$host;port=$port;dbname=$dbname;charset=utf8", $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $e) {
            die('Database connection failed: ' . $e->getMessage());
        }
    }
}