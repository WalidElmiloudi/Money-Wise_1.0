<?php

namespace App\Core;

use App\Services\UserService;
use App\Services\IncomeService;
use App\Services\ExpenceService;
use App\Services\DashboardService;

use App\Repositories\UserRepository;
use App\Repositories\IncomeRepository;
use App\Repositories\ExpenceRepository;

class ControllerFactory
{
    public static function make(string $className)
    {
        $pdo = Database::getInstance();

        switch($className) {
            case 'App\Controller\UserController' : return new $className(
                                                   new UserService(
                                                           new UserRepository($pdo)
                                                       )
                                               );
                                    break;
            case 'App\Controller\IncomeController' : return new $className(
                                                   new IncomeService(
                                                           new IncomeRepository($pdo)
                                                       )
                                               );
                                    break;
            case 'App\Controller\ExpenceController' : return new $className(
                                                   new ExpenceService(
                                                           new ExpenceRepository($pdo)
                                                       )
                                               );
                                    break;
            case 'App\Controller\DashboardController' : return new $className(
                                                   new DashboardService(
                                                           new IncomeRepository($pdo),new ExpenceRepository($pdo),
                                                       )
                                               );
                                    break;
            case 'App\Controller\HomeController' : return new $className();
                                    break;
        }
    }
}