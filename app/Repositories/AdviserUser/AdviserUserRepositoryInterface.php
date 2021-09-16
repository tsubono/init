<?php

namespace App\Repositories\AdviserUser;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface AdviserUserRepositoryInterface
{
    public function find(string $id);
    public function update(int $id, array $data): void;
    public function getPaginate(int $perCount = 15): LengthAwarePaginator;
    public function getByConditionPaginate(array $condition, int $perCount = 15): LengthAwarePaginator;
    public function getByCondition(array $condition);
    public function destroy(int $id): void;
}
