<?php

namespace App\Services;

use App\Model\Income;
use App\Repositories\IncomeRepository;

class IncomeService
{
    private IncomeRepository $incomeRepo;

    public function __construct(IncomeRepository $incomeRepo)
    {
        $this->incomeRepo = $incomeRepo;
    }

    public function getAllByUser(int $userID): array
    {
        $results = $this->incomeRepo->getAllByUser($userID);
        return $results;    
    }

    public function save(Income $income): bool
    {
        $amount = $income->getAmount();
        $description = $income->getDescription();
        $category = $income->getCategory();
        $userId = $income->getUserId();

        $result = $this->incomeRepo->save($amount,$description,$category,$userId);
        return $result;
    }

    public function delete(int $incomeId): bool
    {
        $result = $this->incomeRepo->delete($incomeId);
        return $result;
    }

    public function update(int $incomeId,Income $income): bool
    {
        $amount = $income->getAmount();
        $description = $income->getDescription();
        $category = $income->getCategory();

        $result = $this->incomeRepo->update($incomeId,$amount,$description,$category);
        return $result;
    }
}