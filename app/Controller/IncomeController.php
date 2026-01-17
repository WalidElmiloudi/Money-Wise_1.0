<?php

namespace App\Controller;

use App\Services\IncomeService;
use App\Model\Income;

class IncomeController
{
    private IncomeService $incomeService;

    public function __construct(IncomeService $incomeService)
    {
        $this->incomeService = $incomeService;
    }

    public function index(): void
    {
        $userID = $_SESSION['userID'];
        $incomes = $this->incomeService->getAllByUser($userID);

        require_once '../app/View/pages/incomes.php';
    }

    public function save(): void
    {
        $userID = $_SESSION['userID'];
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
          $amount      = trim(htmlspecialchars($_POST['amount']));
          $category    = trim(htmlspecialchars($_POST['category']));
          $description = trim(htmlspecialchars($_POST['description']));
          $income = new Income($userID,$amount,$category,$description);
          $saved = $this->incomeService->save($income);
          if($saved) {
            header("Location: /Money-Wise_1.0/income/index");
            exit;
          } else {
            throw new \Exception("[ERROR] : Failed to save Income");
          }
        }
    }

    public function delete(int $incomeId): void
    {
        $deleted = $this->incomeService->delete($incomeId);
        if($deleted) {
            header("Location: /Money-Wise_1.0/income/index/");
            exit;
        } else {
            throw new \Exception("[ERROR] : Failed to delete Income");
        }
    }

    public function update(int $incomeId): void
    {
        $userID = $_SESSION['userID'];
        $amount      = trim(htmlspecialchars($_POST['amount']));
        $category    = trim(htmlspecialchars($_POST['category']));
        $description = trim(htmlspecialchars($_POST['description']));
        $income = new Income($userID,$amount,$category,$description);
        $updated = $this->incomeService->update($incomeId,$income);
        if($updated) {
            header("Location: /Money-Wise_1.0/income/index/");
            exit;
        } else {
            throw new \Exception("[ERROR] : Failed to update Income");
        }
    }
}