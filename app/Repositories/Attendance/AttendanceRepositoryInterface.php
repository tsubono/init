<?php

namespace App\Repositories\Attendance;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface AttendanceRepositoryInterface
{
    public function getPaginate(int $perCount = 10): LengthAwarePaginator;
    public function store(array $data): void;
    public function update(int $id, array $data): void;
}
