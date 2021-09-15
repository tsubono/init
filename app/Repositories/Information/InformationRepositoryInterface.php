<?php

namespace App\Repositories\Information;

use App\Models\Information;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface InformationRepositoryInterface
{
    public function getPaginate(int $perCount = 10): LengthAwarePaginator;
    public function store(array $data): Information;
    public function update(int $id, array $data): Information;
    public function destroy(int $id): void;
}
