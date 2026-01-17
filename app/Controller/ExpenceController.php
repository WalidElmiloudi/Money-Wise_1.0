<?php

namespace App\Controller;

use App\Services\ExpenceService;
use App\Model\Expence;

class ExpenceController
{
    private ExpenceService $expenceService;

    public function __construct(ExpenceService $expenceService)
    {
        $this->expenceService = $expenceService;
    }

    public function index(): void
    {
        $userID = $_SESSION['userID'];
        $expences = $this->expenceService->getAllByUser($userID);

        require_once '../app/View/pages/expences.php';
    }

    public function save(): void
    {
        $userID = $_SESSION['userID'];
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
          $amount      = trim(htmlspecialchars($_POST['amount']));
          $category    = trim(htmlspecialchars($_POST['category']));
          $description = trim(htmlspecialchars($_POST['description']));
          $expence = new Expence($userID,$amount,$category,$description);
          $saved = $this->expenceService->save($expence);
          if($saved) {
            header("Location: /Money-Wise_1.0/expence/index");
            exit;
          } else {
            throw new \Exception("[ERROR] : Failed to save expence");
          }
        }
    }

    public function delete(int $expenceId): void
    {
        $deleted = $this->expenceService->delete($expenceId);
        if($deleted) {
            header("Location: /Money-Wise_1.0/expence/index/");
            exit;
        } else {
            throw new \Exception("[ERROR] : Failed to delete expence");
        }
    }

    public function update(int $expenceId): void
    {
        $userID = $_SESSION['userID'];
        $amount      = trim(htmlspecialchars($_POST['amount']));
        $category    = trim(htmlspecialchars($_POST['category']));
        $description = trim(htmlspecialchars($_POST['description']));
        $expence = new Expence($userID,$amount,$category,$description);
        $updated = $this->expenceService->update($expenceId,$expence);
        if($updated) {
            header("Location: /Money-Wise_1.0/expence/index/");
            exit;
        } else {
            throw new \Exception("[ERROR] : Failed to update expence");
        }
    }
}