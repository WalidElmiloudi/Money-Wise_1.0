<?php

namespace App\Services;

use App\Model\Expence;
use App\Repositories\ExpenceRepository;

class ExpenceService
{
    private ExpenceRepository $expenceRepo;

    public function __construct(ExpenceRepository $expenceRepo)
    {
        $this->expenceRepo = $expenceRepo;
    }

    public function getAllByUser(int $userID): array
    {
        $results = $this->expenceRepo->getAllByUser($userID);
        return $results;    
    }

    public function save(Expence $expence): bool
    {
        $amount = $expence->getAmount();
        $description = $expence->getDescription();
        $category = $expence->getCategory();
        $userId = $expence->getUserId();

        $result = $this->expenceRepo->save($amount,$description,$category,$userId);
        return $result;
    }

    public function delete(int $expenceId): bool
    {
        $result = $this->expenceRepo->delete($expenceId);
        return $result;
    }

    public function update(int $expenceId,Expence $expence): bool
    {
        $amount = $expence->getAmount();
        $description = $expence->getDescription();
        $category = $expence->getCategory();

        $result = $this->expenceRepo->update($expenceId,$amount,$description,$category);
        return $result;
    }
}