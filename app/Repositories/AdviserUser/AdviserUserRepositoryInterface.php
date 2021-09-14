<?php

namespace App\Repositories\AdviserUser;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface AdviserUserRepositoryInterface
{
    public function find(string $id);
    public function update(int $id, array $data): void;
    public function getPaginate(int $perCount = 30): LengthAwarePaginator;
    public function destroy(int $id): void;
}
