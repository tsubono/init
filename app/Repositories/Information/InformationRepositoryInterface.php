<?php

namespace App\Repositories\Information;

use App\Models\Information;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface InformationRepositoryInterface
{
    public function getPaginate(int $perCount = 15): LengthAwarePaginator;
    public function getByConditionPaginate(array $condition, int $perCount = 15): LengthAwarePaginator;
    public function store(array $data): Information;
    public function update(int $id, array $data): Information;
    public function destroy(int $id): void;
}
