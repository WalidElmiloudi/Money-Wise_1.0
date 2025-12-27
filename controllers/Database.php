<?php

namespace Controllers;

use PDO;

final class Database
{
    private static $instance = null;

    private function __construct(){}
  
    public static function getInstance()
    {
        if(self::$instance === null)
        {
            try
            {
             self::$instance = new PDO
                                   (
                                      "mysql:host=localhost;dbname=money_wallet",
                                      "root",
                                      "",
                                       [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
                                   );
            }
            catch (PDOException $e)
            {
                error_log($e->getMessage());
                die("Connection to database failed !");
            }
        }
        return self::$instance;
    }
}

?>