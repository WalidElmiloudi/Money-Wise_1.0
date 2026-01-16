<?php

namespace App\Repositories;

class UserRepository
{
    private \PDO $pdo;

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function findByEmail(string $email): ?array
    {
         $stmt = $this->pdo->prepare("SELECT * FROM \"user\" WHERE email = :email");
         $stmt->execute([ ':email' => $email]);
         $user = $stmt->fetch(\PDO::FETCH_ASSOC);
         return $user ?: null;
    }

    public function register(string $name,string $email,string $password): bool
    {
        $stmt = $this->pdo->prepare("INSERT INTO \"user\" (name,email,password) VALUES (:name,:email,:password)");
        $stmt->execute([
            ':name'     => $name,
            ':email'    => $email,
            ':password' => $password
        ]);

        return true;
    }

}