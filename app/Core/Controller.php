<?php

namespace App\Core;

class Controller
{
    public function view(string $view): void
    {
        if(file_exists('../app/View/'.$view.'.php')) {
            require_once '../app/View/'.$view.'.php';
        } else {
            die("View : ".$view."doesn't exists !");
        }
    }
}