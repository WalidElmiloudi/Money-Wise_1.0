<?php

namespace App\Core;

use PDO;

final class Database
{
    private static ?PDO $instance = null;

    private function __construct(){}
  
    public static function getInstance(): ?PDO
    {
        if(self::$instance === null)
        {
            try
            {
                $config = require '../app/Config/config.php';
                self::$instance = new PDO
                                   (
                                      "{$config['PDO_driver']}:host={$config['host']};port={$config['port']};dbname={$config['dbname']}",
                                      "{$config['username']}",
                                      "{$config['password']}",
                                       [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
                                   );
            }
            catch (PDOException $e)
            {
                die("[PDO CONNECTION ERROR] : ".$e->getMessage());
            }
        }
        return self::$instance;
    }
}