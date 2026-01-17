<?php

namespace App\Repositories;

class IncomeRepository
{
    private \PDO $pdo;

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getAllByUser(int $userID): array
    {
        $stmt = $this->pdo->query("SELECT * FROM income WHERE userid = $userID");
        $results = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $results;
    }

    public function save(float $amount,string $description,string $category,int $userId): bool
    {
        $stmt = $this->pdo->prepare("INSERT INTO income (montant,description,category,userid) VALUES (:montant,:description,:category,:userid)");
        return $stmt->execute([
                                  ':montant'      => $amount,
                                  ':description'  => $description,
                                  ':category'     => $category,
                                  ':userid'       => $userId
                              ]);
    }

    public function delete(int $id): bool
    {
        $stmt = $this->pdo->prepare("DELETE FROM income WHERE id = :id");
        return $stmt->execute([':id' => $id]);
    }

    public function update(int $id,float $amount,string $description,string $category): bool
    {
        $stmt = $this->pdo->prepare("UPDATE income SET montant = :montant,description = :description,category = :category 
                                     WHERE id = :id");
        return $stmt->execute([
                                  ':montant'      => $amount,
                                  ':description'  => $description,
                                  ':category'     => $category,
                                  ':id'           => $id
                              ]);
    }

    public function getTotalIncomes(int $userId): float
    {
        $stmt = $this->pdo->query("SELECT SUM(montant) as total FROM income WHERE userid = $userId");
        $result = $stmt->fetch(\PDO::FETCH_ASSOC);
        return $result['total'];
    }

    public function getMonthIncomes(int $userId): float
    {
        $stmt = $this->pdo->query("SELECT SUM(montant) as total FROM income 
                                   WHERE userid = $userId 
                                   AND EXTRACT(MONTH FROM date) = EXTRACT(MONTH FROM CURRENT_DATE) 
                                   AND EXTRACT(YEAR FROM date) = EXTRACT(YEAR FROM CURRENT_DATE)");
        $result = $stmt->fetch(\PDO::FETCH_ASSOC);
        return $result['total'];
    }

    public function getCategoryTotal(string $category,int $userId): float
    {
        $stmt = $this->pdo->query("SELECT SUM(montant) as total FROM income
                                   WHERE category = '$category'");
        $result = $stmt->fetch(\PDO::FETCH_ASSOC);
        return $result['total'];                          
    }
}