<?php

namespace App\Repositories\MateUserCoin;

use App\Models\MateUserCoin;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface MateUserCoinRepositoryInterface
{
    public function store(array $data): MateUserCoin;
    public function update(int $id, array $data): void;
    public function getPaginate(int $perCount = 15): LengthAwarePaginator;
    public function getByConditionPaginate(array $condition, int $perCount = 15): LengthAwarePaginator;
    public function getByCondition(array $condition);
    public function getByMateUserIdPaginate(int $mateUserId, int $perCount = 15): LengthAwarePaginator;
}
