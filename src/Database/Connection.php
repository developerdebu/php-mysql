<?php
namespace Pauld\PhpMvc\Database;

use PDO;
use PDOException;

class Connection
{
    private static ?PDO $pdo = null;

    public static function get(): PDO
    {
        if (self::$pdo === null) {
            try {
                $host = "db";         // from your docker-compose/ddev
                $dbname = "db";       // your database name
                $username = "db";     // your DB user
                $password = "db";     // your DB password

                self::$pdo = new PDO(
                    "mysql:host=$host;dbname=$dbname;charset=utf8mb4",
                    $username,
                    $password,
                    [
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    ]
                );
            } catch (PDOException $e) {
                die("DB Connection failed: " . $e->getMessage());
            }
        }

        return self::$pdo;
    }
}
