<?php

namespace App\framework\database;

use PDO;
use PDOException;

class Connection
{
    private static $connection =  null;

    public static function getConnection()
    {
        if (empty(self::$connection)) {
            self::$connection = new PDO("mysql:host={$_ENV['DATABASE_HOST']};dbname={$_ENV['DATABASE_NAME']}", $_ENV['DATABASE_USER'], $_ENV['DATABASE_PASS'], [
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
            ]);
        } else {
            throw new PDOException("Connection is already open somewhere", 1);
        }

        return self::$connection;
    }
}
