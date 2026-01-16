<?php

session_start();

require_once '../vendor/autoload.php';

use App\Core\Router;
use App\Core\Database;

$router = new Router();