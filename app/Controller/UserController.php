<?php

namespace App\Controller;

use App\Services\UserService;

class UserController
{
    private UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function register()
    {
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $fullname = trim(htmlspecialchars($_POST['firstname'])).' '.trim(htmlspecialchars($_POST['lastname']));
            $email = trim(htmlspecialchars($_POST['email']));
            $password = trim(htmlspecialchars($_POST['password']));
            $this->userService->register($fullname,$email,$password);
            header("Location: /Money-Wise_1.0/Home/index");
            exit;
        }
    }

    public function login()
    {
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = trim(htmlspecialchars($_POST['email']));
            $password = trim(htmlspecialchars($_POST['password']));
            $user = $this->userService->login($email,$password);
            if(isset($user)) {
                $_SESSION['userID'] = $user->getId();
                $_SESSION['userEMAIL'] = $user->getEmail();
                $_SESSION['userNAME'] = $user->getNAME();
                header("Location: /Money-Wise_1.0/Home/home");
                exit;
            } else {
                throw new Exception("Email Or Password invalid !!");
            }
        }
    }
}