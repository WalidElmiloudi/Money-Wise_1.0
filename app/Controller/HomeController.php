<?php

namespace App\Controller;

use App\Core\Controller;

class HomeController extends Controller
{
    public function index(): void
    {
        $this->view('index');
    }

    public function home(): void
    {
        $this->view('pages/home');
    }

    public function dashboard(): void
    {
        $this->view('pages/dashboard');
    }
}