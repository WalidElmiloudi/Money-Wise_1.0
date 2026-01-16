<?php

namespace App\Model;

use App\Core\Database;
use PDO;

class Category
{
    private $table_name;
    private $user_id;
    private $pdo;

    function __construct($table_name,$user_id)
    {
        $this->table_name = $table_name;
        $this->user_id = $user_id;
        $this->pdo = Database::getInstance();
    }

    public function getByCategoryDate($condition)
    {
        $stmt = $this->pdo->query("SELECT * FROM $this->table_name t WHERE t.userID = $this->user_id $condition");
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }

}

?>