<?php

namespace App\Controller;

use App\Services\DashboardService;

class DashboardController
{
    private DashboardService $dashboardService;

    public function __construct(DashboardService $dashboardService)
    {
        $this->dashboardService = $dashboardService;
    }

    public function index(): void
    {
        $userId = $_SESSION['userID'];
        $totalIncomes = $this->dashboardService->getTotalIncomes($userId);
        $totalExpences = $this->dashboardService->getTotalExpences($userId);
        if(($totalIncomes-$totalExpences) >= 0) {
            $balance = $totalIncomes - $totalExpences;
        } else {
            $balance = 0 ;
        }
        $monthIncomes = $this->dashboardService->getMonthIncomes($userId);
        $monthExpences = $this->dashboardService->getMonthExpences($userId);

        require_once '../app/View/pages/dashboard.php';
    }

    public function getCategoryTotal(): void
    {
         $userId = $_SESSION['userID'];
         if($_SERVER['REQUEST_METHOD'] == 'POST') {
              $table_name = htmlspecialchars(trim($_POST['type']));
              if(isset($_POST['category'])) {
                  $category = htmlspecialchars(trim($_POST['category']));
              }
              if($table_name !== 'none') {
                  $total = $this->dashboardService->getTotalByCategory($table_name,$category,$userId);
                  header('Content-Type: application/json');
                  echo json_encode(['total'=> $total]);
              } else {
                  $total = 0;
                  header('Content-Type: application/json');
                  echo json_encode(['total'=> $total]);
              }
         }
    }
}