<?php

namespace Config\Database;

abstract class Connection
{
    private static $dsn = 'mysql:dbname=api-v3;host=localhost';
    private static $db_user = 'root';
    private static $db_password = '';
    private static $db_attributes = [
        \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
        \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_OBJ,
        \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET CHARACTER SET UTF8'
    ];
    private static $pdo;

    protected function getPDO(): \PDO
    {
        try {
            if (is_null(self::$pdo)) {
                self::$pdo = new \PDO(self::$dsn, self::$db_user, self::$db_password, self::$db_attributes);
            }
            return self::$pdo;
        } catch (\PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
        }
    }
}