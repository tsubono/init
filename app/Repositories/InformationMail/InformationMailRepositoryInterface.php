<?php

namespace App\Repositories\InformationMail;

use App\Models\InformationMail;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface InformationMailRepositoryInterface
{
    public function getPaginate(int $perCount = 15): LengthAwarePaginator;
    public function store(array $data): InformationMail;
    public function update(int $id, array $data): InformationMail;
    public function destroy(int $id): void;
}
