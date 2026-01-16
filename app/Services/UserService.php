<?php

namespace App\Services;

use App\Repositories\UserRepository;
use App\Model\User;

class UserService
{
    private UserRepository $userRepo;

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    public function register(string $name,string $email,string $password): void
    {
        $user = $this->userRepo->findByEmail($email);

        if(!isset($user)) {
            $hashedPassword = $this->hashPassword($password);
            $this->userRepo->register($name,$email,$hashedPassword);
        } else {
            throw new \Exception("Email Already exists !!");
        }
    }
    
    public function login(string $email,string $password): ?User
    {
        $user = $this->userRepo->findByEmail($email);
        if(isset($user) && password_verify($password,$user['password'])) {
            return new User($user['id'],$user['name'],$user['email']);
        }
        return null;
    }

    public function hashPassword(string $password): string
    {
        return password_hash($password,PASSWORD_DEFAULT);
    }
}