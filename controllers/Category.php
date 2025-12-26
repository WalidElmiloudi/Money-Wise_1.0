<?php

require_once 'Database.php';

class Category
{
    private $table_name;
    private $user_id;

    function __construct($table_name,$user_id)
    {
        $this->table_name = $table_name;
        $this->user_id = $user_id;
    }

    public function getByCategoryDate($pdo,$condition)
    {
        $stmt = $pdo->query("SELECT * FROM $this->table_name t WHERE t.userID = $this->user_id $condition");
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }

}

?>