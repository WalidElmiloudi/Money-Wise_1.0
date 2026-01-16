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

    public function income(): void
    {
        $this->view('pages/incomes');
    }

    public function expence(): void
    {
        $this->view('pages/expences');
    }
}