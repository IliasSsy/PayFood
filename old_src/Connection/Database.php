<?php
declare(strict_types=1);

namespace App\Connection;

use PDO;
use PDOException;

require __DIR__ . '/../../config.php';

class Database
{
    private static ?PDO $connection = null;

    public static function connectDatabase(): PDO
    {
        if (!is_null(self::$connection)) {
            return self::$connection;
        }

        $params = self::getConnectionParams();

        $dsn = 'mysql:host=' . $params['host']
            . ';dbname=' . $params['name']
            . ';charset=utf8mb4';

        try {
            self::$connection = new PDO(
                $dsn,
                $params['user'],
                $params['password'],
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES => false,
                    PDO::ATTR_STRINGIFY_FETCHES => false,
                ]
            );
        } catch (PDOException $e) {
            throw new PDOException('Error: ' . $e->getMessage());
        }

        return self::$connection;
    }

    private static function getConnectionParams(): array
    {
        return [
            'host' => DB_HOST,
            'name' => DB_NAME,
            'user' => DB_USER,
            'password' => DB_PASS,
        ];
    }
}