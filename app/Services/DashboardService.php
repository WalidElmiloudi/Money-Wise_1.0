<?php

namespace App\Services;

use App\Repositories\IncomeRepository;
use App\Repositories\ExpenceRepository;

class DashboardService
{
    private IncomeRepository  $incomeRepo;
    private ExpenceRepository $expenceRepo;

    public function __construct(IncomeRepository  $incomeRepo,ExpenceRepository $expenceRepo)
    {
        $this->incomeRepo = $incomeRepo;
        $this->expenceRepo = $expenceRepo;
    }

    public function getTotalIncomes(int $userId): float
    {
        $totalIncomes = $this->incomeRepo->getTotalIncomes($userId);
        return $totalIncomes;
    }

    public function getTotalExpences(int $userId): float
    {
        $totalExpences = $this->expenceRepo->getTotalExpences($userId);
        return $totalExpences;
    }

    public function getMonthIncomes(int $userId): float
    {
        $monthIncomes = $this->incomeRepo->getMonthIncomes($userId);
        return $monthIncomes;
    }

    public function getMonthExpences(int $userId): float
    {
        $monthExpences = $this->expenceRepo->getMonthExpences($userId);
        return $monthExpences;
    }

    public function getTotalByCategory(string $table_name,string $category,int $userId): float
    {
        switch($table_name) {
            case 'income'  :  $categoryTotal = $this->incomeRepo->getCategoryTotal($category,$userId);
                              break;
            case 'expence'  : $categoryTotal = $this->expenceRepo->getCategoryTotal($category,$userId);
                              break;
        }

        return $categoryTotal;
    }
}