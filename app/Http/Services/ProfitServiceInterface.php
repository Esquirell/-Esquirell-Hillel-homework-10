<?php


namespace App\Http\Services;


use App\Models\Profit;
use Illuminate\Database\Eloquent\Collection;

interface ProfitServiceInterface
{
    public function getProfitById(int $id): Profit;

    public function getAllProfits(int $page = null): Collection;

    public function createProfit(array $profitData);

    public function updateProfit(int $id, array $profitData): int;

    public function deleteProfit(int $id): void;

    public function getProfitByCategory($categoryName);


}
