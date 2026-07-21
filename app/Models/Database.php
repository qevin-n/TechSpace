<?php

namespace App\Models;

use PDO;
use PDOException;

class Database
{
    private static $host = "localhost";
    private static $dbname = "techspace";
    private static $username = "root";
    private static $password = "";

    private static $connection = null;

    public static function connect()
    {
        if (self::$connection === null) {

            try {

                self::$connection = new PDO(
                    "mysql:host=" . self::$host . ";dbname=" . self::$dbname . ";charset=utf8mb4",
                    self::$username,
                    self::$password
                );

                self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

            } catch (PDOException $e) {

                die("Database Connection Failed: " . $e->getMessage());

            }
        }

        return self::$connection;
    }
}