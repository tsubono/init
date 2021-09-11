<?php

namespace App\Repositories\AttendanceSale;

use App\Models\AttendanceSale;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface AttendanceSaleRepositoryInterface
{
    public function store(array $data): AttendanceSale;
    public function update(int $id, array $data): void;
    public function getPaginate(int $perCount = 30): LengthAwarePaginator;
    public function getByAdviserUserIdPaginate(int $adviserUserId, int $perCount = 30): LengthAwarePaginator;
}