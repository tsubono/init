<?php

namespace App\Repositories\AdviserUser;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface AdviserUserRepositoryInterface
{
    public function find(string $id);
    public function update(int $id, array $data): void;
    public function getPaginate(int $perCount = 30): LengthAwarePaginator;
    public function getByConditionPaginate(
        int $perCount,
        ?string $orderBy,
        ?string $category,
        ?string $language,
        ?string $name,
        ?string $country,
        ?string $residenceCountry,
        ?string $gender
    ): LengthAwarePaginator;
    public function destroy(int $id): void;
}
