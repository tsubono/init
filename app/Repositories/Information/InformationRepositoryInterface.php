<?php

namespace App\Repositories\Information;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface InformationRepositoryInterface
{
    public function getPaginate(int $perCount = 10): LengthAwarePaginator;
    public function store(array $data): void;
    public function update(int $id, array $data): void;
    public function destroy(int $id): void;
}
